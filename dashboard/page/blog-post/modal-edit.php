
<div class="modal fade bd-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Postingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
            <input type="hidden" id="id" name="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pesan">Isi</label>
                            <textarea class="form-control" id="blogpost" name="blogpost" rows="3" style="resize: none"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pesan">Category</label>
                            <select class="form-select" name="category">
                                <?php 
                                $scategory = query("SELECT * FROM `post_category` WHERE status='Aktif'");
                                foreach ($scategory as $data) {
                                 ?>
                                <option value="<?= $data['id']; ?>"><?= $data['category_name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pesan">Tanggal Post</label>
                            <input type="datetime-local" id="cal" class="form-control" name="tanggalpost">
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

<?php
if (isset($_POST['edit'])) {
    $pid = $_POST['id'];
    $category = $_POST['category'];
    $judul = $_POST['judul'];
    $blogpost = $_POST['blogpost'];
    $tanggal = $_POST['tanggalpost'];
        $update = update("UPDATE `post` SET `category`='$category',`subject`='$judul',`body`='$blogpost',`date_created`='$tanggal' WHERE id='$pid'");
        if (mysqli_affected_rows($koneksi) >0) {
            $insertid = $koneksi->insert_id;
            update("UPDATE `post_img` SET `post_id`='$insertid' WHERE id='0'");
            ?>
        <script type="text/javascript">
            swal({
              title: "Sukses!",
              text: "Mengalihkan dalam 2 Detik.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function(){
                  window.location.href = "?page=blog-post";
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
                  window.location.href = "?page=blog-post";
            });
        </script>
            <?php
        }
 }
  ?>

  <script>

        CKEDITOR.replace('blogpost', {

            filebrowserUploadUrl: 'unggahgambar.php',                    

            filebrowserUploadMethod: 'form',
            toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Subscript,Superscript,Anchor,Styles,Specialchar'


    });
</script>
<script type="text/javascript">
$(document).on("click", ".modaledit", function () {
     var myBookId = $(this).data('post');
     var judul = $(this).data('judul');
     var isi = $(this).data('isi');
     var tanggal = $(this).data('tanggal');
     $(".modal-body #id").val( myBookId );
     $(".modal-body #judul").val( judul );
     $(".modal-body #cal").val( tanggal );

     CKEDITOR.instances.blogpost.setData( isi );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>