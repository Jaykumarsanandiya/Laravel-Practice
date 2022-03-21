<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Company;
class Member extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getAddressAttribute($value){
        return $value.", India" ;
    }

    public function setNameattribute($value){
        $this->attributes['name'] =  "Mr ".$value ;
    }

    public function setAddressAttribute($value){
        $this->attributes['address'] = $value.", India";
    }

    public function getCompany(){
        return $this->hasOne(Company::class, 'employee_id');
        // return $this->hasOne('App\Models\Company', 'employee_id');
        // return $this->hasMany('App\Models\Company', 'employee_id');
    }

    public function getDevice(){
        return $this->hasMany(Device::class);
    }
}
