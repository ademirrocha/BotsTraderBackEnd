<?php


namespace App\Entities\Users;

class ValidationUser
{
    const RULE_USER = [
       	'name' => 'required',
    	'email' => 'required|email|unique:users',
    	'password' => 'required|min:6|confirmed'
    ];
}