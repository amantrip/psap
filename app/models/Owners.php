<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Owners extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;


    protected $table = 'owners';

    protected $fillable = ['psapid', 'owner_id'];
    //public $timestamps = false;

}
