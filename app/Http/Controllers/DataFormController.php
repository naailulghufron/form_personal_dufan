<?php

namespace App\Http\Controllers;

use App\Exports\DufanExport;
use App\Helpers\GlobalHelper;
use App\Models\DataForm;
use App\Models\DetailKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class DataFormController extends Controller
{
    public function submit(Request $request)
    {
        
            $validator = Validator::make($request->all(), [
                'dufan_card' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:2048',
                'nik' => 'required|numeric|digits:5',
                'namaLengkap' => 'required',
                'no_dufan_card' => 'required|max:20',
                'dufan_card' => 'required|file|mimes:pdf,png,jpg,jpeg|max:2048',
                'family_fullname.*' => 'required',
                'status_relation.*' => 'required',
                'family_no_card.*' => 'required',
                'family_upload_file.*' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:2048',
            ]);

            
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        

        $find_form = DataForm::where('nik', $request->nik)->first();

        if (!empty($find_form)) {
            $detail_form = DetailKeluarga::where('form_id', $find_form->id)->delete();
            $find_form->delete();
        }
        

        $new_ktp = null;
        $new_kk = null;
        $new_domisili = null;
        $new_dufan_card = '';
        if (!empty($request->dufan_card)) {
            $files = $request->file('dufan_card');
            $format = $files->getClientOriginalName();
            $new_dufan_card = $request->nik . '-' . strtoupper($request->namaLengkap) . '.' . pathinfo($format, PATHINFO_EXTENSION);
            $files->storeAs('dufan_card/' . $request->nik, $new_dufan_card, 'public');
            // $files->move('ktp', $new_ktp);
        }

        $dataForms = [
            'nik' => $request->nik,
            'nama_lengkap' => strtoupper($request->namaLengkap),
            'dufan_card' => $new_dufan_card,
            // 'no_dufan_card' => '',
            'no_dufan_card' => isset($request->no_dufan_card) ? $request->no_dufan_card : '',
        ];
       
        $form = DataForm::create($dataForms);

        if (isset($request->status_relation)) {
            if (count($request->status_relation) > 0) {
                for ($i=0; $i < count($request->status_relation); $i++) { 
                    $new_dufan_card_family = '';
                    if (!empty($request->family_upload_file[$i])) {
                        $files = $request->file('family_upload_file')[$i];
                        $format = $files->getClientOriginalName();
                        $new_dufan_card_family = $request->nik . '-family-' . strtoupper($request->family_fullname[$i]) . '-' . $i . '.' . pathinfo($format, PATHINFO_EXTENSION);
                        $files->storeAs('dufan_card/' . $request->nik, $new_dufan_card_family, 'public');
                        // $files->move('ktp', $new_ktp);
                    }
    
                    $family_detail = DetailKeluarga::create([
                        'form_id' => $form->id,
                        'relation' => $request->status_relation[$i],
                        'fullname' => $request->family_fullname[$i],
                        'no_dufan_card' => isset($request->family_no_card[$i]) ? $request->family_no_card[$i] : '',
                        'file_dufan_card' => $new_dufan_card_family,
                    ]);
                }
            }
        }

        Session::flash('sukses', 'Submit Data Berhasil');
        return response()->json(['res' => 200]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::table('data_forms');

            if (!empty($request->date)) {
                $query->whereBetween('created_at', [GlobalHelper::convertDateRange($request->date)[0] . ' 00:00', GlobalHelper::convertDateRange($request->date)[1] . ' 23:59']);
            }

            // $query->where('is_active', $request->status == 'true');

            $dt = DataTables::of($query);

            $dt->addColumn('action', function ($d) {
                return '<button data-toggle="tooltip" title="Delete" data-id="'  . $d->id . '" class="delete btn btn-xs btn-sm"><i class="fa fa-trash"></i> </button>';
            })
                ->addColumn('status', function ($d) {
                    return $d->is_active == 1 ? 'Active' : 'InActive';
                })
                ->addColumn('link_kk', function ($d) {
                    return '<a target="_blank" href="kk/' . $d->upload_kk . '">' . $d->upload_kk . '</a>';
                })
                ->addColumn('link_ktp', function ($d) {
                    return '<a target="_blank" href="ktp/' . $d->upload_ktp . '">' . $d->upload_ktp . '</a>';
                })
                ->rawColumns(['action', 'status', 'link_kk', 'link_ktp']);

            return $dt->make(true);
        }
        return view('data-personal.index');
    }

    public function code()
    {
        return view('data-personal.create_code');
    }
    public function storeCode(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'code' => 'required|max:20',
        ]);

        if ($request->code == 'famday24') {
            return redirect()->route('form_data_personal_create')->with('code', bcrypt($request->code));
        }

        return redirect('input_code');

    }
    public function create()
    {
        $parameterValue = session('code');

        if (Hash::check('famday24', $parameterValue)) {
            // Kata sandi cocok
            return view('data-personal.create');
        }

        return redirect('input_code');

    }
    public function show($id)
    {
        $data = DataForm::find($id);
        $details = DetailKeluarga::where('form_id', $id)->get();

        return view('data-personal.show', compact('data', 'details'));
    }
    public function export()
    {
     
            return Excel::download(new DufanExport, 'data_annual_pass_2023.xlsx');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $d = DataForm::find($request->id);
            try {
                if (Storage::exists('public/kk/'  . $d->upload_kk)) {
                    Storage::delete('public/kk/'  . $d->upload_kk);
                }
                if (Storage::exists('public/ktp/'  . $d->upload_ktp)) {
                    Storage::delete('public/ktp/'  . $d->upload_ktp);
                }
                if (Storage::exists('public/domisili/'  . $d->upload_domisili)) {
                    Storage::delete('public/domisili/'  . $d->upload_domisili);
                }
                DataForm::destroy($request->id);
            } catch (\Throwable $th) {
                //throw $th;
            }
            return response()->json(['s' => true, 'm' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['s' => false, 'm' => 'Cannot delete, data has transaction.']);
        }
    }

    public function showImage($nik, $filename)
    {
        // if (!auth()->check()) {
        //     abort(403, 'Unauthorized');
        // }
        $path = storage_path('app/public/dufan_card/' . $nik . '/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file)->header('Content-Type', $type);
    }
}
