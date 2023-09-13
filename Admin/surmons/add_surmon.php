<?php 
if(isset($_POST['add_service'])){
    $Title=$_POST['title'];
    $Preacher=$_POST['preacher'];
    $date=$_POST['date'];
    $url=$_POST['url'];
    $add_service_query = mysqli_query($conn, "INSERT INTO surmons (title, preacher, url, date) VALUES ('$Title', '$Preacher', '$url','$date')");
    if(!$add_service_query){
        echo "Query Failed" . mysqli_error($conn);
    } } else {
        $add_service_query = false;
    }

    

    





 ?>       
        
        
        
        
        
        
        
        
        <div class="col-xl-12 p-2">
        <?php  if ($add_service_query){ echo "<p class='text-success'>Item Added Successfully:    <a class='text-decoration-none' href='index.php'>View Surmons info</a></p>";} ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='serviceName'>Title</label>
                <input class="form-control mb-3" type='text' name='title' required> 
                <label for='preacher'>Teacher</label>
                <input class="form-control mb-3" type='text' name='preacher' required>
                <label  for='url'>URL</label>
                <input class="form-control mb-3" type='text' name='url' required> 
                <label for='date'>Date</label>
                <input class="form-control mb-3" type='date' name='date' required>
                <button type='submit' name='add_service' class='btn btn-warning '>Add</button> 
            </form>
         </div>
        
         