<?php 
session_start();
if (isset($_SESSION['USER_ID'])) {
   
}else{
   header("location:../index.php");
}
$msg="";
include('includes/config.php');

# debit modifier n'est pas vues par vues
$isread=1;
$id=$_GET['leaveid'];
date_default_timezone_set('Africa/Bujumbura');
$admreactiondate=date('Y-m-d G:i:s ', strtotime("now"));
mysqli_query($con,"update tblleaves set IsRead='$isread' where IdLeave='$id'");
# debit modifier n'est pas vues par vues
# Fin Accepter ou refuser un conge
if(isset($_POST['update']))
{ 
    $msg="";
$lid=$_GET['leaveid'];
$description=$_POST['description'];
$status=$_POST['status'];
date_default_timezone_set('Africa/Bujumbura');
$admreactiondate=date('Y-m-d G:i:s ', strtotime("now"));
mysqli_query($con,"update tblleaves set AdminRemark='$description',Status='$status',AdminRemarkDate='$admreactiondate' where IdLeave='$lid'");
$msg="Leave updated Successfully";
}
#Fin Accepter ou refuser un conge
 ?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ahmar Burundi</title>
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
               
              
                <div class="clearfix"></div>

                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                     
                                    <h4 class="box-title"><strong>Detail</strong>  Congé </h4>
                                  <?php if($msg){?>  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Felicitation!</strong> <?php echo $msg ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

     
                                   </div> <?php } ?>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table id="example" class="display responsive-table ">
                                          <tbody>
                                                       <?php 

 
  $lid=$_GET['leaveid'];
   $res=mysqli_query($con,"SELECT tblleaves.IdLeave as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.IdEmp,tblemployees.Gender,tblemployees.Phonenumber,tblemployees.EmailId,tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.DayNumber,tblleaves.Description,tblleaves.PostingDate,tblleaves.Status,tblleaves.AdminRemark,tblleaves.AdminRemarkDate from tblleaves join tblemployees on tblleaves.empid=tblemployees.IdEmp  where tblleaves.IdLeave=$lid");
  $cnt=1;
$query=mysqli_num_rows($res);
if($query> 0)

                            {
                         while ($row=mysqli_fetch_assoc($res)) {
  

         
                                       ?>   
                                                  
                                            
                                             
                                                <tr>
                                                  
                                                    <td style="font-size:16px;"> <b>Employe Name :</b></td>
                                                     <td > <a style="color: blue" href="edit-employe.php?empid=<?php echo $row['IdEmp'];?>"target="_blank"><?php echo $row['FirstName']." ". $row['LastName']; ?></a> </td>
                                                     <td style="font-size:16px;"><b>Matricule:</b></td>
                                                     <td> <?php echo $row['EmpId'] ?> </td>
                                                     <td style="font-size:16px;"><b>Genre :</b></td>
                                                     <td> <?php echo $row['Gender'] ?> </td>
                                                    </tr>
                                                    <tr>
                                            <td style="font-size:16px;"><b>Email :</b></td>
                                           <td> <?php echo $row['EmailId'] ?> </td>
                                             <td style="font-size:16px;"><b> Contact :</b></td>
                                            <td> <?php echo $row['Phonenumber'] ?> </td>
                                            <td style="font-size:16px;"><b>Type congé :</b></td>
                                            <td> <?php echo $row['LeaveType'] ?> </td> 
                                             <td>&nbsp;</td> 
                                                    </tr>
                                                    <tr>
                                                     <td style="font-size:16px;"><b>Nombre Jours :</b></td>
                                            <td> <?php echo $row['DayNumber'] ?> </td>                               <td style="font-size:16px;"><b>Date congé:</b></td>
                                            <td><?php echo $row['FromDate'];?> to <?php echo $row['ToDate'];?></td>
                                            <td style="font-size:16px;"><b>Date Publication :</b></td>
                                           <td><?php echo $row['PostingDate'];?></td>
                                           </tr>
                                           <tr>
                                               <td style="font-size:16px;"><b>Employe Leave Description :</b></td>
                                            <td  colspan="5"><?php echo $row['Description'] ;?></td>
                                            <td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                           </tr>   
                                            <tr>
                                                <td style="font-size:16px;"><b>Statut congé :</b></td>
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
                                                        <td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                            </tr>
                                            <tr>
<td style="font-size:16px;"><b>Reaction Admin: </b></td>
<td colspan="5"><?php
if($row['AdminRemark']==""){
  echo "waiting for Approval";  
}
else{
echo $row['AdminRemark'];
}
?></td>
<td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
 </tr>

 <tr>
<td style="font-size:16px;"><b>Date Reaction admin: </b></td>
<td colspan=""><?php
if($row['AdminRemarkDate']==""){
  echo "NA";  
}
else{
echo $row['AdminRemarkDate'];
}
?></td>
        <td>&nbsp;</td>
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                             <td>&nbsp;</td> 
                                            </tr>
<?php 
if($row['Status']==0)
{

?>
<tr>
<!-- Modal -->
<div class="modal fade" id="accorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong> Admin</strong> reaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post">
  <div class="form-group">
    <label for="exampleFormControlSelect1"><strong> Action conge</strong> </label>
    <select class="form-control" name="status" id="exampleFormControlSelect1">
     <option value="">Choose your option</option>
    <option value="1">Approved</option>
    <option value="2">Not Approved</option>
      </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"><strong>Commentaire</strong></label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
  </div>
  

      </div>
      <div class="modal-footer">
        <button name="update" type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
</div>

</div>
 <td colspan="3">
  <a class="btn btn-info" data-toggle="modal" href="#accorder"  style="width:200px">Accorder</a>
</td>
      <?php  }?>      
      </form>               </tr>
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
