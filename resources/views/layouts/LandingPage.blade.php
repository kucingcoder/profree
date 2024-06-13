  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('judul')</title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  </head>

  <body>
      @include('components.Header')

      @yield('konten')

      @include('components.Footer')

      <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>