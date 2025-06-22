@extends('layout/template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-4">Data Points </h4>
                <table class="table table-striped" id="pointstable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
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
                                    <img src="{{ asset('storage/images/' . $p->image) }}" alt="" width="150"
                                        title="{{ $p->image }}">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mb-4">Data Polylines </h4>
                <table class="table table-striped" id="polylinestable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
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
                                    <img src="{{ asset('storage/images/' . $p->image) }}" alt="" width="150"
                                        title="{{ $p->image }}">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mb-4">Data Polygons </h4>
                <table class="table table-striped" id="polygonstable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
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
                                    <img src="{{ asset('storage/images/' . $p->image) }}" alt="" width="150"
                                        title="{{ $p->image }}">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @section('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    @endsection


    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
        <script>
            let table1 = new DataTable('#pointstable');
            let table2 = new DataTable('#polylinestable');
            let table3 = new DataTable('#polygonstable');
        </script>
    @endsection
