<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\enum\Tables;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Tables::JOB_TYPES-> value, function (Blueprint $table) {
            $table->id();                 
            $table->string('type');       
            $table->string('title');     
            $table->timestamps();         
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(Tables::JOB_TYPES-> value);
    }
};
