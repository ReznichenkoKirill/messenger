function loadUsers() {
    $(".users").empty();
    $.get("/user/index", function (data) {
        for (let i = 0; i < data.length; i++) {
            $(".users").append("<div class='user'><li class='login'></li></div>");
            $(".user:last").val(data[i].id);
            $(".login:last").text(ucfirst(data[i].login));
            $(".user:last").append("<img src='/images/" + data[i].avatar + "' >");
        }
        $(".user").click(function () {
            let val = $(this).val();
            getChat(val);
        });
    });
}
$(document).ready(function () {
    loadUsers();
    setInterval(function () {
        loadUsers();
    }, 10000);
});

$('#login').submit(function (event) {
    let login = $('#log').val();        // берём логин
    checkLogIn(login);                  // проверка логина
    $('#login').css('display', 'none'); // отключние отображения поля входа
    event.preventDefault();
});

function checkLogIn(login) {
    $.ajax({
        url : '/user/login',            // Class/method
        data : {
            login: login,               // value
        },
        type : 'POST' ,
        success : function(status){     // if success

        }
    });
    // $send();
}


// если узера нет то создать, если успех в сессию доб логин и ид пользователь, автоматом устанавливаются куки и установить статус, в случае если авторизация не удалась то другой статус, в JS мы реагируем на статус после подгружать историю переписки
