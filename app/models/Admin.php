<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;


    protected $table = 'admin';

    protected $fillable = ['username', 'password', 'email', 'name', 'company', 'accesscode', 'verified', 'type'];
   //public $timestamps = false;
    protected $hidden = array('password', 'remember_token');

}
