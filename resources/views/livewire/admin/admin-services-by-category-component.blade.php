<div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .content_info{
        margin-top:160px;
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
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                        {{$category_name}} Service 
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <a href="{{route('admin.add_service_categories')}}" class="btn1 btn-info pull-right">Add New</a>
                                        </div> -->
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
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                    <tr>
                                    <td>{{$service->id}}</td>
                                    <td><img src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}" width="60" /></td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->price}}</td>
                                    <td>
                                        @if($service->status)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>{{$service->category->name}}</td>
                                    <td>{{$service->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$services->links()}}
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</div>
