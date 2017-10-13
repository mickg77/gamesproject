<?php 
    require('connect.php');
    require('functions.php');
    session_start();
    if(isset($_SESSION['admin'])){
        
        if(isset($_GET['update'])){
            
            $gameid     =$_GET['gameid'];
            $title      =$_GET['titlebox'];
            $rating      =$_GET['ratingbox'];
            $genre      =$_GET['genrebox'];
            $price      =$_GET['pricebox'];
            
            $stmt=$conn->prepare("  UPDATE games
                                    SET title=  :title,
                                    rating=     :rating,
                                    genre=      :genre,
                                    price=      :price
                                    WHERE gameid=   :gameid");
            
            $stmt->bindParam(":title",  $title);
            $stmt->bindParam(":rating", $rating);
            $stmt->bindParam(":genre",  $genre);
            $stmt->bindParam(":price",  $price);
            $stmt->bindParam(":gameid", $gameid);
            
            
            if($stmt->execute()){
                ?>
                    <script>alert("Record Updated");location.href="index.php";</script>
                <?php
            }
            
            else {
                ?>
                    <script>alert("Update failed");</script>
                <?php
            }
            
            
            
            
        }
        
        
        $gameid=$_GET['gameid'];
        $stmt=$conn->prepare("SELECT * FROM games WHERE gameid=:gameid");
        $stmt->bindParam(":gameid",$gameid);
        $stmt->execute();
        
        if($stmt->rowCount()>0){
            
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            
                echo '
                    <form name="update" action="" method="GET">
                    <input name="gameid" type="hidden" value="'.$row["gameid"].'">
                    <input name="titlebox" type="text" value="'.$row["title"].'">
                    <input name="ratingbox" type="text" value="'.$row["rating"].'">
                    <input name="genrebox" type="text" value="'.$row["genre"].'">
                    <input name="pricebox" type="text" value="'.$row["price"].'">
                    <input type="submit" name="update">
                    </form>
                ';
            }
        }
        
        
    }
    else {
        header("Location: index.php");
    }
    
    require('header.php');
    require('footer.php');
?>