<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'options', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->comment('Descrição do domínio que será usado em diversas tabelas. Ex: Fixo, Celular, Email');
                $table->char('group', 3)->comment('Identificador para determinar a que grupo pertence o domíno. Ex: CNT (Contact), OTG (Other Group)');
                $table->softDeletes();
            }
        );

        Schema::create(
            'people', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('other_group_id')->comment('Identifica outro grupo jovem que a pessoa já frequentou. Ex: Segue-me, EJC');
                $table->unsignedInteger('level_id')->comment('Identfica o grau de escolaridade. Ex: Fundamental, Médio, Superior');
                $table->string('name')->comment('Nome completo da pessoa. Ex: José da Silva');
                $table->date('birth_at')->comment('Data de aniversário. Ex: 01/07/1980');
                $table->char('gender')->comment('Gênero. Ex: Masculino ou Feminino');
                $table->string('father')->nullable()->comment('Nome completo do pai. Ex: José da Silva');
                $table->string('mother')->nullable()->comment('Nome completo da mãe. Ex: Maria da Silva');
                $table->string('community')->nullable()->comment('Nome da paróquia ou comunidade que participa. Ex: Paróquia Nossa Senhora do Lago');
                $table->string('college')->nullable()->comment('Nome da escola ou faculdade que estuda. Ex: Universidade de Brasília');
                $table->string('course')->nullable()->comment('Nome do curso de graduação que realização. Ex: Ciências Sociais');
                $table->string('company')->nullable()->comment('Nome da empresa em que trabalha. Ex: A&F Advogados Associados');
                $table->foreign('other_group_id')->references('id')->on('options');
                $table->foreign('level_id')->references('id')->on('options');
                $table->softDeletes();
            }
        );

        Schema::create(
            'addresses', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('person_id')->comment('Identifica o dono do endereço. Ex: Fulana');
                $table->unsignedInteger('state_id')->comment('Identifica a UF. Ex: RS');
                $table->string('description')->comment('Descreve o endereço completo. Ex: Meu endereço completo, entrada B, apt');
                $table->string('number', 6)->comment('Complementa o endereço com o número. Ex: 20075A');
                $table->string('city')->comment('Descreve a cidade do endereço. Ex: Caxias do Sul');
                $table->string('zipcode', 8)->comment('Informa o código postal do endereço: Ex: 70000000');
                $table->foreign('person_id')->references('id')->on('people');
                $table->foreign('state_id')->references('id')->on('options');
            }
        );

        Schema::create(
            'contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('person_id')->comment('Identifica o dono do contato. Ex: Fulana');
                $table->unsignedInteger('type_id')->comment('Identifica o tipo do contato. Ex: Facebook, Instagram, Email, Celular');
                $table->string('contact')->comment('Descreve o contato. Ex: fulana@gmail.com, https://instagram.com/fulana');
                $table->foreign('person_id')->references('id')->on('people');
                $table->foreign('type_id')->references('id')->on('options');
            }
        );

        Schema::create(
            'records', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('person_id')->comment('Identifica o dono da ficha. Ex: Fulana');
                $table->unsignedInteger('presenter_id')->comment('Identifica quem está apresentando a ficha. Ex: Apresentante');
                $table->text('reason')->comment('Descreve o porquê o dono da ficha deseja fazer Emaús. Ex: Quero crescer na fé católica');
                $table->tinyText('other_information')->nullable()->comment('Descreve alguma outra observação. Ex: Candidato já teve contato com drogas ilíticas ');
                $table->boolean('has_agreement')->default(false)->comment('Indica se o candidato concordou com as regras do curso. Ex: sim/não');
                $table->boolean('has_first_communion')->default(false)->comment('Indica se o candidato fez primeira comunhão. Ex: sim/não');
                $table->boolean('has_chrism')->default(false)->comment('Indica se o candidato fez crisma. Ex: sim/não');
                $table->foreign('person_id')->references('id')->on('people');
                $table->foreign('presenter_id')->references('id')->on('people');
            }
        );

        Schema::create(
            'courses', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('community_id')->comment('Identifica o secretariado que está realizando o curso. Ex: Florianópolis');
                $table->unsignedInteger('type_id')->comment('Identifica o tipo do curso. Ex: Feminino');
                $table->integer('year')->comment('Descreve o ano de realização do curso. Ex: 2022');
                $table->integer('number')->comment('Descreve o número do curso naquele secretariado. Ex: 87');
                $table->string('photo')->comment('Descreve a url onde esta armazenada a foto. Ex: imagensCurso/SaoPaulo/87.jpg');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Curso com muitas desistências por causa da chuva');
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('type_id')->references('id')->on('options');
            }
        );

        Schema::create(
            'course_leaders', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('course_id')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->unsignedInteger('person_id')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->unsignedInteger('role_id')->comment('Identifica o cargo da pessoa no curso. Ex: Cerimoniário');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano pediu para não desempenhar mais esta função');
                $table->foreign('course_id')->references('id')->on('courses');
                $table->foreign('person_id')->references('id')->on('people');
                $table->foreign('role_id')->references('id')->on('options');
            }
        );

        Schema::create(
            'course_teams', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('course_id')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->unsignedInteger('person_id')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->unsignedInteger('team_id')->comment('Identifica a equipe de uma pessoa no curso. Ex: Cozinha');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano pediu para não desempenhar mais esta função');
                $table->foreign('course_id')->references('id')->on('courses');
                $table->foreign('person_id')->references('id')->on('people');
                $table->foreign('team_id')->references('id')->on('options');
            }
        );

        Schema::create(
            'course_levers', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('course_id')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->unsignedInteger('person_id')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->tinyText('information')->comment('Descreve o que a pessoa está fazendo pela outra. Ex: Vou rezar 1.000 ave marias pelo cursista Beltrano');
                $table->foreign('course_id')->references('id')->on('courses');
                $table->foreign('person_id')->references('id')->on('people');
            }
        );

        Schema::create(
            'groups', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('community_id')->comment('Identifica o secretariado que está realizando o curso. Ex: Florianópolis');
                $table->unsignedInteger('type_id')->comment('Identifica a frequencia dos encontros. Ex: Semanal, Mensal');
                $table->string('information')->comment('Descreve o endereço e responsável pelo grupo. Ex: Casa do Fulano (não coloque endereço, email ou telefone)');
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('type_id')->references('id')->on('options');
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
        Schema::dropIfExists('groups');
        Schema::dropIfExists('course_leaders');
        Schema::dropIfExists('course_teams');
        Schema::dropIfExists('course_levers');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('records');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('people');
        Schema::dropIfExists('options');
    }
}
