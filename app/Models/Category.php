<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        // 'id', // DENNE ER GUARDED
        // 'user_id', // DENNE ER GUARDED
        'name',
        'description',
        'slug',
    ];

    /**
     * Relation: En category tilhører en user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation: En category kan have mange prompts
     */
    public function prompts()
    {
        return $this->hasMany(Prompt::class);
    }
}
