<?php
		require_once('Connections/koneksi.php');
?>
<!DOCTYPE html>
<html>
<title>Rumah Sehat</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="img/logo.png">
<link rel="stylesheet" href="style.css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/jssor.slider-22.1.8.mini.js" type="text/javascript"></script>
<script src="js/paralaxbg.js" type="text/javascript"></script>
<script src="js/paralaxbg.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);


            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);

        });
    </script>
    <style>
	
        
    </style>
   
	<body>
<?php
	include"menu.php";
?>
<div style="height:0px;width:100%;">
</div>
<div class="slide">
	<?php include"slide.php";?>
</div>

<div class="row-padding txt-center txt-margin-top" style="position:relative;">
<div class="txt-third">
  <div class="card-3 txt-padding-top" style="min-height:400px">
  <h4 class="respon"><center><i class="fa fa-medkit " style="font-size:50px"></i></center></h4>
  <hr>
  
  <p>
	Menjadi Rumah Sehat pilihan dengan menyediakan layanan perawatan kesehatan terbaik, aman, bermutu tinggi dan inovatif.
</p>
</p> Menyediakan pelayanan secara utuh.Konsisten dan terpadu berfokus pada pasien melalui praktek berbasis bukti yang sesuai dan pelayanan prima dengan komitmen</p>
  </div>
</div>

<div class="txt-third">
  <div class="card-4 txt-padding-top" style="min-height:400px">
  <h4 class="respon"><i class="fa fa-heart-o" style="font-size:50px"></i></h4>
  <hr>
  <p>
Kesehatan Anda, Prioritas Kami</p>
 
<p>Nilai/Budaya Perusahaan </p>
<p>Integritas,Kualitas</p>
<p>Kerja sama Tim & Etika</p>
<p>Semangat & Keteguhan</p>
<p>Inovasi</p>
<p>Pembelajaran Berkesinambungan</p>
  </div>
</div>

<div class="txt-third">
  <div class="card-5 txt-padding-top" style="min-height:400px">
  <h4 class="respon"><i class="fa fa-mobile " style="font-size:50px"></i></h4>
  <hr>

  <p>
Aplikasi Mobile juga dapat di akses dari web site Rumah Sehat.
</p>
<p>Agar Memudahkan para pasien atau user untuk melakukan
Transaksi Periksa sesuai dengan prosedure yang telah di berikan. 
	</p>
 
  </div>
</div>
</div>
<!-- parallax -->
	<div class="parallax">
		<div class="container paralaxbg" style="background-image:url('img/parralax.png');height:100%;">
      <div class="content">
       
        <p style="color:#009688;"> Ingin Cepat Sembuh Dan Sehat </p>
        <?php if (empty($_SESSION['MM_Username'])){
		?><p><a href="login-user.php" class="txt-btn">Periksa Sekarang</a></p><?php
		} else {
	  ?><p><a href="periksa-awal.php" class="txt-btn">Periksa Sekarang</a></p>
    <?php } ?>
      </div>
    </div>
	</div>
<!-- parallax -->
 <div class="txt-container txt-padding-large txt-grey" style="background-color:#9e9e9e;">
   
    <div class="row-padding txt-center txt-padding-24" style="margin:0 -16px;background-color:#9e9e9e">
      <div class="txt-third txt-dark-grey" style="background-color:#616161;color:white;">
        <p><i class="fa fa-envelope"></i>rumahsehat@email.com</p>
      </div>
      <div class="txt-third txt-teal" style="background-color:#009688;color:white;">
        <p><i class="fa fa-map-marker"></i> Kota Wisata Batu , IND</p>
      </div>
      <div class="txt-third txt-dark-grey" style="background-color:#616161;color:white;">
        <p><i class="fa fa-phone"></i> +62908777656 </p>
      </div>
    </div>
 </div>

 <?php include"footer.php";?>
	<footer class="txt-container txt-center" style="background-color:black;color:white;">
			<p style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</p>
	</footer>
	</body>
	    <script>
initParalaxBg();
</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
