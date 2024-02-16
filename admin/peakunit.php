<?php 
    require_once('head_html.php'); 
    require_once('../Includes/config.php'); 
    require_once('../Includes/session.php'); 
    require_once('../Includes/admin.php'); 
    if ($logged==false) {
         header("Location:../index.php");
    }
?>
<body>

    <div id="wrapper">

        <?php 
            require_once("nav.php");
            require_once("sidebar.php");
        ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            peakunit
                        </h1>
                        <ol class="breadcrumb">
                          <li>peakunit</li>
                          <li class="active">Details</li>
                        </ol>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                    
                            <div class="table-responsive" style="padding-top: 0">
                                <table class="table table-hover table-striped table-bordered table-condensed">
                                    <thead>
                                        <tr>
					                        <th>uid</th>
                                            <th>PeakTime</th>
                                            <th>unit for peak</th>
                                            <th>charges for peak </th>
                                            <th>off peak time</th>
					                        <th>units_for_offpeak</th>
                                            <th>charges_for_peak</th>
                                            <th>total bill amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            

                                            $id=$_SESSION['aid'];
                                            $query1 = "SELECT * FROM  peakunit ";
                                            $result1 = mysqli_query($con,$query1);
                                            $row1 = mysqli_fetch_row($result1);
                                            $numrows = $row1[0];
                                            include("paging1.php");
                                            $result = retrieve_complaints_history($_SESSION['aid'],$offset, $rowsperpage);
                                            
                                            while($row = mysqli_fetch_assoc($result1)){
                                            
                                            $cnt=1
                                           
                                            ?>
                                                <tr>
                                                    <td height="50"><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['peak time'] ?></td>
                                                    <td><?php echo $row['units for peak'] ?></td>
                                                    <td><?php echo $row['charges for peak'] ?></td>
                                                    <td><?php echo $row['off peak time'] ?></td>
                                                    <td><?php echo $row['units for off peak'] ?></td>
                                                    <td><?php echo $row['charges for off peak'] ?></td>
                                                    <td><?php echo $row['total bill ammount'] ?></td>


                                                   <!-- <td width="70">
                                                    <form action="process_peakunit.php" method="post">
                                                        <input type="hidden" name="cid" value=< >
                                                        <button type="submit" name="complaint_process" class="btn btn-success form-control">PROCESS COMPLAINT  </button>
                                                    </form> -->
                                                    
                                                </tr>
                                            <?php $cnt++; 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php include("paging2.php");  ?>
                            </div>
                            <!-- /.table-responsive -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

 <?php 
    require_once("footer.php");
    require_once("js.php");
?>

</body>

</html>