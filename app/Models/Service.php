<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<ServiceCategory, Service>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function visitations(): BelongsToMany
    {
        return $this->belongsToMany(Visitation::class, 'visitation_services', 'service_id', 'visitation_id');
    }
}
