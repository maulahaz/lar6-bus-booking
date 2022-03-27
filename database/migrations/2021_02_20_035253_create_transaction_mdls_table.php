<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMdlsTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id');
            $table->boolean('status')->nullable()->default(false);
            $table->string('qty');
            $table->timestamps();
        });

        Schema::table('tbl_transaction', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_transaction');
        $table->dropForeign(['ticket_id']);
    }
}
