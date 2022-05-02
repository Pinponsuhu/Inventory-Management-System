@extends('layout.app')
    @section('content')
        <main class="w-full h-screen overflow-y-scroll">
            @include('layout.nav')
            <div class="mt-4 flex justify-between px-8">
                <h1 class=" text-2xl text-blue-400 font-bold">All Users</h1>
                <span class="cursor-pointer py-2 px-6 bg-blue-400 font-bold text-white shadow-md rounded-md" onclick="addNew()">Add User <i class="fa fa-plus"></i></span>
            </div>
            <div class="w-full px-8 mt-4">
                <table class="w-full mx-auto">
                    <thead>
                    <tr>
                        <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Full Name</td>
                        <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Email</td>
                        <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Is Admin</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-blue-400">
                                <td class="bg-blue-50 py-3 px-2 text-md font-bold uppercase text-blue-400">{{ $user->name }}</td>
                                <td class="bg-blue-50 py-3 px-2 text-md font-bold uppercase text-blue-400">{{ $user->email }}</td>
                                <td class="bg-blue-50 py-3 px-2 text-md font-bold uppercase text-blue-400">{{ $user->is_admin }}</td>
                                <td class="bg-blue-50 py-3 px-2 text-md font-bold uppercase text-blue-400"><a href="/reset/password/{{ $user->id }}" class="py-2 px-6 bg-green-400 text-white font-bold">Reset password</a></td>
                                <td class="bg-blue-50 py-3 px-2 text-md font-bold uppercase text-blue-400"><a href="/delete/user/{{ $user->id }}" class="py-2 px-6 bg-red-400 text-white font-bold">Delete</a></td>
                                @if ($user->is_admin == false)
                                <td class="bg-blue-50 py-3 px-2 text-md font-bold uppercase text-blue-400"><a href="/change/status/{{ $user->id }}" class="py-2 px-6 bg-purple-400 text-white font-bold">grant admin status</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        <div id="new-item" class="fixed @if ($errors->any())
            block
            
            @else
            hidden
                @endif  md:py-12 bg-blue-900 overflow-y-scroll bg-opacity-80 w-screen h-screen">
                    <div class="h-full overflow-y-scoll mx-auto md:w-10/12 py-7 px-8 rounded-md bg-white">
                        <div class="flex justify-between border-b-4 border-blue-50 pb-2 px-3">
                            <h1 class="font-bold text-2xl text-gray-900">Add New User</h1>
                            <i onclick="clsNew()" class="fa fa-times fa-2x text-blue-400"></i>
                        </div>
                        <form action="/add/user" method="post" class="md:grid md:grid-cols-3 h-full md:h-auto gap-x-4 overflow-y-scroll mt-4">
                            @csrf
                            <div class="my-2">
                                <label class="font-bold block mb-1">Fullname</label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Input Fullname" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                                @error('name')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Email Address</label>
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Input Email Address" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                                @error('email')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Is Admin</label>
                               <select name="is_admin" id="" class="block w-full py-3.5 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                                   <option value="" selected disabled>-- Is Admin --</option>
                                   <option value="0">No</option>
                                   <option value="1">Yes</option>
                               </select>
                                @error('is_admin')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Password</label>
                                <input type="text" name="password" value="{{ old('password') }}" placeholder="Input User Password" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                                @error('password')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Confirm Password</label>
                                <input type="text" name="password_confirmation" placeholder="Repeat Password" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                                @error('password_confirmation')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-green-400 mb-20 md:mb-0 text-white font-bold py-3 px-6 block w-36 text-center mt-2 md:col-span-3">Submit</button>
                        </form>
                    </div>
                </div>
                @if (Session('msg'))
                <div class="fixed w-80 top-0 right-0 bg-green-400 text-white rounded-md">
                    <p class="text-sm font-bold my-3">{{ Session('msg') }}</p>
                </div>
            @endif
    <script type="text/javascript">
    
        function addNew(){
            document.getElementById('new-item').classList.remove('hidden');
        }
        function clsNew(){
            document.getElementById('new-item').classList.add('hidden');
        }
      </script>
      @endsection