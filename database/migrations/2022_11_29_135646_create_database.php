<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
                $table->string('title')->unique()->comment('Descrição do domínio que será usado em diversas tabelas. Ex: Fixo, Celular, Email');
                $table->char('group', 3)->comment('Identificador para determinar a que grupo pertence o domíno. Ex: CNT (Contact), OTG (Other Group)');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `options` comment 'Armazena todos os dominios da aplicação agrupados por uma chave com 3 letras'");

        Schema::create(
            'person', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->unsignedInteger('other_group_id')->nullable()->comment('Identifica outro grupo jovem que a pessoa já frequentou. Ex: Segue-me, EJC');
                $table->unsignedInteger('level_id')->nullable()->comment('Identfica o grau de escolaridade. Ex: Fundamental, Médio, Superior');
                $table->unsignedInteger('gender_id')->comment('Identifica o genero. Ex: Masculino ou Feminino');
                $table->unsignedInteger('community_id')->comment('Identifica o secretariado mais próximo. Ex: Brasília');
                $table->string('first_name')->comment('Descreve o primeiro da pessoa. Ex: João Paulo');
                $table->string('last_name')->comment('Descreve os sobrenomes da pessoa. Ex: de Novais');
                $table->string('email', 100)->comment('Descreve o email da pessoa. Ex: fulano@gmail.com');
                $table->string('phone', 20)->comment('Descreve o celular da pessoa com DDD. Ex: 61988776655');
                $table->string('social', 100)->nullable()->comment('Descreve a rede social principal da pessoa. Ex: https://instagram.com/fulanadetal');
                $table->date('birth_at')->comment('Data de aniversário. Ex: 01/07/1980');
                $table->string('father', 150)->nullable()->comment('Nome completo do pai. Ex: José da Silva');
                $table->string('mother', 150)->nullable()->comment('Nome completo da mãe. Ex: Maria da Silva');
                $table->string('community')->nullable()->comment('Nome da paróquia ou comunidade que participa. Ex: Paróquia Nossa Senhora do Lago');
                $table->string('college')->nullable()->comment('Nome da escola ou faculdade que estuda. Ex: Universidade de Brasília');
                $table->string('course')->nullable()->comment('Nome do curso de graduação que realização. Ex: Ciências Sociais');
                $table->string('company')->nullable()->comment('Nome da empresa em que trabalha. Ex: A&F Advogados Associados');
                $table->foreign('other_group_id')->references('id')->on('options');
                $table->foreign('level_id')->references('id')->on('options');
                $table->foreign('gender_id')->references('id')->on('options');
                $table->foreign('community_id')->references('id')->on('options');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `person` comment 'Armazena todos as pessoas que fizeram ou que querem fazer os cursos de Emaús. A partir desta tabela é possível cadastrar endereço, contatos e a ficha'");

        Schema::create(
            'person_addresses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('person_id')->unique()->comment('Identifica o dono do endereço. Ex: Fulana');
                $table->unsignedInteger('state_id')->comment('Identifica a UF. Ex: RS');
                $table->string('description')->comment('Descreve o endereço completo. Ex: Meu endereço completo, entrada B, apt');
                $table->string('number', 6)->comment('Complementa o endereço com o número. Ex: 20075A');
                $table->string('city')->comment('Descreve a cidade do endereço. Ex: Caxias do Sul');
                $table->string('zipcode', 8)->comment('Informa o código postal do endereço: Ex: 70000000');
                $table->foreign('person_id')->references('id')->on('person');
                $table->foreign('state_id')->references('id')->on('options');
            }
        );
        DB::statement("ALTER TABLE `person_addresses` comment 'Armazena o endereço (padrão Correios) de uma pessoa. A pessoa só tem um endereço'");

        Schema::create(
            'person_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('person_id')->comment('Identifica o dono do contato. Ex: Fulana');
                $table->unsignedInteger('type_id')->comment('Identifica o tipo do contato. Ex: Facebook, Instagram, Email, Celular');
                $table->string('contact')->comment('Descreve o contato. Ex: fulana@gmail.com, https://instagram.com/fulana');
                $table->foreign('person_id')->references('id')->on('person');
                $table->foreign('type_id')->references('id')->on('options');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `person_contacts` comment 'Armazena os vários contatos de uma pessoa. Ex: Instagram, Facebook, Email ou Celular'");
        
        Schema::create(
            'person_records', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('person_id')->comment('Identifica o dono da ficha. Ex: Fulana');
                $table->string('presenter_id')->comment('Identifica quem está apresentando a ficha. Ex: Apresentante');
                $table->text('reason')->comment('Descreve o porquê o dono da ficha deseja fazer Emaús. Ex: Quero crescer na fé católica');
                $table->tinyText('other_information')->nullable()->comment('Descreve alguma outra observação. Ex: Candidato já teve contato com drogas ilíticas ');
                $table->boolean('has_agreement')->default(false)->comment('Indica se o candidato concordou com as regras do curso. Ex: sim/não');
                $table->boolean('has_first_communion')->default(false)->comment('Indica se o candidato fez primeira comunhão. Ex: sim/não');
                $table->boolean('has_chrism')->default(false)->comment('Indica se o candidato fez crisma. Ex: sim/não');
                $table->boolean('is_approved')->default(false)->comment('Indica se a ficha está aprovada pelo secretariado. Ex: sim/não');
                $table->foreign('person_id')->references('id')->on('person');
                $table->foreign('presenter_id')->references('id')->on('person');
                $table->softDeletes();

            }
        );
        DB::statement("ALTER TABLE `person_records` comment 'Armazena a ficha de uma pessoa. Ela pode ter uma ficha cancelada e uma nova ficha pendente de aprovação. Ex: Por que quer fazer Emaús, se fez primeira comunhão'");

        Schema::create(
            'courses', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->unsignedInteger('community_id')->comment('Identifica o secretariado que está realizando o curso. Ex: Florianópolis');
                $table->unsignedInteger('type_id')->comment('Identifica o tipo do curso. Ex: Feminino');
                $table->integer('year')->comment('Descreve o ano de realização do curso. Ex: 2022');
                $table->integer('number')->comment('Descreve o número do curso naquele secretariado. Ex: 87');
                $table->date('starts_at')->comment('Descreve quando começou o curso. Ex: 15/04/2022');
                $table->date('ends_at')->comment('Descreve quando terminou o curso. Ex: 18/04/2022');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Curso com muitas desistências por causa da chuva');
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('type_id')->references('id')->on('options');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `courses` comment 'Armazena as informações básicas do Curso de Emaús. Ex: numero, ano, secretariado, foto'");

        Schema::create(
            'course_photos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('course_id')->unique()->comment('Identifica o curso da foto. Ex: Ex: 55/2022 Bage');
                $table->string('url')->comment('Foto oficial do curso. Ex: SP-2022-87.jpg');
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            }
        );
        DB::statement("ALTER TABLE `course_photos` comment 'Armazena as fotos oficiais do Curso de Emaús. Foi separada em uma tabela por causa de performance'");

        Schema::create(
            'course_leaders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('course_id')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->string('person_id')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->unsignedInteger('role_id')->comment('Identifica o cargo da pessoa no curso. Ex: Cerimoniário');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano pediu para não desempenhar mais esta função');
                $table->foreign('course_id')->references('id')->on('courses');
                $table->foreign('person_id')->references('id')->on('person');
                $table->foreign('role_id')->references('id')->on('options');
                $table->softDeletes();
                
            }
        );
        DB::statement("ALTER TABLE `course_leaders` comment 'Armazena as informações das funções de liderança de um Curso de Emaús. Ex: Diretor Espiritural, Timoneiro, Monitor'");

        Schema::create(
            'course_members', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('course_leader_id')->comment('Identifica o monitor da cursista. Ex: Beltraninha');
                $table->string('person_id')->comment('Identifica o cursista. Ex: Fulaninha');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano desistiu do curso');
                $table->foreign('course_leader_id')->references('id')->on('course_leaders');
                $table->foreign('person_id')->references('id')->on('person');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `course_members` comment 'Armazena as informações dos jovens de um Curso de Emaús. Ex: Zezinho e seu monitor'");

        Schema::create(
            'course_teams', function (Blueprint $table) {
                $table->increments('id');
                $table->string('course_id')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->string('person_id')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->unsignedInteger('team_id')->comment('Identifica a equipe de uma pessoa no curso. Ex: Cozinha');
                $table->string('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano pediu para não desempenhar mais esta função');
                $table->foreign('course_id')->references('id')->on('courses');
                $table->foreign('person_id')->references('id')->on('person');
                $table->foreign('team_id')->references('id')->on('options');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `course_teams` comment 'Armazena as informações das funções de serviço de um Curso de Emaús. Ex: Cozinha, Apoio'");

        Schema::create(
            'course_levers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('course_id')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->string('person_id')->nullable()->comment('Identifica uma pessoa que está recebendo a alavanca. Ex: Fulano que será o Cerimoniário');
                $table->string('sender')->comment('Descreve quem enviou a alavanca. Ex: Fulano');
                $table->tinyText('information')->comment('Descreve o que a pessoa está fazendo pela outra. Ex: Vou rezar 1.000 ave marias pelo cursista Beltrano');
                $table->foreign('course_id')->references('id')->on('courses');
                $table->foreign('person_id')->references('id')->on('person');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `course_levers` comment 'Armazena as informações das alavancas enviadas para um Curso de Emaús. Ex: Fazer jejum todas as sextas por 1 ano'");

        Schema::create(
            'groups', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->unsignedInteger('community_id')->comment('Identifica o secretariado resposavel por este grupo. Ex: Florianopolis');
                $table->unsignedInteger('frequency_id')->comment('Identifica a frequencia dos encontros. Ex: Semanal, Mensal');
                $table->string('information')->comment('Descreve o endereço e responsável pelo grupo. Ex: Casa do Fulano (não coloque endereço, email ou telefone)');
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('frequency_id')->references('id')->on('options');
                $table->softDeletes();
            }
        );
        DB::statement("ALTER TABLE `groups` comment 'Armazena as informações das reuniões de grupo que acontecem em cada secretariado. Ex: Encontro Semanal dos Discípulos de Emaús na Casa do Zé'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
        Schema::dropIfExists('course_members');
        Schema::dropIfExists('course_leaders');
        Schema::dropIfExists('course_teams');
        Schema::dropIfExists('course_levers');
        Schema::dropIfExists('course_photos');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('person_records');
        Schema::dropIfExists('person_contacts');
        Schema::dropIfExists('person_addresses');
        Schema::dropIfExists('person');
        Schema::dropIfExists('options');
    }
}
