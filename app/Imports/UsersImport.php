<?php

namespace App\Imports;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToCollection, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
             $user = User::create([
                'name_complete' => $row[0],
                'rut' => $row[1],
                'email' => $row[2],
                'password' => Hash::make($row[3])
            ]);

             RoleUser::create([
                 'role_id' => $row[4],
                 'user_id' => $user->id,
                 //'user_type' => $row[5]
                 'user_type' => 'App\Models\User'
                 
             ]);
        }
    }

}

