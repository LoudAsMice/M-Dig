<div class="modal fade" id="modalaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Permintaan Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="email" id="email">
                <input type="hidden" name="nama" id="nama">
              <div class="form-group">
                <label for="recipient-name" class="form-label">Aksi:</label>
                <select class="custom-select" name="aksi">
                    <option value="proses">Proses Surat</option>
                    <option value="reject">Tolak Permintaan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-label">Pesan:</label>
                <textarea class="form-control" id="message-text" name="pesan"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="proses">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".modalaksi", function () {
     var myBookId = $(this).data('surat');
     var email = $(this).data('email');
     var nama = $(this).data('nama');
     $(".modal-body #nama").val( nama );
     $(".modal-body #id").val( myBookId );
     $(".modal-body #email").val( email );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>



<?php 
    if (isset($_POST['proses'])) {
        $aksi = $_POST['aksi'];
        $pesan = $_POST['pesan'];
        $pid = $_POST['id'];
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        if ($aksi == 'reject') {
            $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan ditolak: $pesan', `status`='Rejected' WHERE id='$pid'");
            include 'page/surat/emailreject.php';
          }else{
            $select = query("SELECT * FROM `request_surat` WHERE id='$pid'");
            if ($select[0]['status'] == "Request") {
                $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan diproses: $pesan', `status`='Process' WHERE id='$pid'");
                include 'page/surat/emailprocess.php';
            }elseif ($select[0]['status'] == "Process") {
                $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan siap diambil: $pesan', `status`='Ready to Pickup' WHERE id='$pid'");
                include 'page/surat/emailreadypickup.php';
              }elseif ($select[0]['status'] == "Ready to Pickup") {
                $update = update("UPDATE `request_surat` SET `pesan`='".$select[0]['pesan'].", Pesan setelah diambil: $pesan', `status`='Sudah diambil' WHERE id='$pid'");
            }
        }

        if (mysqli_affected_rows($koneksi) > 0) {
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



