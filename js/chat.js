function getChat(recipientId, sender) {
    $.ajax({
        url: "/chat/messages",
        data: {id: recipientId},
        type: "POST",
        success: function (result) {
            $(".messages").remove();
            $(".avatar-name .avatar").remove();
            sortById(result);
            $(".new-message").before("<div class='messages'></div>");
            $(".recipient").css("display", "flex");
            let recipientAvatarPath = $(".users li").filter(function () {
                return $(this).val() == recipientId;
            }).find(".avatar").attr("src");
            let recipientName = $(".users li").filter(function () {
                return $(this).val() === recipientId;
            }).find(".login").text();
            $(".avatar-name").prepend("<img class='avatar' src='" + recipientAvatarPath + "' alt='avatar'/>");
            $(".recipient .recipient-name").text(recipientName);
            $(".recipient .message-amount").text(result.length + " messages");
            if (result.length === 0) {
                $(".messages").append("<div class='no-messages'></div>");
                $(".no-messages").append("<img src='../images/no_messages.png' alt='no messages'/>");
                $(".no-messages").append("<p class='big'>No messages yet</p>");
                $(".no-messages").append("<p class='small'>Looks like you haven't initiated a conversation with this user</p>");
            } else {
                for (let i = 0; i < result.length; i++) {
                    $(".messages").append("<div class='message-container'></div>")
                    $(".chat").find(".message-container:last").append("<p class='name'></p>").append("<p class='message'></p>");
                    if (result[i].login === sender.login) {
                        $(".name:last").text("You").css("color", "yellow");
                        $(".message-container:last").css({
                            "text-align": "right",
                            "background-color": "#3d3d3d",
                            "align-self": "flex-end",
                            "margin-right": "2rem"
                        });
                        $(".message:last").css("color", "#e1e1e1");
                    } else {
                        $(".name:last").text(ucfirst(result[i].login)).css("color", "red");
                        $(".message-container:last").css("background-color", "#f5f5f5");
                        $(".message:last").css("color", "#000000");
                    }
                    $(".message:last").text(result[i].content);
                    $(".chat").scrollTop($(".chat")[0].scrollHeight);
                }
            }
        }
    });
}

function getMessageForm(recipientId, sender) {
    $(".new-message").remove();
    $(".chat").append("<div class='new-message'></div>");
    $(".new-message").append("<form method='post'></form>");
    $(".new-message form").append("<input type='hidden' name='sender'/>");
    $(".new-message input[name='sender']").val(sender.id);
    $(".new-message form").append("<input type='hidden' name='recipient'/>");
    $(".new-message input[name='recipient']").val(recipientId);
    $(".new-message form").append("<textarea name='message' cols='35' rows='1' placeholder='Message' required autofocus></textarea>");
    $(".new-message form").append("<button class='send' type='submit'><i class=\"fas fa-arrow-circle-right\"></i></button>");

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
            $.get("/user/getAuthUser", function (data) {
                getChat($(".new-message input[name='recipient']").val(), data);
                $(".new-message textarea").val("");
            });
        }
    });
    event.preventDefault();
}