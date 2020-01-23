<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('display_name');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('roles')->insert(
            array(
                'display_name' => 'Administrator',
                'description' => 'Super User',
                'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'=>DB::raw('CURRENT_TIMESTAMP')
            )
        );

        DB::table('roles')->insert(
            array(
                'display_name' => 'User',
                'description' => 'manage expenses',
                'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'=>DB::raw('CURRENT_TIMESTAMP')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
