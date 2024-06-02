
<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset($website_setting->icon)}}" />

<!-- BOOTSTRAP CSS -->
<link id="style" href="{{asset('/')}}seller/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

<!-- STYLE CSS -->
<link href="{{asset('/')}}seller/assets/css/style.css" rel="stylesheet" />
<link href="{{asset('/')}}seller/assets/css/skin-modes.css" rel="stylesheet" />

<!--- FONT-ICONS CSS -->
<link href="{{asset('/')}}seller/assets/plugins/icons/icons.css" rel="stylesheet" />

<!-- INTERNAL Switcher css -->
<link href="{{asset('/')}}seller/assets/switcher/css/switcher.css" rel="stylesheet">
<link href="{{asset('/')}}seller/assets/switcher/demo.css" rel="stylesheet">

{{-- Toastr  --}}
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link href="{{asset('/')}}website/assets/font-awesome/css/all.css" rel="stylesheet" />


{{-- date piker --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@stack('js')
