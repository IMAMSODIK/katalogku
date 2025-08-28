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
        Schema::table('product_sub_categories', function (Blueprint $table) {
            // Add user_store_id column
            $table->unsignedBigInteger('user_store_id')->nullable()->after('id');
            
            // Add foreign key constraint
            $table->foreign('user_store_id')->references('id')->on('user_stores')->onDelete('cascade');
            
            // Add index for better performance
            $table->index('user_store_id');
            
            // Add a unique constraint to prevent duplicate subcategory names for the same store
            $table->unique(['user_store_id', 'name'], 'unique_store_subcategory_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_sub_categories', function (Blueprint $table) {
            // Drop the unique constraint for subcategory name per store
            $table->dropUnique('unique_store_subcategory_name');
            
            // Drop the index
            $table->dropIndex(['user_store_id']);
            
            // Drop the foreign key constraint
            $table->dropForeign(['user_store_id']);
            
            // Drop the column
            $table->dropColumn('user_store_id');
        });
    }
};