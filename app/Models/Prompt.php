<?php

namespace App\Models;

use App\Observers\PromptObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[ObservedBy([PromptObserver::class])]
class Prompt extends Model
{
    /** @use HasFactory<\Database\Factories\PromptFactory> */
    use HasFactory;


    protected $fillable = [
        // 'id', // DENNE ER GUARDED
        // 'user_id', // DENNE ER GUARDED
        'title',
        'type',
        'content',
        'status',
        // 'share_url', // DENNE ER GUARDED
        'hero_image',
        'category_id',
    ];

    // Relation: en prompt tilhører en bruger
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation til kommentarer
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relation til tags (many-to-many), hvis relevant
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relation: en prompt tilhører en Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function categoryId(): Attribute
    {
        return Attribute::make(
            get: fn (?int $value) => $value, // get: Returnér værdien uændret
            set: fn (null|string|int $value) => $value === '' || is_null($value) ? null : (int) $value,
        );
    }

    // generér automatisk share_url (som et UUID) ved oprettelse
    /*
    protected static function booted()
    {
        static::creating(function ($prompt) {
            if (empty($prompt->share_url)) {
                $prompt->share_url = (string) Str::uuid();
            }
        });
    }
    */
}
