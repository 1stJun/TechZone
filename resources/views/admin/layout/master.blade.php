<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | TechZone</title>
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="admin/assets/fonts/fontawesome-free-6.4.0/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <div class="main">
        <nav class="sidebar">
            <header class="header__logo">
                <a href="{{ url('admin/index') }}" class="header__logo-link">
                    <svg class="header__logo-img" xmlns="http://www.w3.org/2000/svg" version="1.0" width="210"
                        height="160" viewBox="0 0 500.000000 500.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)" fill="#000"
                            stroke="none">
                            <path
                                d="M1282 3300 c-34 -21 -62 -72 -61 -112 0 -13 19 -81 42 -153 32 -97 48 -131 61 -133 38 -8 38 14 -3 143 -46 145 -49 163 -22 196 l19 24 740 3 740 2 26 -22 c19 -18 56 -118 176 -488 84 -256 158 -483 165 -505 l13 -40 271 -3 c263 -2 271 -3 271 -22 0 -20 -9 -20 -1043 -20 -822 0 -1047 3 -1060 13 -10 7 -47 103 -90 232 -62 189 -75 220 -93 223 -12 2 -24 -3 -27 -11 -3 -7 28 -115 69 -238 57 -174 79 -229 99 -246 l26 -23 1074 0 1074 0 15 22 c22 30 20 81 -2 101 -16 15 -51 17 -278 17 l-260 0 -21 63 c-12 34 -85 258 -163 497 -126 385 -146 438 -175 467 l-33 33 -758 0 c-744 0 -760 0 -792 -20z" />
                            <path
                                d="M2342 3023 c-18 -34 -192 -572 -192 -593 0 -24 28 -39 40 -20 18 30 201 603 196 616 -7 20 -33 18 -44 -3z" />
                            <path
                                d="M2385 2920 c-10 -16 10 -36 117 -112 54 -38 98 -71 98 -73 0 -2 -45 -42 -101 -90 -97 -84 -117 -115 -78 -123 21 -4 251 198 247 217 -4 19 -237 191 -260 191 -9 0 -20 -5 -23 -10z" />
                            <path
                                d="M1987 2818 c-64 -55 -117 -108 -117 -117 1 -18 224 -182 256 -189 13 -2 24 2 27 12 5 13 -21 37 -103 97 -61 45 -110 82 -110 84 0 2 45 42 100 90 55 48 100 93 100 100 0 10 -20 25 -34 25 -2 0 -55 -46 -119 -102z" />
                            <path
                                d="M1340 2829 c0 -36 33 -131 48 -137 7 -2 20 2 28 10 13 13 12 22 -8 79 -18 50 -28 65 -46 67 -17 3 -22 -2 -22 -19z" />
                            <path
                                d="M1396 2024 c-9 -23 -8 -24 24 -24 36 0 36 -1 10 -75 -11 -32 -20 -62 -20 -67 0 -11 91 -10 110 2 8 5 26 38 40 72 24 60 27 63 62 66 26 2 37 9 41 23 5 18 -1 19 -128 19 -112 0 -134 -2 -139 -16z" />
                            <path
                                d="M1675 2003 c-9 -21 -22 -58 -28 -81 -17 -63 0 -72 124 -72 79 0 98 3 103 16 3 9 6 17 6 19 0 2 -23 5 -52 7 -74 4 -77 28 -4 28 44 0 57 4 65 19 14 25 5 31 -50 31 -39 0 -47 3 -43 15 5 11 22 15 69 15 54 0 63 3 68 20 5 19 0 20 -119 20 l-124 0 -15 -37z" />
                            <path
                                d="M1983 2030 c-25 -10 -44 -44 -64 -109 -18 -61 -3 -71 117 -71 83 0 92 2 97 20 5 18 0 20 -38 20 -52 0 -58 7 -44 51 16 48 23 53 82 59 39 4 53 9 55 23 3 15 -6 17 -90 16 -51 0 -103 -4 -115 -9z" />
                            <path
                                d="M2186 1958 c-16 -46 -31 -89 -34 -95 -3 -10 11 -13 51 -13 l54 0 17 45 c16 40 19 43 37 32 18 -11 18 -20 2 -64 -4 -9 8 -13 39 -13 24 0 52 6 61 13 9 6 29 49 46 95 l30 82 -56 0 c-55 0 -55 0 -70 -40 -13 -32 -21 -40 -41 -40 -18 0 -23 4 -18 16 23 61 22 64 -36 64 l-53 0 -29 -82z" />
                            <path
                                d="M2626 2024 c-3 -9 -6 -17 -6 -19 0 -2 21 -5 47 -7 l47 -3 -67 -54 c-37 -29 -72 -62 -78 -72 -10 -19 -6 -20 118 -17 112 3 128 5 131 21 3 14 -4 17 -37 17 -23 0 -41 4 -41 9 0 4 29 30 64 57 102 77 98 84 -49 84 -103 0 -124 -3 -129 -16z" />
                            <path
                                d="M2922 2030 c-25 -10 -72 -100 -72 -137 0 -33 29 -43 120 -43 107 0 132 13 159 85 25 68 26 74 4 91 -21 16 -175 18 -211 4z m99 -83 c-14 -42 -37 -65 -52 -50 -11 11 15 83 35 95 20 13 28 -9 17 -45z" />
                            <path
                                d="M3182 2013 c-6 -16 -23 -58 -36 -95 l-25 -68 55 0 c50 0 55 2 65 28 5 15 12 34 15 42 4 10 11 0 21 -27 14 -40 17 -43 52 -43 20 0 45 6 54 13 9 6 29 49 46 95 l30 83 -56 -3 c-53 -3 -57 -5 -67 -35 -17 -48 -23 -49 -37 -4 -12 40 -13 41 -59 41 -43 0 -49 -3 -58 -27z" />
                            <path
                                d="M3460 1983 c-12 -32 -24 -70 -27 -84 -8 -41 20 -50 134 -47 83 3 98 6 101 20 3 14 -6 17 -49 20 -74 4 -79 28 -5 28 44 0 57 4 66 19 15 30 14 31 -46 31 -49 0 -55 2 -44 15 8 10 31 15 70 15 54 0 70 8 70 36 0 2 -56 4 -124 4 l-125 0 -21 -57z" />
                        </g>
                    </svg>
                </a>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    @if (session('user_name'))
                        <div class="admin-account">
                            <span class="avatar" style="background-image: url(admin/assets/img/avatar.png);"></span>
                            <span class="admin-name">{{ session('user_name') }}</span>
                        </div>
                    @endif

                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="{{ url('admin/index') }}">
                                <i class="bx bx-home-alt icon"></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ url('admin/customer') }}">
                                <i class="bx bxs-user-account icon"></i>
                                <span class="text nav-text">Customers</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ url('admin/category') }}">
                                <i class="bx bx-category icon"></i>
                                <span class="text nav-text">Category</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ url('admin/product') }}">
                                <i class="bx bx-laptop icon"></i>
                                <span class="text nav-text">Products</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ url('admin/order') }}">
                                <i class="bx bx-package icon"></i>
                                <span class="text nav-text">Orders</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-cog icon"></i>
                            <span class="text nav-text">Setting</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ url('admin/logout') }}">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>

        </nav>

        @yield('main')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmation(e) {
            e.preventDefault();
            var urlToRedirect = e.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            })
        }
    </script>
</body>

</html>
