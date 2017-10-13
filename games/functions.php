<?php



function loginCheck(){
         global $conn;
       
        
        if(isset($_POST['submit'])){
            //check if login is achieved 
            //get variables from form 
            $username=$_POST['namebox'];
            $salt="gpckkkbjdbgg3779421046511";
            $password=sha1($_POST['passwordbox'].$salt);
            
            
            
            $stmt= $conn->prepare("SELECT * FROM users WHERE 
            username =:username AND password=:password");
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                echo "<p>Login successful</p>";
                $_SESSION['admin']=true;
                
            }
            
            else {
                echo "<p>no record exists";
            }
        
        }
}

function deleteRecord(){
    
         global $conn;
    
          if(isset($_GET['gameid'])){
            
            $id_for_deletion = $_GET['gameid'];
            
            $stmt=$conn->prepare('DELETE FROM games WHERE gameid=:gameid');
            $stmt->bindParam(':gameid',$id_for_deletion);
            $stmt->execute();
        
            
        }
}


?>