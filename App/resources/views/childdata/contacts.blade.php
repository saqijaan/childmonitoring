@extends('layouts.child')
@section('title','Dashboard')
@section('page_css')
@endsection
@section('page')

<div class="row user-data">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Contacts</h3>
        <div class=" p-3">
            <table class="table table-top-campaign table-striped">
                <thead>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr class="tr-shadow">
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->number }}</td>
                            <td>{{ $contact->created_at }}</td>
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
@endsection
@section('models')

@endsection
