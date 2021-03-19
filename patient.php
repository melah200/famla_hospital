	<?php include "includes/header.php" ?>


    <div id="wrapper">

        <!-- Navigation -->
		<?php include "includes/navigation.php" ?>
        <?php

            //before the user make any action the session is checked first and if no session has been created then redirect to home page
            if(!isset($_SESSION['username'])){
                //The session is not created. redirect to home
                redirect('./index');
            }
        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small>User</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

	<?php include "includes/footer.php" ?>
