<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tblemployees';
    protected $primaryKey = 'IdEmp';
    public $timestamps = false;

    protected $fillable = [
        'EmpId',
        'FirstName',
        'LastName',
        'EmailId',
        'Password',
        'Gender',
        'Department',
        'Address',
        'Phonenumber',
        'Status',
        'Role',
    ];

    protected $hidden = [
        'Password',
    ];

    protected $casts = [
        'Status' => 'boolean',
        'Role' => 'integer',
    ];

    // Relations
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'empid', 'IdEmp');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'Department', 'IdDep');
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }

    // Check if user is admin
    public function isAdmin()
    {
        return $this->Role == 1;
    }
}
