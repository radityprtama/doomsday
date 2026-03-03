<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Produk Menu</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Tambah Produk Menu</h2>
                <form action="{{ route('produkmenu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_menu" class="form-label">Nama Menu:</label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control @error('nama_menu') is-invalid @enderror" value="{{ old('nama_menu') }}" required>
                        @error('nama_menu')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kategori" class="form-label">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        </select>
                        @error('kategori')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="form-label">Harga (IDR):</label>
                        <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Contoh: Rp 50.000" value="{{ old('harga') }}" required>
                        <small class="text-muted">Masukkan angka atau format Rupiah (contoh: 50000 / 50.000 / Rp 50.000)</small>
                        @error('harga')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="stok" class="form-label">Stok:</label>
                        <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" min="0" required>
                        @error('stok')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="gambar_menu" class="form-label">Gambar Menu:</label>
                        <input type="file" name="gambar_menu" id="gambar_menu" class="form-control @error('gambar_menu') is-invalid @enderror" accept="image/*" required>
                        <small class="text-muted">Format: PNG, JPG (Max: 2MB)</small>
                        @error('gambar_menu')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('produkmenu.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>