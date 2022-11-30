<section id="listproduct" class="posts">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12 align-center">
      <div class="row justify-content-center">
      	<div class="row">
      			<?php 
      			$products = query("SELECT * FROM product WHERE status = 'Aktif'");

      			foreach ($products as $product) {
      			 ?>
				<div class="col-md-3">
			        <div class="card h-100">
			            <!-- Product image-->
			            <?php $imgproduct = query("SELECT * FROM product_img WHERE pid='".$product['id']."'"); ?>
			            <img class="card-img-top" <?php if (count($imgproduct) == 0) {
			            	echo 'src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"';
			            }else{
			            	echo 'src="assets/img/product/'.$imgproduct[0]['img'].'"';
			            } ?> alt="...">
			            <!-- Product details-->
			            <div class="card-body p-4">
			                <div class="text-center">
			                    <!-- Product name-->
			                    <h3 class="fw-bolder"><?= ucwords($product['judul']) ?></h3>
			                    <!-- Product price-->
			                    
			                    <p><?= substr(strip_tags($product['isi']), 0, 15) ?></p>

			                    <h5><?= rupiah($product['harga']) ?></h5>
			                </div>
			            </div>
			            <!-- Product actions-->
			            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
			                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://wa.me/62<?= $product['whatsapp']  ?>"><i class="fa-brands fa-whatsapp"></i> Beli di whatsapp	</a></div>
			            </div>
			        </div>
			    </div>
			<?php } ?>

		    </div>
		   
		</div>

	</div>

  </div>

</div>
</section>