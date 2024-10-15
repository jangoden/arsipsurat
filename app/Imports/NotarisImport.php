<?php

namespace App\Imports;

use App\Models\Notaris;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NotarisImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $notaNumber = $row['nomor_nota_dinas'];
        $existingNota = Notaris::where('nota_number', $notaNumber)->first();


        // Jika kode sudah ada, lewati penambahan data
        if ($existingNota || empty($notaNumber)) {
            return null;
        }
        if (empty($row['tanggal']) || empty($row['perihal']) || empty($row['dari']) || empty($row['kepada'])) {
            return null; // Jika ada kolom yang kosong, lewati
        }


        $tanggal = $row['tanggal'];

        // Validasi nilai tanggal
        if (is_numeric($tanggal)) {
            // Jika dalam format serial number Excel
            $date = Date::excelToDateTimeObject($tanggal)->format('Y-m-d');
        } elseif (strtotime($tanggal)) {
            // Jika dalam format string yang valid
            $date = (new \DateTime($tanggal))->format('Y-m-d');
        } else {
            // Tanggal tidak valid
            $date = null;
        }
        $description = $row['perihal'];
        $from = $row['dari'];
        $to = $row['kepada'];

        $arsip = Notaris::create([
            'nota_number' => $notaNumber,
            'nota_date' => $date,
            'description' => $description,
            'from' => $from,
            'to' => $to
        ]);

        return $arsip;
    }
}
