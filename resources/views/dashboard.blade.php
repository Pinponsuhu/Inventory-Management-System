@extends('layout.app')
    @section('content')
        <main class="w-full h-screen overflow-y-scroll">
            @include('layout.nav')
            <div class="p-4 m-4 h-80 bg-white rounded shadow">
                {!! $chart->container() !!}
            </div>
            <div class="mt-4 flex border-b-4 border-blue-100 pb-4 items-center justify-between px-8">
                <h1 class="font-bold text-2xl text-blue-400 capitalize "">inventory List</h1>
                <span class="cursor-pointer py-2 px-6 bg-blue-400 font-bold text-white shadow-md rounded-md" onclick="addNew()">Add new <i class="fa fa-plus"></i></span>
            </div>
            <div class="w-full px-8 mt-4">
            <table class="w-full mx-auto">
                <thead>
                <tr>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Product Name</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Item Number</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Delivered By</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Condition</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Category</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Date Delivered</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Quantity Supplied</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Remaining Quantity</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="text-blue-400">
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->product_name }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->item_number }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->delivered_by }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->condition }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->category }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->date_delivered }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->quantity }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->remaining_quantity }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize"><a href="/item/more/{{ $item->id }}" class="py-2 px-4 bg-green-400 text-white font-bold">More</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="flex justify-center my-3">
                <a href="/inventory" class="px-6 py-2.5 bg-purple-400 text-white font-bold">View All</a>
            </div>
        </main>
    <div id="new-item" class="fixed @if ($errors->any())
block

@else
hidden
    @endif  md:py-12 bg-blue-900 overflow-y-scroll bg-opacity-80 w-screen h-screen">
        <div class="h-full overflow-y-scoll mx-auto md:w-10/12 py-7 px-8 rounded-md bg-white">
            <div class="flex justify-between border-b-4 border-blue-50 pb-2 px-3">
                <h1 class="font-bold text-2xl text-gray-900">Add New Item</h1>
                <i onclick="clsNew()" class="fa fa-times fa-2x text-blue-400"></i>
            </div>
            <form action="/add/item" method="post" class="md:grid md:grid-cols-3 h-full md:h-auto gap-x-4 overflow-y-scroll mt-4">
                @csrf
                <div class="my-2">
                    <label class="font-bold block mb-1">Product Name</label>
                    <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Input Product Name" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                    @error('product_name')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Item Number</label>
                    <input type="text" name="item_number" value="{{ old('item_number') }}" placeholder="Input Item Number" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                    @error('item_number')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Delivered By</label>
                    <input type="text" name="delivered_by" value="{{ old('delivered_by') }}" placeholder="Input Product Company" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                    @error('delivered_by')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Quantity</label>
                    <input type="text" name="quantity" value="{{ old('quantity') }}" placeholder="Input Product Quantity" class="block w-full py-3 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                    @error('quantity')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Category</label>
                    <select name="category" class="block w-full py-3.5 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                        <option value="" selected disabled>-- Select Product Category --</option>
                        <option value="Stationery">Stationery</option>
                    </select>
                    @error('category')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Condition</label>
                    <select name="condition" class="block w-full py-3.5 px-1 border-b-4 border-blue-400 bg-white shadow-md">
                        <option value="" selected disabled>-- Select Product Condition --</option>
                        <option value="Unsealed">Unsealed</option>
                    </select>
                    @error('condition')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Date Delivered</label>
                    <input type="date" value="{{ old('date_delivered') }}" name="date_delivered" class="block w-full py-3 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                    @error('date_delivered')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Expiry Date</label>
                    <input type="date" value="{{ old('expiry_date') }}" name="expiry_date" class="block w-full py-3 px-1 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                    @error('expiry_date')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label class="font-bold block mb-1">Product Description</label>
                    <input type="text" name="product_desc" value="{{ old('product_desc') }}" placeholder="Input Product Description" class="block w-full py-3 px-1 border-b-4 border-blue-400 px-1 bg-white shadow-md">
                    @error('product_desc')
                        <p class="text-sm text-red-400 my-0.5">{{ $message }}</p>
                    @enderror
                </div>

                <button class="bg-green-400 mb-20 md:mb-0 text-white font-bold py-3 px-6 block w-36 text-center mt-2 md:col-span-3">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>

{{ $chart->script() }}
<script type="text/javascript">
  function addNew(){
      document.getElementById('new-item').classList.remove('hidden');
  }
  function clsNew(){
      document.getElementById('new-item').classList.add('hidden');
  }
</script>
@endsection

