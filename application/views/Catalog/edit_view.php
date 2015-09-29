<form class="form-horizontal" action="/Catalog/Update" method="post">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $data->id;?>">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название"
                       value="<?php echo $data->name;?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Раздел каталога</label>

            <div class="col-sm-10">
                <select class="form-control" name="inputSection">
                    <?php
                    $sections = $GLOBALS['sections'];
                    for ($i = 0; $i < count($sections); $i++) {
                        if ($data->section == $sections[$i]->name) {
                            echo '<option selected="selected">'. $sections[$i]->name .'</option>';
                        } else {
                            echo '<option>'. $sections[$i]->name.' </option>';
                        }
                    }
                        ?>
                </select>
            </div>
        </div>
        <h2 class="col-sm-12 text-center">Выберите атрибуты для даного каталога:</h2>
        <?php
        for ($i = 0; $i < count($data->attributes); $i++) {
            ?>
            <label class="col-sm-12 text-center"><?php echo $data->attributes[$i]->name; ?></label>
            <div class="form-group">
                <p class="col-sm-2"></p>
                <div class="col-sm-10">
                    <?php
                    for ($j = 0; $j < count($data->attributes[$i]->attributes); $j++) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" name="attributes[]"
                                   <?php echo $data->group[$i][$j]; ?> value="
                            <?php echo $data->attributes[$i]->attributes[$j]->id; ?>
                            " >
                            <?php echo $data->attributes[$i]->attributes[$j]->name; ?>
                        </label>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit"  class="btn btn-default">Изменить</button>
            </div>
        </div>
    </fieldset>
</form>