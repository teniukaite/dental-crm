<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Visitation extends Model
{

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime:Y-m-d H:i',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'visitation_services', 'visitation_id', 'service_id');
    }
}
