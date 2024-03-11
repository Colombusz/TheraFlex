<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Include Tailwind CSS -->
  @yield('link')
</head>

<body>
  <!-- Header content here -->
  <div class="w-full mx-auto">
    @section('header')
    <header class="fixed top-0 left-0 right-0 z-50 shadow-md bg-customcolor3">
      <nav class="flex items-center justify-between h-20 px-6 pl-20">
        <a href="{{ route('customer.logout') }}" class="flex items-center justify-center w-12 h-12 bg-gray-300 rounded-full">
          <!-- Placeholder logo image -->
          <img src="/logos/Theraflex.svg" alt="Logo" class="w-8 h-8">
        </a>

        <div class="items-center justify-center flex-1 hidden space-x-4 text-center md:flex">
            <a href="{{ route('profile') }}" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">PROFILE</a>
            <a href="{{ route('appointments.index') }}" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">SET AN APPOINTMENT</a>
            <a href="{{ route('itemList') }}" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">PRODUCTS & SERVICES</a>
        </div>


      </nav>
      <!-- Mobile Menu -->
      <div class="hidden mobile-menu">
        <a href="/" class="block px-4 py-2 text-sm hover:bg-green-100">HOME</a>
        <a href="#" class="block px-4 py-2 text-sm hover:bg-green-100">PROFILE</a>
        <a href="#" class="block px-4 py-2 text-sm hover:bg-green-100">APPOINTMENTS</a>
        <a href="/product" class="block px-4 py-2 text-sm hover:bg-green-100">PRODUCTS & SERVICES</a>
      </div>
    </header>
    @show
  </div>

  <!-- Content section -->
  @yield('content')

  <!-- Tailwind JS for interactive components like mobile menu -->
  <script>
    // JavaScript for mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
      const menuButton = document.querySelector('.mobile-menu-button');
      const mobileMenu = document.querySelector('.mobile-menu');

      menuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
      });
    });
