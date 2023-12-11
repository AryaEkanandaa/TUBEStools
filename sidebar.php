<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-PERPUS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(to right, warna1, warna2);
            margin: 0;
            padding: 0;
        }

        main {
            flex: 1;
            transition: margin-left 0.5s;
            padding: 16px;
            background-color: warna3; /* Warna putih untuk main content */
            margin-left: 0; /* Awalnya main content tidak tergeser */
        }

        .navbar {
            background-color: #00FFFF;
            padding: 10px;
            color: #ffffff;
        }

        .navbar-toggler-icon {
            color: #ffffff;
        }

        .sidebar {
            height: 100%;
            width: 0; /* Awalnya sidebar tersembunyi */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #00FFFF; /* Warna cerah untuk sidebar */
            overflow-x: hidden;
            transition: width 0.5s;
            padding-top: 56px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #000000;
            display: block;
        }

        .sidebar a:hover {
            background-color: #ffffff;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand">E-PERPUS</span>
    </div>

    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">&times;</a>
        <a href="../admin/kategori.php">Kategori</a>
        <a href="../admin/list-buku.php">List Buku</a>
    </div>


    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("mySidebar");
            var mainContent = document.querySelector("main");
            
            if (sidebar.style.width === "250px") {
                sidebar.style.width = "0";
                mainContent.style.marginLeft = "0";
            } else {
                sidebar.style.width = "250px";
                mainContent.style.marginLeft = "250px";
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
