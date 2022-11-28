<div class="modal fade bd-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <textarea class="form-control" name="pesan" rows="3" id="pesan"></textarea>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="edit">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".modaledit", function () {
     var myBookId = $(this).data('suratid');
     var pesan = $(this).data('pesan');
     $(".modal-body #id").val( myBookId );
     $(".modal-body #pesan").val( pesan );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>