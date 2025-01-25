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
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'title')){
                $table->string('title');
            }
            if (!Schema::hasColumn('jobs', 'description')) {
                $table->text('description');
            }
            if (!Schema::hasColumn('jobs', 'company_id')) {
                $table->foreignId('company_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('jobs', 'salary')){
                $table->text('salary')->nullable(); 
            }
            if (!Schema::hasColumn('jobs', 'created_at')) {
                $table->timestamps();
            }
            if (!Schema::hasColumn('jobs', 'updated_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
