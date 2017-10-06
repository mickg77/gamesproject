<?php require('connect.php'); ?>
<?php require('header.php'); ?>
<?php require('functions.php'); ?>

<?php
    session_start();
    
    if(isset($_POST['submit'])){
        
        //get variables out of the form
        $username = $_POST['namebox'];
        $password = $_POST['passwordbox'];
        
        $stmt=$conn->prepare("SELECT * FROM users WHERE username=:username 
        AND password=:password");
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        
        if($stmt->rowCount()>0){
            echo 'login successful';
            $_SESSION['admin']=true;
        }
        else {
            echo 'login failed';
        }
        
    }
    ?>

<!--content of the body starts here-->

        <h1>My Games Shop</h1>
        
        <?php
        
        if($_SESSION['admin']){
            
            if(isset($_GET['gameid'])){
                
                $id=$_GET['gameid'];
                $stmt=$conn->prepare("DELETE FROM games WHERE gameid=:gameid");
                $stmt->bindParam(':gameid',$id);
                $stmt->execute();
            
            }
            
            display_stock();
            
            
            echo '<a href="add.php">Add a record |</a>';
            echo '<a href="logout.php"> Logout |</a>';
        }
        
        else{
            
            echo '            
            <form action="" name="login" method="POST">
            <label>Name</label><input type="text" name="namebox"><br/>
            <label>Password</label><input type="password" name="passwordbox"><br/>
            <input type="submit" name="submit">
            
        </form>';
        }
       
        ?>
        
        
        
        
<!--content of the body ends here-->
<?php require('footer.php'); ?>