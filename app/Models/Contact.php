<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'gender', 'email','postcode','address','building_name','opinion'];
    
    protected $dateFormat = 'Y-m-d';

    public static $rules = array(
        'lastname' => 'required',
        'firstname' => 'required',
        'email' => 'required|email',
        'postcode' => 'required',
        'address' => 'required',
        'opinion' => 'required|max:120',
    );
}
