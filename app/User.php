<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function complexes()
    {
        return $this->hasMany('App\Complex');
    }

    public function places()
    {
        return $this->hasManyThrough('App\Place', 'App\Complex');
    }

    public function media()
    {
        return $this->hasMany('App\Media');
    }

    public function ostan()
    {
        return $this->belongsTo('App\Ostan');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
   
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function is_admin(){
        return $this->role->name === 'admin';
    }

    public function is_owner(){
        return $this->role->name === 'owner';
    }

    public function is_owner_of(Place $place){
        return $this->role->name === 'owner' && $place->user_id === $this->id;
    }

    public function is_admin_or_owner(Place $place){
        return $user->is_admin() || ($this->role->name === 'owner' && $place->user_id === $this->id);
    }

    public function is_user(){
        return $this->role->name === 'user';
    }

    public function has_permission($permission){
        return $this->role->permissions->contains('name', $permission);
    }

    public static function findByMobile($mobile)
    {
        return static::where('mobile', $mobile)->first();
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'gender', 'phone', 'ostan_id', 'city_id', 'email', 'email', 'password', 'mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'ostan_id', 'city_id', 'role_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function findForPassport($username)
    {

        $mobile = request()->username;
        if(Cache::get($mobile) == request()->password){
            $user = User::where('mobile', $mobile);
                if($user->exists()){
                    return $user->first();
                };
                return User::create([
                    'mobile' => $mobile
                ]);
            }
    }


    public function validateForPassportPasswordGrant($password)
    {
        
        $mobile = request()->username;
        return Cache::get($mobile) == $password;
    
    }
}
