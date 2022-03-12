<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('email', 255)->unique();
            $table->string('login', 255);
            $table->string('given_name', 255);
            $table->string('family_name', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps();
        });


        //Create default admin user upon first project setup
        Admin::create([
            'email' => 'admin@admin.com',
            'login' => 'admin',
            'given_name' => 'Admin',
            'family_name' => 'User',
            'email_verified_at' => now()->toDateTimeString(),
            'password' => Hash::make('admin'),
        ]);

    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
