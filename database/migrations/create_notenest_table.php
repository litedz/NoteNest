<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
<<<<<<<< HEAD:database/migrations/create_notenest_table.php
      Schema::create('notes', function (Blueprint $table) {
========
        Schema::create('notenest_table', function (Blueprint $table) {
>>>>>>>> Fixnest:database/migrations/create_notenest_table.php.stub
            $table->id();
            $table->string('name');
            $table->string('description')->unique();
            $table->timestamps();
        });
    }
};
