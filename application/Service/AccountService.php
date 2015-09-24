<?php

/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 21.09.2015
 * Time: 12:42
 */
class AccountService
{
    public static function IsExistedByName($accountName) {
        $account = Account::find_by_account_name($accountName);
        if (is_null($account)) {
            return false;
        } else {
            return true;
        }
    }

    public static function Create($account) {
        Account::create(array(
            'account_name' => $account->account_name,
            'email' => $account->email,
            'passwordsalt' => $account->passwordsalt,
            'passwordkey' => $account->passwordkey,
            'IsApproved' => false
        ));
    }

    public static function Get($accountName, $password) {
        $account = AccountService::GetByName($accountName,true);
        if($account->passwordkey==hash_pbkdf2("sha256",$password,$account->passwordsalt,1000,20))
        {
            return $account;
        }
        else
        {
            return null;
        }

    }

    public static function GetById($id) {
        $account = Account::first(array('account_id'=>$id));
        return $account;
    }

    public static function Save($account) {
        $account->save();
    }

    public static function GetByName($accountName, $activatedOnly = false) {
        $account = Account::first(array(
            'account_name' => $accountName,
            'IsApproved' => $activatedOnly
        ));
        return $account;
    }
}