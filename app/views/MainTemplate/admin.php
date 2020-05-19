<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/admin.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="login-panel">
    <h3 class="login-panel__title">Login</h3>
    <form class="login-panel__form" action="/admin/login/validate" method="post">
        <label for="name" class="login-panel__label">Name:</label>
        <input class="login-panel__input" id="name" type="text" name="name" placeholder="John Smith" required>
        <label for="password" class="login-panel__label">Password:</label>
        <input class="login-panel__input" id="password" type="password" name="password" placeholder="*******" required>
        <button class="login-panel__button" type="submit">Login</button>
        <div><?=$this->data['errorMessage'] ?></div>
    </form>
</div>
</body>
</html>