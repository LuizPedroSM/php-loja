$(function () {

    $('.efetuarCompra').on('click', function () {
        let numero = $('input[name=cartao_numero]').val();
        let cvv = $('input[name=cartao_cvv]').val();
        let v_mes = $('select[name=cartao_mes]').val();
        let v_ano = $('select[name=cartao_ano]').val();

        if (numero != '' && cvv != '' && v_mes != '' && v_ano != '') {
            PagSeguroDirectPayment.createCardToken({
                cardNumber: numero,
                brand: window.cardBrand,
                cvv: cvv,
                expirationMonth: v_mes,
                expirationYear: v_ano,
                success: function (r) {
                    window.cardToken = r.card.token;

                    // Finalizar o pagamento
                },
                error: function (r) {
                    console.log(r);
                },
                complete: function (r) {

                }
            });
        } else {
            alert("Falta preencher dados do cartão");
        }
    })

    $('input[name=cartao_numero]').on('keyup', function (e) {
        if ($(this).val().length == 6) {
            PagSeguroDirectPayment.getBrand({
                cardBin: $(this).val(),
                success: function (r) {
                    window.cardBrand = r.brand.name;
                    let cvvLimit = r.brand.cvvSize;

                    $('input[name=cartao_cvv]').attr('maxlength', cvvLimit);

                    PagSeguroDirectPayment.getInstallments({
                        amount: 100,
                        brand: window.cardBrand,
                        maxInstallmentNoInterest: 10,
                        success: function (r) {
                            if (r.error == false) {
                                let parc = r.installments[window.cardBrand];

                                let html = '';

                                for (const i in parc) {
                                    let optionValue = parc[i].quantity + ';' + parc[i].installmentAmount + ';';

                                    if (parc[i].insterestFree == true) {
                                        optionValue += 'true';
                                    } else {
                                        optionValue += 'false';
                                    }

                                    html +=
                                        '<option value="' + optionValue + '" >'
                                        + parc[i].quantity + 'x de R$ ' + parc[i].installmentAmount +
                                        '</option>'
                                }

                                $('select[name=parc]').html(html);
                            }
                        },
                        error: function (r) {

                        },
                        complete: function (r) {

                        }
                    })
                },
                error: function (r) {

                },
                complete: function (r) {

                }
            });
        }
    });
});