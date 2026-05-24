<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('city')->nullable();
                $table->integer('rating')->nullable();
                $table->string('svc')->nullable();
                $table->text('text')->nullable();
                $table->string('video')->nullable();
                $table->string('status')->default('active');
                $table->timestamps();
            });
        } else {
            Schema::table('testimonials', function (Blueprint $table) {
                if (!Schema::hasColumn('testimonials', 'video')) {
                    $table->string('video')->nullable()->after('text');
                }
            });
        }
    }

    public function down(): void
    {
        //
    }
};
