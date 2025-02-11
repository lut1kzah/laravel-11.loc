<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        @error('surname')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label for="surname">Фамилия</label>
        <input id="surname" type="text" name="surname" placeholder="Введите фамилию" required>
    </div>
    <div>
        @error('name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label for="name">Имя</label>
        <input id="name" type="text" name="name" placeholder="Введите имя" required>
    </div>
    <div>
        @error('patronymic')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label for="patronymic">Отчество</label>
        <input id="patronymic" type="text" name="patronymic" placeholder="Введите отчество">
    </div>
    <div>
        @error('sex')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label>Пол</label>
        <input type="radio" name="sex" value="1" checked> Мужской
        <input type="radio" name="sex" value="0"> Женский
    </div>
    <div>
        @error('birth_date')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label for="birth_date">Дата рождения</label>
        <input id="birth_date" type="date" name="birth_date" required>
    </div>
    <div>
        @error('avatar')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label id="avatar">Аватар</label>
        <input id="avatar" type="file" name="avatar" accept="image/jpeg,image/png,image/svg+xml">
    </div>
    <div>
        @error('email')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label for="email">Электронная почта</label>
        <input id="email" type="email" name="email" placeholder="Введите почту" required>
    </div>
    <div>
        @error('password')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <label for="password">Пароль</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль" required>
    </div>
    <div>
        <label for="password_confirmation">Подтверждение пароля</label>
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Введите подтверждение пароля" >
    </div>
    <div>
        <button type="submit">Зарегистрироваться</button>
    </div>
</form>

