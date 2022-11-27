    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li <?php if ($page == "") {
                    echo 'class="active"';
                } ?>><a href="index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard Hospital">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps">Layanan</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                </li>
                <li <?php if ($page == "surat") {
                    echo 'class="active"';
                } ?>class=" nav-item"><a href="?page=surat"><i class="la la-calendar"></i><span class="menu-title" data-i18n="Calendar">Surat Online</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->