<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- REGISTER FORM --}}
    <div style="border: 3px solid black; padding: 10px">
        <h2>Register</h2>
        <!-- action has the url that the form will submit to -->
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="text" placeholder="E-mail">
            <input name="password" type="password" placeholder="Password">
            <button>Register</button>
        </form>
    </div>
</body>

</html>
