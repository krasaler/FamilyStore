<?
require_once __ROOT__.'/application/Service/UserRoleService.php';
if(isset($_SESSION['login']))
{
if(UserRoleService::CheckAdmin($_SESSION['login']))
{
?>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Категории <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Добавить</a></li>
            <li><a href="#">Список категорий</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Аттрибуты <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Добавить</a></li>
            <li><a href="/Attribute/Item">Список атрибутов</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Товары <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Добавить новый товар</a></li>
            <li><a href="#">Список товаров</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Пользователи <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Черный список</a></li>
            <li><a href="#">Редактор прав</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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