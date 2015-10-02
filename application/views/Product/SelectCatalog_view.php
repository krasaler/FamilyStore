<form class="form-horizontal" action="/product/create" method="post">
    <fieldset>

        <div class="form-group">
            <label for="c" class="col-sm-2 control-label">Выберите каталог</label>

            <div class="col-sm-10">
                <select class="form-control" name="c">
                    <?php for ($i = 0; $i < count($data); $i++) {
                        echo '<option>' . $data[$i]->name . '</option>';
                    } ?>
                </select>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Продолжить</button>
            </div>
        </div>
    </fieldset>
</form>