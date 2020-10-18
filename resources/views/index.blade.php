@extends('layouts/master')

@section('title', 'Laravel')

@section('content')
<div class="section-body">
    ini halaman content {{Auth::user()->name}}
</div>
@endsection

@push('page-scripts')
    {{-- <script>alert(123)</script> --}}
@endpush