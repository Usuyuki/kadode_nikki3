<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;


    protected $fillable = [
        "user_id","total_words","total_diaries","month_words" ,"month_diaries","year_words","year_diaries","year_noun_asc","month_noun_asc","year_adjective_asc","month_adjective_asc"
    ];
}