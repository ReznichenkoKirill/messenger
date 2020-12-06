function getChat(recipientId) {
    $.ajax({
        url: "/chat/messages",
        data: {id: recipientId},
        type: "POST",
        success: function (result) {
            $(".message-container").remove();
            sortById(result);
            for (let i = 0; i < result.length; i++) {
                $(".new-message").before("<div class='message-container'></div>");
                $(".chat").find(".message-container:last").append("<p class='name'></p>").append("<p class='message'></p>");
                if (result[i].login === "slavik") {
                    $(".name:last").text("You").css("color", "green");
                    $(".message-container:last").css("text-align", "right");
                } else {
                    $(".name:last").text(ucfirst(result[i].login)).css("color", "red");
                }
                $(".message:last").text(result[i].content);
            }
            $(".new-message input[name='sender']").val(5); // TODO get the sender id from session
            $(".new-message input[name='recipient']").val(recipientId);
            $(".chat").scrollTop($(".chat")[0].scrollHeight);
        }
    });
}

$(".new-message > form").submit(function (event) {
    $.ajax({
        url: "/chat/send",
        data: {
            sender: $(this).find("input[name='sender']").val(),
            recipient: $(this).find("input[name='recipient']").val(),
            message: $(this).find("textarea").val()
        },
        type: "POST",
        success: function () {
            getChat($(".new-message input[name='recipient']").val());
            $(".new-message textarea").val("");
        }
    });
    event.preventDefault();
});