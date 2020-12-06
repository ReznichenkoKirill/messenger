<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Messenger</title>
</head>
<body>
<header>
    <h2><a href="/">Messenger</a></h2>
</header>
<main>
    <nav>
        <ul class="users"></ul>
    </nav>
    <div class="chat">
        <!-- TODO check if user logged in -->
        <div class="recipient-container">
            <p class="recipient-name">Kate</p> <!-- TODO add a recipient name in users.js -->
        </div>
        <div class="new-message">
            <form method="post">
                <input type="hidden" name="sender">
                <input type="hidden" name="recipient">
                <textarea name="message" cols="35" rows="1" placeholder="Message" autofocus required></textarea>
                <input type="submit" value="send">
            </form>
        </div>
    </div>
</main>
<footer></footer>
<script src="../js/functions.js"></script>
<script src="../js/users.js"></script>
<script src="../js/chat.js"></script>
</body>
</html>