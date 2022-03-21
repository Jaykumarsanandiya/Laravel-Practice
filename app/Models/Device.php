<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function getMember(){
        // dd('test');
        return $this->belongsTo(Member::class ,'member_id');
    
    }
}
