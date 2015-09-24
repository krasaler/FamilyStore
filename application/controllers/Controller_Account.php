<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/AccountService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/ViewModel/RegisterModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/AccountHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/EmailService/EmailService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/UserService.php';

class Controller_Account extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    function action_login()
    {
        $this->view->generate('login_view.php', 'template_view.php');
    }

    function action_logout()
    {
        session_start();
        $_SESSION["is_auth"] = false;
        header('Location: /main/index');
    }

    function action_auth()
    {
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        session_start();
        $account = AccountService::Get($login, $pwd);
        if (!is_null($account)) {
				$_SESSION["is_auth"] = true;
				$_SESSION["login"] = $login;
		}
         else {
            echo 'Неверный логин или пароль';
            $_SESSION["is_auth"] = false;
        }
    }

    function action_register()
    {
        $this->view->generate('register_view.php', 'template_view.php');
    }
    function action_VerifyNewAccount()
    {
		$account_id=$_GET['id'];
		$account=AccountService::GetById($account_id);
        if(isset($account))
        {
            $account->isapproved = true;
            AccountService::Save($account);
            $user = new User();
            $user->user_id = $account->account_id;
            $user->user_name = $account->account_name;
            UserService::Create($user);
            $this->view->generate('main_view.php', 'template_view.php');
        }
    }
    function action_new()
    {
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        $email = $_POST['Email'];
        $model = new RegisterModel();
        $model->AccountName = $login;
        $model->Password = $pwd;
        $model->Email = $email;
        if (!AccountService::IsExistedByName($login)) {
            $account = AccountHelper::PopulateAccountFromRegisterViewModel($model);
            $account=AccountService::Create($account);
            EmailService::SendVerifyNewUserMessage($account, $model->Password, 'http://Store/',
                'Account/VerifyNewAccount');
        } else {
				echo 'Данное имя уже сещуствует';
		}
    }

    function action_index()
    {
        $this->view->generate('accountindex_view.php', 'template_view.php');
    }
}
