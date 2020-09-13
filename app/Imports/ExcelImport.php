<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{ 
  public function model(array $row)
  {
        return $data([
          'name'     => $row[0],
          'email'    => $row[1],
          'phone' => $row[2],
          'details' => $row[3],
      ]);

  }
}