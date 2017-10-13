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
                
                $salt="gpckkkbjdbgg3779421046511";
                $password1=sha1($password1.$salt);
                
                
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
    <form name="signup" method="POST" action="" id="myform">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="usernamebox"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password1box" id="pwd1"></td>
            </tr>
            <tr>
                <td>Re Enter Password</td>
                <td><input type="text" name="password2box" id="pwd2"></td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input type="date" name="datebox"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="emailbox"></td>
            </tr>
            <tr>
                <td><input type="submit" name="signup"></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <p id="length"></p>
        <p id="match"></p>
    </form>
    
<?php    
    require('footer.php');
?>