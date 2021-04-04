    </div>
    <!-- /#wrapper -->
	<!-- Introduce the footer here -->
	
<?php if(isset($_SESSION['is_user_logged']) && ($_SESSION['is_user_logged']) == false){ ?>	
	<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                <p>We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2020</span><span> </span><span>Company</span><span> - </span><span>All Rights Reserved.</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt>Address:</dt>
                <dd>798 South Park Avenue, New York, USA</dd>
              </dl>
              <dl class="contact-list">
                <dt>email:</dt>
                <dd><a href="mailto:#">compagny@email.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <dd><a href="tel:#">1.555.652.258</a> <span>or</span> <a href="tel:#">1.55.652.268</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Links</h5>
              <ul class="nav-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="#">Pricing</a></li>
              </ul>
            </div>
          </div>
        </div>

      </footer>
	
<?php } ?>
	

	<!-- End of footer code -->
    <!-- jQuery -->
	<script src="js/jquery.js"></script>
	<script src="js/sweetalert.js"></script>
    <!--<script src="js/jquery.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/hospital.js"></script>
	
	
<script>
$('.btn-del').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');	
	// alert(href);
	swal({
	  title: "Are you sure?",
	  text: "Once deleted, you will not be able to recover the data",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
		document.location.href = href;
	  } else {
		swal("The data was not deleted, it is safe!", {
			icon: "error",
		});  
	  }
	});
});

</script>

</body>

</html>