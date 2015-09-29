<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Название каталога</h3>
    </div>
    <div class="panel-body">
        <?php echo $data->name; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Каталоги раздела</h3>
    </div>
    <ul class="list-group">
        <?php
        if (count($data->catalogues) == 0) {
            echo '<li class="list-group-item">Каталоги отсутсвуют</li>';
        }
        for ($i = 0; $i < count($data->catalogues); $i++) {
            echo '<li class="list-group-item">' . $data->catalogues[$i]->name . '</li>';
        }
        ?>
    </ul>
</div>