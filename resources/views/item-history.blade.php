@extends('layout.app')
    @section('content')
        <main class="w-full h-screen overflow-y-scroll">
            @include('layout.nav')
            <div class="flex justify-between mt-3 items-center px-8">
                <h1 class=" text-2xl font-bold text-blue-400">Item Details</h1>
                @if ($item->remaining_quantity > 0)
                <span onclick="addNew()" class="cursor-pointer py-2 px-6 bg-blue-400 text-white font-bold text-white shadow-md rounded-md">Assign</span>
                @endif
            </div>
            <div class="flex gap-x-6 px-8 items-center mt-4">
                <div class="w-64 bg-green-400 px-6 py-8 rounded-md shadow-md text-white">
                    <h1 class="text-3xl font-bold">
                        {{ $item->quantity }}
                    </h1>
                    <h1 class="font-bold  text-xl">Total <br><span class="text-2xl">Supplied</span></h1>
                </div>
                <div class="w-64 bg-red-400 px-6 py-8 rounded-md shadow-md text-white">
                    <h1 class="text-3xl font-bold">
                        {{ $item->remaining_quantity }}
                    </h1>
                    <h1 class="font-bold text-xl">Total <br> <span class="text-2xl">Remaining</span></h1></div>
            </div>

            <div class="flex gap-x-8 justify-center flex-wrap gap-y-4 px-8 mt-3 py-2">
                <h1 class="text-lg"><b class="text-blue-400">Product Name:</b><br> {{ $item->product_name }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Item Number:</b><br> {{ $item->item_number }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Condition:</b><br> {{ $item->condition }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Category:</b><br> {{ $item->category }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Delivered By:</b><br> {{ $item->delivered_by }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Delivery Date:</b><br> {{ $item->date_delivered }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Expiry Date:</b><br> {{ $item->expiry_date }}</h1>
                <h1 class="text-lg"><b class="text-blue-400">Expiry Date:</b><br> {{ $item->expiry_date }}</h1>
            </div>

            <div>
                <h1 class="text-xl font-bold my-4 ml-8">Assignment History</h1>
                <div class="mt-2 px-8">
                    @foreach ($assigns as $assign)
                        <div class="py-3 mb-1 bg-blue-100 px-4">
                            <h1 class="font-bold text-lg">A total of {{ $assign->number_of_item }} of {{ $item->product_name }} was delivered to {{ $assign->issue_to }} of {{ $assign->assigned_to }} Department/Unit</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
        <div id="new-item" class="fixed @if ($errors->any())
            block

            @else
            hidden
                @endif  md:py-12 bg-blue-900 overflow-y-scroll bg-opacity-80 w-screen h-screen">
                    <div class="h-full overflow-y-scoll mx-auto md:w-96 py-7 overflow-y-scroll px-8 rounded-md bg-white">
                        <div class="flex justify-between border-b-4 border-blue-50 pb-2 px-3">
                            <h1 class="font-bold text-2xl text-gray-900">Add New Item</h1>
                            <i onclick="clsNew()" class="fa fa-times fa-2x text-blue-400"></i>
                        </div>
                        <form action="/assign/item" method="post" class=" h-full md:h-auto gap-x-4 mt-4">
                            @csrf
                            <input type="text" hidden value="{{ $item->id }}" name="item_id">
                            <div class="my-2">
                                <label class="font-bold block mb-1">Assignment Unit/Department</label>
                                <input type="text" name="assigned_to" value="{{ old('assigned_to') }}" placeholder="Input Product Name" class="block w-full py-3 px-1 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                                @error('assigned_to')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Issuer Name</label>
                                <input type="text" name="issued_by" value="{{ old('issued_by') }}" placeholder="Input Item Number" class="block w-full py-3 px-1 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                                @error('issued_by')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Delivered To</label>
                                <input type="text" name="issue_to" value="{{ old('issue_to') }}" placeholder="Input Product Company" class="block w-full py-3 px-1 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                                @error('issue_to')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <label class="font-bold block mb-1">Quantity Delivered</label>
                                <select name="number_of_item" class="block w-full py-3.5 px-1 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                                    <option value="" selected disabled>-- Select Quantity Delivered --</option>
                                   @for ($i = 1; $i <= $item->remaining_quantity; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                   @endfor
                                </select>
                                @error('number_of_item')
                                    <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-green-400 mb-20 md:mb-0 text-white font-bold py-3 px-6 block w-36 text-center mt-2 md:col-span-3">Submit</button>
                        </form>
                    </div>
        </div>
        <script type="text/javascript">
            function addNew(){
                document.getElementById('new-item').classList.remove('hidden');
            }
            function clsNew(){
                document.getElementById('new-item').classList.add('hidden');
            }
          </script>
    @endsection
