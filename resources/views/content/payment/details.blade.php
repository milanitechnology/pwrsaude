@extends('layouts/contentNavbarLayout')

@section('title', 'Formas de Pagamento - Pwr Saúde+')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Formas de Pagamento /</span> Detalhes
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-card me-1"></i> Formas de Pagamento</a></li>
    </ul>

    <div class="card mb-4">
      <h5 class="card-header">Detalhes</h5>
      <!-- Account -->
      <hr class="my-0">
      <div class="card-body">
        @include('layouts.partials.messages')
        <form 
            action="{{ route('payment.details.post') }}" 
            method="post" > 

          @csrf 

          <div class="mt-2 mb-4">
            <label for="payment_form" class="form-label">Forma de Pagamento</label>
            <select id="payment_form" name="payment_form" class="form-select form-select-lg">
              @switch($payment->payment_form)
                  @case("credit_card")
                    <option value="credit_card" selected>Cartão de Crédito</option>
                    <option value="pix">PIX</option>
                    <option value="boleto">Boleto Bancário</option>
                  @break

                  @case("pix")
                    <option value="credit_card">Cartão de Crédito</option>
                    <option value="pix" selected>PIX</option>
                    <option value="boleto">Boleto Bancário</option>
                  @break

                  @case("boleto")
                    <option value="credit_card">Cartão de Crédito</option>
                    <option value="pix">PIX</option>
                    <option value="boleto" selected>Boleto Bancário</option>
                  @break

                  @default
                  <option value="credit_card">Cartão de Crédito</option>
                  <option value="pix">PIX</option>
                  <option value="boleto">Boleto Bancário</option>   

              @endswitch
            </select>
          </div>

          <div id="dados_credito" {{ $payment->payment_form != "credit_card" ? ' style=display:none ' : 'style=display:block' }}>
            <div class='form-row row mb-3'> 
                <div class='col-xs-12 form-group required'> 
                    <label class='control-label'>Nome no cartão</label> 
                    <input id="name" name="name" class='form-control' size='4' type='text' value="{{ old(auth()->user()->name, $payment->name) }}"> 
                </div>
            </div> 

            <div class='form-row row mb-3'> 
                <div class='col-xs-12 form-group required'> 
                    <label class='control-label'>Número do cartão</label> 
                    <input id="number" name="number" autocomplete='off' class='form-control card-number' size='20' type='text' value="{{ old('number', $payment->number) }}"> 
                </div> 
            </div> 

            <div class='form-row row mb-3'> 
                <div class='col-xs-12 col-md-4 form-group required'> 
                    <label class='control-label'>CVC</label>
                    <input id="cvc" name="cvc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' value="{{ old('cvc', $payment->cvc) }}"> 
                </div> 
                <div class='col-xs-12 col-md-4 form-group required'> 
                    <label class='control-label'>Validade (Mês)</label> 
                    <input id="expiration_month" name="expiration_month" class='form-control card-expiry-month' placeholder='MM' size='2' type='text' value="{{ old('expiration_month', $payment->expiration_month) }}"> 
                </div> 
                <div class='col-xs-12 col-md-4 form-grouprequired'>
                    <label class='control-label'>Validade (Ano)</label> 
                    <input id="expiration_year" name="expiration_year" class='form-control card-expiry-year' placeholder='YYYY' max='4' type='text' value="{{ old('expiration_year', $payment->expiration_year) }}">
                </div>
            </div>
          </div>
          
          <div class="row"> 
              <div class="col-xs-12"> 
                  <button class="btn btn-primary mt-2 w-50 btn-block" type="submit">Salvar / Atualizar</button> 
              </div> 
          </div> 
        </form>
      </div>
      <!-- /Account -->
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
    $("#payment_form").change(function(){
      if($("#payment_form option:selected").val() != "credit_card"){
        $("#dados_credito").hide();
        $("#name").val("");
        $("#number").val("");
        $("#cvc").val("");
        $("#expiration_month").val("");
        $("#expiration_year").val("");

      } else {
        $("#dados_credito").show();
      }
    });
  });
</script>

<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
  $(function() {
    var stripe = Stripe('pk_test_51N3mETFGTazuFpF0cMTd92TFpUKZURTofAoadewM2kAN3YYfTBKri1C9ALIsbqxqioH214TpYcmw6CqPulm7LEYc00jbhve2Wo');
    
    stripe
    .createPaymentMethod({
      type: 'card',
      card: cardElement,
      billing_details: {
        name: 'Jenny Rosen',
      },
    })
    .then(function(result) {
      console.log(result);
    });
  });
</script>