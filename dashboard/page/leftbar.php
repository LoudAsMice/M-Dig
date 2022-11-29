    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li <?php if ($page == "") {
                    echo 'class="active"';
                } ?>><a href="index.php"><i class="fa-regular fa-chart-line"></i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps">Layanan</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                </li>
                <li <?php if ($page == "surat") {
                    echo 'class="active"';
                } ?>class=" nav-item"><a href="?page=surat"><i class="fa-regular fa-envelope-open"></i><span class="menu-title" data-i18n="Calendar">Surat Online</span></a>
                </li>
                <?php if ($login[0]['level'] == "Admin") {
                    ?>

                <li class=" navigation-header"><span data-i18n="Apps">Postingan</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                <li <?php if ($page == "category-post") {
                    echo 'class="active"';
                } ?>class=" nav-item"><a href="?page=category-post"><i class="fa-regular fa-folder-open"></i><span class="menu-title" data-i18n="Calendar">Kategori Postingan</span></a>
                </li>
                <li <?php if ($page == "blog-post") {
                echo 'class="active"';
                     } ?>class=" nav-item"><a href="?page=blog-post"><i class="fa-regular fa-newspaper"></i><span class="menu-title" data-i18n="Calendar">Manage Postingan</span></a>
                </li>
                
                <li class=" navigation-header"><span data-i18n="Apps">Surat</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                <li <?php if ($page == "category-surat") {
                    echo 'class="active"';
                } ?>class=" nav-item"><a href="?page=category-surat"><i class="fa-regular fa-folder-open"></i><span class="menu-title" data-i18n="Calendar">Kategori Surat</span></a>
                </li>
                
                <?php
                } ?>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->