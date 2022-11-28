<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Category Post</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Category Post</a>
                                </li>
                                <li class="breadcrumb-item active">Add Category Post
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
			                                    			<label for="nama">Category Name</label>
			                                    			<input type="text" name="nama" id="nama" class="form-control">
		                                    			</div>
		                                    		</div>
		                                    		<div class="col-md-6">
		                                    			<div class="form-group">
			                                    			<label for="status">Status</label>
			                                    			<select class="custom-select" name="status" id="status">
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Tidak">Tidak Aktif</option>
                                                            </select>
		                                    			</div>
		                                    		</div>
		                                    	</div>

                                    		</fieldset>
                                    		<div class="actions clearfix">
                                                <button class="btn btn-primary pull-right" type="submit" name="submit"><i class="la la-save"></i> Submit</button>
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

    <?php 
    if (isset($_POST['submit'])) {
    	$nama = $_POST['nama'];
        $status = $_POST['status'];
        

    	$insert = insert("INSERT INTO `post_category` (`id`, `category_name`, `status`) VALUES ('', '$nama', '$status')");
    
    	if (mysqli_affected_rows($koneksi)) {
    		?>
    		<script type="text/javascript">
    			window.location.href = "?page=category-post";
    		</script>
    		<?php
    	}
    }
     ?>