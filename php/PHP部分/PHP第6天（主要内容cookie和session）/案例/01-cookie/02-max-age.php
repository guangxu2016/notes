<?php

if ( array_key_exists( "myname", $_COOKIE ) ) {
    var_dump( $_COOKIE );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if( !array_key_exists( "myname", $_COOKIE ) ) { ?>
    <script>
        document.cookie = "myname=jim; max-age=10";
    </script>
    <?php } ?>
</body>
</html>