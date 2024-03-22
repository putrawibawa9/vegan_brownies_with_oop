<?php
require_once 'Mobil.php'; 
require_once 'header.php'; 


$hasil = new Mobil;
$mobil = $hasil->readMobil();
?>


  
    
    <div class="container">
      <div class="row">
        <div class="col-12 p-3 bg-white">
          <h3>Mobil</h3>
          <a href="tambah_mobil.php" class="btn btn-primary  mb-3">Add</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Kode Mobil</th>
                    <th class="text-center">Nama Mobil</th>
                    <th class="text-center">Merk Mobil</th>
                    <th class="text-center">CC Mobil</th>
                    <th class="text-center">Warna Mobil</th>
                    <th class="text-center">Tanggal Launchling</th>
                    <th class="text-center">Actions</th>
                  </tr>
            </thead>
            <tbody>
              <?php foreach($mobil as $row):?>
                <tr>
                  <td class="text-center" ><?=$row['kode_mobil']?></td>
                  <td ><?=$row['nama_mobil']?></td>
                  <td ><?=$row['merk_mobil']?></td>
                  <td ><?=$row['cc_mobil']?></td>
                  <td ><?=$row['warna_mobil']?></td>
                  <td ><?=$row['tanggal_launching_mobil']?></td>
                   <td>
                    <a  href="edit_mobil.php?kode_mobil=<?=$row['kode_mobil'];?>" class="btn btn-primary btn-sm ">Edit</a>
                    <a href="hapus_mobil.php?kode_mobil=<?=$row['kode_mobil'];?>" class="btn btn-secondary btn-sm " onclick="return confirm('yakin?');">Delete</a>
                   </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
        </table>
        <div>
          
          </div>
    </div>
  </div>
</div>



<?php require_once 'footer.php';?>

<?php require_once 'footer.php';?>
<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>
 
