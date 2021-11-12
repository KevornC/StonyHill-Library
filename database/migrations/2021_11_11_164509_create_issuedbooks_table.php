<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuedbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuedbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members','id');
            $table->foreignId('book_id')->constrained('books','id');
            $table->date('issued_date');
            $table->date('return_date');
            $table->string('days_remaining');
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
        Schema::dropIfExists('issuedbooks');
    }
}
