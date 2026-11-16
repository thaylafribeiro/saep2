<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Models\Cliente;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with('cliente')->paginate(10);

        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        $clientes = Cliente::all();

        return view('veiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required',
            'modelo' => 'required',
            'placa' => 'required|unique:veiculos,placa',
            'ano' => 'nullable|integer'
        ]);

        $veiculo = new Veiculo();

        $veiculo->cliente_id = $request->cliente_id;
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->placa = strtoupper($request->placa);
        $veiculo->ano = $request->ano;

        $veiculo->save();

        return redirect('/veiculos')
            ->with('sucesso', 'Veículo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $clientes = Cliente::all();

        return view('veiculos.edit', compact('veiculo', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required',
            'modelo' => 'required',
            'placa' => 'required|unique:veiculos,placa,' . $id,
            'ano' => 'nullable|integer'
        ]);

        $veiculo = Veiculo::findOrFail($id);

        $veiculo->cliente_id = $request->cliente_id;
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->placa = strtoupper($request->placa);
        $veiculo->ano = $request->ano;

        $veiculo->save();

        return redirect('/veiculos')
            ->with('sucesso', 'Veículo atualizado com sucesso!');
    }
}
