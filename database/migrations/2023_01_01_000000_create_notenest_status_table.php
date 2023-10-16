<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {

      Schema::create('status_funcs', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['IN_PROGRESS','ENDED','AWAIT']);
            $table->timestamp('start_progress_at')->nullable();
            $table->timestamps();
        });
    }
        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
    
};
