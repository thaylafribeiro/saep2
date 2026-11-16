<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Veiculo;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::with('veiculo.cliente')
            ->orderBy('data_agendamento')
            ->paginate(10);

        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        $veiculos = Veiculo::with('cliente')->get();

        return view('agendamentos.create', compact('veiculos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'veiculo_id' => 'required|exists:veiculos,id',
            'data_agendamento' => 'required|date',
            'descricao' => 'required',
            'status' => 'required'
        ]);

        $agendamento = new Agendamento();

        $agendamento->veiculo_id = $request->veiculo_id;
        $agendamento->data_agendamento = $request->data_agendamento;
        $agendamento->descricao = $request->descricao;
        $agendamento->status = $request->status;

        $agendamento->save();

        return redirect('/agendamentos')
            ->with('sucesso', 'Agendamento cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::with('veiculo.cliente')->findOrFail($id);

        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data_agendamento' => 'required|date',
            'descricao' => 'required',
            'status' => 'required'
        ]);

        $agendamento = Agendamento::findOrFail($id);

        $agendamento->data_agendamento = $request->data_agendamento;
        $agendamento->descricao = $request->descricao;
        $agendamento->status = $request->status;

        $agendamento->save();

        return redirect('/agendamentos')
            ->with('sucesso', 'Agendamento atualizado com sucesso!');
    }
}
