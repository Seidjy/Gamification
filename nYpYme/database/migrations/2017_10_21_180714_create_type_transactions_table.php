<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_transactions', function (Blueprint $table) {
            $table->string('id',32);
            $table->string('cnpj', 14);
            $table->string('name',40);
            $table->timestamps();
            $table->foreign('cnpj')->references('cnpj')->on('users');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_transactions');
    }
}
