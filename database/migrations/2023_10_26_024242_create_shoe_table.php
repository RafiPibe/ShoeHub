<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->string('shoeName')->nullable();
            $table->enum('shoeSize', ['30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50'])->nullable();
            $table->float('shoePrice')->nullable();
            $table->string('outletId')->constrained()->nullable();
            $table->longText('shoeImage')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
