<?php include "../../config.php"; ?>
<?php include "../../Include/admin_header.php"; ?>
    <body class="sb-nav-fixed">
    <?php include "../../Include/admin_navigation.php"; ?>
    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
            <?php include "../../Include/side-bar.php"; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                    <div class="row">

<!-- Delete Leaders -->
<?php $del_picture=false; ?>                
<?php if(isset($_GET['delete'])){
$delId=$_GET['delete'];
$del_picture=mysqli_query($conn, "DELETE FROM picture WHERE id=$delId");
}
?>

<!-- DeleteAll -->
<?php if(isset($_POST['deletepicture'])){
if(isset($_POST['pictureid']) && is_array($_POST['pictureid'])){
$delId=$_POST['pictureid'];
for($j=0; $j < count($delId); $j++){
$id=$delId[$j];
$del_picture=mysqli_query($conn, "DELETE FROM picture WHERE id=$id");
}

}}
?>






<?php  if(isset($_GET['source'])){
$source = $_GET['source'];
} else {
$source = "";
}
switch($source){
case 'edit' : 
   
   
    include "edit_picture.php";
break;  ?>
<?php       
case 'add' :
    

    
include "add_picture.php";

break;
default :
?>
<div class="col-lg-12 table-responsive">
    <!-- Leaders Table -->
    <form action="" method="post">
      <div class="col-xl-6 m-3"><button name="deletepicture" type="submit" class="col-xl-3 btn btn-danger" onClick="return confirm('Do you want to delete the selected picturesd')" >Delete</button>
        <a href="index.php?source=add" class="col-xl-4 btn text-light btn-warning ">Add picture</a></div>
       <?php if($del_picture){ echo "<p class='text-success'>Deleted Successfully</p>"; } ?>
    <table class="table table-bordered table-hover">
        <thead class="table-active">
            <tr>
            <th><input type="checkbox" name="pictureid" id="selectAllBoxes"></th>
            <th>picture Number</th>
            <th>Tag</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    <tr>
        <?php 
    $get_picture = mysqli_query($conn, "SELECT * FROM picture");
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $numRows= mysqli_num_rows($get_picture);
    $pageShow = 8;
    $pageNumber = ceil($numRows/$pageShow);
    $startPage = ($page * $pageShow) - $pageShow;
    $reverse= $numRows - (($page-1) * $pageShow);
    $per_page = mysqli_query($conn, "SELECT * FROM picture ORDER by id DESC LIMIT $startPage, $pageShow");
    $i=$reverse;
    foreach($per_page as $picture):
        $picture_id = $picture['id'];
    ?>
            <td><input type="checkbox" class="checkBoxes"name="pictureid[]" value="<?php echo $picture_id; ?>"></td>
            <td><?php echo $i-- ;?></td>
            <td><?php echo $picture['comment'] ;?></td>
            <td><?php echo $picture['date'] ;?></td>
            <td><?php echo "<a href='index.php?source=edit&id={$picture_id}' class='text-decoration-none' >Edit "; ?></a></td>
            <td><?php echo "<a href='index.php?delete={$picture_id}' class='text-decoration-none' onClick='return confirm(\"Do you want to remove this picture?\")'>Delete</a>"; ?></td>
    </tr>
    <?php endforeach;  ?>
    </tbody>
    </table>
    
    </form>
    

                </div>
          
    </div>
    
    <?php ?>
    </div>
    
<script type="text/javascript">
             var selectAllCheckbox = document.getElementById('selectAllBoxes');

                selectAllCheckbox.addEventListener('click', function () {
                    var allCheckboxes = document.querySelectorAll('.checkBoxes');

                    for (var i = 0; i < allCheckboxes.length; i++) {
                        allCheckboxes[i].checked=selectAllBoxes.checked;
                        // if (selectAllCheckbox.checked) {
                        //     allCheckboxes[i].checked = true;
                        // } else {
                        //     allCheckboxes[i].checked = false;
                        // }
                    }
                });


 </script>



                
</div>



            
            </div>
              
            <hr>
            <ul class="text-center">
                <?php  echo "<li class='btn border border-1 border-info'><a class='text-decoration-none ' href='index.php?page=1'>First</a></li>";?>
                <?php 
                if(isset($_GET['page'])){
                    $This=$_GET['page'] ;
                } else {
                    $This = 1;
                }
                $j = $This;
                $j=$j-2;
                   for($l=0; $l<5; $l++){
                    ?>
               <?php 
                if($page==$j){   
                    ?> 
                  <a class='active-link text-decoration-none' href='index.php?page=<?php echo $j;?>'><li class='btn btn-warning' ><?php echo $j;?></li></a>
                <?php } else { ?>  
                <?php if(!($j>$pageNumber) && !($j<=0)){?>
                <a class='text-decoration-none ' href='index.php?page=<?php echo $j;?>'><li class='btn border border-1 border-info text-info'><?php echo $j;?></li></a>
               <?php }?>
             <?php } $j++; } ?>
             <?php echo "<li class='btn border border-1 border-info'><a class='text-decoration-none ' href='index.php?page=$pageNumber'>Last</a></li>"; ?>
            </ul>
            
                </main>  
            </div>  
      </div><?php break; } ?>
      <?php include "../../Include/admin_footer.php"; ?>
      </html>