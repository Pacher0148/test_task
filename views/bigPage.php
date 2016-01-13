<?php
    header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/views/css/style.css">
    </head>

    <body>
        <div class="col-lg-12 productPage">
            <a class="pull-right" href="/config/routing.php?file=productController&action=productList">Back to list</a>
            <h3><?php echo $itemMass[0]['name']; ?></h3>
            <img class="pull-left bigImage" src="<?php echo $itemMass[0]['image']; ?>">
            <div class="commentList">
            <?php if ($itemMass > 1): ?>
                <?php foreach($itemMass as $item): ?>
                    <div class="col-xs-12">
                        <span class="userName"><?php echo $item['userName']; ?></span>
                    <?php for($i = 0; $i < $item['rate']; $i++): ?>
                        <i class="glyphicon glyphicon-star"></i>
                    <?php endfor; ?>
                        <p class="userComment"><?php echo htmlentities($item['comment']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-xs-12">
                    <h3>No comments & rates</h3>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </body>
</html>
