<?php 
session_start();  
include('includes/config.php');
if (isset($_SESSION['USER_ID'])) {
   
}else{
   header("location:../index.php");
}
$msg="";
if (isset($_POST['modemp'])) {
    $did=$_GET['empid'];
   
    $nom=$_POST['nom'];
    $Prenom=$_POST['Prenom'];
    $Sexe=$_POST['Sexe'];
    $Adresse=$_POST['Adresse'];
    $Telephone=$_POST['Telephone'];
    
    $Departement=$_POST['Departement'];
    $verfietel="/^[0-9\d]+$/";
     $verfieNom="/^[a-zA-Z\s]+$/";
     $verfiepNom="/^[a-zA-Z\s]+$/";
     if (preg_match($verfieNom, $nom)) {
        if (preg_match($verfiepNom,$Prenom)) {
            
             if (preg_match($verfietel, $Telephone)) {
             
    mysqli_query($con,"update tblemployees set FirstName='$nom',LastName='$Prenom',Gender='$Sexe',Department='$Departement',Address='$Adresse',Phonenumber='$Telephone' where IdEmp='$did'");
    $msg="Employee updated Successfully";

     }else{
     $msg="The Phone Number is not valid";   
    }
    
    }else{
       $msg="The Last Name is not valid"; 
    }
        }else{
     $msg="The Frist Name is not valid";       
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
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

   <?php include('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include('includes/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><strong>Modifier</strong> employé</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php"><strong>Dashboard</strong></a></li>
                                    
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
                                <strong class="card-title">Modifier Employé</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        
                                        
                                        <form action="#" method="post" novalidate="novalidate">
                                               <?php if($msg){?>  <div class="alert alert-warning alert-dismissible fade show" role="alert">
   <?php echo $msg ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

     
                                   </div> <?php } ?>
                                           
                                           <?php    
                               $did=$_GET['empid'];
                               $res=mysqli_query($con,"SELECT * from  tblemployees where IdEmp='$did'");
                               $query=mysqli_num_rows($res);
                            if($query> 0)

                            {
                                while ($row=mysqli_fetch_assoc($res)) {
                                   
                               
                                            ?>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Matricule</label>
                                                <input   name="matricule" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $row["EmpId"] ?>" autocomplete="off" readonly>
                                            </div>
                                          
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Nom</label>
                                                        <input value="<?php echo $row["FirstName"] ?>" name="nom" type="text" class="form-control cc-exp" autocomplete="off">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Prenom</label>
                                                    <div class="input-group">
                                                        <input value="<?php echo $row["LastName"] ?>" name="Prenom" type="tel" class="form-control cc-cvc" value="" data-val="true"  autocomplete="off">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Email</label>
                                                        <input value="<?php echo $row["EmailId"] ?>" name="Email" type="email" class="form-control cc-exp" readonly>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Adresse</label>
                                                        <input value="<?php echo $row["Address"] ?>" name="Adresse" type="tel" class="form-control cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Telephone</label>
                                                    <div class="input-group">
                                                        <input value="<?php echo $row["Phonenumber"] ?>" name="Telephone" type="tel" class="form-control cc-cvc" value="" data-val="true"  autocomplete="off" maxlength="10" >
                                                       
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                       <label for="cc-payment" class="control-label mb-1">Sexe</label>
                                                <select class="browser-default form-control" name="Sexe" autocomplete="off">
                                            <option value="<?php echo $row["Gender"] ?>"><?php echo $row["Gender"] ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>  
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Departement</label>
                                                    <select class="form-control" name="Departement">
                                                        <?php 
                                                        $resi=mysqli_query($con,"SELECT * from  tbldepartments");
                               $queryi=mysqli_num_rows($resi);
                            if($queryi> 0)

                            {
                                while ($ro=mysqli_fetch_assoc($resi)) {?>
                                    <option value="<?php echo $ro["IdDep"] ?>"<?php if ($row["Department"]==$ro["IdDep"]) echo "selected"?>> <?php echo $ro["DepartmentName"] ?></option>
 
                                                     <?php }} ?>    
                                                    </select>
                                                </div>
                                            </div>

                                          




                                          
                                        <?php   }} ?>
                                            <div>
                                                <button id="payment-button" type="submit" name="modemp" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount">UPDATE</span>
                                                   
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

              

                

              

               

               

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

    <<?php include('includes/footer.php');?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>


</body>
</html>
