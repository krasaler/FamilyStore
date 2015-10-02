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
function EditProduct(myForm,id) {
    var names = [];
    var values = [];
    var dvs = document.getElementById('attribute').getElementsByTagName('input')
    for (var i = 0; i < dvs.length; i++) {
        names.push(dvs[i].name);
        values.push(dvs[i].value);
    }
    var dvs = document.getElementById('attribute').getElementsByTagName('select')
    for (var i = 0; i < dvs.length; i++) {
        names.push(dvs[i].name);
        values.push(dvs[i].value);
    }
    var inputName = myForm.form.inputName.value;
    var inputPrice = myForm.form.inputPrice.value;
    var catalog = myForm.form.catalog.value;
    var inputDescription = myForm.form.inputDescription.value;
    var formData = new FormData();
    formData.append("inputName",inputName);
    formData.append("catalog",catalog);
    formData.append("inputDescription",inputDescription);
    formData.append("names",names);
    formData.append("values",values);
    formData.append("inputPrice",inputPrice);
    formData.append("id",id);
    var req = getXmlHttp()
    req.onreadystatechange =function() {
        if (req.readyState == 4 && req.status == 200) {
            window.location.replace('/product/itemAdmin');
        }
    }
    req.open('POST', '/product/update', true);
    req.send(formData);
}
function CreateProduct(myForm) {
    var names = [];
    var values = [];
    var dvs = document.getElementById('attribute').getElementsByTagName('input')
    for (var i = 0; i < dvs.length; i++) {
        names.push(dvs[i].name);
        values.push(dvs[i].value);
    }
    var dvs = document.getElementById('attribute').getElementsByTagName('select')
    for (var i = 0; i < dvs.length; i++) {
        names.push(dvs[i].name);
        values.push(dvs[i].value);
    }
    var inputName = myForm.form.inputName.value;
    var inputPrice = myForm.form.inputPrice.value;
    var catalog = myForm.form.catalog.value;
    var inputDescription = myForm.form.inputDescription.value;
    var file = myForm.form.inputImage.files[0]
    var formData = new FormData();
    formData.append("file-0", file);
    formData.append("inputName",inputName);
    formData.append("catalog",catalog);
    formData.append("inputDescription",inputDescription);
    formData.append("names",names);
    formData.append("values",values);
    formData.append("inputPrice",inputPrice);
    var req = getXmlHttp()
    req.onreadystatechange =function() {
        if (req.readyState == 4 && req.status == 200) {
            window.location.replace('/product/itemAdmin');
        }
    }
    req.open('POST', '/product/new', true);
    req.send(formData);
}
function getXmlHttp() {
    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function CreateCatalog(myForm) {
    var values = [];
    var vehicles = myForm.form.attributes;

    for (var i = 0, iLen = vehicles.length; i < iLen; i++) {
        if (vehicles[i].checked) {
            values.push(vehicles[i].value);
        }
    }
    alert("Vehicles: " + values.join(', '));
    alert("Vehicles: " + values.join(', '));
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

function RemoveCatalog(catalog_id) {
    $.post("/catalog/RemoveCatalog", {catalogId: catalog_id},
        function (data) {
            window.location.replace('/Catalog/Item');
        });
}

function CreateSection() {
    window.location.replace('/Section/Create');
}

function CreateCatalog() {
    window.location.replace('/Catalog/Create');
}

function newReview(myForm, tovarId) {
    var reviewText = myForm.form.reviewText.value;
    $.post("/account/newReview", {review: reviewText, tovarId: tovarId});
}
function Order() {
    window.location.replace('/basket/inputAddress');
}
function newOrder() {
    window.location.replace('/basket/order');
}
function ConfirmOrder(myForm) {
    var inputAddress = myForm.form.inputAddress.value;
    if (inputAddress != "") {
        window.location.replace('/basket/ConfirmOrder?a=' + inputAddress);
    }
    else {
        $("#error").html("Введите адрес доставки!!!");
    }
}


