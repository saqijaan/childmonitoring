<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_logs', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('_Id');
            $table->integer('child_id');

            $table->string('number')->nullable();
            $table->string('type')->nullable();
            $table->time('duration')->nullable();
            $table->timestamps();
            
            $table->unique( array('_Id','child_id','created_at') );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_logs');
    }
}
