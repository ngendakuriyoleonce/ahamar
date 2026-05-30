<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'tblleaves';
    protected $primaryKey = 'IdLeave';
    public $timestamps = false;

    protected $fillable = [
        'LeaveType',
        'ToDate',
        'FromDate',
        'DayNumber',
        'Description',
        'PostingDate',
        'AdminRemark',
        'AdminRemarkDate',
        'Status',
        'IsRead',
        'empid',
    ];

    protected $casts = [
        'ToDate' => 'date',
        'FromDate' => 'date',
        'PostingDate' => 'datetime',
        'DayNumber' => 'integer',
        'Status' => 'integer',
        'IsRead' => 'integer',
    ];

    // Status constants
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 2;

    // Relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'empid', 'IdEmp');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'LeaveType', 'LeaveType');
    }

    // Check if leave request is approved
    public function isApproved()
    {
        return $this->Status === self::STATUS_APPROVED;
    }

    // Check if leave request is pending
    public function isPending()
    {
        return $this->Status === self::STATUS_PENDING;
    }

    // Check if leave request is rejected
    public function isRejected()
    {
        return $this->Status === self::STATUS_REJECTED;
    }

    // Get status label
    public function getStatusLabelAttribute()
    {
        return match($this->Status) {
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
            default => 'Unknown'
        };
    }
}
