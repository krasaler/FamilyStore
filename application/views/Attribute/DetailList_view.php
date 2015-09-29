<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Название аттрибута</h3>
    </div>
    <div class="panel-body">
        <?php echo $data->name; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Группа аттрибута</h3>
    </div>
    <div class="panel-body">
        <?php echo $data->attributeGroupName; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Ед. изм аттрибута</h3>
    </div>
    <div class="panel-body">
        <?php
        if($data->unitName!="") {
            echo $data->unitName;
        }
        else{
            echo 'Отсутсвует';
        }?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Значения аттрибута</h3>
    </div>
    <ul class="list-group">
        <?php
        if (count($data->values) == 0) {
            echo '<li class="list-group-item">Значения отсутсвуют</li>';
        }
        for ($i = 0; $i < count($data->values); $i++) {
            echo '<li class="list-group-item">' . $data->values[$i] . '</li>';
        }
        ?>
    </ul>
</div>