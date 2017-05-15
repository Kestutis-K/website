<?php
ob_start();
require ("init.php");
?>

<!DOCTYPE html>
<html lang="lt">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ežiukai - Valdymas | <?php echo $pagename; ?> </title>

    <!-- Bootstrap -->
    <link href="/vendors/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress admin-->
    <link href="/vendors/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/css/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/vendors/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/css/daterangepicker.css" rel="stylesheet">

      <script src="/vendors/js/tinymce/tinymce.min.js?apiKey=jmehmm8u7d01uug46eq5a4mboscysi3l2zt3su0p0jjrjetc"></script>
      <script>
          tinymce.init({ selector:'textarea',
              language: 'lt',
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste jbimages"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
              relative_urls: false



          });

      </script>

    <!-- Custom Theme Style -->
    <link href="/resources/css/custom.css" rel="stylesheet">
  </head>
