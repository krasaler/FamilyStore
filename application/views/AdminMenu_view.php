<?
require_once __ROOT__ . '/application/Service/UserRoleService.php';
if (isset($_SESSION['login'])) {
    if (PermissionHelper::VerificationBool('Editor')) {
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
                <li><a href="/Product/SelectCatalog">Добавить новый товар</a></li>
                <li><a href="/Product/ItemAdmin">Список товаров</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Пользователи <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/Review/item">Список коментариев</a></li>
                <li><a href="/Role/item">Редактирование ролей</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Заказы <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="/Order/Item?id=1">Ожидающие подтверждения</a></li>
                <li><a href="/Order/Item?id=3">Ожидающие доставки</a></li>
                <li><a href="/Order/Item?id=4">Готовые к получению</a></li>
                <li><a href="/Order/Item?id=5">Полученные</a></li>
                <li><a href="/Order/Item?id=2">Отмененные</a></li>
            </ul>
        </div>
        <?php
    }
}
?>

