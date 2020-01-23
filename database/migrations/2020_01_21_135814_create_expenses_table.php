<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->string('entry_date');
            $table->integer('expense_category_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        DB::table('expenses')->insert(
            array(
                'Amount' => '1200',
                'entry_date' => '2020-01-23',
                'expense_category_id'=>'1',
                'user_id'=>'1',
                'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'=>DB::raw('CURRENT_TIMESTAMP')
            )
        );

        DB::table('expenses')->insert(
            array(
                'Amount' => '300',
                'entry_date' => '2020-01-23',
                'expense_category_id'=>'2',
                'user_id'=>'1',
                'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'=>DB::raw('CURRENT_TIMESTAMP')
            )
        );


        DB::table('expenses')->insert(
            array(
                'Amount' => '250',
                'entry_date' => '2020-01-24',
                'expense_category_id'=>'1',
                'user_id'=>'2',
                'created_at'=>DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'=>DB::raw('CURRENT_TIMESTAMP')
            )
        );

        DB::table('expenses')->insert(
            array(
                'Amount' => '1250',
                'entry_date' => '2020-01-24',
                'expense_category_id'=>'2',
                'user_id'=>'2',
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
        Schema::dropIfExists('expenses');
    }
}
