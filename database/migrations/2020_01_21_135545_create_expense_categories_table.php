<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('display_name');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('expense_categories')->insert(
            array(
                'display_name' => 'Travel',
                'description' => 'commute',
                'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'=>DB::raw('CURRENT_TIMESTAMP')
            )
        );
        DB::table('expense_categories')->insert(
            array(
                'display_name' => 'Entertainment',
                'description' => 'Movies and games',
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
        Schema::dropIfExists('expense_categories');
    }
}
