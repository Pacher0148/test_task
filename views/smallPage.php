
<div class="col-xs-2">
    <h3><?php echo $item['name']; ?></h3>
    <div class="productCard" style="background: url('<?php echo $item['image']; ?>') no-repeat center" id="<?php echo $item['id']; ?>">
    </div>
    <hr>
    <span>Rait it!</span>
    <span class="rait">
        <input type="radio" name="rait<?php echo $item['name']; ?>" id="raitChoose" value="1" hint="very bad">
        <input type="radio" name="rait<?php echo $item['name']; ?>" id="raitChoose" value="2" hint="bad">
        <input type="radio" name="rait<?php echo $item['name']; ?>" id="raitChoose" value="3" hint="normal">
        <input type="radio" name="rait<?php echo $item['name']; ?>" id="raitChoose" value="4" hint="good">
        <input type="radio" name="rait<?php echo $item['name']; ?>" id="raitChoose" value="5" hint="very good">
        <i class="glyphicon glyphicon-remove removeRait" name="rait<?php echo $item['name']; ?>" id="raitChoose" value="0" hint="cancel rait"></i>
    </span>
    <textarea class="comment" rows="3" placeholder="Leave a comment"></textarea>
    <button class="btn btn-sm btn-primary pull-right" id="saveComment">Save</button>
</div>