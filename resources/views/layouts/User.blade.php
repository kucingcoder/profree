  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('judul')</title>
      <link rel="icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">

      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="<?= url('assets/vendor/fonts/boxicons.css') ?>" />
      <link rel="stylesheet" href="<?= url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
      <link rel="stylesheet" href="<?= url('assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="<?= url('assets/css/demo.css') ?>" />
      <link rel="stylesheet" href="<?= url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
      <link rel="stylesheet" href="<?= url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />
      <script src="<?= url('assets/vendor/js/helpers.js') ?>"></script>
      <script src="<?= url('assets/js/config.js') ?>"></script>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/umd/simple-datatables.js"></script>
  </head>

  <?php
    $menu1 = "";
    $menu2 = "";
    $menu3 = "";
    $menu4 = "";
    $menu5 = "";
    $menu6 = "";

    $path = substr("$_SERVER[REQUEST_URI]", 1);

    switch ($path) {
        case "dashboard":
            $menu1 = "active";
            break;
        case "kemampuan":
            $menu2 = "active";
            break;
        case "bahasa-komunikasi":
            $menu3 = "active";
            break;
        case "platform":
            $menu4 = "active";
            break;
        case "laman-labuh":
            $menu5 = "active";
            break;
        case "profil":
            $menu6 = "active";
            break;
        default:
            $menu1 = "active";
            break;
    }

    ?>

  <body>
      <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">
              <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                  <div class="app-brand demo">
                      <a href="dashboard" class="app-brand-link">
                          <span class="app-brand-logo demo">
                              <img src="<?= url('assets/img/icons/brands/profree.svg') ?>" style="width: 64px;" alt="Logo">
                          </span>
                          <span class="app-brand-text demo menu-text fw-bolder ms-2">Profree</span>
                      </a>

                      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                          <i class="bx bx-chevron-left bx-sm align-middle"></i>
                      </a>
                  </div>

                  <div class="menu-inner-shadow"></div>

                  <ul class="menu-inner py-1">
                      <li class="menu-header small text-uppercase">
                          <span class="menu-header-text">SPK</span>
                      </li>

                      <li class="menu-item <?= $menu1 ?>">
                          <a href="<?= url("dashboard") ?>" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-user-pin"></i>
                              <div data-i18n="Analytics">Cari Programer Terbaik</div>
                          </a>
                      </li>

                      <li class="menu-header small text-uppercase">
                          <span class="menu-header-text">Info Pribadi</span>
                      </li>
                      <li class="menu-item <?= $menu2 ?>">
                          <a href="<?= url("kemampuan") ?>" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-code-alt"></i>
                              <div data-i18n="Analytics">Kemampuan</div>
                          </a>
                      </li>
                      <li class="menu-item <?= $menu3 ?>">
                          <a href="bahasa-komunikasi" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-conversation"></i>
                              <div data-i18n="Analytics">Bahasa Komunikasi</div>
                          </a>
                      </li>
                      <li class="menu-item <?= $menu4 ?>">
                          <a href="<?= url("platform") ?>" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-building-house"></i>
                              <div data-i18n="Analytics">Platform</div>
                          </a>
                      </li>
                      <li class="menu-item <?= $menu5 ?>">
                          <a href="<?= url("laman-labuh") ?>" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-food-menu"></i>
                              <div data-i18n="Analytics">Laman Labuh</div>
                          </a>
                      </li>
                      <li class="menu-item <?= $menu6 ?>">
                          <a href="<?= url("profil") ?>" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-user"></i>
                              <div data-i18n="Analytics">Profil</div>
                          </a>
                      </li>
                  </ul>
              </aside>

              <div class="layout-page">
                  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                              <i class="bx bx-menu bx-sm"></i>
                          </a>
                      </div>

                      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                          <ul class="navbar-nav flex-row align-items-center ms-auto">
                              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                      <div class="avatar avatar-online">
                                          <img src="assets/img/illustrations/user.svg" alt="profil" class="w-px-40 h-auto rounded-circle">
                                      </div>
                                  </a>

                                  <ul class="dropdown-menu dropdown-menu-end">
                                      <li>
                                          <a class="dropdown-item" href="#">
                                              <div class="d-flex flex-column align-items-center">
                                                  <div class="flex-shrink-0 me-3">
                                                      <div class="avatar avatar-online">
                                                          <img src="assets/img/illustrations/user.svg" alt="profil" class="w-px-40 h-auto rounded-circle">
                                                      </div>
                                                  </div>
                                                  <div class="mt-2 flex-grow-1">
                                                      <span class="fw-semibold d-block"><?= session()->get("nama") ?></span>
                                                  </div>
                                              </div>
                                          </a>
                                      </li>

                                      <li>
                                          <div class="dropdown-divider"></div>
                                      </li>

                                      <li>
                                          <a class="dropdown-item bg-danger text-white" href="keluar">
                                              <i class="bx bx-exit me-2"></i>
                                              <span class="align-middle">Keluar</span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                  </nav>
                  <div class="content-wrapper">
                      <div class="container-xxl flex-grow-1 container-p-y">
                          @yield('konten')
                      </div>

                      @include('components.Footer')

                      <div class="content-backdrop fade"></div>
                  </div>
              </div>
          </div>

          <div class="layout-overlay layout-menu-toggle"></div>
      </div>

      <script src="<?= url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
      <script src="<?= url('assets/vendor/libs/popper/popper.js') ?>"></script>
      <script src="<?= url('assets/vendor/js/bootstrap.js') ?>"></script>
      <script src="<?= url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

      <script src="<?= url('assets/vendor/js/menu.js') ?>"></script>
      <script src="<?= url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>
      <script src="<?= url('assets/js/main.js') ?>"></script>
      <script src="<?= url('assets/js/dashboards-analytics.js') ?>"></script>
      <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>

  </html>