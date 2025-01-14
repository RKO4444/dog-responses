<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dog_list_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_list_id');
            $table->string('response_code');
            $table->string('image_url');
            $table->timestamps();
    
            $table->foreign('dog_list_id')->references('id')->on('dog_lists')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dog_list_items');
    }
};
