<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Data Diri</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Diri</a>
                                </li>
                                <li class="breadcrumb-item active">Verifikasi Data Diri
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
                                        <h4 class="card-title">Data Diri</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form method="post" class="add-doctors-tabs icons-tab-steps steps-validation wizard-notification wizard clearfix" role="application" id="steps-uid-0" novalidate="novalidate">
                                                <div class="steps clearfix">
                                                    <ul role="tablist">
                                                        <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                                                            <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0"><span class="current-info audible">current step: </span><span class="step"><i class="step-icon la la-user font-medium-3"></i></span>  Data Diri</a>
                                                        </li>
                                                        <li role="tab" class="disabled" aria-disabled="true">
                                                            <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1"><span class="step"><i class="step-icon la la-book font-medium-3"></i></span>  Data Pendidikan</a>
                                                        </li>
                                                        <li role="tab" class="disabled" aria-disabled="true">
                                                            <a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2"><span class="step"><i class="step-icon font-medium-3 la la-building"></i></span>  Data Pekerjaan</a>
                                                        </li>
                                                        <li role="tab" class="disabled last" aria-disabled="true">
                                                            <a id="steps-uid-0-t-3" href="#steps-uid-0-h-3" aria-controls="steps-uid-0-p-3"><span class="step"><i class="step-icon ft-monitor font-medium-3"></i></span>  Sosial Media</a>
                                                        </li>
                                                        </ul></div><div class="content clearfix">

                                                <!-- step 1 => Personal Details -->

                                                <h6 id="steps-uid-0-h-0" tabindex="-1" class="title current"><i class="step-icon la la-user font-medium-3"></i> Data Diri</h6>
                                                <fieldset id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="firstName">NIK KTP:<span class="danger">*</span></label>
                                                                <input type="text" class="form-control required" id="firstName" name="nik">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="firstName">Nama Depan:<span class="danger">*</span></label>
                                                                <input type="text" class="form-control required" id="firstName" name="firstname">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastName">Nama Belakang:<span class="danger">*</span></label>
                                                                <input type="text" class="form-control required" id="lastName" name="lastname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email:<span class="danger">*</span></label>
                                                                <input type="email" class="form-control required" id="email" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label class="form-label" style="padding-bottom: 10px;">Jenis Kelamin</label>
                                                              <br >
                                                              <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input" name="jeniskelamin" checked>
                                                                <label class="form-check-label">Laki - Laki</label>
                                                              </div>
                                                              <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input" name="jeniskelamin">
                                                                <label class="form-check-label">Perempuan</label>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Alamat :</label>
                                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="city">Kota:</label>
                                                                <select id="city" class="custom-select" name="city">
                                                                    <option value="">Select City</option>
                                                                    <option value="manhattan">Manhattan</option>
                                                                    <option value="seattle">Seattle</option>
                                                                    <option value="kingsville">Kingsville</option>
                                                                    <option value="losangeles">Los Angeles</option>
                                                                    <option value="florida">Florida</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="state">Provinsi:</label>
                                                                <select id="state" class="custom-select" name="provinsi">
                                                                    <option value="">Select State</option>
                                                                    <option value="washingtondc">Washington DC</option>
                                                                    <option value="newyork">New York</option>
                                                                    <option value="texas">Texas</option>
                                                                    <option value="california">California</option>
                                                                    <option value="miami">Miami</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="contact">Tempat Lahir:<span class="danger">*</span></label>
                                                                <input type="text" class="form-control required" id="contact" name="tempatlahir">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="dob">Tanggal Lahir:<span class="danger">*</span></label>
                                                                <input type="date" class="form-control required" id="dob" name="tanggallahir">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastName">Agama:<span class="danger">*</span></label>
                                                                <select class="form-control" name="agama">
                                                                    <option selected disabled>Pilih Agama</option>
                                                                    <option>Islam</option>
                                                                    <option>katolik</option>
                                                                    <option>kristen</option>
                                                                    <option>hindu</option>
                                                                    <option>buddha</option>
                                                                    <option>konghucu</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lastName">Golongan Darah:<span class="danger">*</span></label>
                                                                <select class="form-control" name="gol_darah">
                                                                    <option>Tidak Tahu</option>
                                                                    <option>A</option>
                                                                    <option>B</option>
                                                                    <option>AB</option>
                                                                    <option>O</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                            </div>
                                            <div class="actions clearfix">
                                                <button type="submit" class="btn btn-primary" name="submit"><i class="la la-save"></i> Next</button>
                                            </div>
                                        </form>
                                        </div>
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
        $nik = $_POST['nik'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['jeniskelamin'];
        $alamat = $_POST['alamat'];
        $city = $_POST['city'];
        $provinsi = $_POST['provinsi'];
        $tempatlahir = $_POST['tempatlahir'];
        $tanggallahir = $_POST['tanggallahir'];
        $agama = $_POST['agama'];
        $gol_darah = $_POST['gol_darah'];

        $update = update("UPDATE `user_detail` SET `nik`='$nik',`nama`='$firstname $lastname',`tempat_lahir`='$tempatlahir',`tanggal_lahir`='$tanggallahir',`jkel`='$gender',`alamat`='$alamat Kota $city Provinsi $provinsi',`agama`='$agama',`gol_darah`='$gol_darah' WHERE userid='".$_SESSION['id']."'");
        if ($update) {
            ?>
            <script type="text/javascript">
                window.location.href = "index.php";
            </script>
            <?php
        }

    }
     ?>