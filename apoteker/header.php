<?php
include"logout.php";
?>
<div class="header-admin"><span style="margin-left:20px;margin-top:10px;float:left;font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span><span><h2><a href="index.php" style="margin:0px 10px 14px 0px;color:#e91e63;float:right;"><b style="color:#2196F3;">Rumah</b> Sehat</a></h2></span>
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Dashboard</a>
  <a href="apoteker.php">Admin</a>
  <a href="dokter.php">Dokter</a>
  <a href="obat.php">Obat</a>
  <a href="pasien.php">Pasien</a>
  <a href="polikklinik.php">Poli</a>
  <a href="artikel.php">Artikel</a>
  <a href="data-pembayaran.php">Pembayaran</a><br><br>
  <a onclick="return confirm('Apakah anda ingin Keluar');" href="<?php echo $logoutAction ?>">Keluar</a>
  
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>