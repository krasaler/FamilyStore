<?php

require_once __ROOT__.'/application/ViewModel/AccountViewModel.php';
class AccountHelper
{
    public static function PopulateAccountFromRegisterViewModel($model)
    {
        $salt = mcrypt_create_iv(16,MCRYPT_DEV_URANDOM);
        $hash = hash_pbkdf2("sha256",$model->Password,$salt,1000,20);
        $account = new Account();
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