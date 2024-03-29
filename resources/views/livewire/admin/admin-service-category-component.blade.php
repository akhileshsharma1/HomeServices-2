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

        .container_5 {
            margin-top:50px;
            padding: 40px;
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
        .profile1{
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        .col98{
            width: 100%;
    padding-right: 15px;
    padding-left: 15px;
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
                                        <div class="col98">
                                            All Service Categories
                                        </div>
                                        <div class="col98">
                                            <a href="{{route('admin.add_service_categories')}}" class="btn1 btn-info pull-right">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($scategories as $scategory)
                                    <tr>
                                    <td>{{$scategory->id}}</td>
                                    <td><img src="{{ asset('images/categories') }}/{{ $scategory->image }}" width="60" /></td>
                                    <td>{{$scategory->name}}</td>
                                    <td>{{$scategory->slug}}</td>
                                    <td>
                                    <a href="{{ route('admin.services_by_category',['category_slug'=>$scategory->slug]) }}"><i class="fa fa-list fa-2x text-info"></i></a>
                                    <a href="{{ route('admin.edit_service_category',['category_id'=>$scategory->id]) }}"><i class="fa fa-edit fa-2x text-info" style="margin-left:10px;"s></i></a>
                                <a href="#" onclick="confirm('Are you sure you want to delete this service category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteServiceCategory({{ $scategory->id }})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$scategories->links()}}
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
