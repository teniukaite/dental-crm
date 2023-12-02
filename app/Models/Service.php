<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
