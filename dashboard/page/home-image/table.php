<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Home Images</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Home Images</a>
                                </li>
                                <li class="breadcrumb-item active">Table Home Images
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                <a data-target="#modaladd" data-toggle="modal" class="MainNavText btn btn-info float-md-right" id="MainNavHelp" href="#modaladd"><i class="la la-plus"></i> Tambah Baru</a>
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
                                        <h4 class="card-title">Table Home Images</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" width="100%" id="table">
                                            <thead> 
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Detail</th>
                                                    <th>Image</th>
                                                    <th>Preview</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $sql = query("SELECT * FROM home_img");
                                            $i = 1;
                                            foreach ($sql as $data){
                                            ?>
                                            <tr>
                                                <td><?= $i; $i++; ?></td>
                                                <td><?= $data['name'] ?></td>
                                                <td><?= $data['detail'] ?></td>
                                                <td><?= $data['img'] ?></td>
                                                <td>
                                                    <img src="../assets/img/home/<?= $data['img'];?>" alt="..." height="150px">
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item modalcategoryedit" data-category="<?= $data['id'];?>" data-nama="<?= $data['name'];?>" data-detail="<?= $data['detail'];?>" data-target="#modalcategoryedit"  data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#modalaksi" onclick="">Edit</a></li>
                                                            <li><a onclick="archiveFunction(event)" href="?page=home-image&action=delete&id=<?= base64_encode($data['id']); ?>" class="dropdown-item">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                        <a href="?page=home-image&action=update&id=<?= $data['id'] ?>" class="btn btn"></a>
                                                        <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
