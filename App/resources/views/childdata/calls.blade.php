@extends('layouts.child')
@section('title','Dashboard')
@section('page_css')
@endsection
@section('page')

<div class="row user-data ">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Call History</h3>
        <div class="p-3">
            <table class="table table-top-campaign table-striped">
                <thead>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Duration</th>

                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach ($calls as $call)
                    <tr class="tr-shadow">
                            <td>{{ $call->name() }}</td>
                            <td>{{ $call->number }}</td>
                            <td>{{ $call->type }}</td>
                            <td>{{ $call->duration }}</td>
                            <td>{{ $call->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $calls->links() }}
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection
@section('page_js')
@endsection
@section('models')

@endsection
