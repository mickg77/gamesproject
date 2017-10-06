
<?php
    require('connect.php');
    require('functions.php');
    session_start();
    
    //the below info only shown if admin logged in.
    if($_SESSION['admin']){
        require('header.php');
        
        if(isset($_GET['update'])){
            
            $gameid     =$_GET['gameid'];
            $title      =$_GET['titlebox'];
            $rating     =$_GET['ratingbox'];
            $genre      =$_GET['genrebox'];
            $price      =$_GET['pricebox'];
            
            $stmt=$conn->prepare("UPDATE games
                                  SET   title   =:title,
                                        rating  =:rating,
                                        genre   =:genre,
                                        price   =:price
                                        WHERE gameid=:gameid
                                ");
                                
            $stmt->bindParam(":gameid", $gameid);
            $stmt->bindParam(":title",  $title);
            $stmt->bindParam(":rating", $rating);
            $stmt->bindParam(":genre",  $genre);
            $stmt->bindParam(":price",  $price);
            if($stmt->execute()){
                ?>
                <script>alert("Record Amended");location.href="index.php"</script>
                <?php
            }
            
        }
        
        if(isset($_GET['gameid'])){
            
            $gameid= $_GET['gameid'];
            
            $stmt=$conn->prepare("SELECT * FROM games WHERE gameid=:gameid");
            $stmt->bindParam(":gameid",$gameid);
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                //we have found at least 1 record
               while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                   
                   echo '
                    <form name="update" action="" method="GET">
                        <input name="gameid"    type="hidden" value="'.$row["gameid"].'">
                        <input name="titlebox"  type="text"   value="'.$row["title"].'">
                        <input name="ratingbox" type="text"   value="'.$row["rating"].'">
                        <input name="genrebox"  type="text"   value="'.$row["genre"].'">
                        <input name="pricebox"  type="text"   value="'.$row["price"].'">
                        <input type="submit" name="update">
                   
                   
                   ';
                   
               }
            
            }
        }
        
        
        
    }
    else {
        ?>
        <script>alert("Please Login");location.href="index.php";</script>
        <?php
    }



?>