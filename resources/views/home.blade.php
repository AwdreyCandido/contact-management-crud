<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center flex-col">

    <header class="flex justify-between w-full items-center p-4 border-b border-gray-300">
        <h1 class="text-2xl font-bold">
            Contact Manager
        </h1>
        @auth
            <div class="flex gap-4">
                <form action="/new-contact" method="GET">
                    @csrf
                    <button class="bg-blue-400 text-lg font-medium text-white px-6 py-2 rounded-lg">New Contact</button>
                </form>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="bg-red-400 text-lg font-medium text-white px-6 py-2 rounded-lg">Logout</button>
                </form>
            </div>
        @else
            <div class="flex gap-4">
                <form action="/register" method="GET">
                    @csrf
                    <button class="bg-blue-400 text-lg font-medium text-white px-6 py-2 rounded-lg">Register</button>
                </form>
                <form action="/login" method="GET">
                    @csrf
                    <button class="bg-blue-400 text-lg font-medium text-white px-6 py-2 rounded-lg">Log in</button>
                </form>
            </div>
        @endauth

    </header>

    <main class="w-full lg:w-[45%] lg:min-w-[45%] p-4">

        @auth
            <h1 class="text-2xl font-bold mb-6 mt-4">
                Your Contacts List
            </h1>
        @else
            <h1 class="text-2xl font-bold mb-6 mt-4">
                Contacts List
            </h1>
        @endauth

        <div class=" flex flex-col gap-2">

            <hr class="my-4">

            @if (count($contacts) > 0)
                <div class="flex text-lg font-medium gap-4 pl-4 items-center">
                    <div class="w-[150px]">Name</div>
                    <div class="w-[150px]">E-mail</div>
                    <div class="w-[150px]">Phone Number</div>
                </div>
                @foreach ($contacts as $contact)
                    <a class="cursor-pointer" href="/contact-details/{{ $contact->id }}">
                        <div class="flex justify-between bg-[] px-4 py-2 border-2 border-gray-400 rounded-lg ">
                            <div class="flex text-lg gap-4 items-center">
                                <div class="w-[150px]">{{ $contact['name'] }}</div>
                                <div class="w-[150px]">{{ $contact['email'] }}</div>
                                <div class="w-[150px]">{{ $contact['contact'] }}</div>
                            </div>
                            @auth
                                <div class="flex gap-4">
                                    <p
                                        class="px-3 py-1 bg-blue-200 hover:bg-blue-500 hover:text-[#f2f2f2] rounded-lg duration-300">
                                        <a href="/edit-contact/{{ $contact->id }}">Edit</a>
                                    </p>

                                    <form action="/delete-contact/{{ $contact->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-3 py-1 bg-red-200 hover:bg-red-500 hover:text-[#f2f2f2] rounded-lg duration-300">Delete</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </a>
                @endforeach
            @else
                <p class="text-lg text-gray-500 mt-4">There are not registered contacts.</p>
            @endif

        </div>

    </main>



</body>

</html>
