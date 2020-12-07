function getChat(recipientId) {
    $.ajax({
        url: "/chat/messages",
        data: {id: recipientId},
        type: "POST",
        success: function (result) {
            $(".messages").remove();
            sortById(result);
            for (let i = 0; i < result.length; i++) {
                $(".new-message").before("<div class='messages'></div>");
                $(".messages").append("<div class='message-container'></div>")
                $(".chat").find(".message-container:last").append("<p class='name'></p>").append("<p class='message'></p>");
                if (result[i].login === "slavik") {
                    $(".name:last").text("You").css("color", "green");
                    $(".message-container:last").css("text-align", "right");
                } else {
                    $(".name:last").text(ucfirst(result[i].login)).css("color", "red");
                }
                $(".message:last").text(result[i].content);
            }
        }
    });
}

function getMessageForm(recipientId) {
    $(".new-message").remove();
    $(".chat").append("<div class='new-message'></div>");
    $(".new-message").append("<form method='post'></form>");
    $(".new-message form").append("<input type='hidden' name='sender'/>");
    $(".new-message input[name='sender']").val(5); // TODO get the sender id from session
    $(".new-message form").append("<input type='hidden' name='recipient'/>");
    $(".new-message input[name='recipient']").val(recipientId);
    $(".new-message form").append("<textarea name='message' cols='35' rows='1' placeholder='Message' required autofocus></textarea>");
    $(".new-message form").append("<input type='submit' value='Send'/>");
    $(".chat").scrollTop($(".chat")[0].scrollHeight);

    $(".new-message form").submit(sendMessage);
}

function sendMessage(event) {
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
}