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
  <div class="col-lg-12 col-12 col-sm-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-card me-1"></i> Formas de Pagamento</a></li>
    </ul>
  </div>

  <div class="col-lg-4 col-12 col-sm-4">
    <div class="card mb-4">
      <h5 class="card-header">+Saúde Individual</h5>
      <hr class="my-0">
      <h6 class="card-header">Valor Garantido por 12 meses</h6>
      <h2 class="card-header">R$ 39,90 <span style="font-size: 1rem;">por mês</span></h2>

      <ul>
        <li>25 Especialidades Médicas</li>
        <li>Terapia em Psicologia</li>
        <li>Sem Carência • Utilização em 48h</li>
        <li>Sem Limite de Idade • de 0 a 99 anos</li>
        <li>Sem Limite de Utilização</li>
        <li>Fidelidade de 12 Meses</li>
        <li>Descontos e Beneficios Exclusivos</li>
      </ul>

      <div class="card-body">
        
        <form 
            role="form"
            action="{{ route('payment.checkout.post') }}" 
            method="post"> 

          @csrf 

          <div class="row"> 
              <div class="col-xs-12"> 
                  <button class="btn btn-dark btn-lg btn-block w-100" style="background: linear-gradient(45deg, #3F2E86 0%, #E51E5B 100%)" type="submit">Assinar</button> 
              </div> 
          </div> 
        </form>
      </div>
    </div>
  </div>
  
  <div class="col-lg-4 col-12 col-sm-4">
    <div class="card mb-4">
      <h5 class="card-header">Assinatura Básica</h5>
      <hr class="my-0">
      <h6 class="card-header">Telemedicina por Assinatura</h6>
      <h2 class="card-header">R$ 45,90 <span style="font-size: 1rem;">por mês</span></h2>

      <ul>
        <li>+25 Especialidades Médicas</li>
        <li>Terapia em Psicologia</li>
        <li>Sem Carência • Utilização em 48h</li>
        <li>Sem Limite de Utilização</li>
        <li>Sem Fidelidade e Sem Multas</li>
        <li>Taxa de Adesão de R$ 15,00</li>
        <li>Descontos e Beneficios Exclusivos</li>
      </ul>

      <div class="card-body">
        
        <form 
            role="form"
            action="{{ route('payment.checkout.post') }}" 
            method="post"> 

          @csrf 

          <div class="row"> 
              <div class="col-xs-12"> 
                  <button class="btn btn-dark btn-lg btn-block w-100" style="background: linear-gradient(45deg, #3F2E86 0%, #E51E5B 100%)" type="submit">Assinar</button> 
              </div> 
          </div> 
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-12 col-sm-4">
    <div class="card mb-4">
      <h5 class="card-header">+Saúde Familiar</h5>
      <hr class="my-0">
      <h6 class="card-header">A partir de 2 vidas (Max. 9)</h6>
      <h2 class="card-header">R$ 34,90 <span style="font-size: 1rem;">por mês</span></h2>

      <ul>
        <li>25 Especialidades Médicas</li>
        <li>Terapia em Psicologia</li>
        <li>Sem Carência • Utilização em 48h</li>
        <li>Sem Limite de Idade • de 0 a 99 anos</li>
        <li>Sem Limite de Utilização</li>
        <li>Fidelidade de 12 Meses</li>
        <li>Descontos e Beneficios Exclusivos</li>
      </ul>

      <div class="card-body">
        
        <form 
            role="form"
            action="{{ route('payment.checkout.post') }}" 
            method="post"> 

          @csrf 

          <div class="row"> 
              <div class="col-xs-12"> 
                  <button class="btn btn-dark btn-lg btn-block w-100" style="background: linear-gradient(45deg, #3F2E86 0%, #E51E5B 100%)" type="submit">Assinar</button> 
              </div> 
          </div> 
        </form>
      </div>
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