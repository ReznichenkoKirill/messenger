function getChat(recipientId) {
    $.ajax({
        url: "/chat/messages",
        data: {id: recipientId},
        type: "POST",
        success: function (result) {
            $(".chat").empty();
            sortById(result);
            for (let i = 0; i < result.length; i++) {
                $(".chat").append("<p class='message'></p>");
                $(".message:last").text(result[i].content);
            }
        }
    });
}