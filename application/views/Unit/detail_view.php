<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Название Ед. изм</h3>
    </div>
    <div class="panel-body">
        <?php echo $data->name; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Аттрибуты с данной Ед.изм</h3>
    </div>
    <ul class="list-group">
        <?php
        if (count($data->attributes) == 0) {
            echo '<li class="list-group-item">Аттрибуты отсутсвуют</li>';
        }
        for ($i = 0; $i < count($data->attributes); $i++) {
            echo '<li class="list-group-item">' . $data->attributes[$i]->name . '</li>';
        }
        ?>
    </ul>
</div>