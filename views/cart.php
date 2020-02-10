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
            <td>
                <a href="<?php echo BASE_URL; ?>cart/del/<?php echo $item['id']; ?>">
                    <img width="15" src="<?php echo BASE_URL; ?>assets/images/delete.png" >
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tr>
        <td colspan="3" align="right" >Sub-Total: </td>
        <td><strong><?php echo 'R$ '.number_format($subtotal, 2, ',', '.'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="3" align="right" >Frete: </td>
        <td>
            <?php if(isset($shipping['price'])): ?>
                <strong>R$ <?php echo $shipping['price']; ?></strong>
                (<?php echo $shipping['date']; ?> dia<?php echo ($shipping['date'] == '1')?'':'s'; ?>)
            <?php else: ?>
                Qual seu CEP? <br>
                <form action="" method="post">
                    <input type="number" name="cep">
                    <input type="submit" value="Calcular">
                </form>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" align="right" >Total: </td>
        <td>
            <strong>
                R$ <?php 
                    if (isset($shipping['price'])) {
                        $frete = floatval(str_replace(',', '.', $shipping['price']));
                    } else {
                        $frete = 0;
                    }
                    $total = $subtotal + $frete;
                    echo number_format($total, 2, ',', '.'); 
                ?>
            </strong>
        </td>
    </tr>
</table>

<hr>

<?php if($frete > 0): ?>
    <form action="<?php echo BASE_URL; ?>cart/payment_redirect" method="post" style="float:right" >
        <select name="payment_type">
            <option value="checkout_transparente">Pagseguro Checkout Transparente</option>
            <option value="mp">Mercado Pago</option>
            <option value="paypal">PayPal</option>
        </select>
        <input class="button" type="submit" value="Finalizar Compra">
    </form>
<?php endif; ?>