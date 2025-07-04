@extends('base')

@section('title', 'Clientes')

@section('content')

  <!-- Conteúdo -->
  <div class="main-panel">
    <div class="content-wrapper">
    <div class="container">
      <h2>Editar Cliente</h2>

      <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome', $cliente->nome) }}">
        @error('nome')
      <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $cliente->email) }}">
        @error('email')
      <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" name="telefone" value="{{ old('telefone', $cliente->telefone) }}">
        @error('telefone')
      <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
      </div>

      <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
    </div>
    </div>
  </div>

@endsection