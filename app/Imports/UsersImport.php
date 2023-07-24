<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function model(array $row)
    {        
        $user = new User([
            'name' => $row[0],
            'prodi' => $row[1],
            'year' => $row[2]
        ]);
    
        $user->save();
    }
}
