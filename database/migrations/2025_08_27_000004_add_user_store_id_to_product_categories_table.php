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
        Schema::table('product_categories', function (Blueprint $table) {
            // Add user_store_id column
            $table->unsignedBigInteger('user_store_id')->nullable()->after('id');
            
            // Add foreign key constraint
            $table->foreign('user_store_id')->references('id')->on('user_stores')->onDelete('cascade');
            
            // Add index for better performance
            $table->index('user_store_id');
            
            // Add a unique constraint to prevent duplicate category names for the same store
            $table->unique(['user_store_id', 'name'], 'unique_store_category_name');
            
            // Drop the existing unique constraint on slug since it needs to be unique per store now
            $table->dropUnique(['slug']);
            
            // Add a unique constraint for slug per store
            $table->unique(['user_store_id', 'slug'], 'unique_store_category_slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            // Drop the unique constraint for slug per store
            $table->dropUnique('unique_store_category_slug');
            
            // Recreate the original unique constraint on slug
            $table->unique(['slug']);
            
            // Drop the unique constraint for category name per store
            $table->dropUnique('unique_store_category_name');
            
            // Drop the index
            $table->dropIndex(['user_store_id']);
            
            // Drop the foreign key constraint
            $table->dropForeign(['user_store_id']);
            
            // Drop the column
            $table->dropColumn('user_store_id');
        });
    }
};