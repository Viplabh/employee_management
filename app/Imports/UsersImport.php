<?php

namespace App\Imports;

use App\Models\DataUpload;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            return new DataUpload([
                'customer_name' => $row[0],
                'mobile_no' => $row[1],
                'email' => $row[2],
                'address' => $row[3],
                'created_by' =>Auth::user()->email,
            ]);
        } catch (\Throwable $th) {
            dd("dsfsdfsdgsd");
        }
    }
}
