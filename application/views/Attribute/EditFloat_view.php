<form class="form-horizontal" action="/Attribute/Update" method="post">
    <fieldset>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название"
                value="<?php echo $data->name;?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Группа атрибута</label>

            <div class="col-sm-10">
                <select class="form-control" name="inputGroup">
                    <?php
                    for ($i = 0; $i < count($data->attributeGroups); $i++) {
                        if ($data->attributeGroups[$i]->name == $data->attributeGroupName) {
                            echo '<option selected="selected">' . $data->attributeGroups[$i]->name . '</option>';
                        } else {
                            echo '<option>' . $data->attributeGroups[$i]->name . '</option>';
                        }
                    }
                        ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Эдиница измерения</label>

            <div class="col-sm-10">
                <select class="form-control" name="inputUnit">
                    <option>-</option>
                    <?php
                    for ($i = 0; $i < count($data->units); $i++) {
                        if ($data->units[$i]->name == $data->unitName) {
                            echo '<option selected="selected">' . $data->units[$i]->name . '</option>';
                        } else {
                            echo '<option>' . $data->units[$i]->name . '</option>';
                        }
                    }
?>
                </select>
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