<div class="row">
    <div class="col-sm-5">
        <div class="mainphoto">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $product_images[0]['url']; ?>" alt="">
        </div>
        <div class="gallery">
            <?php foreach($product_images as $img): ?>
                <div class="photo_item">
                    <img src="<?php echo BASE_URL; ?>media/products/<?php echo $img['url']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-sm-7">
        <h2><?php echo $product_info['name']; ?></h2>
        <small><?php echo $product_info['brand_name']; ?></small><br>
        <?php if($product_info['rating'] != '0'): ?>
            <?php for ($q=0; $q < intval($product_info['rating']); $q++): ?>
                <img src="<?php echo BASE_URL; ?>assets/images/star.png" border="0" height="15">
            <?php endfor; ?>
        <?php endif; ?>
        <hr>
        <p> <?php echo utf8_encode($product_info['description']); ?> </p>
        <hr>
        De:
        <span class="price_from"> <?php echo 'R$ '.number_format($product_info['price_from'], 2, ',', '.'); ?> </span>
        <br>
        Por:
        <span class="price_now"> <?php echo 'R$ '.number_format($product_info['price'], 2, ',', '.'); ?> </span>

        <form class="addtocartform" method="post" action="<?php echo BASE_URL; ?>cart/add">
            <input type="hidden" name="id_product" value="<?php echo $product_info['id']; ?>">
            <input type="hidden" name="qt_product" value="1">
            <button data-action="decrease">-</button><input class="addtocart_qt" type="number" name="qt" id="qt" value="1" disabled><button data-action="increase">+</button>
            <input class="addtocart_submit" type="submit" value="<?php $this->lang->get('ADD_TO_CART'); ?>">
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6">
        <h3><?php $this->lang->get('SPECIFICATIONS'); ?></h3>
        <?php foreach($product_options as $op): ?>
            <strong><?php echo $op['name']; ?></strong>: <?php echo $op['value']; ?> <br>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-6">
        <h3><?php $this->lang->get('REVIEWS'); ?></h3>
        <?php foreach($product_rates as $rate): ?>
            <strong><?php echo $rate['user_name']; ?></strong> - 
                <?php for ($q=0; $q < intval($rate['points']); $q++): ?>
                    <img src="<?php echo BASE_URL; ?>assets/images/star.png" border="0" height="15">
                <?php endfor; ?>
            <br>
            "<?php echo $rate['comment']; ?> "
            <hr>
        <?php endforeach; ?>    
    </div>
</div>