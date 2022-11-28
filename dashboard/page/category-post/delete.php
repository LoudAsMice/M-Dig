<?php 
$pid = base64_decode($_GET['id']);
$delete = delete("DELETE FROM `post_category` WHERE id='$pid'");

if ($delete == "1") {
?>
	<script type="text/javascript">
		window.location.href = "?page=category-post"
	</script>
<?php
}
?>