<form class="form-horizontal" action="/Role/Update" method="post">
    <input type="hidden" name="id" value="<?=$data->id?>">
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <select  class="form-control"  name="roleName">
                <?php
                for($i=0;$i<count($data->roles);$i++)
                {
                    if($data->roles[$i]->role_name == $data->role) {
                        echo '<option selected="selected">' . $data->roles[$i]->role_name . '</option>';
                    }
                    else{
                        echo '<option>' . $data->roles[$i]->role_name . '</option>';
                    }
                }
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