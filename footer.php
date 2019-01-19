<!-- Footer -->
  <footer class="txt-container txt-padding-32 txt-dark-grey" style="background-color:#616161;color:white;">
  <hr>
  <div class="row-padding">
    <div class="txt-third">
		<div style="padding:15px;">
      <h3 style="color:#e91e63"><b style="color:#2196F3;">Rumah </b>Sehat</h3>
      <p>Menjadi rumah sehat pilihan dengan menyediakan layanan perawatan kesehatan terbaik, aman, bermutu tinggi dan inovatif.</p>
	  <a href="#" class="fa fa-facebook"></a>
	  <a href="#" class="fa fa-twitter"></a>
	  <a href="#" class="fa fa-android"></a>
      <a href="#" class="fa fa-instagram"></a>
	  <a href="#" class="fa fa-rss"></a>
		</div>
    </div>
  
    <div class="txt-third">
	<div style="padding:15px;">
    <?php 
		 mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tb_artikel ORDER BY kd DESC LIMIT 2 ";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	?>
      <h3>Artikel Terbaru</h3>
      <ul class="txt-ul txt-hoverable">
        <?php do { ?><li class="txt-padding-16">
		<a style="text-decoration:none;" href="detail-artikel.php?kd=<?php echo $row_Recordset1['kd'];?>"">
          <img src="apoteker/image-artikel/<?php echo $row_Recordset1['gambar'];?>" class="txt-left txt-margin-right" style="width:53px;height:53px;">
          <span class="w3-large"><?php echo $row_Recordset1['judul'];?></span><br>
          <span><?php echo $row_Recordset1['sub_title'];?></span>
		  </a>
        </li>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </ul>
	  </div>
    </div>

    <div class="txt-third">
	<div style="padding:15px;">
      <h3>Menu </h3>
      <ul>
      	<li class="txt-padding-16"> <a href="syarat.php" class="txt-left">Syarat dan Ketentuan</a></li>
     	<li class="txt-padding-16"> <a href="cara-periksa.php" class="txt-left">Bantuan</a></li>
      	<li class="txt-padding-16"><a href="artikel.php" class="txt-left">Artikel</a></li>
     	<li class="txt-padding-16"><a href="profil.php" class="txt-left">Profil</a></li>
       	<li class="txt-padding-16"> <?php if (empty($_SESSION['MM_Username'])){
		?><a href="login-user.php" class="txt-left txt-margin-right">Masuk</a><?php
		} else {
	  ?><a href="akun-saya.php" class="txt-left txt-margin-right">Akun Saya</a>
    <?php } ?></li>
      </ul>
      </p>
	  </div>
    </div>

  </div>
  </footer>