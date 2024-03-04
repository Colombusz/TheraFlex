@vite(['resources/css/adminSidebar.css', 'resources/js/adminSidebar.js'])


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>
<body>
<nav class="sidebar close">
  <header>

    <div class="image-text">
      <span class="image">
        <img src="{{asset('logos/logo.png')}}" alt="logo">
      </span>

      <div class="text header-text">
        <span class="name"> TheraFlex</span>
        <span class="title">Therapeutic</span>
      </div>
    </div>

    <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
      <li class="search-box">
            <i class='bx bx-search icon' ></i>
            <input type="text" placeholder="Search...">
          </li>
        <ul class="menu-link">
          <li class="nav-link">
            <a href="#employee_edit" >
              <i class='bx bx-home icon' ></i>
                <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="{{ route('employees.index') }}" >
            <i class='bx bx-child icon' ></i>
                <span class="text nav-text">Employee</span>
            </a>
          </li>  <li class="nav-link">
            <a href="{{ route('products.index') }}" >
              <i class='bx bxs-package icon' ></i>
                <span class="text nav-text">Product</span>
            </a>
          </li>  <li class="nav-link">
            <a href="{{ route('services.index') }}" >
            <i class='bx bxs-hand icon' ></i>
                <span class="text nav-text">Service</span>
            </a>
          </li>  <li class="nav-link">
            {{-- <a href="{{ route('appointments.index') }}" > --}}
              <i class='bx bx-notepad icon'></i>
                <span class="text nav-text">Appointment</span>
            </a>
          </li>
          </li>  <li class="nav-link ">
            <a href="" >
              <i class='bx bx-bell icon'></i>
                <span class="text nav-text">Notification</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="bottom-content">
            <ul>
                <li class="">
                    <a href="">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>