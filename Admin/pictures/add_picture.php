<?php 
if(isset($_POST['add_picture'])){
    $comment=$_POST['comment'];
    $date=$_POST['date'];
    $name =$_FILES['image']['name'];
    $urltemp=$_FILES['image']['tmp_name'];
    $url = "/Media/images/". $name;
    move_uploaded_file($urltemp, "../../Media/images/".$name);
    $add_picture_query = mysqli_query($conn, "INSERT INTO picture (comment, url, date) VALUES ('$comment', '$url','$date')");
    if(!$add_picture_query){
        echo "Query Failed" . mysqli_error($conn);
    } } else {
        $add_picture_query = false;
        
    }

    

    





 ?>       
        
        
        
        
        
        
        
        
        <div class="col-xl-12 p-2">
        <?php  if ($add_picture_query){ echo "<p class='text-success'>Item Added Successfully:    <a class='text-decoration-none' href='index.php'>View picture info</a></p>";} ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='comment'>Tag</label>
                <input class="form-control mb-3" type='text' name='comment'>
                <label  for='url'>video</label>
                <input class="form-control mb-3" type='file' name='image'> 
                <label for='date'>Date</label>
                <input class="form-control mb-3" type='date' name='date' required>
                <button type='submit' name='add_picture' class='btn btn-warning '>Add</button> 
            </form>
         </div>
        
         