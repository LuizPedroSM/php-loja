$(function () {

    $('.efetuarCompra').on('click', function () {
        let id = PagSeguroDirectPayment.getSenderHash();

        let name = $('input[name=name]').val();
        let cpf = $('input[name=cpf]').val();
        let email = $('input[name=email]').val();
        let telefone = $('input[name=telefone]').val();
        let pass = $('input[name=password]').val();

        let cep = $('input[name=cep]').val();
        let rua = $('input[name=rua]').val();
        let numero = $('input[name=numero]').val();
        let complemento = $('input[name=complemento]').val();
        let bairro = $('input[name=bairro]').val();
        let cidade = $('input[name=cidade]').val();
        let estado = $('input[name=estado]').val();

        let cartao_titular = $('input[name=cartao_titular]').val();
        let cartao_cpf = $('input[name=cartao_cpf]').val();
        let cartao_numero = $('input[name=cartao_numero]').val();
        let cvv = $('input[name=cartao_cvv]').val();
        let v_mes = $('select[name=cartao_mes]').val();
        let v_ano = $('select[name=cartao_ano]').val();

        let parc = $('select[name=parc]').val();

        if (cartao_numero != '' && cvv != '' && v_mes != '' && v_ano != '') {
            PagSeguroDirectPayment.createCardToken({
                cardNumber: cartao_numero,
                brand: window.cardBrand,
                cvv: cvv,
                expirationMonth: v_mes,
                expirationYear: v_ano,
                success: function (r) {
                    window.cardToken = r.card.token;

                    $.ajax({
                        url: BASE_URL + 'psckttransparente/checkout',
                        type: 'POST',
                        data: {
                            id: id,
                            name: name,
                            cpf: cpf,
                            telefone: telefone,
                            email: email,
                            pass: pass,
                            cep: cep,
                            rua: rua,
                            numero: numero,
                            complemento: complemento,
                            bairro: bairro,
                            cidade: cidade,
                            estado: estado,
                            cartao_titular: cartao_titular,
                            cartao_cpf: cartao_cpf,
                            cartao_numero: cartao_numero,
                            cvv: cvv,
                            v_mes: v_mes,
                            v_ano: v_ano,
                            cartao_token: window.cardToken,
                            parc: parc
                        },
                        dataType: 'json',
                        success: function (json) {
                            if (json.error == true) {
                                alert(json.msg);
                            }
                        },
                        error: function (r) {

                        }
                    })
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
                        amount: $('input[name=total]').val(),
                        brand: window.cardBrand,
                        // maxInstallmentNoInterest: 10,
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