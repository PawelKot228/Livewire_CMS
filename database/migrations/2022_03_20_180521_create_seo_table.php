<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->id('id_seo');
            $table->unsignedBigInteger('source_id');
            $table->string('source_table', 255);
            $table->string('slug', 255)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
            $table->string('seo_keywords', 255)->nullable();
            $table->string('seo_robots', 64)->nullable();
            $table->string('seo_lang', 8)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seo');
    }
}
