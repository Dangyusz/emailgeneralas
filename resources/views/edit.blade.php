<form action="{{ route('update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}">
    @error('name') <div>{{ $message }}</div> @enderror

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email', $user->email) }}">
    @error('email') <div>{{ $message }}</div> @enderror

    <label>Password (leave blank if not changing):</label>
    <input type="password" name="password">
    @error('password') <div>{{ $message }}</div> @enderror

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation">

    <button type="submit">Update User</button>
</form>