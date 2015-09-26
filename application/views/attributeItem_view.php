<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th>Група аттрибута</th>
        <th>Тип</th>
        <th>Ед. изм</th>
        <th>Статус</th>
    </tr>
    <?php
        foreach($data as $value)
        {
    ?>
    <tr>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->attributeGroupName; ?></td>
        <td><?php echo $value->type; ?></td>
        <td><?php echo $value->unit; ?></td>
        <td><?php echo $value->status; ?></td>
    </tr>
    <?php
    }
    ?>
</table>