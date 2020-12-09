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
    login();
    setInterval(function () {
        loadUsers();
    }, 10000);
});

function login() {
    $(".auth > form").submit(function (event) {
        let login = $(this).find("input[name='login']").val();
        $.post(
            "/user/login",
            {"login": login},
            function (data, status) {
                if(status == 200){
                    alert('ok');
                    //TODO прорисовка окна с сообщениями(функция)
                }else {
                    alert('it`s not ok');
                }
            }
        );
        event.preventDefault();
    });
}

