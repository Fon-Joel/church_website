<?php include "../config.php" ?>
<?php include "../Include/admin_header.php" ?>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
           <?php include "../Include/side-bar.php" ?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include "../Include/admin_navigation.php" ?>
                <!-- Page content-->
                <div class="container-fluid">
<div class="row">
<div class="mt-5 col-lg-12 table-responsive">
                    <!-- Leaders Table -->
                    <table class="table table-bordered table-hover">
                        <thead class="table-active"><tr>
                            <th>leaders id</th>
                            <th>leaders name</th>
                            <th>leaders role</th>
                            <th> leaders image</th>
                            <th>Edit</th>
                            <th>Delete</th></tr>
                        </thead>
                        <tbody>
                    <tr>
                        <?php 
                    $get_leaders = mysqli_query($conn, "SELECT * FROM leaders");
                    foreach($get_leaders as $leader){
                    ?>
                            <td><?php echo $leader['id'] ;?></td>
                            <td><?php echo $leader['name'] ;?></td>
                            <td><?php echo $leader['position'] ;?></td>
                            <td><?php echo "<img width='50'style='border-radius:50%;' src= ' /About/{$leader['image']} ' >" ;?></td>
                            <td></td>
                            <td></td>
                    </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "../Include/admin_footer.php" ?>