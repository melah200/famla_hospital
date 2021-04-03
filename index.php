	<?php include "includes/header.php";

	?>


    <div id="<?php if(isset($_SESSION['is_user_logged']) && $_SESSION['is_user_logged']) echo "wrapper"; ?>">

        <!-- Navigation -->
		<?php include "includes/navigation.php" ?>
	
        <div id="page-wrapper" style="padding: 0px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" style="background-color:#90caf9;margin-bottom:0px">
                        <h1 class="loginform-page-header text-center" style="color:white;margin-top: 0px;margin-bottom: 0px;padding: 5px 0">
                            Welcome To Famla Hospital <br>
                            <?php if(isset($_SESSION['user_access'])){ ?>
                            	<small style="color: white;">You are logged as <?php echo $_SESSION['username']; ?></small>
                            <?php }else{ ?>
                            	<small style="color:white;">Enter your Login Data</small>
                            <?php } ?>
                        </h1>
                    </div>
                    <?php 
                        if((isset($_SESSION['is_user_logged'])) && ($_SESSION['is_user_logged'] == true)){
                            //check if the user is the admin or employee
                            if(isset($_SESSION['user_access'])){
                                //login was successful
                                //include the sidebar. This should be included in navigation.php
                                echo "<div id='loginform' style='height:400px'></div>";
                            }
                        }
                        else{
                            // The login form is only display when the user is not logged
							include "includes/loginform.php";
                        }
                        
						?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	<?php include "includes/index_footer.php" ?>
