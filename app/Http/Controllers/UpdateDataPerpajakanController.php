<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\UpdateDataPerpajakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UpdateDataPerpajakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::table('update_data_perpajakan')->select('id', 'nik', 'name', 'npwp_15', 'npwp_16', 'file_npwp', 'is_active');
            if (!empty($request->date)) {
                $query->whereBetween('created_at', [GlobalHelper::convertDateRange($request->date)[0] . ' 00:00', GlobalHelper::convertDateRange($request->date)[1] . ' 23:59']);
            }

            $query->where('is_active', $request->status == 'true');


            $datatables = DataTables::of($query);

            $datatables->addColumn('action', function ($d) {
                return '<button data-toggle="tooltip" title="Delete" data-id="'  . $d->id . '" class="delete btn btn-xs btn-sm"><i class="fa fa-trash"></i> </button>';
            })
                ->addColumn('link_npwp', function ($d) {
                    return '<a target="_blank" href="file_npwp/' . $d->file_npwp . '">' . $d->file_npwp . '</a>';
                })
                ->rawColumns(['action', 'link_npwp']);

            return $datatables->make(true);
        }
        return view('update_data_perpajakan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('update_data_perpajakan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits:5|unique:update_data_perpajakan,nik',
            'namaLengkap' => 'required|min:5',
            'npwp_15' => 'required|min:15|max:15|unique:update_data_perpajakan,npwp_15',
            'npwp_16' => 'required|min:16|max:16|unique:update_data_perpajakan,npwp_16',
            'file_npwp' => 'required|mimes:png,jpg,jpeg,pdf',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        try {
            DB::beginTransaction();
            if (!empty($request->file_npwp)) {
                $files = $request->file('file_npwp');
                $format = $files->getClientOriginalName();
                $new_file_npwp = $request->nik . '-' . strtoupper($request->namaLengkap) . '-file_npwp-' . date('YmdHis') . '.' . pathinfo($format, PATHINFO_EXTENSION);
                $files->storeAs('file_npwp', $new_file_npwp, 'public');
            }
            $insert = UpdateDataPerpajakan::create([
                'nik' => $request->nik,
                'name' => strtoupper($request->namaLengkap),
                'npwp_15' => $request->npwp_15,
                'npwp_16' => $request->npwp_16,
                'file_npwp' => $new_file_npwp,
                'is_active' => true,
            ]);
            if ($insert) {
                DB::commit();
                return response()->json(['res' => 200]);
            } else {
                DB::rollback();
                return response()->json(['res' => 409]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['res' => 409]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UpdateDataPerpajakan $updateDataPerpajakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateDataPerpajakan $updateDataPerpajakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpdateDataPerpajakan $updateDataPerpajakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpdateDataPerpajakan $updateDataPerpajakan)
    {
        try {
            $d = UpdateDataPerpajakan::find($updateDataPerpajakan->id);
            try {
                if (Storage::exists('public/file_npwp/'  . $d->file_npwp)) {
                    Storage::delete('public/file_npwp/'  . $d->file_npwp);
                }
                UpdateDataPerpajakan::destroy($updateDataPerpajakan->id);
            } catch (\Exception $e) {
                return response()->json(['s' => false, 'm' => 'Cannot delete, data has transaction.']);
            }
            return response()->json(['s' => true, 'm' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['s' => false, 'm' => 'Cannot delete, data has transaction.']);
        }
    }
}
