<?php
if(isset($_GET['id'])){
    $editId=$_GET['id'];
    $query_fetch=mysqli_query($conn, "SELECT * FROM picture WHERE id={$editId} ");
    $query = mysqli_fetch_array($query_fetch);
    if(!$query){
        echo "Query Failed" . mysqli_error($conn);
    }
    $itemId=$query['id'];
    $itemName=$query['comment'];
    $itemDate=$query['date'];
    $itemurl=$query['url'];

} ?> <?php

             if(isset($_POST['edit_item'])){
                $itemName=$_POST['comment'];
                $name =$_FILES['image']['name'];
                $urltemp=$_FILES['image']['tmp_name'];
                $url = "/Media/images/". $name;
                move_uploaded_file($urltemp, "../../Media/images/" . $name);
                if(empty($name)){
                    $query = mysqli_query($conn,"SELECT * FROM pictured WHERE id = $editId");
                    $newquery=mysqli_fetch_array($query);
                    $url = $newquery['url'];
                }
                $insertItem= mysqli_query($conn, "UPDATE picture SET comment='{$itemName}', url='{$url}', date='{$itemDate}' WHERE id=$editId" );


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
                <label for='itemcomment'>comment</label>
                <input class="form-control mb-3" type='text' name='comment' value="<?php echo $itemName; ?>"> 
                <label for='itemurl'>image</label>
                <input class="form-control mb-3" type='file' name='image'>
                <label  for='itemDate'>Date</label>
                <input class="form-control mb-3" type='date' name='date'  value="<?php echo $itemDate; ?>" required> 
                <button type='submit' name='edit_item' class='btn btn-success'>Update</button> 
            </form>
         </div>
         
       
         <!-- value="<?php //echo $itemurl; ?> " -->
