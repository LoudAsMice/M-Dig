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
     $(".modal-body #id").val( myBookId );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>