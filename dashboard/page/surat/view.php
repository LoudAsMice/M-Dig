<?php 
$pid = base64_decode($_GET['id']);
if ($login[0]['level'] == "Masyarakat") {
	$query = query("SELECT request_surat.id,request_surat.request_user, request_surat.surat, request_surat.pesan, request_surat.status, user_detail.userid, user_detail.nik, user_detail.email, user_detail.nama FROM `request_surat` INNER JOIN user_detail ON user_detail.userid=request_surat.request_user WHERE user_detail.userid='$id' AND request_surat.id='$pid' ");
}else{
	$query = query("SELECT * FROM `request_surat` WHERE id='$pid'");
}
if (count($query) != 1) {
	?>
	<script type="text/javascript">
		window.location.href = "?page=surat";
	</script>
	<?php
}
 ?>

	<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Surat Online</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Surat Online</a>
                                </li>
                                <li class="breadcrumb-item active">Surat Online
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Add Doctors Form Wizard -->

                <section id="add-doctors">
                    <div class="icon-tabs">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Surat Online</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-body">
                                    	<form method="POST">
                                    		<fieldset>
		                                    	<div class="row">
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
			                                    			<label for="nama">Nama</label>
			                                    			<input type="text" name="name" class="form-control" value="<?= $query[0]['nama'] ?>" disabled>
		                                    			</div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
			                                    			<label for="nama">NIK</label>
			                                    			<input type="text" name="name" class="form-control" value="<?= $query[0]['nik'] ?>" disabled>
		                                    			</div>
		                                    		</div>
		                                    	</div>
		                                    	<div class="row">
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
			                                    			<label for="nama">Email</label>
			                                    			<input type="text" name="name" class="form-control" value="<?= $query[0]['email'] ?>" disabled>
			                                    		</div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
			                                    			<label for="jenisurat">Jenis Surat</label>
			                                    			<select class="form-control" name="surat" disabled>
				                                    			<?php 
				                                    			$selects = query("SELECT * FROM catesurat WHERE status='Aktif'");
				                                    			foreach ($selects as $key => $select) {
				                                    				?>
				                                    				<option value="<?= $select['id'] ?>" <?php if ($query[0]['surat'] == $select['id']) {
				                                    					echo 'selected';
				                                    				} ?> ><?= $select['category'] ?></option>
				                                    				<?php
				                                    			}
				                                    			 ?>
			                                    			 </select>
		                                    			</div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
		                                    				<label for="pesan">Pesan</label>
		                                    				<textarea class="form-control" name="pesan" rows="3" disabled><?= $query[0]['pesan'] ?></textarea>
		                                    			</div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
		                                    				<label for="pesan">Status</label>
		                                    				<textarea class="form-control" name="pesan" rows="3" disabled><?= $query[0]['status'] ?></textarea>
		                                    			</div>
		                                    		</div>
		                                    	</div>

                                    		</fieldset>
                                    		<div class="actions clearfix">
                                                <a href="javascript:history.back()" class="btn btn-default "><i class="la la-step-backward"></i> Kembali</a>
                                            </div>
                                    	</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
