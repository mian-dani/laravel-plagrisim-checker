<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlagiarismsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagiarisms', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('match_user_id');
            $table->string('submission_id')->nullable();
            $table->string('assignment_id');
            $table->string('plagiarism')->nullable();
            $table->string('performance')->nullable();
            $table->longText('matchLines')->nullable();
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
        Schema::dropIfExists('plagiarisms');
    }
}
