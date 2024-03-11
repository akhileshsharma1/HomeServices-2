<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/admindashboard.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Material Symbols Rounded' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <script src="{{ asset('assets/js/script1.js') }}" defer></script>
    <script src="{{ asset('assets/js/script2.js') }}" defer></script>
    <title>Document</title>
</head>
<body>
<div id="dashboardPage">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span id="lab la-sajiloghar">SajiloGhar</span></h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                <a href="#" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-users"></span>
                    <span>Service Category</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-broom"></span>
                    <span>Services</span></a>
                </li>
                <li>
                    <a href="#"><span class="las la-wallet"></span>
                    <span>Bookings</span></a>
                </li>
                <li>
                    <a href="#">
                    <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content active">
        <div class="header">
            <h1>
                <label for="">
                    <span class="las la-bars"></span>
                    Dashboard
                </label>
            </h1>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

            <div class="user-wrapper">
                <img src="{{ asset('assets/images/logo.png') }}" width="40px" height="30px" alt="">
                <div>
                    <h4>Akhilesh Sharma</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </div>
        <div class="dashboard"></div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all sidebar links
        const sidebarLinks = document.querySelectorAll('.sidebar-menu a');

        // Loop through each link
        sidebarLinks.forEach(link => {
            // Add click event listener
            link.addEventListener('click', function(event) {
                // Prevent default link behavior
                event.preventDefault();

                // Get the href attribute of the clicked link
                const href = this.getAttribute('href');

                // Redirect the user to the href location
                window.location.href = href;
            });
        });
    });
</script>
</script>
</body>
</html>
