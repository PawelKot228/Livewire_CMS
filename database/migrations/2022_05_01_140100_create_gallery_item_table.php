<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryItemTable extends Migration
{
    public function up()
    {
        Schema::create('gallery_item', function (Blueprint $table) {
            $table->id('id_gallery_item');
            $table->integer('id_user')->nullable();
            $table->integer('source_id');
            $table->string('source_table', 255);
            $table->string('filename', 255)->nullable();
            $table->string('filename_rendered', 255)->nullable();
            $table->tinyInteger('cover')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gallery_item');
    }
}
