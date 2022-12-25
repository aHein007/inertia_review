<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIndex extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone',
        'password',
        'address',
    ];


    function scopesearchFilter($query,$filter){
        $query->when($filter ?? "",function($query ,$search){
            $query->orwhere("name","like","%".$search."%")
                  ->orwhere("address","like","%".$search."%");
        });
    }
}
