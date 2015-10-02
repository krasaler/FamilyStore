<form class="form-horizontal" action="/Order/newStatus" method="post">
    <input type="hidden" name="id" value="<?=$data->orderId ?>">
    <div class="form-group">
        <label for="InputStatus" class="col-sm-2 control-label">Статус</label>
        <div class="col-sm-10">
            <select name = "InputStatus"  class="form-control">
                <?php
                for($i=0;$i<count($data->names);$i++)
                {
                    echo '<option>'.$data->names[$i].'</option>';
                }
                ?>
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Изменить</button>
        </div>
    </div>
</form>