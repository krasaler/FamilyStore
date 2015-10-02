<form class="form-horizontal">
    <fieldset>
        <input type="hidden" name="catalog" value="<?=$_POST['c'] ?>"/>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-2 control-label">Цена</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputPrice" placeholder="Цена">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-2 control-label">Описание</label>

            <div class="col-sm-10">
                <textarea class="form-control" name="inputDescription"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputImage" class="col-sm-2 control-label">Фото товара</label>

            <div class="col-sm-10">
                <input type="file" class="form-control" name="inputImage" placeholder="Фото товара">
            </div>
        </div>
        <div id="attribute">
            <?php
            foreach ($data->attributesFloat as $value) { ?>
                <div class="form-group">
                    <?php
                    if (is_null($value->unit)) {
                        ?>
                        <label for="attributesFloat[]"
                               class="col-sm-2 control-label"><?php echo $value->name; ?></label>
                        <?php
                    } else {
                        ?>
                        <label for="attributesFloat[]"
                               class="col-sm-2 control-label"><?php echo $value->name . '(' . $value->unit->name
                                . ')'; ?></label>
                        <?php
                    }
                    ?>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="<?php echo $value->name; ?>"
                               placeholder="<?php echo $value->name; ?>">
                    </div>
                </div>

            <?php } ?>
            <?php
            for ($i = 0; $i < count($data->attributesList); $i++) {
                ?>
                <div class="form-group">
                    <label for="attributesFloat[]"
                           class="col-sm-2 control-label"><?php echo $data->ListName[$i]; ?></label>

                    <div class="col-sm-10">
                        <select class="form-control" name="<?php echo $data->ListName[$i]; ?>">
                            <?php for ($j = 0; $j < count($data->attributesList[$i]); $j++) {
                                echo '<option>' . $data->attributesList[$i][$j]->name . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>

            <?php } ?>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" onclick="EditProduct(this)">Изменить\</button>
            </div>
        </div>
    </fieldset>
</form>