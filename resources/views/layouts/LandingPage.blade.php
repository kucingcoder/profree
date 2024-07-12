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
      <link rel="stylesheet" href='<?= url("assets/vendor/fonts/boxicons.css") ?>' />
      <link rel="stylesheet" href='<?= url("assets/vendor/css/core.css") ?>' class="template-customizer-core-css" />
      <link rel="stylesheet" href='<?= url("assets/vendor/css/theme-default.css") ?>' class="template-customizer-theme-css" />
      <link rel="stylesheet" href='<?= url("assets/css/demo.css") ?>' />
      <link rel="stylesheet" href='<?= url("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") ?>' />
      <link rel="stylesheet" href='<?= url("assets/vendor/libs/apex-charts/apex-charts.css") ?>' />
      <script src='<?= url("assets/vendor/js/helpers.js") ?>'></script>
      <script src='<?= url("assets/js/config.js") ?>'></script>
  </head>

  <body>
      @yield('konten')

      @include('components.Footer')

      <script src='<?= url("assets/vendor/libs/jquery/jquery.js") ?>'></script>
      <script src='<?= url("assets/vendor/libs/popper/popper.js") ?>'></script>
      <script src='<?= url("assets/vendor/js/bootstrap.js") ?>'></script>
      <script src='<?= url("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") ?>'></script>

      <script src='<?= url("assets/vendor/js/menu.js") ?>'></script>
      <script src='<?= url("assets/vendor/libs/apex-charts/apexcharts.js") ?>'></script>
      <script src='<?= url("assets/js/main.js") ?>'></script>
      <script src='<?= url("assets/js/dashboards-analytics.js") ?>'></script>
      <script async defer src='https://buttons.github.io/buttons.js")?>'></script>
  </body>

  </html>