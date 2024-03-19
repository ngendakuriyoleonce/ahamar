<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Profi-Emp.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>Demande</a>
                        <ul class="sub-menu children dropdown-menu">                         
                            <li><a href="demande-conge.php"></i>Conge Annuel</a></li>
                            <li><a href="demande-circonstance.php">Conge de circonstance</a></li>

                            <?php if($_SESSION['SEXE']=='Female'){ ?>
                       <li><a href="CongeMaternite.php">Conge de maternité</a></li>

                            <?php } ?>

                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                     <a href="leavehistory.php" >Mes demande</a>
                  </li>
                   <li class="menu-item-has-children dropdown">
                     <a href="Profi-Emp.php" >Profil</a>
                  </li>

                    <li class="menu-item-has-children dropdown">
                     <a href="EmpChange-password.php" >Change password</a>
                  </li>
                     
                  

                   
                    
                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    