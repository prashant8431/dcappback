<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDChallansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_challans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_company_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('work_id');
            $table->json('item_list');
            $table->timestamps();

            $table->foreign('my_company_id')->references('id')->on('my_companies');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('work_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_challans');
    }
}
