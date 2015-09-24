<form class="form-horizontal">
        <div class="form-group">
            <p class="col-sm-2"></p>
            <p class="col-sm-10" id="error" style="color: red"></p>
        </div>
    <div class="form-group">
        <label for="inputLogin" class="col-sm-2 control-label">Логин</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLogin" placeholder="Логин">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default" onclick="Auth(this)">Войти</button>
        </div>
    </div>
</form>