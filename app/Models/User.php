<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'role', // DENNE ER GUARDED
    ];

    // Relation: en bruger har mange prompts
    public function prompts()
    {
        return $this->hasMany(Prompt::class);
    }

    // Relation: en bruger har mange offentlige prompts
    public function publicPrompts()
    {
        return $this->hasMany(Prompt::class)
            ->where('status', 'public');
    }

    // Relation: en bruger har mange kommentarer
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relation: en bruger har mange categories
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // Relation: en bruger har mange tags
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    // Relation: en bruger har én publicProfile
    public function publicProfile()
    {
        return $this->hasOne(PublicProfile::class);
    }

    // Relation: en bruger har én settings
    public function settings()
    {
        return $this->hasOne(UserSetting::class);
    }

    // tjek om en bruger har en specifik rolle
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
