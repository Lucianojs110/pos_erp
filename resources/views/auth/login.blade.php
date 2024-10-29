@extends('layouts.auth2login')
@section('title', __('lang_v1.login'))
@inject('request', 'Illuminate\Http\Request')

@section('content')
    @php
        $username = old('username');
        $password = null;
        if (config('app.env') == 'demo') {
            $username = 'admin';
            $password = '123456';

            $demo_types = [
                'all_in_one' => 'admin',
                'super_market' => 'admin',
                'pharmacy' => 'admin-pharmacy',
                'electronics' => 'admin-electronics',
                'services' => 'admin-services',
                'restaurant' => 'admin-restaurant',
                'superadmin' => 'superadmin',
                'woocommerce' => 'woocommerce_user',
                'essentials' => 'admin-essentials',
                'manufacturing' => 'manufacturer-demo',
            ];

            if (!empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types)) {
                $username = $demo_types[$_GET['demo_type']];
            }
        }
    @endphp
    <div class="row" style="background-color: white !important;">

        <div class="col-md-4">
            <div
                class="tw-p-5 md:tw-p-6 tw-mb-4 tw-rounded-2xl tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm tw-ring-1 tw-ring-gray-200">
                <div class="tw-flex tw-flex-col tw-items-center tw-gap-4">
                    <!-- Títulos centrados -->
                    <div class="image-container">
                        <img src="{{ asset('images/mipos.jpeg') }}" alt="Descripción de la imagen">
                    </div>




                    <!-- Formulario de inicio de sesión -->
                    <form method="POST" action="{{ route('login') }}" id="login-form" aria-labelledby="login-form"
                        class="tw-w-full">
                        {{ csrf_field() }}
                        <!-- Campo Username -->
                        <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label class="tw-dw-form-control tw-w-full">
                                <span class="tw-text-xs md:tw-text-sm tw-font-medium tw-text-black">Usuario</span>
                                <input
                                    class="tw-w-full tw-border tw-border-[#D1D5DA] tw-outline-none tw-h-12 tw-bg-transparent tw-rounded-lg tw-px-3 tw-font-medium tw-text-black placeholder:tw-text-gray-500"
                                    name="username" required autofocus placeholder="@lang('lang_v1.username')"
                                    value="{{ $username }}" />
                                @if ($errors->has('username'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </label>
                        </div>

                        <!-- Campo Password -->
                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="tw-dw-form-control tw-w-full">
                                <span class="tw-text-xs md:tw-text-sm tw-font-medium tw-text-black">Contraseña</span>

                                <div class="tw-relative tw-w-full">
                                    <input
                                        class="tw-w-full tw-border tw-border-[#D1D5DA] tw-outline-none tw-h-12 tw-bg-transparent tw-rounded-lg tw-px-3 tw-font-medium tw-text-black placeholder:tw-text-gray-500"
                                        id="password" type="password" name="password" value="{{ $password }}" required
                                        placeholder="@lang('lang_v1.password')" />

                                    <!-- Botón para mostrar/ocultar la contraseña -->
                                    <button type="button" id="show_hide_icon"
                                        class="tw-absolute tw-right-3 tw-top-3 tw-text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-eye tw-w-6" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </button>
                                </div>
                            </label>

                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>


                        <!-- Recordarme -->
                        <div class="tw-dw-form-control tw-w-full">
                            <label class="tw-dw-cursor-pointer tw-dw-label tw-self-start tw-gap-2">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                    class="tw-dw-checkbox">
                                <span class="tw-text-xs md:tw-text-sm tw-font-medium tw-text-black">@lang('lang_v1.remember_me')</span>
                            </label>
                        </div>

                        <!-- Botón de login -->
                        <button type="submit"
                            class="tw-bg-gradient-to-r tw-from-indigo-500 tw-to-blue-500 tw-h-12 tw-rounded-xl tw-text-sm md:tw-text-base tw-text-white tw-font-semibold tw-w-full mt-2 hover:tw-from-indigo-600 hover:tw-to-blue-600 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-500">
                            @lang('lang_v1.login')
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Inicio botones-->

     <div class="col-md-8">
    <div class="container">
        <div class="row">
        
         
            <div class="col-md-4 mb-4">
                <a href="{{ action([\Modules\Superadmin\Http\Controllers\PricingController::class, 'index']) }}"
                    class="btn btn-outline-primary custom-button btn-block w-100 h-100 d-flex align-items-center justify-content-center">
                    Planes
                </a>
            </div>

          

         
            <div class="col-md-4 mb-4">
               <a href="{{ route('business.getRegister')}}"
                    class="btn btn-outline-primary  custom-button btn-block w-100 h-100 d-flex align-items-center justify-content-center">
                    Registrarse
                </a>
            </div>

          
            <div class="col-md-4 mb-4">
                <a href="{{ action([\Modules\Repair\Http\Controllers\CustomerRepairStatusController::class, 'index']) }}"
                    class="btn btn-outline-success custom-button btn-block w-100 h-100 d-flex align-items-center justify-content-center">
                    Estado de reparación
                </a>
            </div>

            <!-- Si quieres añadir más botones, sigue aquí -->
        </div>
    </div>
</div>



        <!-- fin botones-->
    </div>

    <style>
        .custom-button {
            height: 60px;
            /* Ajusta la altura */
            font-size: 1.25rem;
            /* Ajusta el tamaño del texto */
        }

        .image-container {
            display: flex;
            /* O 'grid' si prefieres */
            justify-content: center;
            /* Centrar horizontalmente */
        }

        .image-container img {
            max-width: 50%;
            /* Asegura que la imagen no se desborde del contenedor */
            height: auto;
            /* Mantiene la proporción */
        }

        .card-body {
            display: flex;
            align-items: center;
            /* Asegura que el contenido esté centrado verticalmente */
        }

        .card-body .btn {
            margin-right: 10px;
            /* Espacio entre el botón y el texto */
        }

        .card-body .btn {
            margin-right: 10px;
            /* Espacio entre el botón y el texto */
            padding: 15px 20px;
            /* Ajusta el padding superior e inferior según lo desees */
        }

        .tw-absolute {
            position: absolute;
        }

        .tw-right-3 {
            right: 0.75rem;
            /* Espacio a la derecha del botón */
        }



        .tw-transform {
            transform: translateY(-50%);
            /* Centrar verticalmente el botón */
        }

        .tw-p-1 {
            padding: 0.25rem;
            /* Espaciado alrededor del botón */
        }

        .tw-h-6 {
            height: 1.5rem;
            /* Altura del icono */
        }
    </style>
@endsection

@section('javascript')
    <script>
        // Mostrar/ocultar la contraseña
        document.getElementById("show_hide_icon").addEventListener("click", function() {
            const passwordField = document.getElementById("password");
            const icon = this.querySelector("svg");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.setAttribute("class", "icon icon-tabler icon-tabler-eye-off tw-w-6");
            } else {
                passwordField.type = "password";
                icon.setAttribute("class", "icon icon-tabler icon-tabler-eye tw-w-6");
            }
        });
    </script>
@endsection
