
<head>
    <meta charset="utf-8" />
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{App\Services\SettingService::getSetting('meta_description')}}" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{Storage::url(App\Services\SettingService::getSetting('favicon'))}}">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>



    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="res/style.css" />
    <link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="richtexteditor/rte.js"></script>
    <script>
        RTE_DefaultConfig.url_base = 'richtexteditor'
    </script>
    <script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
    <script src="https://cdn.tiny.cloud/1/eoe3hgk632pcd6ls7hm49drdlf9gqie86gkagu39c3tetoo1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>


<!-- Place the first <script> tag in your HTML's <head> -->
    

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->