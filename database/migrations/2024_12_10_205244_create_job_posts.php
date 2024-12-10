<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id(); // Cột id tự động được tạo cho job_posts
        $table->unsignedBigInteger('employer_id')->nullable(); // Cột employer_id có thể null
        $table->string('position');
        $table->integer('quantity');
        $table->date('deadline');
        $table->text('description');
        $table->text('requirements');
        $table->string('status')->default('Active');
        $table->timestamps(); // created_at và updated_at

        // Đặt khóa ngoại cho employer_id
        $table->foreign('employer_id')->references('id')->on('tk_employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
