<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

//    public function product($id)
//    {
//     return DB::table('product_user')
//                ->join('products', 'products.id', 'product_user.product_id')
//                ->where('product_user.user_id', $this->id)
//                ->where('product_user.product_id', $id)
//                ->first();
//    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
//        return $this->belongsToMany(Product::class, 'product_user', 'user_id', 'product_id');
    }
}
