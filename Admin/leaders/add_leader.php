<?php 
if(isset($_POST['add_leader'])){
    $leaderName=$_POST['name'];
    $leaderRole=$_POST['position'];
    $newImage=$_FILES['image']['name'];
    $tempImage=$_FILES['image']['tmp_name'];
    $leaderImage="../../About/images/" . $newImage;
    move_uploaded_file($tempImage, $leaderImage);
    $add_leader_query = mysqli_query($conn, "INSERT INTO leaders (name, position, image) VALUES ('$leaderName', '$leaderRole', '$leaderImage')");
    if(!$add_leader_query){
        echo "Query Failed" . mysqli_error($conn);
    } } else {
        $add_leader_query = false;
    }

    

    





 ?>       
        
        
        
        
        
        
        
        
        <div class="col-xl-12 p-2">
        <?php  if ($add_leader_query){ echo "<p class='text-success'>Leader Added Successfully:    <a class='text-decoration-none' href='index.php'>View leader info</a></p>";}  ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='leaderName'>Name</label>
                <input class="form-control mb-3" type='text' name='name' required> 
                <label for='leaderposition'>Role</label>
                <input class="form-control mb-3" type='text' name='position' required>
                <label  for='leaderImage'>Image</label>
                <input class="form-control mb-3" type='file' name='image' required> 
                <button type='submit' name='add_leader' class='btn btn-warning '>Add</button> 
            </form>
         </div>
        
         