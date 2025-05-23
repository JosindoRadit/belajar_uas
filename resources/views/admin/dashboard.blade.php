@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

<div class="mt-4">
    <div class="flex flex-wrap -mx-6">
        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                    <i class="fas fa-user-tie text-white text-2xl"></i>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ $matkulCount ?? 0 }}</h4>
                    <div class="text-gray-500">Total matkul</div>
                </div>

            </div>
        </div>

        <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
            <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                <div class="p-3 bg-green-600 bg-opacity-75 rounded-full">
                    <i class="fas fa-user-graduate text-white text-2xl"></i>
                </div>
                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ $kelasCount ?? 0 }}</h4>
                    <div class="text-gray-500">Total kelas</div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="mt-8">



    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('matkul.index') }}">
<div class="mt-8">
        </a>
<div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('kelas.index') }}">

</div>
    </div>
</div>
</div>

@endsection