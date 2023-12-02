<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- LOGIN FORM --}}
    <div style="border: 3px solid black; padding: 10px">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="password" type="password" placeholder="Password">
            <button>Log in</button>
        </form>
    </div>
</body>

</html>
