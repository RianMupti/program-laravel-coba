@extends('layouts/master')

@section('title', 'Laravel')

@section('dashboard', 'active')

@section('content')

{{-- component --}}
<x-alert type="danger" judul="Belajar Laravel" :isipesan="$isipesan" />


{{-- <div class="section-body">
    ini halaman content {{Auth::user()->name}}
</div> --}}
@endsection

@push('page-scripts')
{{-- <script>alert(123)</script> --}}
@endpush
