<div class="modal fade bd-example-modal-lg" id="modalview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" value="<?= $login[0]['nama'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">NIK</label>
                            <input type="text" id="nik" class="form-control" value="<?= $login[0]['nik'] ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="text" id="email" class="form-control" value="<?= $login[0]['email'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenisurat">Jenis Surat</label>
                            <input type="textarea" name="jenis" id="jenissurat" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" name="pesan" rows="3" id="pesan" disabled></textarea>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".modalview", function () {
     var myBookId = $(this).data('suratid');
     var pesan = $(this).data('pesan');
     var jenissurat = $(this).data('jenissurat');
     $(".modal-body #id").val( myBookId );
     $(".modal-body #jenissurat").val( jenissurat );
     $(".modal-body #pesan").val( pesan );
     <?php 

     if ($login[0]['level']== "Admin") {
        ?>
     var nik = $(this).data('nik');
     var nama = $(this).data('nama');
     var email = $(this).data('email');
     $(".modal-body #nik").val( nik );
     $(".modal-body #nama").val( nama );
     $(".modal-body #email").val( email );
        <?php
     }
      ?>
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>