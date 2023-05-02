@extends('layouts/blankLayout')

@section('title', 'Logar-se na Pwr Saúde+')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="mb-5">
            <a href="{{url('/')}}">
              <img src="{{asset("assets/img/icons/pwrsaude_white.svg")}}" width="50%">
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2 text-light">Bem-vindo! 👋</h4>
          <p class="mb-4 text-light">Realize o login para navegar  na plataforma <br> da Pwr Saúde+</p>

          @include('layouts.partials.messages')

          <form id="formAuthentication" class="mb-3" method="post" action="{{ route('login.perform') }}">
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="mb-3">
              <label for="email" class="form-label text-light">E-mail</label>
              <input type="text" class="form-control text-light" id="email" name="email" placeholder="Ex.: jose@email.com.br" autofocus>
              
              @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
              @endif

            </div>
            <div class="mb-3 form-password-toggle">
              <!--<div class="d-flex justify-content-between">
                <label class="form-label text-light" for="password">Senha</label>
                <a href="{{url('auth/forgot-password-basic')}}" class="text-light">
                  <small>Esqueceu a senha?</small>
                </a>
              </div>-->
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                
                @if ($errors->has('password'))
                  <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif

              </div>
            </div>
            <!--<div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label text-light" for="remember-me">
                  Lembrar-me
                </label>
              </div>
            </div>-->
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Entrar</button>
            </div>
          </form>

          <p class="text-center text-light">
            <span>Novo na plataforma?</span>
            <a href="{{route('register')}}" class="text-light">
              <span style="color: gold;">Crie uma nova conta</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
