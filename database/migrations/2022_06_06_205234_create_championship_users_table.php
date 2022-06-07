<?php

use App\Models\User;
use App\Models\Championship;
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
        Schema::create('championship_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Championship::class)->index();
            $table->foreignIdFor(User::class)->index();
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
        Schema::dropIfExists('championship_users');
    }
};
