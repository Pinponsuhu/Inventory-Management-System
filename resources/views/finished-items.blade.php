@extends('layout.app')
    @section('content')
        <main class="w-full  h-screen overflow-y-scroll">
            @include('layout.nav')
            <div class="mt-4 flex border-b-4 border-blue-100 pb-4 items-center justify-between px-8">
                <h1 class="font-bold text-2xl text-blue-400 capitalize "">All Finished Items</h1>
                <span class="cursor-pointer py-2 px-6 bg-blue-400 text-white font-bold text-white shadow-md rounded-md" onclick="addNew()">Add new <i class="fa fa-plus"></i></span>
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
        </main>

    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script type="text/javascript">
  function addNew(){
      document.getElementById('new-item').classList.remove('hidden');
  }
  function clsNew(){
      document.getElementById('new-item').classList.add('hidden');
  }
</script>
@endsection

