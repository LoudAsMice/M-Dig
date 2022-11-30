
<div class="modal fade bd-example-modal-lg" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Postingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" name="judul" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pesan">Isi</label>
                            <textarea class="form-control" name="blogpost1" rows="3" style="resize: none"></textarea>
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
                            <input type="datetime-local" id="cal1" class="form-control" name="tanggalpost">
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
    $pid = $_POST['id'];
    $category = $_POST['category'];
    $judul = $_POST['judul'];
    $blogpost = $_POST['blogpost1'];
    $tanggal = $_POST['tanggalpost'];
        $insert = insert("UPDATE `post` SET `category`='$category',`subject`='$judul',`body`='$blogpost',`date_created`='$tanggal' WHERE id='$pid'");

        if (mysqli_affected_rows($koneksi) == "1") {
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

        CKEDITOR.replace('blogpost1', {

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
    window.addEventListener('load', () => {
      var now = new Date();
      now.setMinutes(now.getMinutes() - now.getTimezoneOffset());

      /* remove second/millisecond if needed - credit ref. https://stackoverflow.com/questions/24468518/html5-input-datetime-local-default-value-of-today-and-current-time#comment112871765_60884408 */
      now.setMilliseconds(null)
      now.setSeconds(null)

      document.getElementById('cal1').value = now.toISOString().slice(0, -1);
    });
    </script>