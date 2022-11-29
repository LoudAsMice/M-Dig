    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="modern admin logo" src="../assets/app-assets/images/logo/logo.png">
                            <h3 class="brand-text">Modern</h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <?php if ($login[0]['level'] == 'Admin') {
                            $sql = query("SELECT * FROM request_surat INNER JOIN catesurat on catesurat.id=request_surat.surat WHERE request_surat.status='Request'");
                          ?>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-danger badge-up badge-glow"><?php echo count($sql) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0"><?php echo count($sql) ?> New</span>
                                </li>
                                <?php 
                                foreach ($sql as $data) {
                                ?>
                                <li class="scrollable-container media-list w-100"><a href="?page=surat">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Ada Pengajuan <?= $data['category'] ?> Baru</h6><small>
                                            </div>
                                        </div>
                                    </a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }elseif ($login[0]['level'] == 'Masyarakat') {
                            $sql = query("SELECT request_surat.status as status, catesurat.category as surat  FROM request_surat INNER JOIN catesurat on catesurat.id=request_surat.surat WHERE request_surat.request_user='".$login[0]['id']."' AND (request_surat.status != 'Request' OR request_surat.status != 'Sudah diambil')");
                          ?>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-danger badge-up badge-glow"><?php echo count($sql) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0"><?php echo count($sql) ?> New</span>
                                </li>
                                <?php 
                                foreach ($sql as $data) {
                                ?>
                                <li class="scrollable-container media-list w-100"><a href="?page=surat">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal mr-0"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Pengajuan <?= $data['surat'] ?> 
                                                <?php 
                                                if ($data['status'] == "Process") {
                                                    echo 'Sedang di Proses';
                                                }else{
                                                    echo "Siap Diambil";
                                                }
                                                 ?></h6><small>
                                                    
                                            </div>
                                        </div>
                                    </a></li>
                                <?php } ?>
                                 </ul>
                        </li><?php } ?>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"><?= $login[0]['username']; ?></span><span class="avatar avatar-online"><img src="../assets/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->