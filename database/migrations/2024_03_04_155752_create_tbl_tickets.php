<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_tickets', function (Blueprint $table) {
            $table->bigIncrements('ticket_id');
            $table->string('contact_name', 32);
            $table->string('email', 100);
            $table->string('no_tlp', 32);
            $table->string('ref_num', 32);
            $table->string('no_queue', 32);
            $table->string('status', 32);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tickets');
    }
};
