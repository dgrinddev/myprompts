<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = [
        // 'id', // DENNE ER GUARDED
        // 'user_id', // DENNE ER GUARDED
        'name',
        'slug',
    ];

    /**
     * Relation: Et tag tilhører en user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation: Et tag kan høre til mange prompts (many-to-many)
     */
    public function prompts()
    {
        return $this->belongsToMany(Prompt::class);
    }
}
