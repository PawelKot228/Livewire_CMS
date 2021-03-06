<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->id('id_article_category');
            $table->string('article_category_title', 255);
            $table->text('article_category_lead')->nullable(true);
            $table->text('article_category_text')->nullable(true);
            $table->tinyInteger('status')->default(1)->nullable(true);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}
