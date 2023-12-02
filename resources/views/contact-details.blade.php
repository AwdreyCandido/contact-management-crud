<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


    <div class="h-screen w-full flex items-center justify-center">
        <div class="w-[22rem] p-4 rounded-xl gap-4 border border-gray-400 flex flex-col">
            <h1 class="text-2xl font-medium mb-3">Contact details</h1>
            <input class="bg-[#e2e2e2] px-4 py-1 border-2 border-gray-400 rounded-lg " name="name" type="text"
                placeholder="Name" value="{{ $contact['name'] }}">
            <input class="bg-[#e2e2e2] px-4 py-1 border-2 border-gray-400 rounded-lg " name="contact" type="text"
                placeholder="Contact" value="{{ $contact['contact'] }}">
            <input class="bg-[#e2e2e2] px-4 py-1 border-2 border-gray-400 rounded-lg " name="email" type="text"
                placeholder="E-mail" value="{{ $contact['email'] }}">

            <hr class="my-4">

            @auth
                <div class="flex w-full gap-4">
                    <button class="bg-blue-400 w-full text-lg font-medium text-white px-6 py-2 rounded-lg"><a
                            href="/edit-contact/{{ $contact['id'] }}">Edit Contact</a>
                    </button>
                    <form action="/delete-contact/{{ $contact['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-400 text-lg font-medium text-white px-6 py-2 rounded-lg">Delete</button>
                    </form>
                </div>
            @else
                <h3>Login to Edit or Delete</h3>
            @endauth

        </div>
    </div>
</body>

</html>
