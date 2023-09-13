<?php
if(isset($_GET['id'])){
    $editId=$_GET['id'];
    $getLeader=mysqli_query($conn, "SELECT * FROM leaders WHERE id={$editId} ");
    $query = mysqli_fetch_array($getLeader);
    if(!$query){
        echo "Query Failed" . mysqli_error($conn);
    }
    $leaderId=$query['id'];
    $leaderName=$query['name'];
    $leaderRole=$query['position'];
    $leaderImage=$query['image'];

?> <?php

             if(isset($_POST['edit_leader'])){
                $leaderName=$_POST['name'];
                $leaderRole=$_POST['position'];
                $newImage=$_FILES['image']['name'];
                $tempImage=$_FILES['image']['tmp_name'];
                $leaderImage='../../About/images/' .$newImage;
                move_uploaded_file($tempImage, $leaderImage);
                if(empty($newImage)){
                    $query=mysqli_query($conn, "SELECT * FROM leaders WHERE id={$editId} ");
                    $getLeader=mysqli_fetch_assoc($query);
                    $leaderImage=$getLeader['image']; 
                }
                $insertLeader= mysqli_query($conn, "UPDATE leaders SET name='{$leaderName}', position='{$leaderRole}', image='{$leaderImage}' WHERE id=$editId" );

                if(!$insertLeader){
                    echo "Qeury failed" . mysqli_error($conn);
                } 
             } else {
                $insertLeader=false;
             }
           

                ?>
            <div class="col-xl-12 p-2">
                <?php  if ($insertLeader){ echo "<p class='text-success'>Leader Updated Successfully:    <a class='text-decoration-none' href='index.php'>View leader info</a></p>";} ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='leaderName'>Name</label>
                <input class="form-control mb-3" type='text' name='name' value="<?php echo $leaderName; ?>" required> 
                <label for='leaderposition'>Role</label>
                <input class="form-control mb-3" type='text' name='position' value="<?php echo $leaderRole; ?>" required>
                <label  for='leaderImage'>Image</label>
                <img width='50'  style='border-radius:10%;' class="mb-3 mr-2" src="<?php echo $leaderImage; ?>">
                <input class="form-control mb-3" type='file' name='image'> 
                <button type='submit' name='edit_leader' class='btn btn-success'>Update</button> 
            </form>
         </div>
            <?php } ?>
         
       

  