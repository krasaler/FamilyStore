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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог <b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        <?php
                        $sections = $GLOBALS['sections'];
                        for ($i = 0; $i < count($sections); $i++) { ?>
                        <li class="dropdown dropdown-submenu">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <?=$sections[$i]->name; ?>
                             </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    for ($j = 0; $j < count($sections[$i]->catalogues); $j++) { ?>
                                    <li>
                                        <a href="/Product/Index?c=<?=$sections[$i]->catalogues[$j]->name ?>">
                                            <?=$sections[$i]->catalogues[$j]->name ?>
                                        </a>
                                    </li>
                                 <?php }?>

                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="/main/description">О нас</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" action="/Product/Search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="q" placeholder="Поиск">
                </div>
                <button type="submit" class="btn btn-default">Поиск</button>
            </form>

            <?php
            session_start();
            if ($_SESSION['is_auth']) {
                ?>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/basket">Корзина</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION["login"] ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/account/index">Профиль</a></li>
                            <li><a href="/account/order">Заказы</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/account/logout">Выход</a></li>
                        </ul>
                    </li>
                </ul>
            <?php } else {

                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/basket">Корзина</a></li>
                    <li><a href="/account/register">Регистрация</a></li>
                    <li><a href="/account/login">Вход</a></li>
                </ul>
                <?php
            }
            ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
