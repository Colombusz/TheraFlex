<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @yield('link')
  <!-- Include Tailwind CSS -->
  <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</head>

<body>
  <div class="w-full mx-auto">
    @section('header')
    <header class="fixed top-0 left-0 right-0 z-50 shadow-md bg-customcolor3">
      <nav class="flex items-center justify-between h-20 px-6 pl-20">
        <a href="/" class="flex items-center justify-center w-12 h-12 bg-gray-300 rounded-full">
          <!-- Placeholder logo image -->
          <img src="logos/Theraflex.svg" alt="Logo" class="w-8 h-8">
          <a>

            <div class="items-center justify-center flex-1 hidden space-x-4 text-center md:flex">
              <a href="/" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">HOME</a>
              <a href="#" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">ABOUT</a>
              <a href="/services" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">APPOINTMENTS</a>
              <a href="/product" class="px-4 py-2 transition duration-300 rounded hover:bg-green-100 hover:text-green-900">PRODUCTS & SERVICES</a>
            </div>

            <div class="flex items-center pr-10 space-x-4">
              <!-- Cart Image -->
              <a href="/cart" class="block">
                <img src="icons/shopping_cart.svg" alt="Cart" class="w-8 h-8 "> <!-- Update with your cart image path -->
              </a>
              <!-- Profile Circle -->
              <a href="/profile" class="block">
                <img src="icons/profile.svg" alt="Profile" class="w-8 h-8 rounded-full"> <!-- Update with your profile image path -->
              </a>
              <!-- Mobile Menu Button -->
              <button class="ml-4 md:hidden mobile-menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
              </button>
            </div>
      </nav>
      <!-- Mobile Menu -->
      <div class="hidden mobile-menu">
        <a href="/" class="block px-4 py-2 text-sm hover:bg-green-100">HOME</a>
        <a href="#" class="block px-4 py-2 text-sm hover:bg-green-100">ABOUT</a>
        <a href="#" class="block px-4 py-2 text-sm hover:bg-green-100">APPOINTMENTS</a>
        <a href="/product" class="block px-4 py-2 text-sm hover:bg-green-100">PRODUCTS & SERVICES</a>
      </div>
    </header>

  </div>
  @stop
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
  </script>
</body>

</html>
@show
