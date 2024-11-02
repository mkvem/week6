@extends('base')

@section('library-css')
<link href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 btn-group">
                <h1>List Owners</h1>
                <a href="{{ route('owners.create') }}" class="btn mt-2">
                    <button type="button" class="btn btn-sm btn-danger">
                        + Create
                    </button>
                </a>
            </div>
        </div>
        @if (Session::has('message') && Session::get('alert-class') == 'success')
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @elseif(Session::has('message') && Session::get('alert-class') == 'danger')
            <div class="alert alert-danger" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <!-- Table with dogs data -->
        <table id="ownerData" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Owner Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $data)                
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Action">
                            <a href="{{ route('owners.show', [ "owner" => $data->id ]) }}">
                                <button type="button" class="btn btn-sm btn-primary ml-1">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>
                            </a>
                            <a href="{{ route('owners.edit', [ "owner" => $data->id ]) }}">
                                <button type="button" class="btn btn-sm btn-warning mx-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </a>
                            <form action="{{ route('owners.destroy', [ "owner" => $data->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ml-1">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('library-js')
<script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#ownerData').DataTable();
    } );
</script>
@endsection