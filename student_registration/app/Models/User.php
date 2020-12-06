<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function relativeCreatedBy(){
        return $this->hasMany(Relative::class,'created_by');
    }

    public function relativeLastDeletedBy(){
        return $this->hasMany(Relative::class,'deleted_by');
    }

    public function studentCreatedBy(){
        return $this->hasMany(Student::class,'created_by');
    }

    public function responsibliesCreatedBy(){
        return $this->hasMany(Responsibly::class,'created_by');
    }

    public function registrationCreatedBy(){
        return $this->hasMany(Registration::class,'created_by');
    }

    public function registrationUpdatedBy(){
        return $this->hasMany(Registration::class,'updated_by');
    }

    public function personCreatedBy(){
        return $this->hasMany(Person::class,'created_by');
    }

    public function personDeletedBy(){
        return $this->hasMany(Person::class,'deleted_by');
    }

    public function userCreatedBy(){
        return $this->hasOne(Relative::class,'created_by');
    }

    public function userDeletedBy(){
        return $this->hasOne(Relative::class,'deleted_by');
    }
}
