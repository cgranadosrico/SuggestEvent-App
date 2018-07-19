<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialEvents', function (Blueprint $table) {
                $table->increments('id_event');
                $table->binary('photo')->nullable();
                $table->string('name');
                $table->timestamp('date_star')->nullable($value = true);
                $table->timestamp('date_end')->nullable($value = true);
                $table->string('description');
                $table->string('location');
                $table->rememberToken();
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
        Schema::dropIfExists('socialEvents');
    }
}
