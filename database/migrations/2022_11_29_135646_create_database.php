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
                $table->bigIncrements('id');
                $table->string('title')->unique()->comment('Descrição do domínio que será usado em diversas tabelas. Ex: Fixo, Celular, Email');
                $table->char('group', 3)->comment('Identificador para determinar a que grupo pertence o domíno. Ex: CNT (Contact), OTG (Other Group)');
                $table->softDeletes();
                $table->index('group');
            }
        );
        //DB::statement("ALTER TABLE `options` comment 'Armazena todos os dominios da aplicação agrupados por uma chave com 3 letras'");

        Schema::create(
            'person', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->foreignId('other_group_id')->nullable()->comment('Identifica outro grupo jovem que a pessoa já frequentou. Ex: Segue-me, EJC');
                $table->foreignId('level_id')->nullable()->comment('Identfica o grau de escolaridade. Ex: Fundamental, Médio, Superior');
                $table->foreignId('gender_id')->comment('Identifica o genero. Ex: Masculino ou Feminino');
                $table->foreignId('community_id')->nullable()->comment('Identifica o secretariado pra permitir o multi-tenancy. Ex: Só visualizar pessoas do secretariado do usuário logado');
                $table->string('first_name')->comment('Descreve o primeiro da pessoa. Ex: João Paulo');
                $table->string('last_name')->comment('Descreve os sobrenomes da pessoa. Ex: de Novais');
                $table->string('email', 50)->unique()->comment('Descreve o email da pessoa. Ex: fulano@gmail.com');
                $table->string('phone', 20)->unique()->comment('Descreve o celular da pessoa com DDD. Ex: 61988776655');
                $table->string('social', 200)->nullable()->comment('Descreve a rede social principal da pessoa. Ex: https://instagram.com/fulanadetal');
                $table->date('birth_at')->comment('Data de aniversário. Ex: 01/07/1980');
                $table->string('father', 150)->nullable()->comment('Nome completo do pai. Ex: José da Silva');
                $table->string('mother', 150)->nullable()->comment('Nome completo da mãe. Ex: Maria da Silva');
                $table->string('community')->nullable()->comment('Nome da paróquia ou comunidade que participa. Ex: Paróquia Nossa Senhora do Lago');
                $table->string('college')->nullable()->comment('Nome da escola ou faculdade que estuda. Ex: Universidade de Brasília');
                $table->string('course')->nullable()->comment('Nome do curso de graduação que realização. Ex: Ciências Sociais');
                $table->string('company')->nullable()->comment('Nome da empresa em que trabalha. Ex: A&F Advogados Associados');
                $table->softDeletes();
                $table->foreign('other_group_id')->references('id')->on('options');
                $table->foreign('level_id')->references('id')->on('options');
                $table->foreign('gender_id')->references('id')->on('options');
                $table->foreign('community_id')->references('id')->on('options');
            }
        );
        //DB::statement("ALTER TABLE `person` comment 'Armazena todos as pessoas que fizeram ou que querem fazer os cursos de Emaús. A partir desta tabela é possível cadastrar endereço, contatos e a ficha'");

        Schema::create(
            'person_addresses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignUuid('person_id')->constrained('person')->onDelete('cascade')->comment('Identifica o dono do endereço. Ex: Fulana');
                $table->foreignId('state_id')->comment('Identifica a UF. Ex: RS');
                $table->string('description')->comment('Descreve o endereço completo. Ex: Meu endereço completo, entrada B, apt');
                $table->string('number', 6)->comment('Complementa o endereço com o número. Ex: 20075A');
                $table->string('city')->comment('Descreve a cidade do endereço. Ex: Caxias do Sul');
                $table->string('zipcode', 8)->comment('Informa o código postal do endereço: Ex: 70000000');
                $table->foreign('state_id')->references('id')->on('options');
            }
        );
        //DB::statement("ALTER TABLE `person_addresses` comment 'Armazena o endereço (padrão Correios) de uma pessoa. A pessoa só tem um endereço'");

        Schema::create(
            'person_contacts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignUuid('person_id')->constrained('person')->onDelete('cascade')->comment('Identifica o dono do contato. Ex: Fulana');
                $table->foreignId('type_id')->comment('Identifica o tipo do contato. Ex: Facebook, Instagram, Email, Celular');
                $table->string('contact')->comment('Descreve o contato. Ex: fulana@gmail.com, https://instagram.com/fulana');
                $table->softDeletes();
                $table->foreign('type_id')->references('id')->on('options');
            }
        );
        //DB::statement("ALTER TABLE `person_contacts` comment 'Armazena os vários contatos de uma pessoa. Ex: Instagram, Facebook, Email ou Celular'");
        
        Schema::create(
            'person_records', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->foreignUuid('person_id')->constrained('person')->comment('Identifica o dono da ficha. Ex: Fulana');
                $table->foreignUuid('presenter_id')->nullable()->constrained('person')->comment('Identifica quem está apresentando a ficha. Ex: Apresentante');
                $table->foreignId('community_id')->comment('Identifica o secretariado resposavel por este grupo. Ex: Florianopolis');
                $table->text('reason')->comment('Descreve o porquê o dono da ficha deseja fazer Emaús. Ex: Quero crescer na fé católica');
                $table->text('other_information')->nullable()->comment('Descreve alguma outra observação. Ex: Candidato já teve contato com drogas ilíticas ');
                $table->boolean('has_agreement')->default(false)->comment('Indica se o candidato concordou com as regras do curso. Ex: sim/não');
                $table->boolean('has_acceptance')->default(false)->comment('Indica se o candidato concordou com o processamento dos dados (LGPD). Ex: sim/não');
                $table->boolean('has_first_communion')->default(false)->comment('Indica se o candidato fez primeira comunhão. Ex: sim/não');
                $table->boolean('has_chrism')->default(false)->comment('Indica se o candidato fez crisma. Ex: sim/não');
                $table->boolean('is_approved')->default(false)->comment('Indica se a ficha está aprovada pelo secretariado. Ex: sim/não');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
                $table->timestamp('deleted_at')->nullable()->useCurrentOnDelete();
                $table->foreign('community_id')->references('id')->on('options');
            }
        );
        //DB::statement("ALTER TABLE `person_records` comment 'Armazena a ficha de uma pessoa. Ela pode ter uma ficha cancelada e uma nova ficha pendente de aprovação. Ex: Por que quer fazer Emaús, se fez primeira comunhão'");

        Schema::create(
            'courses', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->foreignId('community_id')->comment('Identifica o secretariado que está realizando o curso. Ex: Florianópolis');
                $table->foreignId('type_id')->comment('Identifica o tipo do curso. Ex: Feminino');
                $table->integer('number')->comment('Descreve o número do curso naquele secretariado. Ex: 87');
                $table->date('starts_at')->comment('Descreve quando começou o curso. Ex: 15/04/2022');
                $table->date('ends_at')->comment('Descreve quando terminou o curso. Ex: 18/04/2022');
                $table->text('information')->nullable()->comment('Descreve alguma outra observação. Ex: Curso com muitas desistências por causa da chuva');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
                $table->softDeletes();
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('type_id')->references('id')->on('options');
            }
        );
        //DB::statement("ALTER TABLE `courses` comment 'Armazena as informações básicas do Curso de Emaús. Ex: numero, ano, secretariado, foto'");

        Schema::create(
            'course_photos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignUuid('course_id')->constrained('courses')->onDelete('cascade')->comment('Identifica o curso da foto. Ex: Ex: 55/2022 Bage');
                $table->string('url')->comment('Foto oficial do curso. Ex: SP-2022-87.jpg');
            }
        );
        //DB::statement("ALTER TABLE `course_photos` comment 'Armazena as fotos oficiais do Curso de Emaús. Foi separada em uma tabela por causa de performance'");

        Schema::create(
            'course_leaders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignUuid('course_id')->constrained('courses')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->foreignUuid('person_id')->constrained('person')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->foreignId('role_id')->comment('Identifica o cargo da pessoa no curso. Ex: Cerimoniário');
                $table->text('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano pediu para não desempenhar mais esta função');
                $table->softDeletes();
                $table->foreign('role_id')->references('id')->on('options');
                
            }
        );
        //DB::statement("ALTER TABLE `course_leaders` comment 'Armazena as informações das funções de liderança de um Curso de Emaús. Ex: Diretor Espiritural, Timoneiro, Monitor'");

        Schema::create(
            'course_members', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignId('course_leader_id')->constrained('course_leaders')->comment('Identifica o monitor da cursista. Ex: Beltraninha');
                $table->foreignUuid('person_id')->constrained('person')->comment('Identifica o cursista. Ex: Fulaninha');
                $table->text('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano desistiu do curso');
                $table->softDeletes();
            }
        );
        //DB::statement("ALTER TABLE `course_members` comment 'Armazena as informações dos jovens de um Curso de Emaús. Ex: Zezinho e seu monitor'");

        Schema::create(
            'course_teams', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignUuid('course_id')->constrained('courses')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->foreignUuid('person_id')->constrained('person')->comment('Identifica uma pessoa em um cargo de liderança. Ex: Fulano que será o Cerimoniário');
                $table->foreignId('team_id')->comment('Identifica a equipe de uma pessoa no curso. Ex: Cozinha');
                $table->text('information')->nullable()->comment('Descreve alguma outra observação. Ex: Fulano pediu para não desempenhar mais esta função');
                $table->softDeletes();
                $table->foreign('team_id')->references('id')->on('options');
                
            }
        );
        //DB::statement("ALTER TABLE `course_teams` comment 'Armazena as informações das funções de serviço de um Curso de Emaús. Ex: Cozinha, Apoio'");

        Schema::create(
            'course_levers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignUuid('course_id')->constrained('courses')->comment('Identifica o curso. Ex: 104/2022 Itapetininga');
                $table->foreignUuid('person_id')->nullable()->constrained('person')->comment('Identifica uma pessoa que está recebendo a alavanca. Ex: Fulano que será o Cerimoniário');
                $table->string('sender')->comment('Descreve quem enviou a alavanca. Ex: Fulano');
                $table->text('information')->comment('Descreve o que a pessoa está fazendo pela outra. Ex: Vou rezar 1.000 ave marias pelo cursista Beltrano');
                $table->softDeletes();
            }
        );
        //DB::statement("ALTER TABLE `course_levers` comment 'Armazena as informações das alavancas enviadas para um Curso de Emaús. Ex: Fazer jejum todas as sextas por 1 ano'");

        Schema::create(
            'groups', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->foreignId('community_id')->comment('Identifica o secretariado resposavel por este grupo. Ex: Florianopolis');
                $table->foreignId('frequency_id')->comment('Identifica a frequencia dos encontros. Ex: Semanal, Mensal');
                $table->text('information')->comment('Descreve os dias de encontro e o responsável pelo grupo. Ex: Casa do Fulano (não coloque endereço, email ou telefone)');
                $table->softDeletes();
                $table->foreign('community_id')->references('id')->on('options');
                $table->foreign('frequency_id')->references('id')->on('options');
            }
        );
        //DB::statement("ALTER TABLE `groups` comment 'Armazena as informações das reuniões de grupo que acontecem em cada secretariado. Ex: Encontro Semanal dos Discípulos de Emaús na Casa do Zé'");

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
