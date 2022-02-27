<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helm_charts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('repo')->nullable();
            $table->string('icon')->nullable();
            $table->longText('description')->nullable();
            $table->text('default_config')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helm_charts');
    }
}
