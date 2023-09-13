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
<?php $del_bible=false; ?>                
<?php if(isset($_GET['delete'])){
$delId=$_GET['delete'];
$del_bible=mysqli_query($conn, "DELETE FROM testimony WHERE id=$delId");
}
?>

<!-- DeleteAll -->
<?php if(isset($_POST['deletebible'])){
if(isset($_POST['bibleid']) && is_array($_POST['bibleid'])){
$delId=$_POST['bibleid'];
for($j=0; $j < count($delId); $j++){
$id=$delId[$j];
$del_bible=mysqli_query($conn, "DELETE FROM testimony WHERE id=$id");
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
   
   
    include "edit_testimony.php";
break;  ?>
<?php       
case 'add' :
    

    
include "add_testimony.php";

break;
default :
?>
<div class="col-lg-12 table-responsive">
    <!-- Leaders Table -->
    <form action="" method="post">
      <div class="col-xl-6 m-3"><button name="deletebible" type="submit" class="col-xl-3 btn btn-danger" onClick="return confirm('Do you want to delete the selected testimonies')" >Delete</button>
        <a href="index.php?source=add" class="col-xl-4 btn text-light btn-warning ">Add Testimony</a></div>
       <?php if($del_bible){ echo "<p class='text-success'>Deleted Successfully</p>"; }  ?>
    <table class="table table-bordered table-hover">
        <thead class="table-active">
            <tr>
            <th><input type="checkbox" name="bibleid" id="selectAllBoxes"></th>
            <th>testimony Number</th>
            <th>Speaker</th>
            <th>Title</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    <tr>
        <?php 
    $get_bible = mysqli_query($conn, "SELECT * FROM testimony");
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $numRows= mysqli_num_rows($get_bible);
    $pageShow = 8;
    $pageNumber = ceil($numRows/$pageShow);
    $startPage = ($page * $pageShow) - $pageShow;
    $reverse= $numRows - (($page-1) * $pageShow);
    $per_page = mysqli_query($conn, "SELECT * FROM testimony ORDER by id DESC LIMIT $startPage, $pageShow");
    $i=$reverse;
    foreach($per_page as $bible):
        $bible_id = $bible['id'];
    ?>
            <td><input type="checkbox" class="checkBoxes"name="bibleid[]" value="<?php echo $bible_id; ?>"></td>
            <td><?php echo $i-- ;?></td>
            <td><?php echo $bible['preacher'] ;?></td>
            <td><?php echo $bible['title'] ;?></td>
            <td><?php echo $bible['date'] ;?></td>
            <td><?php echo "<a href='index.php?source=edit&id={$bible_id}' class='text-decoration-none' >Edit "; ?></a></td>
            <td><?php echo "<a href='index.php?delete={$bible_id}' class='text-decoration-none' onClick='return confirm(\"Do you want to remove this testimony?\")'>Delete</a>"; ?></td>
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
            <?php include "../../Include/admin_footer.php"; ?>
                
</div>



            
            </div>
              
          
            
                </main>  
            </div>  
      </div><?php break; } ?>
    
      </html>