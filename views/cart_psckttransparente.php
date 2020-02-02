<h1>Chekout Transparente - Pagseguro</h1>

<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
PagSeguroDirectPayment.setSessionId("<?php echo $sessionCode; ?>");
</script>

sessão: <?php echo $sessionCode; ?>