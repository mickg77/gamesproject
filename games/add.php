<?php
    require('connect.php');
    require('functions.php');
    session_start();
    
    //the below info only shown if admin logged in.
    if($_SESSION['admin']){
        require('header.php');
        ?><!--stops php-->
        <h1>Add a record</h1>
        
        <form name="addrecord" action="" method="POST">
            <label>Title :</label><input  type="text" name="titlebox"><br/>
            <label>Rating :</label><input type="text" name="ratingbox"><br/>
            <label>Genre :</label><input  type="text" name="genrebox"><br/>
            <label>Price :</label><input  type="text" name="pricebox"><br/>
            
            <input type="submit" name="submitadd">       
        </form>
        
        <?php
            
        if(isset($_POST['submitadd'])){
            $title=$_POST['titlebox'];
            $rating=$_POST['ratingbox'];
            $genre=$_POST['genrebox'];
            $price=$_POST['pricebox'];
            $stmt=$conn->prepare(
                "INSERT INTO games(title, rating, genre, price)
                 VALUES (:title, :rating, :genre, :price)"
                 );
            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':rating',$rating);
            $stmt->bindParam(':genre',$genre);
            $stmt->bindParam(':price',$price);
            
            if($stmt->execute()){
                ?><!--stops php, saves me using echo-->
                <script>alert("Record Added");location.href="index.php";</script>
                <?php
            }
            
        }
      require('footer.php');  
    }
    else {
        //sends the user back to the index page
        header('Location: index.php');
    }


?>