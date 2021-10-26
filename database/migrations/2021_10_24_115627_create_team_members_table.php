<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id')->comment('プレーヤID');
            $table->integer('team_id')->comment('チーム番号');
            $table->string('name')->comment('名前');
            $table->string('player_number')->comment('プレーヤ番号');
            $table->string('position')->comment('ポジション');
            $table->integer('age')->comment('年');
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
        Schema::dropIfExists('team_members');
    }
}
