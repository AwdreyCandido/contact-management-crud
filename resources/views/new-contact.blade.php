<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/new-contact" method="POST">
        @csrf
        <h1>New Contacts</h1>
        <input name="name" type="text" placeholder="Name">
        <input name="contact" type="text" placeholder="Contact">
        <input name="email" type="text" placeholder="E-mail">
        <button>Create Contact</button>
    </form>
</body>

</html>
