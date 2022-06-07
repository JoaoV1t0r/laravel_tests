<?php

use App\Models\Championship;
use App\Models\ChampionshipUser;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_charts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Championship::class)->index();
            $table->foreignIdFor(ChampionshipUser::class);
            $table->integer('user_points');
            $table->integer('user_assertions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_charts');
    }
};
