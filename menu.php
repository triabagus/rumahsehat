<?php
	session_start();
	require_once('Connections/koneksi.php');
?>
<div class="atas">
  <ul class="navbar white wide padding-8 card-2">
    <li>
      <a href="index.php" class="txt-margin-left" style="color:#e91e63;"><b style="color:#2196F3;">Rumah</b> Sehat</a>
	  <span class="pum" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </li>

    <li class="txt-right txt-hide-small">
      <a href="cara-periksa.php" class="txt-left">Bantuan</a>
      <a href="artikel.php" class="txt-left">Artikel</a>
      <a href="profil.php" class="txt-left">Profil</a>
      <?php if (empty($_SESSION['MM_Username'])){
		?><a href="login-user.php" class="txt-left txt-margin-right">Masuk</a><?php
		} else {
	  ?><a href="akun-saya.php" class="txt-left txt-margin-right">Akun Saya</a>
    <?php } ?>
    </li>
  </ul>
</div>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="cara-periksa.php" >Bantuan</a>
      <a href="artikel.php" >Artikel</a>
      <a href="profil.php" >Profil</a>
      <?php if (empty($_SESSION['MM_Username'])){
		?><a href="login-user.php" >Masuk</a><?php
		} else {
	  ?><a href="akun-saya.php" >Akun Saya</a>
    <?php } ?>
  </div>
</div>

<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
</script>