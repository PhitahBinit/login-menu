<?php
include("connection.php");
include("login.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Section</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
nav{
  background:rgb(100, 167, 125);
height:80px;
width:100%;
}
label.logo{
  color:white;
  font-size:35px;
  line-height: 80px;
  padding: 0 100px;
  font-weight:bold;
}
label{
 
  width: 5%; 
  height: auto; 
}




#check{
  display:none;
}
@media(max-width: 952px){
  label.logo{
    font-size: 30px;
    padding-left:50px;
  }

}







#form{
  background-color:white;
  width: 25%;
  margin: 130px auto;
  padding: 60px;
  border-radius: 10px;
  border: 2px solid #ccc;

}
#btn{
  
  padding: 8px;
  border-radius: 10px;
}
@media screen and (max-width: 900px){
  #form{
    width: 65%;
    padding: 50px;
  }
  
}
</style>



</head>
<body>


<nav>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
  </label>
  <label class="logo">LSTV Login-Menu CRUD</label>

</nav>


  <div id="form">
    <h1>Login Form</h1>
    <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
      <label>Username:</label>
      <input type="text" id="user" name="user"></br></br>
      <label> Password:</label>
      <input type="password" id="pass" name="pass"></br></br>
      <input type="submit" id="btn" value="Login" name="submit">
      <a class='btn btn-success' href='edit.php'>Demo</a>
    </form>
  </div>
  <script>
    function isvalid(){
      var user=document.form.user.value;
      var pass=document.form.user.value;
      if (user.length=="" && pass.length==""){
        alert("username and password field is empty");
        return false;
      }
      else if(user.length==""){
          alert("Username is empty!");
          return false;
        }
       else if(pass.length==""){
          alert("Password is empty!");
          return false;
        }
        return true;
      }
    
  </script>
</body>
</html>