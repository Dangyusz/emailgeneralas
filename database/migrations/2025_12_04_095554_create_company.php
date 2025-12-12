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
        Schema::create(Tables::COMPANY->value, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile');
            $table->text('contact');
            $table->integer('zip');
            $table->string('adress');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Tables::COMPANY->value);
    }


};
