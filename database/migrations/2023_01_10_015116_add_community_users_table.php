<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommunityUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->unsignedInteger('community_id')->comment('Identifica o secretariado que está realizando o curso. Ex: Florianópolis')->nullable();
                $table->unsignedInteger('role_id')->comment('Identifica perfil do usuário. Ex: Usuário, Editor, Administrador');
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('role_id')->references('id')->on('options');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->dropForeign('users_community_id_foreign');
                $table->dropColumn('community_id');
            }
        );
    }
}
