<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Osirase extends Model
{
    use HasFactory;
    protected $fillable = [
        "title", "genre_id", "description", "date", "created_at", "updated_at"
    ];

    //format(年月日)するために
    protected $dates = ['date'];

    //バリデーション
    public static $rules = array(
        "date" => "required",
        "title" => "required|max:50",
        "description" => "required",
    );

    public function osirase_genre():BelongsTo
    {
        return $this->belongsTo(Osirase_genre::class,'genre_id','id');
    }
}
