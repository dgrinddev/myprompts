<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    /** @use HasFactory<\Database\Factories\UserSettingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'language',
        'color_mode',
        // 'theme',
    ];

    // Relation: en UserSetting tilhører en bruger
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
