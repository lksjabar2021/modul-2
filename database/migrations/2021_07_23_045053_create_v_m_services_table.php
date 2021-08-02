<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVMServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_m_services', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->ipAddress('ip_address');
            $table->enum('ram', ['1 GB', '2 GB', '4 GB', '8 GB']);
            $table->enum('vcpu', ['1 Core', '2 Core', '4 Core', '8 Core']);
            $table->enum('ssd', ['20 GB', '40 GB', '70 GB', '120 GB']); 
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
        Schema::dropIfExists('v_m_services');
    }
}
