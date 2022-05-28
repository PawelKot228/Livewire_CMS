<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableConstant extends Migration
{
    public function up()
    {
        Schema::create('constant', static function (Blueprint $table) {
            $table->id('id_constant');
            $table->string('constant_label', 255);
            $table->text('constant_text');
            $table->string('lang', 32);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('constant');
    }
}
