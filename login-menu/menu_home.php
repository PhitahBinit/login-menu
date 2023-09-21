<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Section</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
         *{
  padding:0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}
body{
  font-family:montserrat;
}

        nav,
        .nav-links {
            display: flex;
        }

        nav {
            justify-content: space-around;
            align-items: center;
            height: 80px;
            background:rgb(100, 167, 125);
        }

        .nav-links {
            gap: 2rem;
            list-style: none;
            font-size: 20px;
        }

        a {
            color: white;
            text-decoration: none;
            font-weight:bold;
        }

        a:hover {
            color: black;
            text-decoration: underline;
            text-underline-offset: 1rem;
        }

        .logo {
            color:white;
            font-size:25px;
            line-height: 70px;
            padding: 0 80px;
            font-weight:bold;
        }

        .logo:hover {
            cursor: default;
        }

        

        #hamburger-nav {
            display: none;
        }

        .hamburger-menu {
            position: relative;
            display: inline-block;
        }

        .hamburger-icon {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 24px;
            width: 30px;
            cursor: pointer;
        }

        .hamburger-icon span {
            width: 100%;
            height: 2px;
            background-color: black;
            transition: all 0.3 ease-in-out;
        }

        .menu-links {
            position: absolute;
            margin-top: 100%;
            right: 0;
            background-color: white;
            width: fit-content;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3 ease-in-out;
        }

        .menu-links a {
            display: block;
            padding: 10px;
            text-align: center;
            font-size: 1.5rem;
            color: black;
            text-decoration: none;
            transition: all 0.3 ease-in-out;
        }

        .menu-links li {
            list-style: none;
        }

        .menu-links.open {
            max-height: 300px;
        }

        .hamburger-icon.open span:first-child {
            transform: rotate(45deg) translate(10px, 5px);
        }

        .hamburger-icon.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger-icon.open span:last-child {
            transform: rotate(-45deg) translate(10px, -5px);
        }

        .hamburger-icon span:first-child {
            transform: none;
        }

        .hamburger-icon span:first-child {
            opacity: 1;
        }

        .hamburger-icon span:first-child {
            transform: none;
        }


        @media screen and (max-width: 1200px) {
  #desktop-nav {
    display: none;
  }
  #hamburger-nav {
    display: flex;
   
  }
  .nav-links {
    flex-direction: column;
    gap: 0.5rem;
    text-align: center;
  }
  logo{
    font-size: 30px;
    padding-left:40px;
  }
}
    </style>
</head>
<body>
    <nav id="desktop-nav">
        <div class="logo">LSTV Login-Menu CRUD</div>
        <div>
            <ul class="nav-links">
            <li><a class="active" href="menu_home.php" >Home</a></li>
    <li><a href="menu_insert.php" >Add</a></li>
    <li><a href="menu_edit.php" >Update</a></li>
    <li><a href="menu_delete.php" >Delete</a></li>
    <li><a href="index.php" >Logout</a></li>
            </ul>
        </div>
    </nav>
    <nav id="hamburger-nav">
    <div class="logo">LSTV Login-Menu CRUD</div>
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu-links">
                <li><a href="menu_home.php" onclick="toggleMenu()">Home</a></li>
                <li><a href="menu_insert.php" onclick="toggleMenu()">Add</a></li>
                <li><a href="menu_edit.php" onclick="toggleMenu()">Update</a></li>
                <li><a href="menu_delete.php" onclick="toggleMenu()">Delete</a></li>
            </div>
        </div>
    </nav>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Employee Full Name</th>
                    <th>Address</th>
                    <th>Birth Date</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Civil Status</th>
                    <th>Contact No.</th>
                    <th>Salary</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "menu_connection.php";
                $sql = "SELECT * FROM employeefile";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalid query!");
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <th>$row[recid]</th>
                            <td>$row[fullname]</td>
                            <td>$row[address]</td>
                            <td>$row[birthdate]</td>
                            <td>$row[age]</td>
                            <th>$row[gender]</th>
                            <td>$row[civilstat]</td>
                            <td>$row[contactnum]</td>
                            <td>$row[salary]</td>
                            <td>$row[isactive]</td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function toggleMenu() {
            const menu = document.querySelector(".menu-links");
            const icon = document.querySelector(".hamburger-icon");
            menu.classList.toggle("open");
            icon.classList.toggle("open");
        }
    </script>
</body>
</html>