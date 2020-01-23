<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesCategory extends Model
{
    protected $table= "expense_categories";
    protected $fillable=['display_name','description'];
}
