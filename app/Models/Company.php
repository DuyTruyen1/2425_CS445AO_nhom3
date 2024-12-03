<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company";

    public function studentOFCompany()
    {
        return $this->hasMany('App\student', 'CompanyID', 'StudentID');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
