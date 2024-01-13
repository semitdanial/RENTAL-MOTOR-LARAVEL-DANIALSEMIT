<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('sewa_motor', function (Blueprint $table) {
        $table->id();
        $table->foreignId('motor_id')->constrained();
        $table->integer('jumlah_motor');
        $table->date('tanggal_booking');
        $table->integer('durasi_sewa');
        $table->decimal('total_harga', 10, 2);
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
        Schema::dropIfExists('sewa_motor');
    }
};
