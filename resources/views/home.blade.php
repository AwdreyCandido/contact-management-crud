<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Management</title>
</head>

<body>
    <h1>
        Contact Management Web application
    </h1>

    @auth
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>

        <form action="/new-contact" method="GET">
            @csrf
            <button>New Contact</button>
        </form>

        @foreach ($contacts as $contact)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <div>{{ $contact['name'] }}</div>
                <div>{{ $contact['contact'] }}</div>
                <div>{{ $contact['email'] }}</div>

                <p><a href="/edit-contact/{{ $contact->id }}">Edit</a></p>
            </div>
        @endforeach
    @else
        <form action="/register" method="GET">
            @csrf
            <button>Register</button>
        </form>
        <form action="/login" method="GET">
            @csrf
            <button>Log in</button>
        </form>

    @endauth


    {{--  LIST OF EXISTING CONTACTS  --}}


</body>

</html>
