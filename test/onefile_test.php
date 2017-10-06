<?php

require ("../connect.php");

$m_UsersStmt=$conn->prepare("SELECT * FROM users");
$m_UsersStmt->execute();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Test </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" />
    </head>
    <body>
        <div id="modalEditUser" class="modal fade" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit User</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="frmUsername">Username</label>
                            <input type="text" class="form-control" id="frmUsername">
                        </div>
                        <div class="form-group">
                            <label for="frmEmail">Email</label>
                            <input type="text" class="form-control" id="frmEmail">
                        </div>
                        <button type="submit" class="btn btn-default">Update User</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close (This will not submit)</button>
                  </div>
                </div>
            </div>
        </div>
        
        <div class="container">
          
          <?php if($m_UsersStmt->rowCount() == 0): ?>
              <p>There are no values in the table ;(</p>
          <?php else: ?>
              <table class="table table-stripped">
                  
                  <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Options</th>
                  </tr>
                  
                  <?php while($row=$m_UsersStmt->fetch(PDO::FETCH_ASSOC)): ?>
                  
                      <tr id="TABLE_USERS_ID_<?=$row['id']?>">
                          <td><?=$row['id']?></td>
                          <td><?=$row['User']?></td>
                          <td><?=$row['Email']?></td>
                          <td><a href="#" class="jq_frmEditUser" data-id="<?=$row['id']?>">Edit</a></td>
                      </tr>
                      
                  <?php endwhile; ?>
                  
              </table>
          <?php endif; ?>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    </body>
</html>