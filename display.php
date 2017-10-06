<!DOCTYPE html>
<html>
    <body>
       <?php
        $myname= $_POST['namebox'];
        $myemail=$_POST['emailbox'];
        $mypassword=$_POST['pwbox'];
        
        if($mypassword=="Glasgow"){
            echo "<h1> Welcome</h1>";
        }
        else {
            echo "<h1> Password incorrect</h1>";
        }
        
        ?>
    </body>
</html>

