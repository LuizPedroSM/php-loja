<h1>Chekout Paypal</h1>

<?php if(!empty($error)): ?>
<div class="warn">
    <?php echo $error; ?>
</div>
<?php endif; ?>
<h3>Dados Pessoais</h3>

<form method="post">
    <strong>Nome: </strong><br>
    <input type="text" name="name" value="Luiz Pedro"><br><br>

    <strong>CPF: </strong><br>
    <input type="text" name="cpf" value="15254349778" ><br><br>

    <strong>Telefone: </strong><br>
    <input type="text" name="telefone" value="83987654321"><br><br>

    <strong>E-mail: </strong><br>
    <input type="email" name="email" value="teste@teste.com" ><br><br>

    <strong>Senha: </strong><br>
    <input type="password" name="pass" value="123"><br><br>

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
    <input class="button efetuarCompra" type="submit" value="Efetuar Compra">
</form>
