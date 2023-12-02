<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    {{-- LOGIN FORM --}}
    <div class="h-screen w-full flex items-center justify-center">
        <form class="w-[22rem] p-4 rounded-xl gap-4 border border-gray-400 flex flex-col" action="/login" method="POST">
            @csrf
            <h2 class="text-2xl font-medium mb-3">Login</h2>
            <input class="bg-[#e2e2e2] px-4 py-1 border-2 border-gray-400 rounded-lg " name="name" type="text"
                placeholder="Name">
            <input class="bg-[#e2e2e2] px-4 py-1 border-2 border-gray-400 rounded-lg " name="password" type="password"
                placeholder="Password">
            <hr class="my-4">
            <button
                class="bg-blue-400 hover:bg-blue-500 duration-300 text-lg font-medium text-white px-6 py-2 rounded-lg">Log
                in</button>
        </form>
    </div>
</body>

</html>
