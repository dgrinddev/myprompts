<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        // 'id', // DENNE ER GUARDED
        // 'user_id', // DENNE ER GUARDED
        // 'prompt_id', // DENNE ER GUARDED
        'body', // Kommentarens tekst
    ];

    // Hver kommentar tilhører én bruger
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hver kommentar tilhører én prompt
    public function prompt()
    {
        return $this->belongsTo(Prompt::class);
    }
}
