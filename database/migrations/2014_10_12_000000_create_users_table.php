<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{


    protected $tables = ['administrators', 'authors', 'subscribers'];



    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $this->eachTable(function ($entity) {
            Schema::create($entity, function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        $this->eachTable(function ($entity) {
            Schema::dropIfExists($entity);
        });
    }



    /**
     * Itera todas as tables e roda a query necessária
     * @param Closure $closure
     * @return void
     */
    protected function eachTable(Closure $closure)
    {

        foreach ($this->tables as $table) {
            $closure($table);
        }
    }
}
