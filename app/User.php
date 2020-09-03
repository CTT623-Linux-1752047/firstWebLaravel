<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(){
        return $this->belongsToMany(Role::class,'user_role');
    }
    public function saveRoles($roles) { 
        if(!empty($roles)) { 
            $this->roles()->sync($roles); 
        } else { 
            $this->roles()->detach(); 
        } 
    }
    public function hasRole($roles ) {
        $id = Auth::id();
        $users = DB::table('users')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'roles.id', '=', 'user_role.role_id')
            ->select('roles.name')
            ->where('users.id', '=', $id)->get();
        $arr = $users -> toArray();
        $str = get_object_vars($arr[0])["name"];
        if ( $str == $roles )
        {
           return true;
        } else {
            return false;
        }
    }      
}
