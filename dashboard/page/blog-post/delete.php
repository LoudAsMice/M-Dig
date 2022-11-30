<?php 
$pid = base64_decode($_GET['id']);
$delete = delete("DELETE FROM `request_surat` WHERE id='$pid'");

if ($delete == "1") {
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
?>