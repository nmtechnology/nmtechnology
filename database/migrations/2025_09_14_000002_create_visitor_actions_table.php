<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('visitor_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_stat_id')->nullable();
            $table->string('ip', 45);
            $table->string('page');
            $table->timestamp('timestamp');
            $table->text('details')->nullable();
            $table->foreign('visitor_stat_id')->references('id')->on('visitor_stats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitor_actions');
    }
};
