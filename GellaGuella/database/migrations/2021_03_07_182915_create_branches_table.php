<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('branches', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('branchName', 100);
            $table->text('branchDesc');
            $table->integer('branchNumber');
            $table->string('branchStreet', 100);
            $table->string('branchDistrict', 3);
            $table->string('branchCity', 50);
            $table->string('branchCep', 9);
            $table->boolean('branchStatus');
            $table->decimal('branchProfitMargin', 9, 2)->nullable();
            $table->decimal('branchMinimumInvestment', 9, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('branches');
    }
}
