<?php

declare(strict_types=1);

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'patient_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'doctor_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->dateTime('date');
            $table->foreignIdFor(Service::class, 'service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitations');
    }
};
