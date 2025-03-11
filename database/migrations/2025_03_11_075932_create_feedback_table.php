<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->text('feedback');
            $table->binary('file')->nullable(); // ✅ Correct way to store files as binary
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('feedback');
    }
};
