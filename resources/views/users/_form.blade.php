<div class="mb-3">
    <label>Nama</label>
    <input type="text"
           name="name"
           class="form-control"
           value="{{ old('name', $user->name ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email"
           name="email"
           class="form-control"
           value="{{ old('email', $user->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password"
           name="password"
           class="form-control"
           placeholder="Kosongkan jika tidak ingin mengubah password">
</div>

<div class="mb-3">
    <label>Role</label>

    <select name="role_id" class="form-control">

        @foreach($roles as $role)
            <option value="{{ $role->id }}"
                @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                {{ $role->name }}
            </option>
        @endforeach

    </select>
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>