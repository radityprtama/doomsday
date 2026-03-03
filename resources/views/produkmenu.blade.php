<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Daftar Produk Menu</title>
    <style>
        body {
            background-color: #f8fafc;
        }

        .card-wrapper {
            margin: 2rem auto;
            max-width: 1100px;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .menu-image {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            background-color: #fff;
        }

        .action-btn {
            padding: 0.4rem 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
        }

        .action-btn-edit {
            background-color: #fef3c7;
            color: #ea580c;
        }

        .action-btn-edit:hover {
            background-color: #fde68a;
            color: #c2410c;
        }

        .action-btn-delete {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .action-btn-delete:hover {
            background-color: #fecaca;
            color: #b91c1c;
        }
    </style>
</head>
<body>
    <div class="container card-wrapper">
        <div class="bg-white rounded-3 shadow-sm border overflow-hidden">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fs-5 fw-bold text-dark mb-1">Daftar Produk</h1>
                    <p class="fs-6 text-muted mb-0">Kelola data produk, gambar menu, harga, dan stok barang.</p>
                </div>
                <div class="d-flex justify-content-start align-items-center gap-2">
                <a href="{{ route('produkmenu.create') }}" class="btn btn-primary btn-sm">Tambah Produk</a>
                <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Lihat Menu</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light text-dark fw-semibold text-uppercase">
                        <tr>
                            <th class="ps-4 pe-4 py-3" scope="col">Gambar</th>
                            <th class="ps-2 pe-4 py-3" scope="col">Nama Menu</th>
                            <th class="ps-2 pe-4 py-3" scope="col">Kategori</th>
                            <th class="ps-2 pe-4 py-3" scope="col">Harga</th>
                            <th class="ps-2 pe-4 py-3" scope="col">Stok</th>
                            <th class="ps-2 pe-4 py-3 text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkmenu as $produk)
                            <tr>
                                <td class="ps-4 pe-4 py-3">
                                    @if($produk->gambar_menu)
                                        <img src="{{ asset('storage/' . $produk->gambar_menu) }}" alt="{{ $produk->nama_menu }}" class="menu-image">
                                    @else
                                        <span class="badge bg-secondary">No Image</span>
                                    @endif
                                </td>
                                <td class="ps-2 pe-4 py-3 fw-semibold text-dark">{{ $produk->nama_menu }}</td>
                                <td class="ps-2 pe-4 py-3">{{ $produk->kategori }}</td>
                                <td class="ps-2 pe-4 py-3">{{ $produk->harga_rupiah }}</td>
                                <td class="ps-2 pe-4 py-3">
                                    <span class="badge {{ $produk->stok > 10 ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $produk->stok }} Unit
                                    </span>
                                </td>
                                <td class="ps-2 pe-4 py-3 text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <a href="{{ route('produkmenu.edit', $produk->id) }}" class="action-btn action-btn-edit" title="Edit">Edit</a>
                                        <form action="{{ route('produkmenu.destroy', $produk->id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn action-btn-delete" title="Hapus">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="ps-4 pe-4 py-5 text-center text-muted">
                                    Belum ada data produk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>