<?php

class EmailService
{
    public static function SendVerifyNewUserMessage($account,$password,$urlBase, $verifyUrlBase)
    {
        $verifyNewUser = $verifyUrlBase."?id=".$account->account_id;
        $fullPath = $urlBase . $verifyNewUser;
        $file=new SplFileObject(__ROOT__.'/application/EmailService/EmailTemplates/VerifyNewUser.txt');
        $message='';
        while(!$file->eof())
        {
            $message = $message . $file->fgets();
        }
        $message=str_replace('AccountName',$account->account_name,$message);
        $message=str_replace('VerificationUrl',$fullPath,$message);
        $message=str_replace('Password',$password,$message);
        mail($account->email,'Регистрация',$message,'Content-type:text/html;');
    }
}