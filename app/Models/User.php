<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'fullname',
        'username',
        'email',
        'password',
        'role_id',
        'bio',
        'profile_pict',
        'cover_pict',
    ];

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

    public function komentar()
    {
        return $this->hasMany(KomentarChapterModel::class, 'user_id');
    }

    public function komunitas()
    {
        return $this->hasMany(KomunitasModel::class, 'user_id');
    }

    public function commentsKomunitas()
    {
        return $this->belongsTo(KomentarKomunitasModel::class);

    }

    public function likes()
    {
        return $this->hasMany(LikesModel::class, 'user_id');
    }
}
