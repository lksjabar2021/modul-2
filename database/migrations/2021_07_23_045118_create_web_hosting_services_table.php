<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebHostingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_hosting_services', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name');
            $table->ipAddress('ip_address');
            $table->enum('ram', ['512 MB', '1 GB', '2 GB']);
            $table->enum('vcpu', ['1 Core', '1.5 Core']);
            $table->enum('ssd', ['1 GB', '3 GB', '5 GB']); 
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
        Schema::dropIfExists('web_hosting_services');
    }
}
