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
                $table->foreignId('community_id')->nullable()->comment('Identifica o secretariado que está realizando o curso. Ex: Florianópolis')->nullable();
                $table->boolean('is_admin')->default(false)->comment('Identifica se o usuário é administrador. Ex: Equipe Nacional');
                $table->foreign('community_id')->references('id')->on('options');
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
