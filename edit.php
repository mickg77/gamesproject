<?php
require("connect.php");
$myid   = $_GET['id'];

$stmt=$conn->prepare(
    "SELECT * FROM users WHERE id = :id LIMIT 1");
$stmt->bindParam(':id', $myid);
$stmt->execute();

$userExists = $stmt->rowCount() > 0;

if ($userExists) {
    $user = $stmt->fetch();
} else {
    die("User does not exist");
}

if(isset($_POST['submit'])){
    //this means the submit button has been clicked
    $myname=$_POST['namebox'];
    $myemail=$_POST['emailbox'];
    
    $stmt=$conn->prepare(
        "UPDATE users SET username = :username, email = :email WHERE id = :id");
    $stmt->bindParam(':id', $myid);
    $stmt->bindParam(':username',$myname);
    $stmt->bindParam(':email',$myemail);
    
    $stmt->execute();
    
    // Update the values for the webpage
    $user['username'] = $myname;
    $user['email'] = $myemail;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Database</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <style type="text/css">
            .myrow {
                background-color: #FFFC19;
                width: 50%;
                margin: 0 auto;
                border: 3px solid #ffffff;
                padding: 10px;
                margin-bottom: 10px;
            }
            body {
                background-color: #1485cc;
                font-family: 'Roboto Condensed', sans-serif;
            }
            form {
                width: 50%;
                margin: 0 auto;
                background-color: #B21212;
                border: 3px solid #ffffff;
                padding: 10px;
            }
            
        </style>
    </head>
    <body>
        <form action="?id=<?=$myid?>" method="POST">
            <p>Username:<input type="text" name="namebox" value="<?=$user['username']?>"></p>
            <p>Email:<input type="text" name="emailbox" value="<?=$user['email']?>"> </p>
            <input type="submit" name="submit">
        </form>
        
        <a href="mydb.php">
            <button>Go back to users</button>
        </a>
    </body>
</html>