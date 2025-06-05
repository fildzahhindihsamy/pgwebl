@extends('layout/template')

@section('content')
<div class="container mt-4">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Dibuat Oleh</th>
        </tr>
    </thead>
    <tbody>
            {{-- loop points data --}}
            @foreach ($points as $index => $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->description }}</td>
                    <td>
                        <img src="{{ asset('storage/images/' . $p->image) }}" alt="" width="150" title="{{ $p->image }}">
                    </td>
                    <td>{{ $p->created_at }}</td>
                    <td>{{ $p->updated_at }}</td>
                    <td>{{ $p->user_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
