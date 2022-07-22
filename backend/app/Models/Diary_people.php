<?php

declare(strict_types=1);

namespace App\Models;

use App\Scopes\ScopeDiary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary_people extends Model
{
    /**
     * 日記を自動でログインユーザーのみに絞り込むグローバルスコープの呼び出し関数
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopeDiary);
    }


    use HasFactory;
    protected $fillable = [
        "user_id", "name", "created_at", "updated_at"
    ];
}