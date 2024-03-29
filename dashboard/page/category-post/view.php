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
			                                    			<select class="form-select" name="surat" disabled>
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
		                                    				<textarea class="form-control" name="pesan" rows="3" disabled> <?php
                                                    if ($query[0]['status'] == "Request") {
                                                        echo 'Baru diajukan';
                                                    }elseif ($query[0]['status'] == "Process") {
                                                        echo "Sedang dibuat";
                                                    }else{
                                                        echo "Siap diambil";
                                                    }
                                                    ?></textarea>
		                                    			</div>
		                                    		</div>
		                                    	</div>

                                    		</fieldset>
                                    		<div class="actions clearfix">
                                                <a href="javascript:history.back()" class="btn btn-info "><i class="la la-backward"></i> Kembali</a>
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