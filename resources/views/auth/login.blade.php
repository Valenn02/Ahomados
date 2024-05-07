@extends('auth.contenido')

@section('login')


<div class="content">
    <div class="container-login">
        <div class="left">
            <form class="formulario" method="POST" action="{{ route('login')}}">
                {{ csrf_field() }}
                <br>
                <br>

                <div class="container-title">
                    <h1>Bienvenido</h1>
                    <p>Inicia sesión para continuar</p>
                </div>
                <br>
                <br>

                <div class="container-input">
                    <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="input-texto-arriba" placeholder="Usuario">
                    <div class="message">
                    {!!$errors->first('usuario','<span class="invalid-feedback">El campo Usuario es obligatorio.</span>')!!}
                    </div>
                </div>
                <div class="container-input">
                    <input type="password" name="password" id="password" class="input-texto-arriba" placeholder="Contraseña">
                    <div class="message">
                        {!!$errors->first('password','<span class="invalid-feedback">El campo Contraseña es obligatorio</span>')!!}
                    </div>
                </div>
                <br>
                <div class="container-input">
                    <button type="submit">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="right">
            <img class="portada" src="img/logoahuma2.jpg" alt="">
        </div>
    </div>
</div>
<script>
  // Escuchamos el evento input en los campos de input
  const inputs = document.querySelectorAll('.input-texto-arriba');

  inputs.forEach(input => {
    input.addEventListener('focus', () => {
      // Agregamos la clase 'texto-arriba' cuando el campo tiene el foco
      input.classList.add('texto-arriba');
    });

    input.addEventListener('blur', () => {
      // Removemos la clase 'texto-arriba' solo si el campo está vacío
      if (input.value) {
        input.classList.remove('texto-arriba');
      }
    });

    // Verificamos si el campo ya tiene un valor inicial al cargar la página
    if (input.value) {
      input.classList.add('texto-arriba');
    }
  });
</script>

@endsection