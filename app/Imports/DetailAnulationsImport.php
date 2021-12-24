<?php

namespace App\Imports;

use App\Models\DetailAnulation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
class DetailAnulationsImport implements ToCollection, WithStartRow

{
    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**¬
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

//    public function model(array $row)
//    {
//        return new DetailAnulation([
//            'number_ticket' => $this->ticket,
//            'date_anulation' => $row[0],
//            'hour' => $row[1],
//            'patient' => $row[2],
//            'name_doctor' => $row[3],
//            'phone1' => $row[4],
//            'phone2' => $row[5],
//            'response_anulation' => $row[6],
//            'date_load' => $row[7],
//            'date_close' => $row[8],
//            'tiphication' => $row[9],
//            'executive' => $row[10],
//            'date_gestion' => $row[11],
//            'trys' => $row[12],
//            'email' => $row[13],
//        ]);
//    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
                DetailAnulation::create([
                    'number_ticket' => $this->ticket,
                    'date_anulation' => $row[0],
                    'hour' => $row[1],
                    'patient' => $row[2],
                    'name_doctor' => $row[3],
                    'phone1' => $row[4],
                    'phone2' => $row[5],
                    'response_anulation' => $row[6],
                    'date_load' => $row[7],
                    'date_close' => $row[8],
                    'tiphication' => $row[9],
                    'executive' => $row[10],
                    'date_gestion' => $row[11],
                    'trys' => $row[12],
                    'email' => $row[13],
            ]);

        }
    }
}
