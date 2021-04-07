<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_company_id');
            $table->unsignedBigInteger('company_id');
            $table->string('order_no');
            $table->string('type')->nullable();
            $table->string('bill_from')->nullable();
            $table->date('order_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('my_company_id')->references('id')->on('my_companies');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
