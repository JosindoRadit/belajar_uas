@extends('layouts.admin')

@section('title', 'Daftar ' . ucfirst('kelas'))

@section('content')
<h3 class="text-2xl font-bold mb-4">Daftar Kelas</h3>

{{-- Tombol Tambah Kelas --}}
<a href="{{ route('kelas.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    + Tambah Kelas
</a>

{{-- Form Search --}}
<form action="{{ route('kelas.index') }}" method="GET" class="mt-6">
    <div class="flex items-center space-x-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kelas..."
            class="border border-gray-300 px-4 py-2 rounded w-64 focus:ring focus:border-blue-500">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Cari
        </button>
    </div>
</form>

{{-- Tabel Data Kelas --}}
<div class="mt-6 overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Kode Kelas</th>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Nama Kelas</th>
                <th class="px-6 py-3 text-left text-gray-700 font-semibold border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kelas as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $item['kode_kelas'] }}</td>
                <td class="px-6 py-4">{{ $item['nama_kelas'] }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('kelas.edit', $item['kode_kelas']) }}"
                        class="inline-block px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                        Edit
                    </a>
                    <form action="{{ route('kelas.destroy', $item['kode_kelas']) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 ml-2"
                            onclick="return confirm('Yakin hapus kelas ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Data kelas tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection