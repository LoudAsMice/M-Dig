<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Data Pendidikan</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Pendidikan</a>
                                </li>
                                <li class="breadcrumb-item active">Verifikasi Data Pendidikan
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
                                        <h4 class="card-title">Data Pendidikan</h4>
                                        <a href="#" class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form method="post" class="add-doctors-tabs icons-tab-steps steps-validation wizard-notification wizard clearfix" role="application" id="steps-uid-0" novalidate="novalidate">
                                                <div class="steps clearfix">
                                                    <ul role="tablist">
                                                        <li role="tab" class="first done" aria-disabled="false" aria-selected="true">
                                                            <a id="steps-uid-0-t-0" href="#" aria-controls="steps-uid-0-p-0"><span class="current-info audible">current step: </span><span class="step"><i class="step-icon la la-user font-medium-3"></i></span>  Data Diri</a>
                                                        </li>
                                                        <li role="tab" class="current" aria-disabled="true">
                                                            <a id="steps-uid-0-t-1" href="#" aria-controls="steps-uid-0-p-1"><span class="step"><i class="step-icon la la-book font-medium-3"></i></span>  Data Pendidikan</a>
                                                        </li>
                                                        <li role="tab" class="disabled" aria-disabled="true">
                                                            <a id="steps-uid-0-t-2" href="#" aria-controls="steps-uid-0-p-2"><span class="step"><i class="step-icon font-medium-3 la la-building"></i></span>  Data Pekerjaan</a>
                                                        </li>
                                                        <li role="tab" class="disabled last" aria-disabled="true">
                                                            <a id="steps-uid-0-t-3" href="#" aria-controls="steps-uid-0-p-3"><span class="step"><i class="step-icon ft-monitor font-medium-3"></i></span>  Sosial Media</a>
                                                        </li>
                                                        </ul></div><div class="content clearfix">

                                                <!-- step 1 => Personal Details -->

                                                <h6 id="steps-uid-0-h-0" tabindex="-1" class="title current"><i class="step-icon la la-user font-medium-3"></i> Data Pendidikan</h6>
                                                <fieldset id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="firstName">Jenjang Pendidikan<span class="danger">*</span></label>
                                                                <select class="form-select" name="jenjang" required>
                                                                    <option>Tidak Sekolah</option>
                                                                    <option>SD</option>
                                                                    <option value="SMP">SMP/Sederajat</option>
                                                                    <option value="SMA">SMA/Sederajat</option>
                                                                    <option value="D3">Diploma 3 (D3)</option>
                                                                    <option value="S1">Strata 1 (S1) / Diploma 4 (D4)</option>
                                                                    <option value="S2">Strata 2 (S2)</option>
                                                                    <option value="S3">Strata 3 (S3)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="namasekolah">Nama Sekolah/Universitas<span class="danger">*</span></label>
                                                                <input type="text" class="form-control required" id="namasekolah" name="namasekolah" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="jurusan">Jurusan</label>
                                                                <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="lulus">Lulus</label>
                                                                <select id="lulus" class="custom-select" name="lulus" required>
                                                                    <option value="lulus">Lulus</option>
                                                                    <option value="tidak lulus">Tidak Lulus</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </fieldset>

                                            </div>
                                            <div class="actions clearfix">
                                                <button class="btn btn-primary" type="submit" name="submit"><i class="la la-save"></i> Next</button>
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
        $jenjang = $_POST['jenjang'];
        $namasekolah = $_POST['namasekolah'];
        $jurusan = $_POST['jurusan'];
        $lulus = $_POST['lulus'];

        $update = update("UPDATE `user_detail` SET `pendidikan`='$jenjang',`nama_sekolah`='$namasekolah',`jurusan`='$jurusan',`lulus`='$lulus' WHERE userid='".$_SESSION['id']."'");
        if ($update) {
            ?>
        <script type="text/javascript">
            swal({
              title: "Sukses!",
              text: "Mengalihkan dalam 2 Detik.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function(){
                  window.location.href = "index.php";
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
                  window.location.href = "index.php";
            });
        </script>
            <?php
        }
    }
     ?>