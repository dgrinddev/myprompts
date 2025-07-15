<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicProfile extends Model
{
    /** @use HasFactory<\Database\Factories\PublicProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_active',
        'bio',
        'img',
        'view_option',
        'layout_option',
    ];

    // Relation: en PublicProfile tilhører en bruger
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
