<?php

namespace App\Models;

use App\Casts\DeviceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;
    
    protected $casts = [
        "name" => DeviceCast::class
    ] ;
    public function getMember(){
        // dd('test');
        return $this->belongsTo(Member::class ,'member_id');
    
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}
