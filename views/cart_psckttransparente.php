<h1>Chekout Transparente - Pagseguro</h1>

<h3>Dados Pessoais</h3>

<strong>Nome: </strong><br>
<input type="text" name="name" value="Luiz Pedro"><br><br>

<strong>CPF: </strong><br>
<input type="text" name="cpf" value="15254349778" ><br><br>

<strong>Telefone: </strong><br>
<input type="text" name="telefone" value="83987654321" ><br><br>

<strong>E-mail: </strong><br>
<input type="email" name="email" value="c48632106402220081750@sandbox.pagseguro.com.br" ><br><br>

<strong>Senha: </strong><br>
<input type="password" name="password" value="l996714655451996" ><br><br>

<h3>Informaçoes de Endereço</h3>

<strong>CEP: </strong><br>
<input type="text" name="cep" value="58410340" ><br><br>

<strong>Rua: </strong><br>
<input type="text" name="rua" value="Rua Vigário Calixto"><br><br>

<strong>Número: </strong><br>
<input type="text" name="numero" value="1400"><br><br>

<strong>Complemento: </strong><br>
<input type="text" name="complemento" ><br><br>

<strong>Bairro: </strong><br>
<input type="text" name="bairro" value="Catolé" ><br><br>

<strong>Cidade: </strong><br>
<input type="text" name="cidade" value="Campina Grande" ><br><br>

<strong>Estado: </strong><br>
<input type="text" name="estado" value="PB" ><br><br>

<h3>Informaçoes de Pagamento</h3>

<strong>Titular do cartão: </strong><br>
<input type="text" name="cartao_titular" value="Luiz Pedro"><br><br>

<strong>CPF do Titular do cartão: </strong><br>
<input type="text" name="cartao_cpf" value="15254349778"><br><br>
<!-- 4111111111111111 -->
<strong>Número do cartão: </strong><br>
<input type="text" name="cartao_numero"><br><br>
<!-- 123 -->
<strong>Código de segurança: </strong><br>
<input type="text" name="cartao_cvv" ><br><br>
<!-- 12/2030 -->
<strong>Validade: </strong><br>
<select name="cartao_mes">
    <?php for ($i=1; $i <=12 ; $i++): ?>
        <option><?php echo ($i<10)? '0'.$i : $i; ?></option>
    <?php endfor; ?>
</select>
<select name="cartao_ano">
    <?php 
        $ano = intval(date('Y'));
        for ($i=$ano; $i <=($ano+20) ; $i++): 
    ?>
        <option><?php echo $i; ?></option>
    <?php endfor; ?>
</select><br><br>

<strong>Parcelas:</strong><br>
<select name="parc">

</select><br><br>

<input type="hidden" name="total" value="<?php echo $total; ?>" />

<button class="button efetuarCompra">Efetuar Compra</button>

<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/psckttransparente.js"></script>
<script>
PagSeguroDirectPayment.setSessionId("<?php echo $sessionCode; ?>");
</script>