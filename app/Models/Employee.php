<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['nik','name','date_of_entry','gender','department_id','position_id','status','count_leave'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }
}
