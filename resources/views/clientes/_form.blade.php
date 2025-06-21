<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email ?? '') }}" required>
</div>

<div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone ?? '') }}" required>
</div>
