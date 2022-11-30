
<div class="modal fade bd-example-modal-lg" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Permintaan Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control" value="<?= $login[0]['nama'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">NIK</label>
                            <input type="text" name="name" class="form-control" value="<?= $login[0]['nik'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="text" name="name" class="form-control" value="<?= $login[0]['email'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenisurat">Jenis Surat</label>
                            <select class="custom-select" name="surat" required>
                                <?php 
                                $selects = query("SELECT * FROM catesurat WHERE status='Aktif'");
                                foreach ($selects as $key => $select) {
                                    ?>
                                    <option value="<?= $select['id'] ?>"><?= $select['category'] ?></option>
                                    <?php
                                }
                                 ?>
                             </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" name="pesan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
 <?php 

 if (isset($_POST['tambah'])) {
    $surat = $_POST['surat'];
    $pesan = $_POST['pesan'];

        $insert = insert("INSERT INTO `request_surat`(`id`, `request_user`, `surat`, `pesan`, `status`) VALUES ('','$id','$surat','$pesan','Request')");

        if (mysqli_affected_rows($koneksi) == "1") {
            ?>
        <script type="text/javascript">
            swal({
              title: "Sukses!",
              text: "Mengalihkan dalam 2 Detik.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function(){
                  window.location.href = "?page=surat";
            });
        </script>
            <?php
        }else{
            ?>
        <script type="text/javascript">
            swal({
              title: "Error!",
              text: "Mengalihkan dalam 2 Detik.",
              type: "error",
              timer: 2000,
              showConfirmButton: false
            }, function(){
                  window.location.href = "?page=surat";
            });
        </script>
            <?php
        }
 }
  ?>