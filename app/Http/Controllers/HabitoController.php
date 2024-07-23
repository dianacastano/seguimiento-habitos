<?php

// app/Http/Controllers/HabitoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabitoController extends Controller
{
    // Método para mostrar la lista de hábitos
    public function index(Request $request)
    {
        $habitos = $request->session()->get('habitos', []);
        return view('habitos.index', compact('habitos'));
    }

    // Método para mostrar el formulario de creación de un nuevo hábito
    public function create()
    {
        return view('habitos.create');
    }

    // Método para guardar un nuevo hábito
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $habitos = $request->session()->get('habitos', []);
        $habitos[] = ['nombre' => $request->nombre, 'realizado' => false];
        $request->session()->put('habitos', $habitos);

        return redirect()->route('habitos.index')->with('success', 'Hábito creado exitosamente.');
    }

    // Método para marcar un hábito como realizado
    public function complete(Request $request, $index)
    {
        $habitos = $request->session()->get('habitos', []);
        if (isset($habitos[$index])) {
            $habitos[$index]['realizado'] = true;
            $request->session()->put('habitos', $habitos);
        }

        return redirect()->route('habitos.index')->with('success', 'Hábito marcado como realizado.');
    }

    // Método para eliminar un hábito
    public function destroy(Request $request, $index)
    {
        $habitos = $request->session()->get('habitos', []);
        if (isset($habitos[$index])) {
            unset($habitos[$index]);
            $request->session()->put('habitos', array_values($habitos));
        }

        return redirect()->route('habitos.index')->with('success', 'Hábito eliminado.');
    }
}

