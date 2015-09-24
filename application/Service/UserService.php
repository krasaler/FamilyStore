<?php

class UserService
{
    public static function GetAll()
    {
        return User::find('all');
    }
    public static function GetById($userId)
    {
        return User::find(array('user_id'=>$userId));
    }
    public static function GetByName($userName)
    {
        return User::find(array('user_name'=>$userName));
    }
    public static function Save($user)
    {
        $user->save();
    }
    public static function Create($user)
    {
        User::create(array(
            'user_id' => $user->user_id,
            'user_name' => $user->user_name
        ));
    }
    public static function Delete($user)
    {
        $user->delete();
    }
}