<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MonkeyBusiness Login</title>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="../images/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="../images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../images/favicon-16x16.png" sizes="16x16" />
    <meta name="application-name" content="MonkeyBusiness"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/public/css/app.css"/>
    <link rel="stylesheet"  href="css/layout.css"/>

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Monkey Business
        </div>

        <div class="col-md-8 col-md-offset-10">

            <div class="col-md-10">
                <label class=" col-md-5">Username:</label>
                <input class=" col-md-5" type="text" name="usernameTextbox"/>
            </div>

            <br/>

            <div class="col-md-10">
                <label class=" col-md-5"> Password :</label>
                <input class=" col-md-5" type="password" name="passwordBox"/>
            </div>

            <form method="get" action="../resources/views/createEvent.html">
                <button class="myButton" type="submit">Login</button>
            </form>

        </div>

    </div>
</div>
</body>
</html>
