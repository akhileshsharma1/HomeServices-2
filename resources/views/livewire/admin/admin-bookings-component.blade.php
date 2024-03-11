<div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .profile1 {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
        .panel{
            margin:80px;
        }
    .content_info{
        margin-top:16px;
    }
    table{
        margin-top:50px;
    }
    nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
</style>
<section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container_5">
                    <div class="row PortfolioContainer">
                        <div class="profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <select id="user-type-select" class="form-control" wire:model="selectedUserType">
                                                <option value="all">All Users</option>
                                                <option value="CST">Customer</option>
                                                <option value="SVP">Service Provider</option>
                                            </select> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>User ID</th>
                                                <th>Service Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Service Provider ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->name }}</td>
                                                    <td>{{ $booking->description }}</td>
                                                    <td>{{ $booking->user_id }}</td>
                                                    <td>{{ $booking->service_name }}</td>
                                                    <td>{{ $booking->date }}</td>
                                                    <td>{{ $booking->time }}</td>
                                                    <td>{{ $booking->status }}</td>
                                                    <td>{{ $booking->service_provider_id }}</td>
                                                    <td>
                                                        <a href="#" onclick="confirm('Are you sure you want to delete this user?').stopImmediatePropagation()" wire:click.prevent="deleteBookings({{  $booking->id }})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $bookings->links() }}
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
