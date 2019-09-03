<?php
namespace App;


use Illuminate\Database\Eloquent\Model;


class Paypal extends Model

{
	protected $table = 'paypal';
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
       'payment_id','payment_method','payer_email','payer_first_name','payer_last_name','payer_id','total','total_currency'
    ];
}
