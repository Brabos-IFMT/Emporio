@extends('base')

@section('title', 'Clientes')

@section('content')

  <!-- Conteúdo -->
  <div class="main-panel">
    <div class="content-wrapper">
    <div class="container">
      <h2>Novo Cliente</h2>

      <form action="{{ route('clientes.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
        @error('nome')
      <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        @error('email')
      <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
      </div>

      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}">
        @error('telefone')
      <div class="text-danger mt-1">{{ $message }}</div>
      @enderror
      </div>

      <button type="submit" class="btn btn-success">Salvar</button>
      </form>
    </div>
    </div>
  </div>

@endsection