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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('payment_method_id');
            $table->timestamp('payment_date')->useCurrent(); 
            $table->decimal('total_amount', 10, 2);  
            $table->decimal('discount', 10, 2)->default(0); 
            $table->decimal('estimated_tax', 10, 2)->default(0);  
            $table->decimal('grand_amount', 10, 2);  
            $table->boolean('status')->default(true);  
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
