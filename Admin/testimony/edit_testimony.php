<?php
if(isset($_GET['id'])){
    $editId=$_GET['id'];
    $query_fetch=mysqli_query($conn, "SELECT * FROM testimony WHERE id={$editId} ");
    $query = mysqli_fetch_array($query_fetch);
    if(!$query){
        echo "Query Failed" . mysqli_error($conn);
    }
    $itemId=$query['id'];
    $itemName=$query['title'];
    $itemRole=$query['preacher'];
    $itemDate=$query['date'];
    $itemurl=$query['url'];

} ?> <?php

             if(isset($_POST['edit_item'])){
                $itemName=$_POST['title'];
                $itemRole=$_POST['preacher'];
                $name =$_FILES['video']['name'];
                $urltemp=$_FILES['video']['tmp_name'];
                $url = "/Media/videos/". $name;
                move_uploaded_file($urltemp, "../../Media/videos/".$name);
                if(empty($name)){
                    $query = mysqli_query($conn,"SELECT * FROM testimony WHERE id = $editId");
                    $query=mysqli_fetch_assoc($query);
                    $url = $query['url'];
                }
                $insertItem= mysqli_query($conn, "UPDATE testimony SET title='{$itemName}', preacher='{$itemRole}', url='{$url}', date='{$itemDate}' WHERE id=$editId" );


                if(!$insertItem){
                    echo "Qeury failed" . mysqli_error($conn);
                } 
             } else {
                $insertItem=false;
             }
           

                ?>
            <div class="col-xl-12 p-2">
                <?php  if ($insertItem){ echo "<p class='text-success'>item Updated Successfully:    <a class='text-decoration-none' href='index.php'>View item info</a></p>";} ?>
            <form action='' enctype='multipart/form-data' method='post'  >
                <label for='itemtitle'>Title</label>
                <input class="form-control mb-3" type='text' name='title' value="<?php echo $itemName; ?> " required> 
                <label for='itempreacher'>Speaker</label>
                <input class="form-control mb-3" type='text' name='preacher' value="<?php echo $itemRole; ?> " required>
                <label for='itemurl'>video</label>
                <input class="form-control mb-3" type='file' name='video'>
                <label  for='itemDate'>Date</label>
                <input class="form-control mb-3" type='date' name='date'  value="<?php echo $itemDate; ?>" required> 
                <button type='submit' name='edit_item' class='btn btn-success'>Update</button> 
            </form>
         </div>
         
       
         <!-- value="<?php //echo $itemurl; ?> " -->
