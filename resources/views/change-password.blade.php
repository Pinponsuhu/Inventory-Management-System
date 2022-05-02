@extends('layout.app')
    @section('content')
        <main class="w-full h-screen overflow-y-scroll">
            @include('layout.nav')
            <h1 class="text-2xl font-bold text-blue-400 ml-8 my-4">Change Password</h1>
            <form action="/change/password" method="POST" class="mt-4 w-80 md:w-96 md:px-8 mx-auto px-4 py-4 bg-white shadow-md rounded-md">
                @csrf
                @if (Session('msg'))
                    <p class="text-sm text-red-400 text-center">{{ Session('msg') }}</p>
                @endif
                <label for="" class="font-bold block mb-2">Old Password</label>
                <input type="text" name="old_password" placeholder="Enter Old Password" class="block w-full bg-blue-100 py-3 px-2">
                <label for="" class="font-bold block my-2">New Password</label>
                <input type="text" name="password" placeholder="Enter New Password" class="block w-full bg-blue-100 py-3 px-2">
                <label for="" class="font-bold block my-2">Confirm Password</label>
                <input type="text" name="password_confirmation" placeholder="Repeat New Password" class="block mb-2 w-full bg-blue-100 py-3 px-2">
                <button class="px-6 py-3 bg-blue-400 text-white font-bold">Submit</button>
            </form>
        </main>
    @endsection