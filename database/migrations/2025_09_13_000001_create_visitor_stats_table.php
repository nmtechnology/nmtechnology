<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('visitor_stats', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('location')->nullable();
            $table->integer('visits')->default(1);
            $table->timestamp('last_visited')->nullable();
            $table->timestamp('locked_out_until')->nullable(); // Add lockout timestamp
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitor_stats');
    }
};
