
<?php 
    require('connect.php');
    require('functions.php');
    session_start();
    
    //if submit is clicked
    loginCheck();
    
    require('header.php');
?>

    <h1>Welcome to our shop</h1>
    
   

<?php 

    if($_SESSION['admin']){
       
        deleteRecord();
       
        echo "<a href='logout.php'>Logout</a>";
        
        $stmt=$conn->prepare("SELECT * FROM games");
        $stmt->execute();
        
        if($stmt->rowCount()>0){
        
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                //output the row
                echo    "<p>ID : ".$row['gameid'].
                        "Title :".$row['title'].
                        "Rating :".$row['rating'].
                        "Genre : ".$row['genre'].
                        "Price : ".$row['price'].
                        
                        "<a href='index.php?gameid=".$row['gameid']."'>Delete</a>
                        <a href='update.php?gameid=".$row['gameid']."'> | Update</a>
                        </p>";
            }
        
        
        
        
            
        }
        
        else {
            echo "<p> No records found</p>";
        }
        
        //form for inserting records
        
        echo '<a href="add.php">Add a record</a>';
        
        
        
        
        
    }//end of session check
     
     
    //display the form    
    else {
        echo '
         <form name="login" action="" method="POST">
        <label>Name</label>
        <input type="text" name="namebox" length="30">
        <br/>
        
        <label>Password</label>
        <input type="password" name="passwordbox" length="30">
        <br/>
        
        <input type="submit" name="submit">
        
        
    </form>
        ';
       
    }

    
    require('footer.php');
?>
    
    
    



