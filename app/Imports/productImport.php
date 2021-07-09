<?php

namespace App\Imports;

use App\product;
use Maatwebsite\Excel\Concerns\ToModel;

class productImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
           
            'user_id' =>$row[0],
            'category_id' =>$row[1],
            'name' => $row[2], 
            'info' => $row[3],
            'image' => $row[4],
            'status' =>$row[5],
        ]);
    }
    
} 
