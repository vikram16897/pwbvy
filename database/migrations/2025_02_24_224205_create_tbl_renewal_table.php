<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_renewal', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('user_id', 100);
            $table->decimal('amount', 10, 2);
            $table->date('transaction_date');
            $table->text('remarks');
            $table->integer('frequency');
            $table->string('reciever_id', 100);
            $table->integer('status');
            $table->dateTime('added_on');
            $table->integer('modify_by');
            $table->timestamp('modify_on')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_renewal');
    }
};
