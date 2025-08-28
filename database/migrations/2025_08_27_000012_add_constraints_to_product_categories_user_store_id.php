<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            // Check if the foreign key constraint already exists
            $foreignKeys = DB::select("
                SELECT CONSTRAINT_NAME
                FROM information_schema.KEY_COLUMN_USAGE
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'product_categories'
                AND COLUMN_NAME = 'user_store_id'
                AND REFERENCED_TABLE_NAME = 'user_stores'
            ");
            
            // Add foreign key constraint if it doesn't exist
            if (empty($foreignKeys)) {
                $table->foreign('user_store_id')->references('id')->on('user_stores')->onDelete('cascade');
            }
            
            // Check if indexes exist before adding them
            $indexes = DB::select("
                SHOW INDEX FROM product_categories 
                WHERE Column_name = 'user_store_id' AND Key_name = 'product_categories_user_store_id_index'
            ");
            
            if (empty($indexes)) {
                $table->index('user_store_id');
            }
            
            // Check if unique constraints exist
            $uniqueSlug = DB::select("
                SHOW INDEX FROM product_categories 
                WHERE Key_name = 'unique_store_category_slug'
            ");
            
            if (empty($uniqueSlug)) {
                $table->unique(['user_store_id', 'slug'], 'unique_store_category_slug');
            }
            
            $uniqueName = DB::select("
                SHOW INDEX FROM product_categories 
                WHERE Key_name = 'unique_store_category_name'
            ");
            
            if (empty($uniqueName)) {
                $table->unique(['user_store_id', 'name'], 'unique_store_category_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropForeign(['user_store_id']);
            $table->dropIndex(['user_store_id']);
            $table->dropUnique('unique_store_category_slug');
            $table->dropUnique('unique_store_category_name');
        });
    }
};