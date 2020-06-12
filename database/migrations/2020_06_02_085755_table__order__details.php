<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('quantity')->nullable();
            $table->longText('comments');
            $table->string('payment')->nullable();
            $table->string('shipping_address');
            $table->string('receiver');
            $table->string('phone_consignee');
            $table->integer('order_id')->unsigned();        //Foreign key
            $table->integer('product_id')->unsigned();        //Foreign key
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
        Schema::dropIfExists('order_details');
    }
}
