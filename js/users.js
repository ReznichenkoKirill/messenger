let chatInterval;
let usersInterval;

function loadUsers(currentUser) {
    $.get("/user/getAuthUser", function (result) {
        $(".users").empty();
        if (result.id != null) {
            $.get("/user/index", function (data) {
                data.forEach(function (user, index) {
                    if (user.id === currentUser.id) {
                        data.splice(index, 1);
                    }
                });
                for (let i = 0; i < data.length; i++) {
                    $(".users").append("<li class='user'><table></table></li>");
                    $(".user:last").val(data[i].id);
                    $(".user:last table").append("<tr><td></td></tr>");
                    $(".user:last td").append("<img class='avatar' src='/images/" + data[i].avatar + "' alt='avatar'/>");
                    $(".user:last tr").append("<td class='login'></td>");
                    $(".user:last td:last").text(ucfirst(data[i].login));
                }
                $(".user").click(function () {
                    clearInterval(chatInterval);
                    let recipient = $(this).val();
                    getMessageForm(recipient, currentUser);
                    getChat(recipient, currentUser);
                    chatInterval = setInterval(function () {
                        getChat(recipient, currentUser);
                    }, 5000);
                });
            });
        } else {
            $(".users").empty();
            $("#logout").remove();
            $("#auth").css("display", "block");
        }
    });
}

$("#auth").submit(function (event) {
    $.ajax({
        url: "/user/auth",
        data: {'login': $(this).find("input[name='login']").val()},
        type: "POST",
        success: function () {
            $.get("/user/getAuthUser", function (data) {
                clearInterval(usersInterval);
                $("header").append("<button id='logout'></button>");
                $("#logout").text("Log out (" + ucfirst(data.login) + ")");
                $("#auth").css("display", "none");
                loadUsers(data);
                usersInterval = setInterval(function () {
                    loadUsers(data);
                }, 5000);
                $("#logout").click(function () {
                    $.ajax({
                        url: "/user/logout",
                        success: function () {
                            clearInterval(chatInterval);
                            $(".recipient").css("display", "none");
                            $(".chat").empty();
                            loadUsers(data);
                        }
                    });
                });
            });
        }
    });
    event.preventDefault();
});