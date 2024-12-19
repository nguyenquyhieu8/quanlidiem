<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Evaluation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function Faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculties_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany(Evaluation::class, 'Review_details', 'users_id', 'evaluations_id');
    }
    public function scores()
    {
        return $this->hasMany(Scores::class);
    }

    public function group()
    {
        return $this->BelongsTo(Group::class, 'group_id', 'id');
    }

    public function classroom()
    {

    }
    public function classroom_leader()
    {


        if (Auth::check() && Auth::user()->group_id == 4) {
            return $this->BelongsTo(Classroom::class, 'Class_leader', 'id');
        }
    }
    public function class_advisor()
    {
        if (Auth::check() && Auth::user()->group_id == 3) {
            return $this->BelongsTo(Classroom::class, 'class_advisor', 'id');
        }
    }
}
