<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('item_number');
            $table->string('product_desc');
            $table->string('condition');
            $table->string('category');
            $table->string('delivered_by');
            $table->string('quantity');
            $table->date('date_delivered');
            $table->date('expiry_date');
            $table->string('remaining_quantity');
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
        Schema::dropIfExists('inventories');
    }
}
