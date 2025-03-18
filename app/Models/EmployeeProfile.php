<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeProfile extends Model
{
    protected $fillable = [
        'index_number',
        'full_name',
        'current_location',
        'education_level',
        'remote_work_available',
        'software_expertise',
        'languages_spoken',
        'responsibility_level',
    ];

    protected $casts = [
        'remote_work_available' => 'boolean',
        'languages_spoken' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
