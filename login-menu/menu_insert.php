<?php
include "menu_connection.php";

if (isset($_POST['submit'])) {
  $recid = $_POST['recid'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civilstat = $_POST['civilstat'];
    $contactnum = $_POST['contactnum'];
    $salary = $_POST['salary'];
    $isactive = isset($_POST['isactive']) ? 1 : 0; // Use 1 for active, 0 for inactive




    $checkQuery = "SELECT COUNT(*) as count FROM employeefile WHERE recid = '$recid'";
    $checkResult = $conn->query($checkQuery);
    
    if (!$checkResult) {
        die("Error: " . $conn->error);
    }
    
    $row = $checkResult->fetch_assoc();
    
    if ($row['count'] > 0) {
        echo "<script>alert('Record with ID $recid already exists.');</script>";
    } else {
    




    $sql = mysqli_query($conn, "INSERT INTO employeefile (recid, fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive)
    VALUES ('$recid', '$fullname', '$address', '$birthdate', '$age', '$gender', '$civilstat', '$contactnum', '$salary', '$isactive')");

    if ($sql) {
        echo "<script>alert('Record successfully added!!');</script>";
        echo "<script>document.location='menu_insert.php';</script>";
    } else {
        echo "<script>alert('Something went wrong: " . mysqli_error($conn) . "');</script>";
    }
  }





  }

  
  
  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Section</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

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


<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Student Information System</h2>
        </div>
    </div>

    <form method="POST">
        <div class="form-group">
            <label for="recid">Record ID</label>
            <input type="text" name="recid" class="form-control" id="recid" placeholder="Enter Record ID" required>
        </div>

        <div class="form-group">
            <label for="fullname">Employee Full Name</label>
            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Fullname" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Birth Date</label>
            <input type="date" name="birthdate" class="form-control" id="birthdate" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" id="age" placeholder="Enter Age" required>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <div class="form-check">
                <input type="radio" value="male" name="gender" class="form-check-input" id="male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input type="radio" value="female" name="gender" class="form-check-input" id="female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check">
                <input type="radio" value="other" name="gender" class="form-check-input" id="other" required>
                <label class="form-check-label" for="other">Other</label>
            </div>
        </div>

        <div class="form-group">
            <label for="civilstat">Civil Status</label>
            <select name="civilstat" class="form-control" id="civilstat" required>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="separated">Separated</option>
                <option value="widowed">Widowed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contactnum">Contact No.</label>
            <input type="tel" name="contactnum" class="form-control" id="contactnum" minlength="10" maxlength="11" pattern="[0-9]{11}" placeholder="09000000000" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control" id="salary" placeholder="Enter Salary" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="isactive">Active</label>
            <div class="form-check">
                <input type="checkbox" value="1" name="isactive" class="form-check-input" id="isActive">
                <label class="form-check-label" for="isActive">Active</label>
            </div>
        </div>

        <div class="row" style="margin-top:1%">
            <div class="col-md-6 offset-md-3 text-center">
                <button type="text" name="submit" class="btn btn-primary">Submit</button>
                <a href="menu_home.php" class="btn btn-success">Cancel</a>
            </div>
        </div>
    </form>
</div>


<script>
        document.getElementById('birthdate').addEventListener('change', function () {
            var birthdate = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        });

      
        function toggleMenu() {
            const menu = document.querySelector(".menu-links");
            const icon = document.querySelector(".hamburger-icon");
            menu.classList.toggle("open");
            icon.classList.toggle("open");
        }
  
    </script>
</body>
</html>

