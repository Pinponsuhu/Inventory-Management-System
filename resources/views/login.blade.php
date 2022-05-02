<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-blue-50">
    <main class="w-80 md:w-96 bg-white mx-auto rounded-md shadow-md mt-24">
        <h1 class="w-full bg-blue-400 text-white rounded-md font-bold text-center py-3 text-2xl">LOGIN</h1>
        <form action="/login" class="mt-6 px-6 pb-6" method="post">
            @csrf
            @if (Session('msg'))
                <p class="text-sm font-bold text-red-400 my-3">{{ Session('msg') }}</p>
            @endif
            <label class="font-bold block mb-1.5">Email</label>
            <input type="email" placeholder="Enter Email Address" name="email" class="block px-1.5 w-full py-3 border-b-4 border-blue-400 bg-blue-50 mb-3" id="">
            @error('email')
                <p class="mt-1 font-bold text-sm text-red-400">{{ $message }}</p>
            @enderror
            <label class="font-bold block mb-1.5">Password</label>
            <input type="password" placeholder="Enter Password" name="password" class="block px-1.5 w-full py-3 border-b-4 border-blue-400 bg-blue-50 mb-3" id="">
            <div class="flex gap-x-2 mt-1 mb-3 items-center">
                <input type="checkbox" class="block" name="remember_me" id="">
                <p>Remember me</p>
            </div>
            <button class="py-3 text-white font-bold w-full mb-5 block bg-blue-400">Submit</button>
        </form>
    </main>
</body>
</html>