<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Daftar Todo List</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('todo_lists.create') }}" class="btn btn-primary mb-3">Tambah Todo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Pembuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($todoLists as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->description }}</td>
                    <td>{{ $todo->user->name ?? 'Tidak diketahui' }}</td>
                    <td>
                        <a href="{{ route('todo_lists.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('todo_lists.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada todo list.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
</div>
</body>
</html>
