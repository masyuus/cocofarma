@extends('admin.layouts.app')

@section('content')
<div class="container p-4">
    <div class="card">
        <div class="card-body">
            <h4>{{ $title ?? 'Placeholder' }}</h4>
            <p>This is a placeholder page. Implement the actual page in the admin panel when ready.</p>
        </div>
    </div>
</div>
@endsection
