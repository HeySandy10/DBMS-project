<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #222;
        font-size: 0.5rem;
        line-height: 2;
       
        min-width: 260px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      /* align-items: center; */
        display: block;
        font-size: 1rem;
    }
    </style>
</head>

<body>
<header class="header">


    <section class="flex">

        <a href="dashboard.php" class="logo"><b>ADMIN PANEL</b></a>

        <nav class="navbar">
            <a href="dashboard.php">DASHBOARD</a>
            <div class="dropdown">
                <a href="">BOOKINGS</a>
                <ul class="dropdown-content">
                  <a class="dropdown-item" href="all_booking.php">ALL BOOKINGS</a>
                  <a class="dropdown-item" href="approved_booking.php">APPROVED BOOKINGS</a>
                  <a class="dropdown-item" href="new_booking.php">NEW BOOKINGS</a>
                  <a class="dropdown-item" href="cancelled_booking.php">CANCELLED BOOKINGS</a>
                </ul>
            </div>

            <div class="dropdown">
                <a href="">SERVICES</a>
                <ul class="dropdown-content">
                  <a class="dropdown-item" href="add_services.php">ADD SERVICES</a>
                  <a class="dropdown-item" href="manage_services.php">MANAGE SERVICES</a>
                </ul>
            </div>

            <div class="dropdown">
                <a href="">EVENTS</a>
                <ul class="dropdown-content">
                  <a class="dropdown-item" href="add_event.php">ADD EVENTS</a>
                  <a class="dropdown-item" href="manage_event.php">MANAGE EVENTS</a>
                </ul>
            </div>

            

            <div class="dropdown">
                <a href="">QUERIES</a>
                <ul class="dropdown-content">
                  <a class="dropdown-item" href="read_queries.php">READ QUERIES</a><br>
                  <a class="dropdown-item" href="unread_queries.php">NEW QUERIES</a><br>
                </ul>
            </div>

            <div class="dropdown">
                <a href="">PAGES</a>
                <ul class="dropdown-content">
                  <a class="dropdown-item" href="about_us.php">ABOUT US</a><br>
                  <a class="dropdown-item" href="contact_us.php">CONTACT US</a><br>
                </ul>
            </div>

            <div class="dropdown">
                <a href="">PROFILE</a>
                <ul class="dropdown-content">
                  <a class="dropdown-item" href="admin_update.php">UPDATE</a><br>
                  <a class="dropdown-item" href="admin_changepwd.php">CHANGE PASSWORD</a><br>
                  <a class="dropdown-item" href="admin_logout.php">LOGOUT</a><br>
                </ul>
            </div>

            <!-- <a href="register.php">REGISTER</a> -->
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

</header>
</body>

</html>

