<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('custom_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->string('customer_name')->after('id');
            $table->string('customer_email')->after('customer_name');
            $table->string('customer_phone')->nullable()->after('customer_email');

            $table->renameColumn('description', 'design_vision');
            $table->renameColumn('requested_height', 'height');
            $table->renameColumn('requested_diameter', 'diameter');
            $table->renameColumn('glaze_type', 'glaze_finish');
            $table->renameColumn('sketch_image_path', 'reference_image');
        });
    }

    public function down(): void
    {
        Schema::table('custom_requests', function (Blueprint $table) {
            $table->renameColumn('design_vision', 'description');
            $table->renameColumn('height', 'requested_height');
            $table->renameColumn('diameter', 'requested_diameter');
            $table->renameColumn('glaze_finish', 'glaze_type');
            $table->renameColumn('reference_image', 'sketch_image_path');

            $table->dropColumn(['customer_name', 'customer_email', 'customer_phone']);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        });
    }
};
