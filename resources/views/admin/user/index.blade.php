@extends('layouts.admin')

@section('title', 'Daftar ' . ucfirst('user'))

@section('content')
<h3 class="text-2xl font-bold">Daftar User</h3>
<a href="{{ route('user.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">Tambah User</a>

<div class="mt-6">
    <table class="min-w-full">
        <thead>
            <tr>
                
                <th class="px-6 py-3">nama_matkul</th>
                <th class="px-6 py-3">kode_matkul</th>
                <th class="px-6 py-3">sks</th>
                
                <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $item)
            <tr>
                
                <td class="px-6 py-4">{{ $item['nama_matkul'] }}</td>
                <td class="px-6 py-4">{{ $item['kode_matkul'] }}</td>
                <td class="px-6 py-4">{{ $item['sks'] }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('user.edit', $item['kode_matkul']) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('user.destroy', $item['kode_matkul']) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection