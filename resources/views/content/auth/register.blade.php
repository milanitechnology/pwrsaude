@extends('layouts/blankLayout')

@section('title', 'Registre-se na Pwr Saúde+')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="mb-5">
              <a href="{{url('/')}}">
                <img src="{{asset("assets/img/icons/pwrsaude_white.svg")}}" width="50%">
              </a>
            </div>
            <!-- /Logo -->
            <h5 class="mb-2 text-light">Sua jornada começa aqui 🚀</h5>
            <p class="mb-4 text-light">Preencha os dados a seguir e faça parte da plataforma Pwr Saúde+</p>

            @include('layouts.partials.messages')

          <form id="formAuthentication" class="mb-3" method="post" action="{{ route('register.perform') }}">
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="mb-3">
              <label for="name" class="form-label text-light">Nome Completo</label>
              <input type="text" class="form-control text-dark" id="name" name="name" value="{{ old('name') }}" placeholder="Digite o seu nome" autofocus>
              
              @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="email" class="form-label text-light">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Digite o seu e-mail">
              
              @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="cep" class="form-label text-light">CEP</label>
              <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}" placeholder="Digite o seu CEP">
              
              @if ($errors->has('cep'))
                <span class="text-danger text-left">{{ $errors->first('cep') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="address" class="form-label text-light">Endereço</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Digite o endereço">
              
              @if ($errors->has('address'))
                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="number" class="form-label text-light">Número</label>
              <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}" placeholder="Digite o número residencial">
              
              @if ($errors->has('number'))
                <span class="text-danger text-left">{{ $errors->first('number') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="complement" class="form-label text-light">Complemento</label>
              <input type="text" class="form-control" id="complement" name="complement" value="{{ old('complement') }}" placeholder="Digite o complemento (opcional)">
              
              @if ($errors->has('complement'))
                <span class="text-danger text-left">{{ $errors->first('complement') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="neighborhood" class="form-label text-light">Bairro</label>
              <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}">
              
              @if ($errors->has('neighborhood'))
                <span class="text-danger text-left">{{ $errors->first('neighborhood') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="city" class="form-label text-light">Cidade</label>
              <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
              
              @if ($errors->has('city'))
                <span class="text-danger text-left">{{ $errors->first('city') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="state" class="form-label text-light">Estado (UF)</label>
              <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
              
              @if ($errors->has('state'))
                <span class="text-danger text-left">{{ $errors->first('state') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <label for="email" class="form-label text-light">Contato (Celular)</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="(00)0-0000-0000">
              
              @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
              @endif
            </div>
            
            <div class="mb-3 form-password-toggle">
              <label class="form-label text-light" for="password">Senha</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                @if ($errors->has('password'))
                  <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label text-light" for="password">Repita a Senha</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password-confirmation" class="form-control" name="password-confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                @if ($errors->has('password-confirmation'))
                  <span class="text-danger text-left">{{ $errors->first('password-confirmation') }}</span>
                @endif
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions" style="color: #fff;">
                  Eu aceito as 
                  <a href="https://pwrsaude.com.br/politica-de-privacidade/" target="_blank" style="color: gold;">políticas de privacidade e termos de uso</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" type="submit">
              Cadastrar
            </button>

          </form>

          <p class="text-center text-light">
            <span>Já tem uma conta?</span>
            <a href="{{route('login')}}">
              <span style="color: gold;">Entre</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
@endsection

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
  
