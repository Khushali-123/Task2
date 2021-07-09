<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getStatusValueAttribute() {
        $status = $this->status;

        if($status ==1) {
              $statusLabel = 'inactive';
        }else{
            $statusLabel = 'active';
        }
           return  $statusLabel;
    }
    public function products(){ 
        return $this->hasMany('\App\Product'); //Product Model Name
    }

    


}
