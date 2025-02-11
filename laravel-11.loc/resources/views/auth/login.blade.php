<form action="{{ route('login') }}" method="POST">
    @csrf
    @error('error')
        <p>{{ $message }}</p>
    @enderror
    <input type="email" name="email" required />
    <input type="password" name="password" required />
    <button type="submit">Войти</button>
</form>
