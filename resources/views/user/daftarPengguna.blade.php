<x-app-layout>

// Firdaus Akbar Amrullah 6706223004 //

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

@section('content')
<div class="container">
    <div class="card dark:bg-gray-800 text-white">\
        
        <div class="card-header dark:bg-gray-700">Manage Users
        </div>
        <div class="flex justify-end card-header text-white dark:bg-gray-900">
            <a  href="{{ route('user.registrasi') }}">Registrasi Pengguna</a>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
</x-app-layout>
