<?php

namespace App\Exports;

use App\Models\DataForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DufanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datas = DataForm::with('details')->get();
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
        $domain = $_SERVER['HTTP_HOST'];


        $ticketData = [];
        foreach ($datas as $data) {
            $ticketData[] = [
                'NIK' => $data->nik,
                'Status' => 'Karyawan',
                'Nama Lengkap' => $data->nama_lengkap,
                'Kode Dufan' => $data->no_dufan_card,
                // 'Gambar' => $data->dufan_card,
                'Gambar' => $data->dufan_card == '' ? '' : $protocol . $domain . "/show-image/" . $data->nik . '/' . $data->dufan_card,
            ];
            foreach ($data->details as $key => $detail) {
                $ticketData[] = [
                    'NIK' => $data->nik,
                    'Status' => $detail->relation,
                    'Nama Lengkap' => $detail->fullname,
                    'Kode Dufan' => $detail->no_dufan_card,
                    'Gambar' => $detail->file_dufan_card == '' ? '' :  $protocol . $domain . "/show-image/" . $data->nik . '/' . $detail->file_dufan_card,
                ];
            }
        }

        return collect($ticketData);
    }

    public function headings(): array

    {

        return ["NIK", "Status", "Nama Lengkap", "Kode Dufan","Gambar"];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15, // Set lebar kolom A menjadi 15
            'B' => 30, // Set lebar kolom B menjadi 30
            'C' => 25, // Set lebar kolom C menjadi 20
            'D' => 20, // Set lebar kolom C menjadi 20
            'E' => 15, // Set lebar kolom C menjadi 20
        ];
    }
}
