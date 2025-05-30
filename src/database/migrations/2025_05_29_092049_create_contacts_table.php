<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories'); // 🔹 外部キー (categories テーブルと紐づく)
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('gender'); // 🔹 1:男性, 2:女性, 3:その他
            $table->string('email');
            $table->string('tel');
            $table->string('address');
            $table->string('building')->nullable(); // 🔹 `nullable()` を追加して、必須入力を回避
            $table->text('detail');
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
        Schema::dropIfExists('contacts');
    }
}
