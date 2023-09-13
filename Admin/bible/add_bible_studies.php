<?php 
if(isset($_POST['add_bible_studies'])){
    $Title=$_POST['title'];
    $Preacher=$_POST['preacher'];
    $date=$_POST['date'];
    $name =$_FILES['video']['name'];
    $urltemp=$_FILES['video']['tmp_name'];
    $url = "/Service/videos/". $name;
    move_uploaded_file($urltemp, "../../Service/videos/".$name);
    $add_bible_studies_query = mysqli_query($conn, "INSERT INTO bible_studies (title, preacher, url, date) VALUES ('$Title', '$Preacher', '$url','$date')");
    if(!$add_bible_studies_query){
        echo "Query Failed" . mysqli_error($conn);
    } } else {
        $add_bible_studies_query = false;
        
    }

    

    





 ?>       
        
        
        
        
        
        
        
        
        <div class="col-xl-12 p-2">
        <?php  if ($add_bible_studies_query){ echo "<p class='text-success'>Item Added Successfully:    <a class='text-decoration-none' href='index.php'>View bible_studies info</a></p>";} ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='bible_studiesName'>Title</label>
                <input class="form-control mb-3" type='text' name='title' required> 
                <label for='preacher'>Preacher</label>
                <input class="form-control mb-3" type='text' name='preacher' required>
                <label  for='url'>video</label>
                <input class="form-control mb-3" type='file' name='video'> 
                <label for='date'>Date</label>
                <input class="form-control mb-3" type='date' name='date' required>
                <button type='submit' name='add_bible_studies' class='btn btn-warning '>Add</button> 
            </form>
         </div>
        
         