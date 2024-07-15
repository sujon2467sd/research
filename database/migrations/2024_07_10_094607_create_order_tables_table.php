<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tables', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('publication_id');
            $table->string('author_id');
            $table->string('name');
            $table->string('number');
            $table->string('img')->nullable();
            $table->string('payment');
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();


        });

                // Set the primary key starting from 1000
             DB::statement('ALTER TABLE order_tables AUTO_INCREMENT = 1000');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_tables');
    }
}
