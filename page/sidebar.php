<div class="col-lg-4">
                
                <!-- Statistik -->
                <div class="card mb-4">
                  <div class="card-header">Statistik</div>
                  <div class="card-body">
                      <!-- isi -->
                      <section class="border p-4 mb-4 rounded-5 d-flex justify-content-center">
                      <div class="col-lg-17" >
                        <canvas id="myChart" style="width: 300px; max-width: 900px; display: block; height: 60px;" width="121" height="60" class="chartjs-render-monitor"></canvas>

                            <script>
                              <?php 
                              $laki = query("SELECT Count(jkel) as total, jkel as jenis FROM `user_detail` WHERE jkel='Laki-Laki'");
                              $perempuan = query("SELECT Count(jkel) as total, jkel as jenis FROM `user_detail` WHERE jkel='Perempuan'");
                              $total = query("SELECT Count(jkel) as total, jkel as jenis FROM `user_detail`") ?>
							var xValues = ["Perempuan", "Laki-laki", "Total"];
							var yValues = [<?= $perempuan[0]['total'] ?>, <?= $laki[0]['total'] ?>, <?= $total[0]['total'] ?>];
							var barColors = ["red", "green","blue"];

							new Chart("myChart", {
							  type: "bar",
							  data: {
							    labels: xValues,
							    datasets: [{
							      backgroundColor: barColors,
							      data: yValues
							    }]
							  },
							  options: {
							    legend: {display: false},
							    title: {
							      display: true,
							      text: "Statistik penduduk Desa"
							    }
							  }
							});
							</script>
                      </div>
                     </section>
                  </div>
              </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Menu Kategori</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-unstyled mb-0">
                                  <?php 
                                  $categories = query("SELECT DISTINCT(category_name) FROM post_category");
                                  foreach ($categories as $category) {
                                  ?>
                                    <li><a href="?category=<?= $category['category_name'] ?>" class="text-black"><?= $category['category_name']; ?></a></li>
                                  <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <section id="hero-slider" class="hero-slider card mb-4">
                  <div class="container-md" data-aos="fade-in">
                    <div class="row-12" style="height: 300px;">
                      <div class="col-md-12">
                        <div class="swiper sliderFeaturedPosts">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <a href="single-post.html" class="img-bg d-flex align-items-end text-decoration-none" style="background-image: url('assets/img/ava.jpeg');">
                                <div class="img-bg-inner">
                                  <h2>Ketua</h2>
                                </div>
                              </a>
                            </div>

                            <div class="swiper-slide">
                              <a href="single-post.html" class="img-bg d-flex align-items-end text-decoration-none" style="background-image: url('assets/img/');">
                                <div class="img-bg-inner">
                                  <h2>Wakil</h2>
                                </div>
                              </a>
                            </div>

                            <div class="swiper-slide">
                              <a href="single-post.html" class="img-bg d-flex align-items-end text-decoration-none" style="background-image: url('assets/img/');">
                                <div class="img-bg-inner">
                                  <h2>Anggota</h2>
                                </div>
                              </a>
                            </div>

                            <div class="swiper-slide">
                              <a href="single-post.html" class="img-bg d-flex align-items-end text-decoration-none" style="background-image: url('assets/img/');">
                                <div class="img-bg-inner">
                                  <h2>Anggota</h2>
                                </div>
                              </a>
                            </div>
                          </div>
                          <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                          </div>
                          <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                          </div>

                          <div class="swiper-pagination"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <div class="card mb-4">
                  <div class="card-header">
                    <div class="card-body">
                      <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Populer</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Terbaru</button>
                          </li>
                        </ul>
          
                        <div class="tab-content" id="pills-tabContent">
          
                          <!-- Popular -->
                          <div class="tab-pane show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                            <?php
                              $sql = query("SELECT post_view.id_post, post.subject, post.date_created, COUNT(post_view.id) FROM post_view INNER JOIN post ON post.id=post_view.id_post GROUP BY id_post DESC LIMIT 4");
                              foreach ($sql as $data){
                              ?>
                            <div class="post-entry-1 border-bottom">
                              
                              <div class="post-meta"><span><?= $data['date_created'] ?></span></div>
                              <h2 class="mb-2"><a href="<?= "?page=view-post&id=".base64_encode($data['id_post']); ?>"><?= $data['subject'] ?></a></h2>
                            </div>
                          <?php } ?>
          
                          </div> <!-- End Popular -->
          
                          <!-- Trending -->
                          <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                            <?php 
                            $sql2 = query("SELECT post.id, post.date_created, post.category, post.subject, post_category.category_name FROM `post` Inner JOIN post_category ON post_category.id=post.category order by id DESC LIMIT 4");

                            foreach ($sql2 as $data2){
                            ?>
                            <div class="post-entry-1 border-bottom">
                              <div class="post-meta"><span class="date"><?= $data2['category_name'] ?></span> <span class="mx-1">&bullet;</span> <span><?= $data2['date_created'] ?></span></div>
                              <h2 class="mb-2"><a href="?page=view-page&id=<?php base64_encode($id)  ?>"><?= $data2['subject'] ?></a></h2>
                            </div>
                            <?php } ?>
          
                          </div> <!-- End Latest -->
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="card mb-4">
                  <div class="card-header">Agenda</div>
                  <div class="card-body">
                    <?php
                    // $week = strtotime('+1 week', time());
                    $setahunfromnow = strtotime('+1 year', time());
                    $sekarang = time();
                    $agenda = query("SELECT * FROM agenda WHERE 'time' BETWEEN '$sekarang' AND '$setahunfromnow'");
                    print "SELECT * FROM agenda WHERE 'time' BETWEEN '$sekarang' AND '$setahunfromnow'";
                    var_dump($agenda);
                    ?>
                    <div class="row row-stripped">
                      <div class="col-md-2">
                        <h4><span class="badge badge-secondary" style="background-color: #6c757d;">23</span></h4>
                        <h7 class="">OCT</h7>
                      </div>
                      <div class="col-md-10">
                        <h4 class="text-uppercase"><strong>Ice Cream Social</strong></h4>
                          <ul class="list-inline">
                              <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Cafe</li>
                          </ul>
                          <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                    <div class="row row-stripped">
                      <div class="col-md-2">
                        <h4><span class="badge badge-secondary" style="background-color: #6c757d;">23</span></h4>
                        <h7 class="">OCT</h7>
                      </div>
                      <div class="col-md-10">
                        <h4 class="text-uppercase"><strong>Ice Cream Social</strong></h4>
                          <ul class="list-inline">
                              <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Cafe</li>
                          </ul>
                          <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      </div>
                    </div>
                  </div>
              </div>
