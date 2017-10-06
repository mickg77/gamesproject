 <?php

 function display_stock(){
            global $conn;
            $stmt =$conn->prepare("SELECT * FROM games");
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                //we have found at least 1 record
                echo "<table border='1'>
                <th>ID</th>
                <th>Game Title</th>
                <th>Rating</th>
                <th>Genre</th>
                <th>Price</th>";
               
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    //repeats output for all games
                    echo "<tr>
                    <td>".$row['gameid']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['rating']."</td>
                    <td>".$row['genre']."</td>
                    <td>".$row['price']."</td>
                    <td><a href='index.php?gameid=".$row['gameid']."'>Delete</a></td>
                    <td><a href='update.php?gameid=".$row['gameid']."'>Update</a></td>
                    </tr>";
                    
                }
                echo "</table>";
            }
            else {
                echo "<p>No records found</p>";
            }
        }//end of display_stock function
        
    ?>