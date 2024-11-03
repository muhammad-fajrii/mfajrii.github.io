@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Barang</h1>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" class="form-control" oninput="validateStock()">
            <small id="stockError" class="text-danger" style="display: none;">Stok hanya boleh berupa angka.</small>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="">-- Pilih Status --</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
                <option value="Dipesan">Dipesan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" min="0">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    function validateStock() {
        const stockInput = document.getElementById('stock');
        const stockError = document.getElementById('stockError');
        const regex = /^[0-9]*$/;

        if (!regex.test(stockInput.value)) {
            stockError.style.display = 'block';
        } else {
            stockError.style.display = 'none';
        }
    }
</script>
@endsection
