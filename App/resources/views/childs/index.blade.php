@extends('layouts.master')
@section('title','Dashboard')
@section('page_css')
<style>
    @media (min-width: 700px){
        .table{
            display: table;
        }
    }
</style>
@endsection
@section('page')

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">All Childs</h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="user-data p-3">
            <table class="table table-responsive table-top-campaign table-striped">
                <thead>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>updated</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($childs as $child)
                    <tr class="tr-shadow">
                            <td>{{ $child->name }}</td>
                            <td>{{ $child->phone }}</td>
                            <td>{{ $child->created_at }}</td>
                            <td>{{ $child->updated_at }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a class="item" data-toggle="tooltip" href="{{ route('child.dashboard',$child->id) }}" data-placement="top" title="View Data">
                                        <i class="zmdi zmdi-mail-send"></i>
                                    </a>
                                    <a class="item" data-toggle="tooltip" href="{{ route('childs.edit',$child->id) }}" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a class="item" data-toggle="tooltip" href="#" onclick="return Delete('#delete{{ $child->id }}')" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                    <form class="d-none" id="delete{{ $child->id }}" method="POST" action="{{ route('childs.destroy',$child->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection
@section('page_js')
<script>
    function Delete(form){
        event.preventDefault();
        if (confirm('Are you Sure You want to delete?'))
           {
                $(form).submit();
                return true;
           }
           return false;
    }
</script>
@endsection
@section('models')

@endsection
