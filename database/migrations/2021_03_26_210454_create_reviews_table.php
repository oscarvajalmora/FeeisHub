<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('reporter_name');
            $table->string('reporter_profile_link');
            $table->string('affected_name');
            $table->string('affected_profile_link');
            $table->string('fb_group_name')->nullable();
            $table->string('fb_group_link')->nullable();
            $table->string('fb_post_link');
            $table->integer('feedback'); // positive or negative
            $table->text('commentary')->nullable();
            $table->integer('validated')->default(0); // 0 not validated; 1 validated;
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
        Schema::dropIfExists('reviews');
    }
}
