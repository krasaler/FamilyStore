<?php

require_once __ROOT__.'/application/ViewModel/AccountViewModel.php';
class AccountHelper
{
    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }
    public static function PopulateAccountFromRegisterViewModel($model)
    {
        $salt = mcrypt_create_iv(16,MCRYPT_DEV_URANDOM);
        $hash = hash_pbkdf2("sha256",$model->Password,$salt,1000,20);
        $account = new Account();
        $a = AccountHelper::getGUID();
        $account->account_id = AccountHelper::getGUID();
        $account->account_name = $model->AccountName;
        $account->passwordsalt = $salt;
        $account->passwordkey = $hash;
        $account->email = $model->Email;
        return $account;
    }
    public static function PopulateAccountViewModel($account)
    {
        $model = new AccountViewModel();
        $model->id = $account->account_id;
        $model->name = $account->account_name;
        $model->email = $account->email;
        return $model;
    }

    public static function PopulateAccountViewModelList($accounts)
    {
        for ($i=0;$i<count($accounts);$i++)
        {
            $models[$i] = ReviewHelper::PopulateReviewViewModel($accounts[$i]);
        }
        return $models;

    }
}