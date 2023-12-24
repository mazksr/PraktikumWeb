<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    use HasFactory;

    protected $table = "job_profiles";

    protected static function booted(): void {
    static::creating(function (JobProfile $jobProfile) {
        $jobProfile->status = 'waiting';
    });
    }

    protected $fillable = [
        'jobId',
        'profileId',
        'nama',
        'CV',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Job::class, 'jobId');
        return $this->belongsTo(Profile::class, 'profileId');
    }
}
