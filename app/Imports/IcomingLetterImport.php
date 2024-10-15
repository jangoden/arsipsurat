<?php

namespace App\Imports;

use App\Models\letter;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IcomingLetterImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $letterNumber = $row['no_surat'];
        $existingIncomingLetter = Letter::where('reference_number', $letterNumber)->first();
        $letterDate = $row['tanggal_surat'];
        $from = $row['asal_surat'];
        $to = 'KPU KABUPATEN CIAMIS';
        $description = $row['perihal'];
        $no = $row['no'];
        $classification = 'ADM';
        $user = Auth()->user()->id;


        // Validasi nilai tanggal
        if (is_numeric($letterDate)) {
            // Jika dalam format serial number Excel
            $date = Date::excelToDateTimeObject($letterDate)->format('Y-m-d');
        } elseif (strtotime($letterDate)) {
            // Jika dalam format string yang valid
            $date = (new \DateTime($letterDate))->format('Y-m-d');
        } else {
            // Tanggal tidak valid
            $date = null;
        }

        if ($existingIncomingLetter || empty($letterNumber)) {
            return null;
        }

        return new letter([
            'reference_number' => $letterNumber,
            'agenda_number' => $no,
            'from' => $from,
            'to' => $to,
            'letter_date' => $date,
            'description' => $description,
            'type' => 'incoming',
            'classification_code' => $classification,
            'user_id' => $user


        ]);
    }
}
