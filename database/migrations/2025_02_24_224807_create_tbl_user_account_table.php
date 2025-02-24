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
        Schema::create('ngo_user_account', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('username', 100);
            $table->string('transaction_for', 20);
            $table->integer('transaction_type');
            $table->string('transaction_amount', 10);
            $table->date('transaction_date');
            $table->text('remarks');
            $table->integer('status');
            $table->dateTime('added_on');
            $table->timestamp('modify_on')->useCurrent()->useCurrentOnUpdate();
            $table->integer('modify_by');

            // Set MyISAM storage engine (optional)
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngo_user_account');
    }
};
