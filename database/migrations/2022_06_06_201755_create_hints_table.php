<?php

use App\Models\ChampionshipMatch;
use App\Models\ChampionshipUser;
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
        Schema::create('hints', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ChampionshipMatch::class);
            $table->foreignIdFor(ChampionshipUser::class);
            $table->integer('team_gols');
            $table->integer('opponent_gols');
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
        Schema::dropIfExists('hints');
    }
};
