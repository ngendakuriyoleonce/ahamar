<?php
session_start();
include('admin/includes/config.php');
if(isset($_POST['sign'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $res=mysqli_query($con,"select * from tblemployees where  EmailId='$email' and Password='$password' and Status=1");
    $count=mysqli_num_rows($res);
    if($count>0){
        $row=mysqli_fetch_assoc($res);
        $_SESSION['ROLE']=$row['Role'];
        $_SESSION['USER_ID']=$row['IdEmp'];
        $_SESSION['NOM_USER']=$row['FirstName'];
        $_SESSION['PRENOM_USER']=$row['LastName'];
        $_SESSION['SEXE']=$row['Gender'];
        $_SESSION['EMAIL']=$row['EmailId'];
        header('location:admin/dashboard.php?IdEmp='.$_SESSION['USER_ID']);
        die();
    }else{
        echo "<script>alert('Invalid Details');</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Ahamr Burundi</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- section header start -->
      <div class="header_section">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="logo"><a href="index.html"><img src="images/ahamar.jpg " width="40px"></a></div>
               </div>
               <div class="col-md-9">
                  <div class="menu_text">
                     <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="services.html">SERVICES</a></li>
                        <li><a href="projects.html">PROJECTS</a></li>
                        <li><a href="contact.html">CONTACT US</a></li>
                        
                        
                        <div id="myNav" class="overlay">
                           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                           <div class="overlay-content">
                              <a href="index.php">HOME</a>
                              <a href="about.html">ABOUT</a>
                              <a href="services.html">SERVICES</a>
                              <a href="projects.html">PROJECTS</a>
                              <a href="contact.html">CONTACT US</a>
                             
                           </div>
                        </div>
                        <span  style="font-size:33px;cursor:pointer; color: #ffffff;" onclick="openNav()"><img src="images/toggle.png" class="toggle_menu"></span>
                  </div>
                  </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- section header end -->
      <!-- contact section start -->
      <div class="contact_section contact_main">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 padding_0">
                  <div class="contact_bg">
                     <div class="input_main">
                        <div class="container">

                           <h2 class="request_text">SE CONNECTER A L' APPLICATION</h2>
                           <form action="" method="post">
                              <div class="form-group">
                                 <input type="text" class="email-bt" placeholder="Your Email address" name="email" autocomplete="off" required="">
                              </div>
                              <div class="form-group">
                                 <input type="password" class="email-bt" placeholder="Password" name="password" autocomplete="off" required="">
                              </div>
                              
                           <button type="submit" style="width: 30%;padding: 12px 0px;font-size: 18px;
    border-radius: 10px;" name="sign" class="btn btn-dark btn-flat m-b-30 m-t-30">SE CONNECTER</button>
                           </form>
                        </div>
                     </div>

                     
                  </div>
               </div>
               <div class="col-md-6 padding_0">
                  <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63672.845666630084!2d29.784709706283362!3d-4.110963011952183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c0bf85a5a181f5%3A0xd97fbf13466b8c87!2sMakamba!5e0!3m2!1sen!2sbi!4v1691313843391!5m2!1sen!2sbi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="footer_section_2">
            <div class="container">
               <h2 class="addres_text">Addresse</h2>
               <div class="row map_addres">
                  <div class="col-sm-12 col-lg-4">
                     <div class="map_text"><img src="images/map-icon.png"><span class="map_icon">Face au bureu de LUMITEL</span></div>
                  </div>
                  <div class="col-sm-12 col-lg-4">
                     <div class="map_text"><img src="images/phone-icon.png"><span class="map_icon">( +22 7986543234 )</span></div>
                  </div>
                  <div class="col-sm-12 col-lg-4">
                     <div class="map_text"><img src="images/email-icon.png"><span class="map_icon">Ahamar@gmail.com</span></div>
                  </div>
               </div>
               <div class="social_icon">
                  <ul>
                     <li><a href="#"><img src="images/fb-icon.png"></a></li>
                     <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                     <li><a href="#"><img src="images/in-icon.png"></a></li>
                     <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <p class="copyright_text">Copyright 2023 All Right Reserved By.<a href="https://html.design"> Free  html Templates</p>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
            });
            
            $(".zoom").hover(function(){
            
            $(this).addClass('transition');
            }, function(){
            
            $(this).removeClass('transition');
            });
            });
            
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>
   </body>
</html>