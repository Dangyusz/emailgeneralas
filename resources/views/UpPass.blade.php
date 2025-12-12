<form action="{{ route('UpPass', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    @error('email') <div>{{ $message }}</div> @enderror

    <label>Password (leave blank if not changing):</label>
    <input type="password" name="password">
    @error('password') <div>{{ $message }}</div> @enderror

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation">

    <button type="submit">Update User</button>
</form>
