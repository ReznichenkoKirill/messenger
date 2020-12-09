let chatInterval;

function loadUsers(currentUser) {
    $(".users").empty();
    $.get("/user/index", function (data) {
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
            // chatInterval = setInterval(function () {
            //     getChat(val, currentUser);
            // }, 5000);
        });
    });
}

$("#auth").submit(function (event) {
    $.ajax({
        url: "/user/auth",
        data: {'login': $(this).find("input[name='login']").val()},
        type: "POST",
        success: function () {
            $.get("/user/getAuthUser", function (data) {
                $("#auth").css("display", "none");
                loadUsers(data);
                setInterval(function () {
                    loadUsers(data);
                }, 5000);
            });
        }
    });
    event.preventDefault();
});