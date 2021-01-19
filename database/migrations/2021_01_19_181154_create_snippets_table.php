<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function (Blueprint $table) {
            $table->id();
            $table->string('content',500);
            $table->enum('language', ['Java', 'PHP', 'Python', 'Java Script', 'Plain Text']);
            $table->string('title', 50)->nullable();
            $table->string('author', 50)->nullable();
            $table->boolean('private')->default(0);
            $table->boolean('active')->default(1);
            $table->integer('secret')->nullable();
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
        Schema::dropIfExists('snippets');
    }
}
