<h1>Carrinho</h1>
<table class="table">
    <thead>
        <tr>
            <th width="100">Imagem</th>
            <th>Nome</th>
            <th width="50">Qtd.</th>
            <th width="120">Preço</th>
            <th width="20"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $subtotal = 0;
            foreach($list as $item): 
            $subtotal += ( floatval($item['price']) * intval($item['qt']) );
        ?>
        <tr>
            <td><img width="80" src="<?php echo BASE_URL; ?>media/products/<?php echo $item['image']; ?>"></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['qt']; ?></td>
            <td><?php echo 'R$ '.number_format($item['price'], 2, ',', '.'); ?></td>
            <td><a href="<?php echo BASE_URL; ?>cart/del/<?php echo $item['id']; ?>"><img width="15" src="<?php echo BASE_URL; ?>assets/images/delete.png" ></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tr>
        <td colspan="3" align="right" >Sub-Total: </td>
        <td><strong><?php echo 'R$ '.number_format($subtotal, 2, ',', '.'); ?></strong></td>
    </tr>
</table>