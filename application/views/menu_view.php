<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/main">Family Store </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                 role="button" aria-haspopup="true" aria-expanded="false">Каталог <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <?php
                  require_once $_SERVER['DOCUMENT_ROOT'].'/application/Service/CatalogueService.php';
                  $catalogues = CatalogueService::GetAll();
                  foreach($catalogues as $catalogue)
                  {
                      echo '<li><a href="/catalog/index?catalogue='.$catalogue->name.'">'.$catalogue->name.'</a></li>';
                  }
                  ?>
                  </ul>
          </li>
        <li><a href="/description">О нас</a></li>
      </ul>
        <form class="navbar-form navbar-left" role="search" action="/catalog/search" method="get">
            <div class="form-group">
                <input type="text" class="form-control" name="q" placeholder="Поиск">
            </div>
            <button type="submit" class="btn btn-default">Поиск</button>
        </form>
   <?php
   session_start();
   if($_SESSION['is_auth']){
   ?>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/basket">Корзина</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
             role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["login"]; ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/account/index">Профиль</a></li>
            <li><a href="#">Заказы</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/account/logout">Выход</a></li>
          </ul>
        </li>
      </ul>
   <?php }
 else {
    
   ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="/account/register">Регистрация</a></li>
        <li><a href="/account/login">Вход</a></li>
      </ul>   
        <?php 
 }   
        ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
