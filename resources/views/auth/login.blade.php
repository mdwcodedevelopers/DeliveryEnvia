@extends('layouts.login')

@section('content')
<div class="h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="col-md-6 d-flex justify-content-center align-items-end h-100">
            <div>
                <img src="{{ asset('/img/delivery-girl-envia2go-1.png') }}" alt="" width="450" style="position: relative; bottom: -4rem">

            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center h-100">
                <div class="w-100">
                    <div class="d-flex justify-content-center my-5">
                        <img src="{{ asset('/img/logo_envia2_go.png') }}" alt="" width="300">
                    </div>
                    <div class="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group px-6 justify-content-center">

                                <div class="col-md-10">
                                    {{-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> --}}
                                    <input placeholder="Correo" aria-label="Correo"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group px-6 justify-content-center">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                <div class="col-md-10">
                                    <input placeholder="Contraseña" aria-label="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group   px-5">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-10 mb-0">
                                    <button type="submit" class="btn btn-blue btn-block text-white">
                                      Ingresar
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link btn-dark text-white btn-block" href="{{ route('password.request') }}">
                                            Olvide la contraseña
                                        </a>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

