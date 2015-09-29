<form class="form-horizontal" action="\AttributeGroup\Update" method="post">
    <fieldset>
        <input type="hidden" name="id"   value="<?php echo $data->id;?>">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название"
                       value="<?php echo $data->name;?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit"  class="btn btn-default">Изменить</button>
            </div>
        </div>
    </fieldset>
</form>