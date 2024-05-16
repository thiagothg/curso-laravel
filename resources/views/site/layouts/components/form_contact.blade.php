{{ $slot }}

<form action="{{ route('site.contact') }}" method="POST">
    @csrf

    <input name="name" type="text" placeholder="Nome" class="borda-preta">
    @if ($errors->has('name'))
    {{$errors->first('name')}}
    @endif
    <br>
    <input name="phone" type="text" placeholder="Telefone" class="borda-preta">
    {{ $errors->has("phone") ? $errors->first('phone') : ''}}
    <br>
    <input name="email" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="reason" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea name="message" class="borda-preta">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>