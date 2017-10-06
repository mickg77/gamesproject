<?php
require("connect.php");

if(isset($_POST['submit'])){
    //this means the submit button has been clicked
    $myname=$_POST['namebox'];
    $myemail=$_POST['emailbox'];
    
    $stmt=$conn->prepare("INSERT INTO users (username, email) VALUES(:username, :email)");
    $stmt->bindParam(':username',$myname);
    $stmt->bindParam(':email',$myemail);
    
    $stmt->execute();
}
else {
    echo "The button has not been clicked";
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
        <?php
            //prepare the statement
            $stmt=$conn->prepare("SELECT * FROM users");
            
            //execute the statement
            $stmt->execute();
            
            //checks if there are any records/rows
            if($stmt->rowCount()>0){
                //for all the rows
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='myrow'>";
                        echo '<a class="btnEditRow" data-rowid="'. $row['id']. '">Edit</a>';
                        echo "<p>Username : ".$row['username']."</p>";
                        echo "<p>EMail : ".$row['email']."</p>";
                    echo "</div>";
                }
                
                
                
            }
            else{
                echo "There is nothing here";
                
            }
            
        ?>
        <form action="" method="POST">
            <p>Username:<input type="text" name="namebox"></p>
            <p>Email:<input type="text" name="emailbox"> </p>
            <input type="submit" name="submit">
            
        </form>
    </body>
</html>