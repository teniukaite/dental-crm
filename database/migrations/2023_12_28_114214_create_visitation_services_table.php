<?php

declare(strict_types=1);

use App\Models\Service;
use App\Models\Visitation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitation_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visitation::class, 'visitation_id');
            $table->foreignIdFor(Service::class, 'service_id');
            $table->timestamps();
        });

        Schema::table('visitations', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Service::class, 'service_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitation_services');

        Schema::table('visitations', function (Blueprint $table) {
            $table->foreignIdFor(Service::class, 'service_id')->nullable()->constrained('services')->onDelete('cascade');
        });
    }
};
