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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('address', 100);
            $table->string('avatar_url', 1000);
            $table->string('gender')->nullable() ;
            $table->unsignedBigInteger('position')->nullable() ;
            $table->unsignedBigInteger('level')->nullable() ;

            $table->enum('role',['manager','employees','super_admin']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('position')->references('id')->on('position')->onDelete('cascade');
            $table->foreign('level')->references('id')->on('level')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
