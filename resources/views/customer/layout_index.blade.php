<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EHUB</title>

    <!-- bootstrap  -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <!-- font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- boxicons -->

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <title>{{ config('app.name', 'Laravel') }}</title>


</head>

<body>










    {{-- @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest --}}













    {{-- navbar starts here --}}
    <header>
        <a href=" {{ url('/customer/index') }} " class="logo"><img src="{{ asset('img/logo.png') }}"
                alt="" /></a>
        <ul class="search-bar">
            <form action="/customer/allproducts" method="get">
                <input type="search" class="search" name="search" placeholder="Search" />
                <a href="submit"><i class="bx bx-search"></i></a>
            </form>
        </ul>
        <div class="nav-icon">
            <div class="icons-container">
                {{-- <a href=""><i class="bx bx-heart"></i></a> --}}
                <a href="/customer/cart"><i class="bx bx-cart"></i></a>
                <a href="/customer/order"><i class="bx bx-bell"></i></a>
                @guest

                    <div class="dropdown">
                        <button class="btn btn-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-user-circle"></i>
                        </button>
                        @if (Route::has('login'))
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>
                        @endif
                        @if (Route::has('register'))
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        @endif
                    </div>


                @else
                    <div class="dropdown">
                        <button class="btn btn-link" style="text-decoration: none" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-user-circle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/customer/profile">Profile</a>
                            <a class="dropdown-item"
                                onclick="event.preventDefault();

                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>


                    </div>
                @endguest

            </div>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

        </div>
    </header>
    {{-- navbar ends here --}}





    @yield('body')

    <!-- footer  -->

    <div class="contact">
        <div class="contact-info">
            <div class="first-info">
                <img src="./img/logo.png" alt="" srcset="" />

                <p>
                    <a href="#"><i class="fa-solid fa-phone"></i>+123-456-7890</a>
                </p>
                <p>
                    <a href="#"><i class="fa-solid fa-mobile"></i>+919123066813</a>
                </p>
                <p>
                    <a href="#"><i class="fa-solid fa-envelope"></i> jaishreeram@gmail.com</a>
                </p>
                <p>
                    <a href="#"><i class="fa-solid fa-location-dot"></i> Chinsurah ,
                        west-bengal,712136</a>
                </p>
                <br />

                <div class="social-icon">
                    <a href="#"><i class="bx bxl-facebook-circle"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-instagram"></i></a>
                    <a href="#"><i class="bx bxl-linkedin-square"></i></a>
                    <a href="#"><i class="bx bxl-github"></i></a>
                </div>
            </div>

            <div class="second-info">
                <h4>Support</h4>
                <p><a href="{{ url('contactus') }}">Contact Us</a></p>
                <p><a href="{{ url('policy') }}">Policy</a></p>
                <p><a href="{{ url('policy') }}">Policy</a></p>
                <p><a href="{{ url('refunds') }}">Cancellation and Return</a></p>
            </div>

            <div class="third-info">
                <h4>Shop</h4>
                <p>Laptops</p>
                <p>Mobiles</p>
                <p>Custom PCs</p>
                <p>Tablets</p>
                <p>Mobile accessories</p>
                <p>PC components</p>
            </div>

            <div class="forth-info">
                <h4>Company</h4>
                <p><a href="{{ url('aboutus') }}">About Us</a></p>
                <p><a href="{{ url('blog') }}">Blog</a></p>
                <p><a href="{{ url('donate') }}">Donate</a></p>
                <p><a href="{{ route('login') }}">Login</a></p>
                <p><a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
    <div class="end-text">
        <p>
            Copyright &copy; 2023. All Rights Reserved. Designed By Jai shree ram.
        </p>
    </div>

    <script src="{{ asset('js/index.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/sly.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
