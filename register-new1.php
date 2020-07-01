<html>
    <head>
        <title>BookBuddy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="demo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="demo.js"></script>
    <script>
    function ValidateEmail()   
{  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.username.value))  
  {  
    return (true)  
  }  
    alert("You have entered an invalid email address!")  
    return (false)  
}  
// function validateForm() {
//     var x = document.forms["myForm"]["username"].value;
//     if (x == null || x == "") {
//         alert("Name must be filled out");
//         return false;
//     }
// }
</script>


<style type="text/css">
  body{
    background: url(header.jpg);
  }
</style>

    </head>

    <!--
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back<br/><br/></a>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           Display name: <input type="text" name="name" required="required" /> <br/>
           Preferred location: <input type="text" name="prefloc" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
  -->


<body>
<div class="form">
        
        <div id="signup">   
          <h1>Welcome to BookBuddy!</h1>
          
          <form name="myForm" action="register.php"  onsubmit="return ValidateEmail()" method="POST">
          
            <div class="field-wrap">
            
            <input type="text"required autocomplete="off"/ placeholder="Email Address" name="username" style="height:45px;"  required>
          </div>
          
          <div class="field-wrap">
           
            <input type="password"required autocomplete="off"/ placeholder="Password" name="password" style="height:45px;" required>
          </div>
          
          <div class="field-wrap">
           
            <input type="text"required autocomplete="off"/ placeholder="Username" name="name" style="height:45px;" required>
          </div>

          <div class="field-wrap">
           
           <!--
            <input type="text"required autocomplete="off"/ placeholder="Preferred location" name="prefloc" style="height:45px;" >
          </div>
          -->
          <button class="button button-block" style="background-color:black"/>Sign Up</button><br/>

          <a class="button button-block" href="login.php" style="background-color:black;text-align:center;"/>Log In</a>
          
          </form>

        </div>
        
</div>

</body>

</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  $name = mysql_real_escape_string($_POST['name']);
//  $prefloc = mysql_real_escape_string($_POST['prefloc']);
  $bool = true;

  mysql_connect("localhost", "root", "") or die(mysql_error());
  mysql_select_db("first_db") or die("Cannot connect to database");
  $query = mysql_query("Select * from users");
  while ($row = mysql_fetch_array($query)) 
  {
    $table_users = $row['username'];
    if($username == $table_users)
    {
      $bool = false;
      Print '<script>alert("Username has been taken!");</script>';
      Print '<script>window.location.assign("register.php");</script>';
    }
  }

  if($bool)
  {
  //  mysql_query("INSERT INTO users (username, password, name, prefloc) VALUES ('$username','$password','$name','$prefloc')");


    mysql_query("INSERT INTO users (username, password, name) VALUES ('$username','$password','$name')");
    Print '<script>alert("Successfuly Registered!");</script>';

    Print '<script>window.location.assign("register.php");</script>';
  }
}
?>