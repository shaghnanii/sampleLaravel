@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="card">
                        <a href="/migrate">
                            <button class="btn btn-success btn-block">Migrate/transfer Data from one tabel to
                                another</button>
                        </a>
                    </div>

                    <div class="card">
                        <a href="/sendNotification">
                            <button class="btn btn-primary btn-block">Send Email Notificatoin</button>
                        </a>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">Users Notifications</div>
                <div class="card-body">
                    <div class="alert alert-success">Notifications</div>

                    <span class="fa_icon fa fa-bell pull-right" id="more"
                        onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Hide Notifications':'Show Notifications');});">
                        Open Notifications </span>
                    <br><br>
                    <table class="table table-primary details" style="display: none;">
                        <tr>
                            <th>Data</th>
                            <th>Notification Status</th>
                            <th>Action</th>
                        </tr>
                        @if(count($notifications) > 0)
                            @foreach($notifications as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>@if($item->read_at != null)
                                        <div>Read</div>
                                    @else<div>Unread</div>@endif </td>
                                    <td>
                                        @if($item->read_at != null)
                                            <span class="badge badge-secondary" style="cursor:pointer">Read</span>
                                        @else
                                            <a href="/home/markRead/{{ $item->id }}">
                                                <span class="badge badge-success" style="cursor:pointer">Mark As
                                                    Read</span>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="alert alert-danger">No Notifications Found</div>

                        @endif
                    </table>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">User Repository</div>
                <div class="card-body">
                    <div class="alert alert-success">List of all Database Users</div>

                    <table class="table table-danger">
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Notification Preference</th>
                        </tr>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->notification_preferences }}</td>
                                </tr>
                            @endforeach
                        @else
                            <div-alert class="alert-warning">No User Found</div-alert>
                        @endif
                    </table>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">Events | Real Time Notification</div>

                <div class="card-body">
                    <a href="/sendEventRealtimeNotification">
                        <button class="btn btn-success btn-block">Send Event Based Real Time Notification</button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    window.Echo.channel('events')
        .listen('RealTimeMessageEvent', (e) => console.log('RealTimeMessageEvent: ' + e.message));

</script>

@endsection
