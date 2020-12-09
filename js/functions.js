function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function sortById(arr) {
    arr.sort(function (a, b) {
        return a.id - b.id;
    });
}

$(document).ready(function () {
    $.get("/user/getAuthUser", function (data) {
        console.log(data);
        if (data.id != null) {
            loadUsers(data);
            $("#auth").css("display", "none");
            $("header").append("<button id='logout'></button>");
            $("#logout").text("Log out (" + ucfirst(data.login) + ")");
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
        }
    });
});