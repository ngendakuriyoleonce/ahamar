<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $table = 'tblleavetype';
    protected $primaryKey = 'IdT';
    public $timestamps = false;

    protected $fillable = [
        'LeaveType',
        'Description',
        'CreationDate',
    ];

    protected $casts = [
        'CreationDate' => 'datetime',
    ];

    // Relations
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'LeaveType', 'LeaveType');
    }
}
