@extends('layouts/contentNavbarLayout')

@section('title', 'Configurações da Conta - Pwr Saúde+')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Configurações da Conta /</span> Conta
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Conta</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Detalhes do Perfil</h5>
      <!-- Account -->
      <hr class="my-0">
      <div class="card-body">
        @include('layouts.partials.messages')
        <form  method="post" action="{{route("profile.update")}}">
          <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="mb-3">
              <label for="name" class="form-label text-light">Nome Completo</label>
              <input type="text" class="form-control text-dark" id="name" name="name" value="{{auth()->user()->name}}" placeholder="Digite o seu nome" autofocus>
              
              @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="email" class="form-label text-light">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" disabled>
              
              @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="cep" class="form-label text-light">CEP</label>
              <input type="text" class="form-control" id="cep" name="cep" value="{{auth()->user()->cep}}" placeholder="Digite o seu CEP">
              
              @if ($errors->has('cep'))
                <span class="text-danger text-left">{{ $errors->first('cep') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="address" class="form-label text-light">Endereço</label>
              <input type="text" class="form-control" id="address" name="address" value="{{auth()->user()->address}}" placeholder="Digite o endereço">
              
              @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="number" class="form-label text-light">Número</label>
              <input type="text" class="form-control" id="number" name="number" value="{{auth()->user()->number}}" placeholder="Digite o número residencial">
              
              @if ($errors->has('number'))
                <span class="text-danger text-left">{{ $errors->first('number') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="complement" class="form-label text-light">Complemento</label>
              <input type="text" class="form-control" id="complement" name="complement" value="{{auth()->user()->complement}}" placeholder="Digite o complemento (opcional)">
              
              @if ($errors->has('complement'))
                <span class="text-danger text-left">{{ $errors->first('complement') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="neighborhood" class="form-label text-light">Bairro</label>
              <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{auth()->user()->neighborhood}}">
              
              @if ($errors->has('neighborhood'))
                <span class="text-danger text-left">{{ $errors->first('neighborhood') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="city" class="form-label text-light">Cidade</label>
              <input type="text" class="form-control" id="city" name="city" value="{{auth()->user()->city}}">
              
              @if ($errors->has('city'))
                <span class="text-danger text-left">{{ $errors->first('city') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="state" class="form-label text-light">Estado (UF)</label>
              <input type="text" class="form-control" id="state" name="state" value="{{auth()->user()->state}}">
              
              @if ($errors->has('state'))
                <span class="text-danger text-left">{{ $errors->first('state') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="email" class="form-label text-light">Contato (Celular)</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{auth()->user()->phone}}" placeholder="(00)0-0000-0000">
              
              @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
              @endif
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2 w-50">Atualizar</button>
            <button type="reset" class="btn btn-outline-secondary" onclick="location.reload()">Restaurar</button>
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