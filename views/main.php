<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Messenger</title>
</head>
<body>
<div id="content">
    <header>
        <img src="../images/logotype.png" alt="logo" id="logo">
        <h2><a href="/">Messenger</a></h2>
    </header>
    <main>
        <nav>
            <ul class="users"></ul>
        </nav>
        <div class="conversation">
            <div class="authorisation">
                <form method="post" id="auth">
                    <div>
                        <label for="login">Login</label>
                    </div>
                    <div>
                        <input type="text" id="login" name="login" placeholder="Enter your login" required>
                    </div>
                    <input type="submit" value="log in">
                </form>
            </div>
            <div class="recipient">
                <div class="avatar-name"><p class="recipient-name"></p></div>
                <p class="message-amount"></p></div>
            <div class="chat"></div>
        </div>
    </main>
</div>
<footer></footer>
<script src="../js/functions.js"></script>
<script src="../js/users.js"></script>
<script src="../js/chat.js"></script>
</body>
</html>