<!DOCTYPE html>
<html>
<head>
    <title>Crear Hábito</title>
</head>
<body>
    <h1>Crear Nuevo Hábito</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('habitos.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre del Hábito:</label>
        <input type="text" id="nombre" name="nombre">
        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('habitos.index') }}">Volver a la Lista de Hábitos</a>
</body>
</html>
