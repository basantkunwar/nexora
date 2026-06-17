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
        Schema::create('sliders', function (Blueprint $table) {
               $table->id();

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            // Images
            $table->string('desktop_image');
            $table->string('mobile_image')->nullable();

            // Button
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            // Display
            $table->integer('position')->default(0);

            $table->enum('text_alignment', [
                'left',
                'center',
                'right'
            ])->default('left');

            $table->enum('text_color', [
                'white',
                'black',
                'red',
                'green',
                'blue',
                'yellow',
                'orange',
                'purple',
                'pink',
                'brown',
                'gray',
                'custom'  

            ])->default('white');

            $table->boolean('status')->default(true);

            // Scheduling (optional but useful)
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
