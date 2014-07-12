<?php include 'admin_layout/head.php';?>



<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="img/nTecnologia_instalaciones_foto2.jpg">
		    </div>
		    <div class="item">
		      <img src="img/nTecnologia_instalaciones_foto3.jpg">
		    </div>
		    <div class="item">
		      <img src="img/nTecnologia_instalaciones_foto4.jpg">
		    </div>
		    <div class="item">
		      <img src="img/nTecnologia_instalaciones_foto5.jpg">
		    </div>
		    <div class="item">
		      <img src="img/nTecnologia_instalaciones_foto6.jpg">
		    </div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
		</div>
    </div>
  </div>
</div>


<?php include 'admin_layout/foot.php';?>




<?php do { ?>
<div class="item">
<img src="<?php echo $row_tec['foto']; ?>">
</div>
<?php } while ($row_tec = mysql_fetch_assoc($tec)); ?>



<?php do { ?>
                          <div class="col-xs-3"> <a data-toggle="modal" data-target="#myModal" class="thumbnail  thumb_hover" href=""> <img src="<?php echo $row_tec['foto']; ?>"> <i class="fa fa-search"></i> </a> </div>
                          <?php } while ($row_tec = mysql_fetch_assoc($tec)); ?>