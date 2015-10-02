<form class="form-horizontal" id="RegisterForm">
    <fieldset>

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
            <label for="inputTelefone" class="col-sm-2 control-label">Телефон</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputTelefone" placeholder="Логин">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль"/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword3" class="col-sm-2 control-label">Подтвердите пароль</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputConfirmPassword3" placeholder="Подтвердите пароль">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Почтовый ящик">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" onclick="Register(this)" class="btn btn-default">Регистрация</button>
            </div>
        </div>
    </fieldset>
</form>