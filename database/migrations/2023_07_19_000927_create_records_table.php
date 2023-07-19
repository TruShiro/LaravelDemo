<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Description')->nullable(); //can be null
            $table->string('Project');
            $table->timestamp('Record_Date');//timestamp is for Y-m-d h:m:s
            $table->string('Image')->nullable();//For saving image name
            $table->timestamps();//Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
