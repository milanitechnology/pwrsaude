@extends('layouts/contentNavbarLayout')

@section('title', 'Planos de Assinatura - Pwr Saúde+')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Planos de Assinatura /</span> Checkout
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-card me-1"></i> Formas de Pagamento</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">+Saúde Individual</h5>
      <!-- Account -->
      <hr class="my-0">
      <div class="card-body">
        @if (Session::has('success')) 
          <div class="alert alert-success text-center"> 
            <a href= "#" class="close" data-dismiss="alert" aria-label="close">×</a> 
            <p>{{ Session::get('success') }}</p>
          </div> 
        @endif 

        <form 
            role="form"
            action="{{ route('payment.checkout.post') }}" 
            method="post" 
            class="require-validation" 
            data-cc-on-file="false" 
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" 
            id="payment-form"> 

          @csrf 

          <div class="row"> 
              <div class="col-xs-12"> 
                  <button class="btn btn-primary btn-lg btn -block" type="submit">Assinar</button> 
              </div> 
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Adicionando Javascript do CEP -->
<script>

  $(document).ready(function() {

  function limpa_formulário_cep() {
      // Limpa valores do formulário de cep.
      $("#address").val("");
      $("#neighborhood").val("");
      $("#city").val("");
      $("#state").val("");
  }
  
  //Quando o campo cep perde o foco.
  $("#cep").blur(function() {
  
      //Nova variável "cep" somente com dígitos.
      var cep = $(this).val().replace(/\D/g, '');
  
      //Verifica se campo cep possui valor informado.
      if (cep != "") {
  
          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;
  
          //Valida o formato do CEP.
          if(validacep.test(cep)) {
  
              //Preenche os campos com "..." enquanto consulta webservice.
              $("#address").val("...");
              $("#neighborhood").val("...");
              $("#city").val("...");
              $("#state").val("...");
  
              //Consulta o webservice viacep.com.br/
              $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
  
                  if (!("erro" in dados)) {
                      //Atualiza os campos com os valores da consulta.
                      $("#address").val(dados.logradouro);
                      $("#neighborhood").val(dados.bairro);
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
  });
  
  </script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>