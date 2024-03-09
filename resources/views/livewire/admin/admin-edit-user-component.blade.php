<div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/css/editservicecategory.css')}}">
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                           Edit Service Category
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.users')}}" class="btn1 btn-info pull-right">All users</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                  @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="updateServiceCategory()">
                                        @csrf
                                        <div class="form-group">
                                            <label for="id" class="control-label col-sm-3">ID:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="id" wire:model="id">
                                                @error('id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" wire:model="name">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label col-sm-3">Email:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="email" wire:model="email" />
                                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                        <label for="utype" class="control-label col-sm-3">User Type:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="utype" wire:model="utype" />
                                                @error('utype') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn1 btn-success pull-right">Update user</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>

