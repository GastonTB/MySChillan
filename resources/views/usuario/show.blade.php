@extends('layaouts.master')

@section('content')
<div class="grid xl:grid-cols-5 lg:grid-cols-7 my-10">
    <div class="lg:col-start-2 xl:col-start-2 lg:col-span-5 xl:col-span-3">
        <div class="grid grid-cols-2 gap-10 pb-5">
            <div class="col-span-1">
                <p class="text-xl font-black mb-5">Mis Compras</p>
                <div class="pl-5">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs border-2 text-white uppercase bg-lime-500 font-semibold ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex justify-center">
                                            Fecha
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex justify-cente">
                                            Total
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex justify-cente">
                                            Tipo de envío
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex justify-cente">
                                            Evaluación
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordenes as $orden)
                                <tr class="border-2">
                                    <td class="px-2 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{-- only date no time --}}
                                                    {{date('d-m-Y', strtotime($orden->created_at))}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <div class="text-sm text-gray-900">
                                                ${{number_format($orden->total, 0, ",", ".")}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <div class="text-sm text-gray-900">
                                                @if($orden->tipo_envio == 1)
                                                Retiro en tienda
                                                @else
                                                Envío a domicilio
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" px-2 py-4 break-words">
                                        <div class="flex justify-center">
                                            <div class="text-sm text-gray-900 px-2">
                                                <a class="text-lime-500 font-semibold text-center" href="">
                                                    {{-- if first element --}}
                                                    @if($loop->first)
                                                    Evaluar
                                                    @else
                                                    Espere Unos días para Evaluar
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- links --}}
                        <div class="mt-5">
                            {{$ordenes->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <form id="datos_usuario" action="{{route('actualizarPerfil', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-span-1">
                    <p class="text-xl font-black">Mis Datos</p>
                    <div class="pl-5 grid grid-cols-2">
                        <div class="col-span-1 order-1 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <input id="nombre_usuario" disabled name="nombre" value="{{$user->name}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                Nombre
                                            </span>
                                        </label>
                                    </div>
                                    <span class="text-sm" style="color:red"><small>@error('nombre'){{$message}}@enderror</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 order-2 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <input id="apellido_p_usuario" disabled name="apellido_paterno" value="{{$user_meta->apellido_paterno}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                Apellido Paterno
                                            </span>
                                        </label>
                                    </div>
                                    <span class="text-sm" style="color:red"><small>@error('apellido_paterno'){{$message}}@enderror</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 order-3 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <input id="apellido_m_usuario" disabled name="apellido_materno" value="{{$user_meta->apellido_materno}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                Apellido Materno
                                            </span>
                                        </label>
                                    </div>
                                    <span class="text-sm" style="color:red"><small>@error('apellido_materno'){{$message}}@enderror</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 order-4 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <input id="direccion_usuario" disabled name="direccion" value="{{$user_meta->direccion}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                Direccion
                                            </span>
                                        </label>
                                    </div>
                                    <span class="text-sm" style="color:red"><small>@error('direccion'){{$message}}@enderror</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-1 col-span-2 order-5 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <select id="region_usuario" disabled name="region" id="regiones" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2.5 px-5 transition duration-200">
                                                @foreach ($regiones as $region)
                                                    <option 
                                                    @if($region->id == $region_user->id)
                                                        selected
                                                    @endif
                                                    value="{{$region->id}}">
                                                        {{$region->nombre_region}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                Región
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-span-2 md:col-span-1 order-6 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <select id="comuna_usuario" disabled name="comuna" id="comunas" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-2 px-5 transition duration-200">
                                                @foreach ($comunas as $comuna)
                                                    <option
                                                    @if ($comuna->id == $user_meta->comuna_id)
                                                    selected
                                                    @endif
                                                    data-region="{{$comuna->region_id}}" value="{{$comuna->id}}">
                                                        {{$comuna->nombre_comuna}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-select">
                                                Comuna
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 order-7 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <input id="correo_usuario" disabled name="email" value="{{$user->email}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                Correo
                                            </span>
                                        </label>
                                    </div>
                                    <span class="text-sm" style="color:red"><small>@error('email'){{$message}}@enderror</small></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1 order-8 mt-2">
                            <div class="md:mx-3 mx-2 mt-5 md:mt-3">
                                <div>
                                    <div>
                                        <label class="relative">
                                            <input id="telefono_usuario" disabled name="telefono"  value="{{$user_meta->telefono}}" type="text" class="border-2 rounded-md border-black border-opacity-20 outline-none focus:border-lime-500 w-full py-1.5 px-5 transition duration-200" placeholder=" ">
                                            <span class="text-opacity-30 text-black absolute text-xs md:text-sm left-0 top-0 mx-3 px-2 transition duration-200 input-text">
                                                Teléfono
                                            </span>
                                        </label>
                                    </div>
                                    <div>
                                        <span id="error-telefono-usuario" class="text-sm hidden" style="color:red"><small>El Numero de Teléfono debe comenzar con un 9</small></span>
                                    </div>
                                    <div>
                                        <span class="text-sm" style="color:red"><small>@error('telefono'){{$message}}@enderror</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="botones_1" class="pl-5 grid grid-cols-2 gap-5 mt-5">
                        <div class="flex justify-center">
                            <button type="button" class="btn-tienda">
                                Cambiar Contraseña
                            </button>
                        </div>
                        <div class="flex justify-center">
                            <button type="button" id="cambiar_datos" class="btn-tienda">
                                Modificar Datos
                            </button>
                        </div>
                    </div>
                    <div id="botones_2" class="pl-5 grid grid-cols-2 gap-5 mt-5 hidden">
                        <div class="flex justify-center">
                            <button id="cancelar" type="button" class="btn-tienda bg-red-500">
                                Cancelar
                            </button>
                        </div>
                        <div class="flex justify-center">
                            <button type="button" id="guardar" class="btn-tienda">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    $('#cambiar_datos').on('click', function(){
         $('#botones_1').addClass('hidden');
         $('#botones_2').removeClass('hidden');
         $('#nombre_usuario').removeAttr('disabled');
         $('#apellido_p_usuario').removeAttr('disabled');
         $('#apellido_m_usuario').removeAttr('disabled');
         $('#region_usuario').removeAttr('disabled');
         $('#comuna_usuario').removeAttr('disabled');
         $('#correo_usuario').removeAttr('disabled');
         $('#telefono_usuario').removeAttr('disabled');
         $('#direccion_usuario').removeAttr('disabled');

        $('#nombre_usuario').removeClass('border-black');
        $('#apellido_p_usuario').removeClass('border-black');
        $('#apellido_m_usuario').removeClass('border-black');
        $('#region_usuario').removeClass('border-black');
        $('#comuna_usuario').removeClass('border-black');
        $('#correo_usuario').removeClass('border-black');
        $('#telefono_usuario').removeClass('border-black');
        $('#direccion_usuario').removeClass('border-black');

        $('#nombre_usuario').removeClass('border-opacity-20');
        $('#apellido_p_usuario').removeClass('border-opacity-20');
        $('#apellido_m_usuario').removeClass('border-opacity-20');
        $('#region_usuario').removeClass('border-opacity-20');
        $('#comuna_usuario').removeClass('border-opacity-20');
        $('#correo_usuario').removeClass('border-opacity-20');
        $('#telefono_usuario').removeClass('border-opacity-20');
        $('#direccion_usuario').removeClass('border-opacity-20');


        $('#nombre_usuario').addClass('border-lime-500');
        $('#apellido_p_usuario').addClass('border-lime-500');
        $('#apellido_m_usuario').addClass('border-lime-500');
        $('#region_usuario').addClass('border-lime-500');
        $('#comuna_usuario').addClass('border-lime-500');
        $('#correo_usuario').addClass('border-lime-500');
        $('#telefono_usuario').addClass('border-lime-500');
        $('#direccion_usuario').addClass('border-lime-500');
  
    });

    $(document).ready(function() {
        var animacion1;
        var animacion2;
        var animacion3;
        var animacion4;
        var animacion5;
        var animacion6;
        var animacion7;
        var animacion8;
        $('#cambiar_datos').click(function() {
            animacion1 = setInterval(function() {
            $('#direccion_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion2 = setInterval(function() {
            $('#nombre_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion3 = setInterval(function() {
            $('#apellido_p_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion4 = setInterval(function() {
            $('#apellido_m_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion5 = setInterval(function() {
            $('#region_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion6 = setInterval(function() {
            $('#comuna_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion7 = setInterval(function() {
            $('#correo_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
            animacion8 = setInterval(function() {
            $('#telefono_usuario').fadeOut(500, function() {
                $(this).toggleClass('border-gray-100 border-lime-500').fadeIn(500);
            });
            }, 2000);
        });

        $('#cancelar').on('click', function(){
            clearInterval(animacion1);
            clearInterval(animacion2);
            clearInterval(animacion3);
            clearInterval(animacion4);
            clearInterval(animacion5);
            clearInterval(animacion6);
            clearInterval(animacion7);
            clearInterval(animacion8);
        });
    });

   

    $('#cancelar').on('click', function(){
        $('#botones_1').removeClass('hidden');
        $('#botones_2').addClass('hidden');
        $('#nombre_usuario').attr('disabled', 'disabled');
        $('#apellido_p_usuario').attr('disabled', 'disabled');
        $('#apellido_m_usuario').attr('disabled', 'disabled');
        $('#region_usuario').attr('disabled', 'disabled');
        $('#comuna_usuario').attr('disabled', 'disabled');
        $('#correo_usuario').attr('disabled', 'disabled');
        $('#telefono_usuario').attr('disabled', 'disabled');
        $('#direccion_usuario').attr('disabled', 'disabled');

        //give inputs value from database
        $('#nombre_usuario').val('{{$user->name}}');
        $('#apellido_p_usuario').val('{{$user_meta->apellido_paterno}}');
        $('#apellido_m_usuario').val('{{$user_meta->apellido_materno}}');
        $('#region_usuario').val('{{$region_user->id}}');
        $('#comuna_usuario').val('{{$user_meta->comuna_id}}');
        $('#correo_usuario').val('{{$user->email}}');
        $('#telefono_usuario').val('{{$user_meta->telefono}}');
        $('#direccion_usuario').val('{{$user_meta->direccion}}');


        $('#nombre_usuario').removeClass('border-lime-500');
        $('#apellido_p_usuario').removeClass('border-lime-500');
        $('#apellido_m_usuario').removeClass('border-lime-500');
        $('#region_usuario').removeClass('border-lime-500');
        $('#comuna_usuario').removeClass('border-lime-500');
        $('#correo_usuario').removeClass('border-lime-500');
        $('#telefono_usuario').removeClass('border-lime-500');
        $('#direccion_usuario').removeClass('border-lime-500');

        $('#nombre_usuario').addClass('border-black');
        $('#apellido_p_usuario').addClass('border-black');
        $('#apellido_m_usuario').addClass('border-black');
        $('#region_usuario').addClass('border-black');
        $('#comuna_usuario').addClass('border-black');
        $('#correo_usuario').addClass('border-black');
        $('#telefono_usuario').addClass('border-black');
        $('#direccion_usuario').addClass('border-black');

        $('#nombre_usuario').addClass('border-opacity-20');
        $('#apellido_p_usuario').addClass('border-opacity-20');
        $('#apellido_m_usuario').addClass('border-opacity-20');
        $('#region_usuario').addClass('border-opacity-20');
        $('#comuna_usuario').addClass('border-opacity-20');
        $('#correo_usuario').addClass('border-opacity-20');
        $('#telefono_usuario').addClass('border-opacity-20');
        $('#direccion_usuario').addClass('border-opacity-20');
    });

    $(document).ready(function(){
        $('#guardar').on('click', function(){
            //sweet alert
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se modificaran los datos de tu cuenta",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, guardar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //form datos_usuario submit
                    $('#datos_usuario').submit();
                }
            })
        });
    });

    $('#telefono_usuario').on('input', function(){
          var telefono = $(this).val();
          telefono = telefono.replace(/[^0-9]/g, '');
          $(this).val(telefono);
          if(telefono.length>9){
            $(this).val(telefono.substring(0,9));
          }
          //if telefono first digit is not a 9 show a error message down the input fild saying "telefono debe comenzar con un 9"
          if(telefono.length>0){
            if(telefono[0]!='9'){
              $('#error-telefono-usuario').removeClass('hidden');
              //change id of guardar to no_guardar
                $('#guardar').attr('id', 'no_guardar');
            }else{
              $('#error-telefono-usuario').addClass('hidden');
                //change id of no_guardar to guardar
                    $('#no_guardar').attr('id', 'guardar');
            }
          }
        });
    

</script>

@endsection