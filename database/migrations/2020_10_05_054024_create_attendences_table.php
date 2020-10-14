<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_profile_id')->constrained('user_profiles')->onDelete('cascade');
            $table->foreignId('student_class_id')->constrained('users');
            $table->date('attendence_date');
            $table->string('status');
//          1 ===>  by default it will always be pending
//          2 ===> rejected
//          3 ===> approved
//          4 ===> not a leave
            $table->integer('leave_approval')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendences');
    }
}
