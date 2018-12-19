@extends('layouts.child')
@section('title','Dashboard')
@section('page_css')
@endsection
@section('page')
<!-- STATISTIC-->
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="statistic__item">
            <h2 class="number">{{ $totalCalls }}</h2>
            <span class="desc">Total Calls</span>
            <div class="icon">
                <i class="zmdi zmdi-account-o"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="statistic__item">
            <h2 class="number">{{ $totalMsgs }}</h2>
            <span class="desc">Total Messages</span>
            <div class="icon">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="statistic__item">
            <h2 class="number">{{ $totalContacts }}</h2>
            <span class="desc">Total Contacts
            <div class="icon">
                <i class="zmdi zmdi-calendar-note"></i>
            </div>
        </div>
    </div>
</div>
<!-- END STATISTIC-->

<div class="row user-data m-b-10">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Recent Calls</h3>
        <div class="p-3">
            <table class="table table-top-campaign table-striped">
                <thead>
                    <th>Name</th>
                    <th>Number</th>
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
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
<div class="row user-data m-b-30" >
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Recent Messages</h3>
            <div class=" p-3">
                <table class="table table-top-campaign table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        @foreach ($Messages as $Message)
                        <tr class="tr-shadow">
                                <td>{{ $Message->name() }}</td>
                                <td>{{ $Message->number }}</td>
                                <td>{{ $Message->type }}</td>
                                <td>{{ $Message->message }}</td>
                                <td>{{ $Message->created_at }}</td>
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
