@extends('layout.app')
    @section('content')
        <main class="w-full  h-screen overflow-y-scroll">
            @include('layout.nav')
            <div class="mt-5">
                <h1 class="font-bold text-2xl ml-8">Generate Report</h1>
                <form action="/generate/report" class="w-80 px-4 py-6 mx-auto bg-white shadow-md md:w-96 md:px-8" method="GET">
                    @csrf
                    <label class="font-bold block mb-2">Report Type</label>
                    <select name="type" class="py-3 px-1 bg-blue-100 block w-full" id="">
                        <option value="" selected disabled>-- Report Type --</option>
                        <option value="assignment">Assignment</option>
                        <option value="items">Inventory Items</option>
                    </select>
                    <label class="font-bold block my-2">From</label>
                    <input type="date" name="from" class="block py-3 w-full bg-blue-100">
                    <label class="font-bold block my-2">To</label>
                    <input type="date" name="to" class="block py-3 w-full mb-3 bg-blue-100">
                    <button class="px-5 py-3 bg-blue-400 text-white font-bold">Generate Report</button>
                </form>
            </div>
        </main>
