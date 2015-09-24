//Добавление товара в корзину пользователя
function sendClick(id) {
    $.post("/basket/add", {productId: id});
}
function Auth(myForm) {
    var login = myForm.form.inputLogin.value;
    var Password = myForm.form.inputPassword3.value;
    $.post("/account/auth", {
            login: login, pwd: Password
        },
        function (data) {
            if (data != "") {
                $("#error").html(data);
            }
            else {
                window.location.replace('/main');
            }
        });
}

function Register(myForm) {

    var login = myForm.form.inputLogin.value;
    var Password = myForm.form.inputPassword3.value;
    var confirmPssword = myForm.form.inputConfirmPassword3.value;
    var Email = myForm.form.inputEmail.value;
    var re = /\S+@\S+\.\S+/;
    var loginRE = /[A-Za-z0-9]{6,12}/;
    var passwordRE = /[A-Za-z0-9]{8,16}/;
    if (!loginRE.test(login)) {
        $("#error").html("Логин должен содержать от 6 до 12 латинский символов и цыфр");
    }
    else if (!passwordRE.test(Password)) {
        $("#error").html("Пароль должен содержать от 8 до 16 символов латинский символов и цыфр");
    }
    else if (Password != confirmPssword) {
        $("#error").html("Пароли не совпадают");
    }
    else if (!re.test(Email)) {
        $("#error").html("Email введен не правильно");
    }
    else {
        $.post("/account/new", {
                login: login, pwd: Password, confirmpwd: confirmPssword,
                Email: Email
            },
            function (data) {
                if (data != "") {
                    $("#error").html(data);
                }
                else {
                    window.location.replace('/account/ConfirmRegistration');
                }
            });
    }
}

function addBasket(tovarId) {
    $.post("/basket/Add", {productId: tovarId},
        function (data) {
            window.location.replace('/basket');
        });
}
function minusBasket(tovarId) {
    $.post("/basket/minus", {productId: tovarId},
        function (data) {
            window.location.replace('/basket');
        });
}
function removeBasket(tovarId) {
    $.post("/basket/remove", {productId: tovarId},
        function (data) {
            window.location.replace('/basket');
        });
}

function newReview(myForm, tovarId) {
    var reviewText = myForm.form.reviewText.value;
    $.post("/catalog/newReview", {review: reviewText, tovarId: tovarId},
        function (data) {
            var $response = $(data);
            var oneval = $response.filter('#container-fluid');
            $("#container-fluid").html(oneval);
        });
}
function Order() {
    window.location.replace('/basket/inputAddress');
}
function newOrder() {
    window.location.replace('/basket/order');
}
function ConfirmOrder(myForm) {
    var inputAddress = myForm.form.inputAddress.value;
    if(inputAddress!="") {
        window.location.replace('/basket/ConfirmOrder?a='+inputAddress);
    }
    else
    {
        $("#error").html("Введите адрес доставки!!!");
    }
}


