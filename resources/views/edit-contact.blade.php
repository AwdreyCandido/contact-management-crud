<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/edit-contact/{{ $contact->id }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Contact</h1>
        <input name="name" type="text" placeholder="Name" value="{{ $contact['name'] }}">
        <input name="contact" type="text" placeholder="Contact" value="{{ $contact['contact'] }}">
        <input name="email" type="text" placeholder="E-mail" value="{{ $contact['email'] }}">
        <button>Save Changes</button>
    </form>
</body>

</html>
