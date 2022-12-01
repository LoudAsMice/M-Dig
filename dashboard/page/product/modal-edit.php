
<div class="modal fade bd-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST">
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" id="judul" name="nama" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pesan">Deskripsi Produk</label>
                            <textarea class="form-control" id="blogpost" name="blogpost" rows="3" style="resize: none"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pesan">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="text" id="tanpa-rupiah" name="harga" class="form-control" style="text-align: right;" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pesan">No Whatsapp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                </div>
                                <input type="text" name="whatsapp" id="whatsapp" pattern="\d*" maxlength="14" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="editproduct">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>

 <?php 

 if (isset($_POST['editproduct'])) {
    $pid = $_POST['id'];
    $whatsapp = $_POST['whatsapp'];
    $nama = $_POST['nama'];
    $isi = $_POST['blogpost'];
    $harga = str_replace(".","",$_POST['harga']);
        $insert = insert("UPDATE `product` SET `judul`='$nama',`isi`='$isi',`date_created`='',`harga`='$harga',`whatsapp`='$whatsapp' WHERE id='$pid'");

        if (mysqli_affected_rows($koneksi) >0) {
            $insertid = $koneksi->insert_id;
            update("UPDATE `post_img` SET `pid`='$insertid' WHERE id='0'");
            ?>
        <script type="text/javascript">
            swal({
              title: "Sukses!",
              text: "Mengalihkan dalam 2 Detik.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function(){
                  window.location.href = "?page=produk";
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
                  window.location.href = "?page=produk";
            });
        </script>
            <?php
        }
 }
  ?>

  <script>

        CKEDITOR.replace('blogpost', {

            filebrowserUploadUrl: 'unggahgambarproduct.php',                    

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
      removeButtons: 'Subscript,Superscript,Anchor,Styles,Specialchar,Print,Preview,ToPdf,NewPage,Save,Source,Div'


    });

  </script>


    <script type="text/javascript">
   /* Tanpa Rupiah */
      var tanpa_rupiah = document.getElementById('tanpa-rupiah');
      tanpa_rupiah.addEventListener('keyup', function(e)
      {
          tanpa_rupiah.value = formatRupiah(this.value);
      });

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    
    </script>
<script type="text/javascript">
$(document).on("click", ".modaledit", function () {
     var myBookId = $(this).data('post');
     var judul = $(this).data('judul');
     var isi = $(this).data('isi');
     var whatsapp = $(this).data('whatsapp');
     var harga = $(this).data('harga');
     $(".modal-body #tanpa-rupiah").val( harga );
     $(".modal-body #id").val( myBookId );
     $(".modal-body #judul").val( judul );
     $(".modal-body #whatsapp").val( whatsapp );

     CKEDITOR.instances.blogpost.setData( isi );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>