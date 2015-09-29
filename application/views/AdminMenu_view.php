<?
require_once __ROOT__ . '/application/Service/UserRoleService.php';
if (isset($_SESSION['login'])) {
    if (UserRoleService::CheckAdmin($_SESSION['login'])) {
        ?>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Каталог <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/Catalog/Create">Добавить каталог</a></li>
                <li><a href="/Catalog/Item">Список каталогов</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Разделы <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/Section/Create">Добавить раздел каталога</a></li>
                <li><a href="/Section/Item">Список разделов</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Группы атрибутов <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/AttributeGroup/Create">Добавить группу атрибутов</a></li>
                <li><a href="/AttributeGroup/Item">Список групп трибутов</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Ед. изм <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/Unit/Create">Добавить новую Ед. изм</a></li>
                <li><a href="/Unit/Item">Список Ед. изм</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Аттрибуты <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/Attribute/CreateFloat">Добавить новый атрибут</a></li>
                <li><a href="/Attribute/Item">Список атрибутов</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Товары <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Добавить новый товар</a></li>
                <li><a href="#">Список товаров</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Пользователи <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Черный список</a></li>
                <li><a href="#">Редактор прав</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Заказы <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Ожидающие подтверждения</a></li>
                <li><a href="#">Ожидающие доставки</a></li>
                <li><a href="#">Готовые к получению</a></li>
                <li><a href="#">Полученные</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Статистика продаж <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">По категориям</a></li>
                <li><a href="#">За последний 1 месяц</a></li>
                <li><a href="#">за последнюю 1 неделю</a></li>
            </ul>
        </div>
        <?php
    }
}
?>

