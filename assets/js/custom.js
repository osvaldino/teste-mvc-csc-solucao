(function ($) {
    "use strict";
    $(function () {

        /* BASE URL */
        function getBaseURL(){
            if ($("base").length){
                return $("base").attr("href");
            }
            return window.location.origin;
        }

        /* VALIDATION FORMS */
        $('.formValidated').on('submit', function (e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            let data = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (data) {
                    console.log(data);
                    if (data.success) {
                        iziToast.success({
                            timeout: 8000,
                            position: 'topRight',
                            close: true,
                            message: data.success
                        });
                        if(data.redirect){
                            setTimeout(function() {
                                window.location.href = data.redirect;
                            }, 2000);
                        }
                    }
                    if (data.error) {
                        iziToast.error({
                            timeout: 8000,
                            position: 'topRight',
                            close: true,
                            message: data.error
                        });
                    }
                },
                error: function (xhr) {
                    if (xhr.status == 422) {
                        let response = JSON.parse(xhr.responseText);
                        printErrorMsg(response.errors);
                        iziToast.error({
                            timeout: 8000,
                            position: 'topRight',
                            close: true,
                            message: response.message
                        });
                    }
                }
            });
        });

        /* PRINT ERRORS VALIDATION */
        function printErrorMsg(msg) {
            $.each(msg, function (key, value) {
                $('.' + key + '_err').html(value[0]);
                $('#' + key).addClass('form-control-danger');
                $('#' + key).on('keyup', function (e) {
                    let element = $(e.currentTarget);
                    if ($('#' + key).val().length > 0) {
                        $('#' + key).removeClass('form-control-danger');
                        $('.' + key + '_err').text('');
                    }
                });
            });
        }

        /*MASK*/
        $(".phone").mask("(99) 9999-9999?9");
        $(".phone").blur(function(event) {
            if($(this).val().length == 15){
                $('.phone').mask('(99) 99999-999?9');
            } else {
                $('.phone').mask('(99) 9999-9999?9');
            }
        });
        $(".cpf").mask("999.999.999-99");
        $(".date").mask("99/99/9999");
        $("#zipcode").mask("99999-999");

        /*FIND ZIPCODE*/
        $("#zipcode").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#street").val("...");
                    $("#district").val("...");
                    $("#city").val("...");
                    $("#state").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#street").val(dados.logradouro);
                            $("#district").val(dados.bairro);
                            $("#city").val(dados.localidade);
                            $("#state").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });

        /*LIMPA FORM*/
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#street").val("");
            $("#district").val("");
            $("#city").val("");
            $("#state").val("");
        }
    });

}(jQuery));
