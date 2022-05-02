<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_assignments', function (Blueprint $table) {
                $table->id();
                $table-> unsignedInteger('item_id');
                $table-> string('assigned_to');
                $table-> string('number_of_item');
                $table-> string('issued_by');
                $table-> string('issue_to');
                $table->foreign('item_id')
                      ->references('id')
                      ->on('inventories')
                      ->onDelete('cascade');
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
        Schema::dropIfExists('inventory_assignments');
    }
}
