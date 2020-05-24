<?php include ('includes/connection.php'); ?>
<?php include('includes/adminheader.php');  ?>


 <div id="wrapper">
       
       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['name']; ?></small>
                        </h1>
<?php if($_SESSION['role'] == 'admin') {
?>
<h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" > Notes uploaded by various users</font></marquee></center>
                        </h3>
<div class="row">
<div class="col-lg-12">
        <div class="table-responsive">

<form action="" method="post">
            <table class="table table-bordered table-striped table-hover">


            <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type </th>
                        <th>Uploaded on</th>
                        <th>Uploaded by </th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Approve</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>

                 <?php

$query = "SELECT * FROM uploads ORDER BY file_uploaded_on DESC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_description = $row['file_description'];
    $file_type = $row['file_type'];
    $file_date = $row['file_uploaded_on'];
    $file_uploader = $row['file_uploader'];
    $file_status = $row['status'];
    $file = $row['file'];

    echo "<tr>";
    echo "<td>$file_name</td>";
    echo "<td>$file_description</td>";
    echo "<td>$file_type</td>";
    echo "<td>$file_date</td>";
    echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
    echo "<td>$file_status</td>";
    echo "<td><a href='allfiles/$file' target='_blank' style='color:green'>View </a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to approve this note?')\"href='?approve=$file_id'><i class='fa fa-times' style='color: red;'></i>Approve</a></td>";

    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=$file_id'><i class='fa fa-times' style='color: red;'></i>delete</a></td>";

    echo "</tr>";

}
}
?>


                </tbody>
            </table>
</form>
</div>
</div>
</div>
 <?php
 
    if (isset($_GET['del'])) {
        $note_del = mysqli_real_escape_string($conn, $_GET['del']);
        $file_uploader = $_SESSION['username'];
        $del_query = "DELETE FROM uploads WHERE file_id='$note_del'";
        $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('note deleted successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }

         if (isset($_GET['approve'])) {
        $note_approve = mysqli_real_escape_string($conn,$_GET['approve']);
        $approve_query = "UPDATE uploads SET status='approved' WHERE file_id='$note_approve'";
        $run_approve_query = mysqli_query($conn, $approve_query) or die (mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('note approved successfully');
            window.location.href='index.php';</script>";
        }
        else {
         echo "<script>alert('error occured.try again!');</script>";   
        }
        }
       

?>
<?php 
}
else {
    ?>


 <h3 class="page-header">
                            <center> <marquee width = 70% ><font color="green" ><?php echo $_SESSION['course']; ?> Engineering </font><font color="brown"> notes uploaded by various users</font></marquee></center>
                        </h3>

                    </div>
                </div>

<div class="w3-cell-row">

<form action="" method="post">


 <?php
                 $currentusercourse = $_SESSION['course'];

$query = "SELECT * FROM uploads WHERE file_uploaded_to = '$currentusercourse' AND status = 'approved' ORDER BY file_uploaded_on DESC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_description = $row['file_description'];
    $file_type = $row['file_type'];
    $file_date = $row['file_uploaded_on'];
    $file = $row['file'];
    $file_uploader = $row['file_uploader'];

    $query2 = "SELECT * FROM users WHERE username = '$file_uploader'";
$profile = 2;
	$run_query2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	if (mysqli_num_rows($run_query2) > 0) {
while ($row2 = mysqli_fetch_array($run_query2)) {

     $profile = $row2['image'];
     
}
}

$variable = substr($file, 0, strpos($file, '.'));


    echo '<div class="w3-container w3-cell w3-half w3-border w3-margin-bottom w3-margin-top w3-border-blue w3-round-large" style="box-shadow: -10px 10px 5px grey;"><br>';

    echo '<img src="profilepics/' . $profile . '" alt="Avatar" class="w3-left w3-circle w3-margin-right w3-border w3-border-green" style="width:60px; box-shadow: 5px 5px 5px grey;">';

    echo '<a href = "viewprofile.php?name=' . $file_uploader . '", style="text-decoration:none"><h4 style="  text-shadow: 2px 2px 4px grey;">' . $file_uploader . '</h4><br></a>';
    echo '<span class="w3-right w3-opacity w3-border w3-border-brown"> ' . $file_date .  '</span>';

    echo '<h3 style="font-size:20px; text-shadow: 1px 1px 2px grey;"> Title : ' . $file_name . ' </h3>';
    echo '<h3 class="w3-border w3-white" style="font-size:20px; text-shadow: 1px 1px 2px grey;"> Description : ' . $file_description . ' </h3>';
    echo "<a href='allfiles/" . $file . "' target='_blank' style='color:green'>Download </a>";
    echo '<hr class="w3-clear">';

    echo '<iframe src="allfiles/' . $variable . '.pdf" width="100%" height="600px" frameborder="0"></iframe>';
    echo '</div>';
    // echo "<td>$file_description</td>";
    // echo "<td>$file_type</td>";
    // echo "<td><a href='viewprofile.php?name=$file_uploader' target='_blank'> $file_uploader </a></td>";
    // echo "<td>$file_date</td>";
    // echo "<td><a href='allfiles/$file' target='_blank' style='color:green'>Download </a></td>";
 


}
}
?>

<!-- </div>


                
           <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
           <img src="" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
           <a href = "", style="text-decoration:none"><h4>fasdfadsfdsfa</h4><br></a>
           <hr class="w3-clear">
<iframe src='allfiles/845248.pdf' width='100%' height='600px' frameborder='0'></iframe>
            
</div> -->



</form>
</div>
<?php }
 
 ?>




<script src="js/jquery.js"></script>

  
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
