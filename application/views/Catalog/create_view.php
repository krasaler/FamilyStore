<form class="form-horizontal" action="/Catalog/new" method="post">
    <fieldset>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Раздел каталога</label>

            <div class="col-sm-10">
                <select class="form-control" name="inputSection">
                    <?php
                    $sections = $GLOBALS['sections'];
                    for ($i = 0; $i < count($sections); $i++) {
                        ?>
                        <option><?php echo $sections[$i]->name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <h2 class="col-sm-12 text-center">Выберите атрибуты для даного каталога:</h2>
        <?php
        for ($i = 0; $i < count($data); $i++) {
            ?>
            <label class="col-sm-12 text-center"><?php echo $data[$i]->name; ?></label>
            <div class="form-group">
                <p class="col-sm-2"></p>
                <div class="col-sm-10">
                    <?php
                    for ($j = 0; $j < count($data[$i]->attributes); $j++) {
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" name="attributes[]" value="
                            <?php echo $data[$i]->attributes[$j]->name; ?>
                            " >
                            <?php echo $data[$i]->attributes[$j]->name; ?>
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
                <button type="submit"  class="btn btn-default">Создать</button>
            </div>
        </div>
    </fieldset>
</form>