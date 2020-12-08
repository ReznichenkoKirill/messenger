let chatInterval;

function loadUsers() {
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
            let val = $(this).val();
            getMessageForm(val);
            getChat(val);
            // chatInterval = setInterval(function () {
            //     getChat(val);
            // }, 5000);
        });
    });
}

$(document).ready(function () {
    loadUsers();
    setInterval(function () {
        loadUsers();
    }, 5000);
});