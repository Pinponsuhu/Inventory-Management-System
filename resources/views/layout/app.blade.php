<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/full.css') }}"> --}}
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/apexcharts') }}"></script>
    <script>
         var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new Tooltip(tooltipTriggerEl);
  });
    </script>
</head>
<body class="flex flex-row">
    <nav class="h-screen relative w-16 bg-blue-500">
        <div class="bg-white w-full py-4 flex items-center justify-center">
            <img src="{{ asset('image/logo.png') }}" alt="" class="w-12 block mx-auto h-12">
        </div>
        <ul class="mt-8 flex flex-col items-center justify-center gap-y-4 text-blue-100">
            <div data-tip="hello" class="w-full tooltip py-5 mb-0.5 flex justify-center hover:bg-white hover:text-blue-400"><a href="/"  data-bs-toggle="tooltip" data-bs-html="true" title="Dashboard"><i class="fa fa-chart-pie fa-2x block text-center" ></i></a></div>
            <li class="w-full py-5 mb-0.5 flex justify-center hover:bg-white hover:text-blue-400"><a href="/inventory"><i  data-bs-toggle="tooltip" data-bs-html="true" title="All Inventory" class="fa fa-file fa-2x block text-center" ></i></a></li>
            <li class="w-full py-5 mb-0.5 flex justify-center hover:bg-white hover:text-blue-400"><a href="/all/users"><i  data-bs-toggle="tooltip" data-bs-html="true" title="All Users" class="fa fa-user fa-2x block text-center" ></i></a></li>
            <li class="w-full py-5 mb-0.5 flex justify-center hover:bg-white hover:text-blue-400"><a href="/change/password"><i  data-bs-toggle="tooltip" data-bs-html="true" title="Change Password" class="fa fa-lock fa-2x block text-center" ></i></a></li>
        </ul>
        <li class="w-full text-blue-50 py-4 absolute bottom-0 mb-0.5 flex justify-center hover:bg-white hover:text-blue-400"><a href="/logout"><i  data-bs-toggle="tooltip" data-bs-html="true" title="Logout" class="fa fa-power-off fa-2x block text-center" ></i></a></li>
    </nav>

    @yield('content')

</body>
</html>
