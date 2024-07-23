<!DOCTYPE html>
<html>
<head>
    <title>Lista de Hábitos</title>
</head>
<body>
    <h1>Lista de Hábitos</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($habitos as $index => $habito)
            <li>
                {{ $habito['nombre'] }} - 
                @if ($habito['realizado'])
                    <span>Realizado</span>
                @else
                    <form action="{{ route('habitos.complete', $index) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Marcar como Realizado</button>
                    </form>
                @endif
                <form action="{{ route('habitos.destroy', $index) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('habitos.create') }}">Crear Nuevo Hábito</a>
</body>
</html>
