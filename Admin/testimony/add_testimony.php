<?php 
if(isset($_POST['add_testimony'])){
    $Title=$_POST['title'];
    $Preacher=$_POST['preacher'];
    $date=$_POST['date'];
    $name =$_FILES['video']['name'];
    $urltemp=$_FILES['video']['tmp_name'];
    $url = "/Media/videos/". $name;
    move_uploaded_file($urltemp, "../../Media/videos/".$name);
    $add_testimony_query = mysqli_query($conn, "INSERT INTO testimony (title, preacher, url, date) VALUES ('$Title', '$Preacher', '$url','$date')");
    if(!$add_testimony_query){
        echo "Query Failed" . mysqli_error($conn);
    } } else {
        $add_testimony_query = false;
        
    }

    

    





 ?>       
        
        
        
        
        
        
        
        
        <div class="col-xl-12 p-2">
        <?php  if ($add_testimony_query){ echo "<p class='text-success'>Item Added Successfully:    <a class='text-decoration-none' href='index.php'>View testimony info</a></p>";} ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='testimonyName'>Title</label>
                <input class="form-control mb-3" type='text' name='title' required> 
                <label for='preacher'>Speaker</label>
                <input class="form-control mb-3" type='text' name='preacher' required>
                <label  for='url'>video</label>
                <input class="form-control mb-3" type='file' name='video'> 
                <label for='date'>Date</label>
                <input class="form-control mb-3" type='date' name='date' required>
                <button type='submit' name='add_testimony' class='btn btn-warning '>Add</button> 
            </form>
         </div>
        
         