<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    public function getMember(){
        // dd('test');
        return $this->belongsTo(Member::class, 'employee_id');
    }
}
