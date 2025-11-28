<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests_of_product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('branch_id');
            $table->integer('prod_id');
            $table->integer('quantity_of_prod');
            $table->timestamps();
            $table->string('accept_or_not', 10)->default('not');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests_of_product');
    }
};
