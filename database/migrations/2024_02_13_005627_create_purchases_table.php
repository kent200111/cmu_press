<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->foreignId('im_id')->constrained('ims')->onDelete('cascade');
            $table->foreignId('batch_id')->constrained('batches')->onDelete('cascade');
            $table->integer('quantity');
            $table->date('date_sold');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};