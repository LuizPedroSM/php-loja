<h1>Você está procurando por: "<?php echo $searchTerm; ?>"</h1>

<div class="row">
    <?php  $a = 0; ?>
    <?php foreach ($list as $product_item ):?>
        <div class="col-sm-4"><?php $this->loadView('product_item', $product_item); ?></div>
        <?php  if($a>=2){
             $a = 0 ;echo '<div class="row"></div>';
            } else {  
                $a++ ;
            }
        ?>
    <?php endforeach ?>
</div>
<div class="paginationArea">
    <?php for ($q=1; $q <= $numberOfPages; $q++): ?>
        <div class="paginationItem <?php echo ($currentPage == $q)? 'pag_active':''; ?>">
            <a href="
                <?php 
                    $pag_array = $_GET; 
                    $pag_array['p'] = $q; 
                    echo BASE_URL.'?'.http_build_query($pag_array);
                ?>
            ">
                <?php echo $q; ?>
            </a>
        </div>
    <?php endfor; ?>
</div>