<?php 
    require('connect.php');
    require('functions.php');
    
    if(isset($_POST['signup'])){
        
        $username=  $_POST['usernamebox'];
        $stmt=$conn->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindParam(":username",$username);
        $stmt->execute();
        
        if($stmt->rowCount()>0){
            ?>
            <script>alert("User already exists");</script>
            <?php
        }
        else {
            $password1=$_POST['password1box'];
            $password2=$_POST['password2box'];
            $email=$_POST['emailbox'];
            $role="user";
            $DOB=$_POST["datebox"];
            
            if($password1==$password2){
            
                $stmt=$conn->prepare("INSERT INTO users
                                    (username, password,email, dob, role)
                                    VALUES
                                    (:username, :password, :email, :dob, :role)");
                
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $password1);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":dob", $DOB);
                $stmt->bindParam(":role", $role);
                
                if($stmt->execute()){
                    ?>
                    <script>alert("User account created");location.href("index.php");</script>
                    <?php
                }
                else {
                    
                }
            } 
            else { 
                ?>
                <script>alert("passwords don't match");</script>
                <?php 
                
            }
           
            
        }
    
        
    }
    
    require('header.php');
    
?>
    <form name="signup" method="POST" action="">
        <label>Username</label><input type="text" name="usernamebox">
        <label>Password</label><input type="text" name="password1box">
        <label>Re Enter Password</label><input type="text" name="password2box">
        <label>DOB</label><input type="date" name="datebox">
        <label>Email</label><input type="text" name="emailbox">
        <input type="submit" name="signup">
        
    </form>
    
<?php    
    require('footer.php');
?>