<!DOCTYPE html>
<html lang="lt">
<head>

    <!--     Metas-->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--      CSS-->
    <link rel="stylesheet" href="vendors/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="resources/css/styles.css" type="text/css">
    <link rel="stylesheet" href="resources/css/queries.css" type="text/css">
    <link rel="stylesheet" href="vendors/css/grid.css" type="text/css">
    <link rel="stylesheet" href="vendors/css/ionicons.css" type="text/css">
    <link rel="stylesheet" href="vendors/css/animate.css" type="text/css">

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '105239366720653',
                xfbml      : true,
                version    : 'v2.9'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/lt_LT/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>


    <!--       Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400&amp;subset=latin-ext" rel="stylesheet">

    <title>Ežiukai</title>
</head>