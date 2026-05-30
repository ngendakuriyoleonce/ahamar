<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'tbldepartments';
    protected $primaryKey = 'IdDep';
    public $timestamps = false;

    protected $fillable = [
        'DepartmentName',
        'DepartmentShortName',
        'DepartmentCode',
        'CreationDate',
    ];

    protected $casts = [
        'CreationDate' => 'datetime',
    ];

    // Relations
    public function employees()
    {
        return $this->hasMany(Employee::class, 'Department', 'IdDep');
    }
}
