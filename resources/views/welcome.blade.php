<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Menu List</title>
    <style>
        body {
            background: #f8fafc;
        }

        .menu-image {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            background: #fff;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h1 class="h4 mb-1">Daftar Menu</h1>
                <p class="text-muted mb-0">Semua menu yang tersimpan di database.</p>
            </div>
            <a href="{{ route('produkmenu.index') }}" class="btn btn-primary btn-sm">Kelola Menu</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produks as $produk)
                            <tr>
                                <td>
                                    @if ($produk->gambar_menu)
                                        <img src="{{ asset('storage/' . $produk->gambar_menu) }}" alt="{{ $produk->nama_menu }}"
                                            class="menu-image">
                                    @else
                                        <span class="badge bg-secondary">No Image</span>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $produk->nama_menu }}</td>
                                <td>{{ $produk->kategori }}</td>
                                <td>{{ $produk->harga_rupiah }}</td>
                                <td>
                                    <span class="badge {{ $produk->stok > 10 ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $produk->stok }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada menu di database.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
