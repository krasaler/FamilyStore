<form class="form-horizontal">
    <fieldset>
        <input type="hidden" name="catalog" value="<?=$_POST['c'] ?>"/>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Название</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputName" placeholder="Название"
                value="<?=$data->name?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-2 control-label">Цена</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="inputPrice" placeholder="Цена" value="<?=$data->price?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-2 control-label">Описание</label>

            <div class="col-sm-10">
                <textarea class="form-control" name="inputDescription"><?=$data->description?></textarea>
            </div>
        </div>
        <div id="attribute">
            <?php
            for($i=0;$i<count($data->AttributesFloat);$i++)
            {
            ?>
                <div class="form-group">
                    <?php
                    if (is_null($data->AttributesFloat[$i]->attribute->unit)) {
                        ?>
                        <label for="attributesFloat[]"
                               class="col-sm-2 control-label"><?=$data->AttributesFloat[$i]->attribute->name; ?></label>
                        <?php
                    } else {
                        ?>
                        <label for="attributesFloat[]"
                               class="col-sm-2 control-label"><?=$data->AttributesFloat[$i]->attribute->name
                                . '(' . $data->AttributesFloat[$i]->attribute->unit
                                . ')'; ?></label>
                        <?php
                    }
                    ?>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="<?=$data->AttributesFloat[$i]->attribute->name; ?>"
                               placeholder="<?=$data->AttributesFloat[$i]->attribute->name; ?>"
                               value = "<?=$data->AttributesFloat[$i]->value?>">
                    </div>
                </div>

            <?php }?>

            <?php
            for ($i = 0; $i < count($data->AttributesList); $i++) {
                ?>
                <div class="form-group">
                    <label for="attributesFloat[]"
                           class="col-sm-2 control-label"><?php echo $data->AttributesList[$i]->attribute->name; ?></label>

                    <div class="col-sm-10">
                        <select class="form-control" name="<?php echo$data->AttributesList[$i]->attribute->name; ?>">
                            <?php for ($j = 0; $j < count($data->AttributesListValue[$i]); $j++) {
                                if( $data->AttributesListValue[$i][$j] == $data->AttributesList[$i]->value) {
                                    echo '<option selected="selected">' . $data->AttributesListValue[$i][$j] . '</option>';
                                }
                                else
                                {
                                    echo '<option>' . $data->AttributesListValue[$i][$j] . '</option>';
                                }
                            } ?>
                        </select>
                    </div>
                </div>

            <?php } ?>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" onclick="EditProduct(this,<?=$data->id?>)">Изменить</button>
            </div>
        </div>
    </fieldset>
</form>