<aside>
    <h1><?php $this->lang->get('FILTER'); ?></h1>
    <div class="filterarea">
        <form method="get">	

            <input type="hidden" name="s" value="<?php echo $viewData['searchTerm']; ?>">
            <input type="hidden" name="category" value="<?php echo $viewData['category']; ?>">								
        
            <div class="filterbox">
                <div class="filtertitle">
                    <?php $this->lang->get('BRANDS'); ?>
                </div>
                <div class="filtercontent">
                    <?php foreach($viewData['filters']['brands'] as $bitem): ?>
                        <div class="filteritem">
                            <input type="checkbox" 
                                <?php echo 
                                    (isset($viewData['filters_selected']['brand']) &&
                                        in_array($bitem['id'], $viewData['filters_selected']['brand']))? 
                                        'checked="checked"':'' 
                                ?>
                                name="filter[brand][]" 
                                value="<?php echo $bitem['id']; ?>" 
                                id="brand<?php echo $bitem['id']; ?>"
                            >
                            <label for="brand<?php echo $bitem['id']; ?>">
                                <?php echo $bitem['name']; ?>
                            </label>
                            <span>
                                (<?php echo $bitem['count']; ?>)
                            </span>
                        </div>
                    <?php endforeach?>
                </div>
            </div>
            
            <div class="filterbox">
                <div class="filtertitle">
                    <?php $this->lang->get('PRICE'); ?>
                </div>
                <div class="filtercontent">
                    <input type="hidden" name="filter[slider0]" id="slider0" value="<?php echo $viewData['filters']['slider0']; ?>">
                    <input type="hidden" name="filter[slider1]" id="slider1" value="<?php echo $viewData['filters']['slider1']; ?>">
                    <input type="text" id="amount" readonly >
                    <div id="slider-range"></div>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle">
                    <?php $this->lang->get('RATING'); ?>
                </div>
                <div class="filtercontent">
                    <div class="filteritem">
                        <input type="checkbox" 
                            <?php echo 
                                (isset($viewData['filters_selected']['star']) &&
                                    in_array('0', $viewData['filters_selected']['star']))? 
                                    'checked="checked"':'' 
                            ?>
                            name="filter[star][]" 
                            value="0" 
                            id="star0"
                        >
                        <label for="star0">
                            (<?php $this->lang->get('NO_STAR'); ?>)
                        </label>
                        <span>
                            (<?php echo $viewData['filters']['stars']['0']; ?>)
                        </span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" 
                        <?php echo 
                            (isset($viewData['filters_selected']['star']) &&
                                in_array('1', $viewData['filters_selected']['star']))? 
                                'checked="checked"':'' 
                        ?>
                        name="filter[star][]" value="1" id="star1">
                        <label for="star1">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                        </label>
                        <span>
                            (<?php echo $viewData['filters']['stars']['1']; ?>)
                        </span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" 
                        <?php echo 
                            (isset($viewData['filters_selected']['star']) &&
                                in_array('2', $viewData['filters_selected']['star']))? 
                                'checked="checked"':'' 
                        ?>
                        name="filter[star][]" value="2" id="star2">
                        <label for="star2">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                        </label>
                        <span>
                            (<?php echo $viewData['filters']['stars']['2']; ?>)
                        </span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" 
                        <?php echo 
                            (isset($viewData['filters_selected']['star']) &&
                                in_array('3', $viewData['filters_selected']['star']))? 
                                'checked="checked"':'' 
                        ?>
                        name="filter[star][]" value="3" id="star3">
                        <label for="star3">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                        </label>
                        <span>
                            (<?php echo $viewData['filters']['stars']['3']; ?>)
                        </span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" 
                        <?php echo 
                            (isset($viewData['filters_selected']['star']) &&
                                in_array('4', $viewData['filters_selected']['star']))? 
                                'checked="checked"':'' 
                        ?>
                        name="filter[star][]" value="4" id="star4">
                        <label for="star4">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                        </label>
                        <span>
                            (<?php echo $viewData['filters']['stars']['4']; ?>)
                        </span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" 
                        <?php echo 
                            (isset($viewData['filters_selected']['star']) &&
                                in_array('5', $viewData['filters_selected']['star']))? 
                                'checked="checked"':'' 
                        ?>
                        name="filter[star][]" value="5" id="star5">
                        <label for="star5">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                            <img src="<?php echo BASE_URL; ?>assets/images/star.png" height="13" border="0">
                        </label>
                        <span>
                            (<?php echo $viewData['filters']['stars']['5']; ?>)
                        </span>
                    </div>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle">
                    <?php $this->lang->get('SALE'); ?>
                </div>
                <div class="filtercontent">
                    <div class="filteritem">
                        <input type="checkbox" 
                        <?php echo 
                            (isset($viewData['filters_selected']['sale']) &&
                                $viewData['filters_selected']['sale'] == '1')? 
                                'checked="checked"':'' 
                        ?>
                        name="filter[sale]" id="sale" value="1">
                        <label for="sale">Em Promoção</label>
                        <span>
                            (<?php echo $viewData['filters']['sale']; ?>)
                        </span>
                    </div>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle">
                    <?php $this->lang->get('OPTIONS'); ?>
                </div>
                <div class="filtercontent">
                    <?php foreach($viewData['filters']['options'] as $option ): ?>
                        <strong><?php echo $option['name']; ?></strong>
                        <?php foreach($option['options'] as $op ): ?>
                            <div class="filteritem">
                                <input type="checkbox" name="filter[options][]" 
                                <?php echo 
                                    (isset($viewData['filters_selected']['options']) &&
                                        in_array($op['value'], $viewData['filters_selected']['options']))? 
                                        'checked="checked"':'' 
                                ?>
                                    value="<?php echo $op['value']; ?>" 
                                    id="options<?php echo $op['id']; ?>"
                                >
                                <label for="options<?php echo $op['id']; ?>">
                                    <?php echo $op['value']; ?>
                                </label>
                                <span>
                                    (<?php echo $op['count']; ?>)
                                </span>
                            </div>
                        <?php endforeach; ?>
                        <br>
                    <?php endforeach; ?>
                
                </div>
            </div>
        </form>
    </div>

    <div class="widget">
        <h1><?php $this->lang->get('FEATUREDPRODUCTS'); ?></h1>
        <div class="widget_body">
            <?php $this->loadView('widget_item',array('list' => $viewData['widget_featured1'])) ?>
        </div>
    </div>
</aside>