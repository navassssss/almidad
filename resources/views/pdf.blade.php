<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic HTML Template</title>

  <!-- Flipbook StyleSheets -->
  <link href="{{ asset('dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css">
  <!-- themify-icons.min.css is not required in version 2.0 and above -->
  <link rel="stylesheet" href="{{ asset('dflip/css/themify-icons.min.css') }}">

</head>

<body>
  <div class="_df_book" id="my_flip" source="{{ asset('pdf/almidad.pdf') }}" options='{"rtl": true}'></div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{ asset('dflip/js/dflip.min.js') }}" type="text/javascript"></script>

  <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // document.onkeydown = function (e) {
    //   if (e.keyCode == 123 || // F12
    //     (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key.toUpperCase())) ||
    //     (e.ctrlKey && e.key.toLowerCase() === 'u')) {
    //     return false;
    //   }
    // }
    var option_my_flip = {
      direction: DFLIP.DIRECTION.RTL, showDownloadControl: false,
      showSearchControl: true,
    };
  </script>
</body>

</html>