<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Registry extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;


    protected $table = 'registry';

    protected $fillable = ['psapid', 'psapname', 'state', 'county', 'city', 'typechange', 'comments', 'text_911'];
    protected $hidden = array('id', 'created_at', 'changes_owner_id' );

}
