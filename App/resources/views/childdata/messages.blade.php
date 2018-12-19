@extends('layouts.child')
@section('title','Dashboard')
@section('page_css')
@endsection
@section('page')

<div class="row user-data">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Inbox</h3>
        <div class=" p-3">
            <table class="table table-top-campaign table-striped">
                <thead>
                    <th class="w-25">Name</th>
                    <th>Type</th>
                    <th>Message</th>
                    <th class="w-25">Date</th>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr class="tr-shadow">
                        <td>{{ $message->name() }}</td>
                        <td>{{ $message->type }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $messages->links() }}
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection
@section('page_js')
@endsection
@section('models')

@endsection
