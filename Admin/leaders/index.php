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
<?php $del_leader=false; ?>                
<?php if(isset($_GET['delete'])){
$delId=$_GET['delete'];
$del_leader=mysqli_query($conn, "DELETE FROM leaders WHERE id=$delId");
}
?>

<!-- DeleteAll -->
<?php if(isset($_POST['deleteLeader'])){
if(isset($_POST['leadersid']) && is_array($_POST['leadersid'])){
$delId=$_POST['leadersid'];
for($j=0; $j < count($delId); $j++){
$id=$delId[$j];
$del_leader=mysqli_query($conn, "DELETE FROM leaders WHERE id=$id");
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
include "edit_leader.php";
break;  ?>
<?php       
case 'add' :
include "add_leader.php";

break;
default :
?>
<div class="col-lg-12 table-responsive">
    <!-- Leaders Table -->
    <form action="" method="post">
      <div class="col-xl-6 m-3"><button name="deleteLeader" type="submit" class="col-xl-3 btn btn-danger" onClick="return confirm('Do you want to delete the selected Leaders')" >Delete</button>
        <a href="index.php?source=add" class="col-xl-3 btn text-light btn-warning ">Add Leader</a></div>
       <?php if($del_leader){ echo "<p class='text-success'>Deleted Successfully</p>"; } ?>
    <table class="table table-bordered table-hover">
        <thead class="table-active">
            <tr>
            <th><input type="checkbox" name="leadersid" id="selectAllBoxes"></th>
            <th>leaders id</th>
            <th>leaders name</th>
            <th>leaders role</th>
            <th> leaders image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    <tr>
        <?php 
    $get_leaders = mysqli_query($conn, "SELECT * FROM leaders");
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $numRows= mysqli_num_rows($get_leaders);
    $pageShow = 5;
    $pageNumber = ceil($numRows/$pageShow);
    $startPage = ($page * $pageShow) - $pageShow;
    $per_page = mysqli_query($conn, "SELECT * FROM leaders LIMIT $startPage, $pageShow");
    $i=$startPage + 1;
    foreach($per_page as $item):
        $item_id = $item['id'];
        $item_image = $item['image'];
    ?>
            <td><input type="checkbox" class="checkBoxes"name="leadersid[]" value="<?php echo $item_id; ?>"></td>
            <td><?php echo $i++ ;?></td>
            <td><?php echo $item['name'] ;?></td>
            <td><?php echo $item['position'] ;?></td>
            <td><img src= "<?php echo $item_image ?>" width='50' height='50'></td>
            <td><?php echo "<a href='index.php?source=edit&id={$item_id}' class='text-decoration-none' >Edit "; ?></a></td>
            <td><?php echo "<a href='index.php?delete={$item_id}' class='text-decoration-none' onClick='return confirm(\"Do you want to remove this item?\")'>Delete</a>"; ?></td>
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
                   for($l=0; $l<4; $l++){
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