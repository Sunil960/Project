<?php
namespace App;


use Illuminate\Database\Eloquent\Model;


class PaypalCredentials extends Model

{
	protected $table = 'paypalCredentials';
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
       'api_username','api_password','api_signature','account_type'
    ];
}
