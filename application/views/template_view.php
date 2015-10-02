<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
    <link rel="icon" type="image/ico" href="http://Store/favicon.ico" />
    <script src="/js/jquery-2.1.4.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
    <script src="/js/script.js" type="text/javascript"></script>
    <title>Интернет-магазин "Family Store"</title>
</head>
<body>

<?php
include 'application/views/AdminMenu_view.php'; ?>
<?php include 'application/views/menu_view.php'; ?>
<div class="container-fluid col-lg-12">
    <?php include 'application/views/' . $content_view; ?>
</div>

</body>
</html>