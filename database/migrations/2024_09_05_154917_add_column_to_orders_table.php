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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('city')-> after('address');
            $table->string('state')-> after('city');
            $table->string('postal_code')-> after('state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
          // Remove the added columns when rolling back the migration
        $table->dropColumn(['city', 'state', 'postal_code']);
        });
    }
};
