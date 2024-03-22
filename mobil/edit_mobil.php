<?php 
    require_once 'header.php';
    require_once 'Mobil.php';
?>

<?php
$kode_mobil = $_GET['kode_mobil'];


$data = new Mobil;
$mobilIndividu = new Mobil;

$mobil = $mobilIndividu->viewEachMobil($kode_mobil);
// $result= $data->readTwoTablepart2($id_binatang);

if(isset($_POST['submit'])){

    $edit = new Mobil;
    $result = $edit->editMobil($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'index.php';
        </script>
    ";

    }

}

?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Mobil</h3>


        <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="kode_mobil" value="<?= $kode_mobil ?>;">


    
            <div class="mb-3">
                <label class="form-label"> Merk Mobil</label>
                <input type="text" name="merk_mobil" class="form-control" value="<?= $mobil['merk_mobil']?>">
            </div>

            <div class="mb-3">
                <label class="form-label"> Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control" value="<?= $mobil['nama_mobil']?>">
            </div>

            <div class="mb-3">
                <label class="form-label"> CC Mobil</label>
                <input type="text" name="cc_mobil" class="form-control" value="<?= $mobil['cc_mobil']?>">
            </div>

            <div class="mb-3">
                <label class="form-label"> Harga Mobil</label>
                <input type="text" name="harga_mobil" class="form-control" value="<?= $mobil['harga_mobil']?>">
            </div>

            <div class="mb-3">
                <label class="form-label"> Warna Mobil</label>
                <input type="text" name="warna_mobil" class="form-control" value="<?= $mobil['warna_mobil']?>">
            </div>

            <div class="mb-3">
                <label class="form-label"> Tanggal Launching Mobil</label>
                <input type="date" name="tanggal_launching_mobil" class="form-control" value="<?= $mobil['tanggal_launching_mobil']?>">
            </div>
        

            <a href="index.php" class="btn btn-danger" >Back</a>
            <button type="submit" class="btn btn-primary" name="submit" >Save</button>
        </form>
    </div>
  </div>
</div>


<?php require_once 'footer.php';?>

<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>
