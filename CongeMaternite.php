<?php  
if (isset($_SESSION['USER_ID'])==0) {
   
}else{
   header("location:index.php");
}
session_start(); 
include('include/config.php');
$msg="";
if (isset($_POST['add'])) {
    if ($_POST['Debut']!="" AND $_POST['Fin']!=""  AND $_POST['description']!="") {
    $empid=$_SESSION['USER_ID'];
    $type="Maternite";
    $Debit=$_POST['Debut'];
    $Fin=$_POST['Fin'];
    $status=0;
    $isread=0;
    $Jours=" Trois Mois";
    $description=$_POST['description'];
    
         mysqli_query($con,"INSERT INTO tblleaves(LeaveType,ToDate,FromDate,DayNumber,Description,Status,IsRead,empid) VALUES('$type','$Fin','$Debit','$Jours','$description','$status','$isread','$empid')");
    $msg="Votre demande est envoyee avec success";    
        
    
    }else{
      $msg="Tous les champs sont obigatoire";  
    }
    
    
 
}
 ?>
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ahamar Burundi</title>
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
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
   


    <!-- Left Panel -->

   <?php include('include/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include('include/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><strong>Demande</strong> congé </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="Profi-Emp.php"><strong>Dashboard</strong></a></li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Congé de Maternité</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        
                                        
                                        <form action="#" method="post" novalidate="novalidate">
                                               <?php if($msg){?>  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong></strong> <?php echo $msg ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

     
</div> <?php } ?>
                                           
                               
                                            <div class="row">
                                                
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Date Debit</label>
                                                    <div class="input-group">
                                                        <input  type="date" id="dateDebut" name="Debut" class="form-control cc-cvc"   autocomplete="off" required="">
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Date Fin</label>
                                                        <input  type="date" id="dateFin" name="Fin" class="form-control cc-exp" autocomplete="off" required="" readonly>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            
                                            
                                            <div class="row">
                                                
                                                <div class="col-12">
                                                    <label for="x_card_code" class="control-label mb-1">Description</label>
                                                    <div class="input-group">
                                                         <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
                                                       
                                                    </div>
                                                </div>
                                            </div><br>

                                            
                                        
                                            <div>
                                                <button id="payment-button" type="submit" name="add" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount">ADD</span>
                                                   
                                                </button>
                                            </div>
                                        </form>
                                       <script >
    document.getElementById("dateDebut").addEventListener("change",
    function (){
        var dateDebut=new Date(document.getElementById("dateDebut").value);
        
        var dateFin=new Date(dateDebut);
        dateFin.setMonth(dateFin.getMonth()+3).innerHTML=dateFin;

        document.getElementById("dateFin").value=dateFin.toISOString().slice(0,10);
    });
   
    document.getElementById("dateFin").addEventListener("change",
    function (){
        var dateDebut=new Date(document.getElementById("dateDebut").value);
        
        var dateFin=new Date(dateDebut);
        dateFin.setMonth(dateFin.getMonth()+3).innerHTML=dateFin;

        document.getElementById("dateFin").value=dateFin.toISOString().slice(0,10);
    });
</script>          </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

              

                

              

               

               

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <?php include('include/footer.php');?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>