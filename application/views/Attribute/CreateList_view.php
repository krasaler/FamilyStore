<form class="form-horizontal" action="/Attribute/newList" method="post">
    <fieldset>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Группа атрибута</label>

            <div class="col-sm-10">
                <select class="form-control" name="inputGroup">
                    <?php
                    for ($i = 0; $i < count($data->attributeGroups); $i++) {
                        ?>
                        <option><?php echo $data->attributeGroups[$i]->name; ?></option>
                        <?php
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
                        ?>
                        <option><?php echo $data->units[$i]->name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Возможные значения</label>

            <div class="col-sm-10">
                <textarea name="inputValue" class="form-control"></textarea>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Создать</button>
            </div>
        </div>
    </fieldset>
</form>