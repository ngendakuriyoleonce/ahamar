<?php 
session_start();
ob_clean();
include('includes/config.php');
if (isset($_SESSION['USER_ID'])) {
   
}else{
   header("location:../index.php");
}
if($_SESSION['ROLE']!=1){
    header('location:../Profi-Emp.php?IdEmp='.$_SESSION['USER_ID']);
    die();
}
$totemp=0;
$res=mysqli_query($con,"select IdEmp from tblemployees");
$totemp=mysqli_num_rows($res);

#$totetype=0;
#$res=mysqli_query($con,"select IdT from tblleavetype");
#$totetype=mysqli_num_rows($res);

$totedep=0;
$res=mysqli_query($con,"select IdDep from tbldepartments");
$totedep=mysqli_num_rows($res);

 ?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ahamar burundi</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   
</head>


<body>
   
    <!-- Left Panel -->
    <?php include('includes/sidebar.php');?>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('includes/header.php');?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-user text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Employés</div>
                                            <div class="stat-text">Total: <?php echo $totemp;?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-bag text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Services</div>
                                            <div class="stat-text">Total: <?php echo $totedep;?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!--  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-home text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Type Congés</div>
                                            <div class="stat-text">Total: <?php echo $totetype;?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    
                </div>
                <!-- /Widgets -->
              
                <div class="clearfix"></div>

                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title"><strong>Congés</strong> Recents </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>Nom Employe</th>
                                                    <th>Type conge</th>
                                                    <th>Date demande</th>
                                                     <th>Statut</th>
                                                     <th>Action</th>
                                                      </tr>
                                                       <?php 

                                $res=mysqli_query($con,"SELECT tblleaves.IdLeave as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.IdEmp,tblleaves.LeaveType ,tblleaves.PostingDate,tblleaves.Status,tblleaves.empid from tblleaves join tblemployees on tblleaves.empid=tblemployees.IdEmp  order by lid desc limit 6");
                            $cnt=1;
                            $query=mysqli_num_rows($res);
                            if($query> 0)

                            {
                         while ($row=mysqli_fetch_assoc($res)) {
         
                                       ?>   
                                                  
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial"><?php echo $cnt ?></td>
                                                     <td> <a style="color: blue" href="edit-employe.php?empid=<?php echo $row['IdEmp'];?>"target="_blank"><?php echo $row['FirstName']." ". $row['LastName']; ?> (<?php echo $row['EmpId'];?>)</a> </td>
                                                    <td> <?php echo $row['LeaveType'] ?> </td>
                                                    <td> <?php echo $row['PostingDate'] ?> </td> 
                                                    <td><?php 
                                                    if($row['Status']==1){ ?>
                                                 <span style="color: green">Accepté</span>
                                                 <?php } 
                                                 if($row['Status']==2)  { ?>
                                                <span style="color: red">Refusé</span>
                                                 <?php } 
                                                 if($row['Status']==0)  { ?>
                                                 <span style="color: blue">en attente</span>
                                                        <?php } ?></td>                           
                                                    <td><a href="leave-details.php?leaveid=<?php echo $row['lid'];?>" class="btn btn-primary btn-sm" > <i class="ti-eye"></i> Détails</a>
                                                    </td>

                                                    
                                                </tr>
                                               <?php $cnt++;} }?>
                                            </tbody>
                                        </table>
                                         

                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                      
                    </div>
                </div>
                <!-- /.orders -->
                
               
              
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
       <?php include('includes/footer.php');?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    
    </script>
</body>
</html>
