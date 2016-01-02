<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/views/css/style.css">
    </head>
<?php session_start(); ?>
    <body>
        <div class="col-lg-12 productPage">
        <?php foreach($itemMass as $item): ?>
            <?php include($this->path.'views/smallPage.php'); ?>
        <?php endforeach; ?>
            <input type="hidden" value="<?php echo $_SESSION['userId']; ?>" id="userId">
        </div>

        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="/views/js/script.js"></script>
    </body>
</html>