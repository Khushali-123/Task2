<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'name', 'info','status',
    ];

    public function category(){
        return  $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStatusValueAttribute() {
        $status = $this->status;

        if($status ==1) {
              $statusLabel = 'inactive';
        }else{
            $statusLabel = 'active';
        }
           return  ucwords($statusLabel);
    }
}
