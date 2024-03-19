<?php include('config.php');
 

?>
<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php"><img src="images/ahamar.jpg" alt="Logo" width="40px"></a>
                    <a class="navbar-brand hidden" href="dashboard.php">Ahmar</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
 
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        

                        

                        
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: blue">
                            <strong><?php echo $_SESSION['NOM_USER']." ".$_SESSION['PRENOM_USER']  ?></strong>
                        </a>

                        <div class="user-menu dropdown-menu">
                          
                           <a class="nav-link" href="EmpChange-password.php"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        