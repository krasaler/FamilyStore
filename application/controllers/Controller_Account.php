<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/AccountService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/ViewModel/RegisterModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Helper/AccountHelper.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/EmailService/EmailService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/Service/UserService.php';
require_once __ROOT__ . '/application/Helper/PermissionHelper.php';
class Controller_Account extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    function action_login()
    {
        $this->view->generate('/Account/login_view.php', 'template_view.php');
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
             $_SESSION["login"] = null;
        }
    }

    function action_register()
    {
        $this->view->generate('/Account/register_view.php', 'template_view.php');
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
            header("Location: /main");
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
    function action_permission()
    {
        $this->view->generate('permission_view.php', 'template_view.php');
    }
    function action_index()
    {
        session_start();
        $login = $_SESSION["login"];
        PermissionHelper::Verification($login,__Viewer__,__CanUpdate__);
        $this->view->generate('/Account/index_view.php', 'template_view.php');
     }
    function action_newReview()
    {
        session_start();
        $tovarId = $_POST['tovarId'];
        $login = $_SESSION["login"];
        $review = new Review();
        $review->product_id = $_POST['tovarId'];
        $review->account_id = AccountService::GetByName($login, true)->account_id;
        $review->value = $_POST['review'];
        ReviewService::Create($review);
        //Исправить
        $this->view->generate('detail_view.php', 'template_view.php',
            ProductHelper::PopulateProductViewModel(ProductService::GetById($tovarId)));
    }
}
