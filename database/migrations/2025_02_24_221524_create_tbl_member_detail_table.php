<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_member_detail', function (Blueprint $table) {
            $table->id(); // This already creates a primary key
            $table->string('name', 100);
            $table->string('username', 110)->unique();
            $table->string('father', 110);
            $table->string('name_title', 100);
            $table->string('father_title', 100);
            $table->string('gender', 100);
            $table->string('age', 100);
            $table->date('dob');
            $table->string('bank_branch', 100);
            $table->string('pincode', 100);
            $table->integer('district');
            $table->integer('state');
            $table->integer('block');
            $table->integer('panchayat');
            $table->text('parents')->nullable();
            $table->string('beneneficiary_name', 100)->nullable();
            $table->string('beneneficiary_dob', 100)->nullable();
            $table->string('beneneficiary_aadhar', 100)->nullable();
            $table->string('bank_name', 100);
            $table->string('account_holder', 100);
            $table->string('pan', 20);
            $table->string('mobile', 20);
            $table->string('email', 100);
            $table->text('address')->nullable();
            $table->string('bank_account', 100);
            $table->string('bank_ifsc', 100);
            $table->integer('user_type');
            $table->integer('emp_user')->default(1);
            $table->string('sponsor_id', 100);
            $table->string('aadhar', 20);
            $table->string('epin', 25)->nullable();
            $table->text('image')->nullable();
            $table->text('passbook');
            $table->text('sadicard');
            $table->integer('bond')->default(0);
            $table->string('donation', 100)->nullable();
            $table->integer('id_print')->default(0);
            $table->enum('status', ['-1', '0', '1', '2']);
            $table->string('added_by', 20);
            $table->dateTime('created_at');
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('modify_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_member_detail');
    }
};
