@extends('layout.app')
    @section('content')
        <main class="w-full  h-screen overflow-y-scroll">
            @include('layout.nav')
            <div class="mt-4 flex border-b-4 border-blue-100 pb-4 items-center justify-between px-8">
                <h1 class="font-bold text-2xl text-blue-400 capitalize "">Items Assignment Report</h1>
                <span id="button-excel" class="cursor-pointer py-2 px-6 bg-blue-400 font-bold text-white shadow-md rounded-md">Export To Excel</span>
            </div>
            <div class="w-full px-8 mt-4">
            <table class="w-full mx-auto" id="resultTable">
                <thead>
                <tr>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Product Name</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Item Number</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Delivered By</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Condition</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Category</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Recieved By</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Quantity Assigned</td>
                    <td class="bg-blue-400 py-3 px-2 text-md font-bold uppercase text-blue-50">Assigned To</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    @php
                        $product = \App\Models\Inventory::find($item->item_id);
                        // dd($product);
                    @endphp
                        <tr class="text-blue-400">
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $product->product_name }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $product->item_number }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->issued_by }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $product->condition }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $product->category }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->issue_to }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->number_of_item }}</td>
                            <td class="bg-blue-50 py-3 px-2 text-md font-bold capitalize">{{ $item->assigned_to }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        <script src="{{ asset('js/tableToExcel.js') }}"></script>
    <script>

let button = document.querySelector("#button-excel");

button.addEventListener("click", e => {
  let table = document.querySelector("#resultTable");
  TableToExcel.convert(table);
});
    </script>
    </main>
@endsection