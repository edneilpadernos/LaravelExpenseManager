<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table='expenses';
    protected $fillable =['id','amount','entry_date','expense_category_id','user_id'];
}
