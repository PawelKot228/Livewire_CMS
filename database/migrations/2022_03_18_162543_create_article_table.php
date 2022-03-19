<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id('id_article');
            $table->unsignedBigInteger('id_article_category')->nullable();
            $table->string('article_title', 255);
            $table->text('article_lead')->nullable();
            $table->text('article_text')->nullable();
            $table->dateTime('article_publication')->nullable();
            $table->tinyInteger('status')->default(1)->nullable(false);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('article');
    }
}
