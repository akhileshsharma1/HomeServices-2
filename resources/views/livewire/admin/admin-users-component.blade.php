<div>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .tablentable-striped {
            color: #fff;
        }

        .profile1{
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .container_5 {
            margin-top:50px;
            padding: 40px;
        }

        .panel{
            margin-top: -56px;
        }

        h1 {
            color: #ffffff; /* White text color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
            color: #333333; /* Dark gray text color */
        }

        img {
            max-width: 100%;
            height: auto;
        }
   
            .main{
    margin-top: 50px;
    padding: 2rem 1.5rem;
    background-image: linear-gradient(to right, #4CAF50, #a6f4cc);

}

            .cards{
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 2rem;
                margin-top: 1rem;
            }

            .card-single{
                display: flex;
                justify-content: space-between;
                background: #fff;
                padding: 2rem;
                border-radius: 2px;
            }

            .card-single h1{
                color:black;
            }

            .card-single div:last-child span{
                font-size: 3rem;
                color: var(--main-color);
            }

            .card-single div:first-child span{
                color: var(--text-grey);
            }

            .card-single:last-child{
                background: var(--main-color);
            }

            .card-single:last-child h1,
            .card-single:last-child div:first-child span,
            .card-single:last-child div:last-child span{
                color: #fff;
            }
    </style>
 
    <div class="main">
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{ $customerCount }}</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>{{ $providerCount }}</h1>
                        <span>Service Providers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>{{ $serviceCount }}</h1>
                        <span>Services</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>{{ $bookingCount }}</h1>
                        <span>Total Bookings</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
            </div>

</div>
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
                                            <select id="user-type-select" class="form-control" wire:model="selectedUserType">
                                                <option value="all">All Users</option>
                                                <option value="CST">Customer</option>
                                                <option value="SVP">Service Provider</option>
                                            </select>
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
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->password }}</td>
                                                    <td>{{ $user->utype }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit_users', ['id' => $user->id]) }}"><i class="fa fa-edit fa-2x text-info" style="margin-left:10px;"></i></a>
                                                        <a href="#" onclick="confirm('Are you sure you want to delete this user?').stopImmediatePropagation()" wire:click.prevent="deleteUser({{ $user->id }})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->links() }}
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#user-type-select').change(function() {
                var selectedUserType = $(this).val();
                @this.set('selectedUserType', selectedUserType);
            });
        });
    </script>
</div>
