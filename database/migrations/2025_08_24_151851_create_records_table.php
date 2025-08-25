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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_record')->nullable();
            $table->string('item_name')->nullable();
            $table->string('mfg_lic_no')->nullable();
            $table->string('packing_trader')->nullable();
            $table->string('product_name')->nullable();
            $table->string('batch_size')->nullable();
            $table->string('pack_size')->nullable();
            $table->string('bottle_jar')->nullable();
            $table->string('color_material')->nullable();
            $table->string('form_of_product')->nullable();
            $table->string('ph_value')->nullable();
            $table->string('fragrance_flavour')->nullable();
            $table->string('no_of_packs')->nullable();
            $table->string('batch_number')->nullable();
            $table->date('manufacturing_date')->nullable();
            $table->string('shelf_life')->nullable();
            $table->string('no_of_sample')->nullable();
            $table->string('sampled_by')->nullable();
            $table->string('sample_handed_over_to')->nullable();
            $table->string('qc_checked')->nullable();
            $table->string('record_manager')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
