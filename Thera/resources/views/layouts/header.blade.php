<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @yield('link')
</head>
<body>
  <div class="container">
    @section('header')
    <header class="fixed w-full h-20 px-6 font-bold bg-customcolor3">
        <nav class="container relative flex items-center justify-center py-4 mx-auto  ">
            <ul class="flex justify-between py-3 space-x-20 text-lg text-[#151b1f]">
                <li><a href="/" class="hover:text-green-900">HOME</a></li>
                <li><a href="{{ route('ProdServ.index') }}" class="hover:text-green-900">PRODUCT & SERVICES</a></li>
                <li><a href="{{ route('Appointments.index') }}" class="hover:text-green-900">SET AN APPOINTMENT</a></li>
            </ul>
        </nav>
    </header>
    @show
  </div>

  @yield('content')
</body>
</html>
