@extends('layouts.admin')

@section('title', 'Daftar ' . ucfirst('matkul'))

@section('content')
<h3 class="text-2xl font-bold mb-4">Daftar Matkul</h3>

{{-- Tombol Tambah Matkul --}}
<a href="{{ route('matkul.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    + Tambah Matkul
</a>

{{-- Form Search --}}
<form action="{{ route('matkul.index') }}" method="GET" class="mt-6">
    <div class="flex items-center space-x-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari matkul..."
            class="border border-gray-300 px-4 py-2 rounded w-64 focus:ring focus:border-blue-500">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Cari
        </button>
    </div>
</form>

{{-- Tabel Data Matkul --}}
<div class="mt-6 overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Kode Matkul</th>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Nama Matkul</th>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">SKS</th>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matkul as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $item['kode_matkul'] }}</td>
                <td class="px-6 py-4">{{ $item['nama_matkul'] }}</td>
                <td class="px-6 py-4">{{ $item['sks'] }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('matkul.edit', $item['kode_matkul']) }}"
                        class="inline-block px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                        Edit
                    </a>
                    <form action="{{ route('matkul.destroy', $item['kode_matkul']) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 ml-2"
                            onclick="return confirm('Yakin hapus matkul ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Data matkul tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection