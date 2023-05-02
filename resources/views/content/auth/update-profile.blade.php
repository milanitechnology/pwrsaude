@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="bx bx-link-alt me-1"></i> Connections</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{asset('assets/img/icons/avatar.jpg')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form  method="post" action="{{route("profile.update")}}">
          <div class="row">
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
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Atualizar</button>
            <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
