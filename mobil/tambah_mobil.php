<?php 
    require_once 'header.php';
    require_once 'Mobil.php';

    // $result = new Mobil;
    // $data = $result->readTwoTable();



//check whether the button has been click or not
if(isset($_POST['submit'])){
    $add = new Mobil;

    $result =$add->addMobil($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'index.php';
        </script>
    ";

    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Tambah Mobil</h3>


        <form method="post" enctype="multipart/form-data">
            
        <div class="mb-3">
                <label class="form-label"> Merk Mobil</label>
                <input type="text" name="merk_mobil" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label"> Nama Mobil</label>
                <input type="text" name="nama_mobil" class="form-control">
            </div>

            
            <div class="mb-3">
                <label class="form-label"> CC Mobil</label>
                <input type="text" name="cc_mobil" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label"> Warna Mobil</label>
                <input type="text" name="warna_mobil" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label"> Harga Mobil</label>
                <input type="text" name="harga_mobil" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label"> Tanggal Launching</label>
                <input type="date" name="tanggal_launching_mobil" class="form-control">
            </div>
            <a href="index.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once 'footer.php';?>


<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>