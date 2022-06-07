<?php

use App\Models\Championship;
use App\Models\Team;
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
        Schema::create('championship_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Championship::class)->index();
            $table->foreignIdFor(Team::class);
            $table->foreignIdFor(Team::class, 'opponent_id');
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
        Schema::dropIfExists('championship_matches');
    }
};
