<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Crypt;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->busca;

        $clientes = Cliente::where('nome', 'like', "%$busca%")
            ->orWhere('email', 'like', "%$busca%")
            ->orWhere('telefone', 'like', "%$busca%")
            ->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'email' => 'nullable|email',
            'endereco' => 'nullable'
        ]);

        $cpf = preg_replace('/\D/', '', $request->cpf);

        if (strlen($cpf) != 11) {
            return back()->withErrors([
                'cpf' => 'O CPF deve possuir 11 números.'
            ])->withInput();
        }

        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->cpf = Crypt::encryptString($cpf);
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->endereco = $request->endereco;

        $cliente->save();

        return redirect()->route('clientes.index')
            ->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'email' => 'nullable|email',
            'endereco' => 'nullable'
        ]);

        $cpf = preg_replace('/\D/', '', $request->cpf);

        if (strlen($cpf) != 11) {
            return back()->withErrors([
                'cpf' => 'O CPF deve possuir 11 números.'
            ])->withInput();
        }

        $cliente = Cliente::findOrFail($id);

        $cliente->nome = $request->nome;
        $cliente->cpf = Crypt::encryptString($cpf);
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->endereco = $request->endereco;

        $cliente->save();

        return redirect()->route('clientes.index')
            ->with('sucesso', 'Cliente atualizado com sucesso!');
    }
}
