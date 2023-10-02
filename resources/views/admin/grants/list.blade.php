@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Grants List (Total : {{ $getRecord->total() }})   </h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('admin/grants/add')}}" class="btn btn-primary">Add New Grants</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
           
            <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Search Grants</h3>
              </div>
              <form method="get" action="">
                <div class="card-body p-2">
                  <div class="row">


                <div class="form-group col-md-3">
                    <label >Grants Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('grants_name') }}" name="grants_name"  placeholder="Grants Name">
                  </div>
                  <!-- <div class="form-group col-md-2">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Team Name</label>
                    <input type="text" class="form-control" name="team" value="{{ Request::get('team') }}" placeholder="Team Name">
                  </div>

                  <div class="form-group col-md-2 ">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Email">
                  </div> -->

                  <div class="form-group col-md-3">
                    
                  <button class="btn btn-primary" type="submit" style="margin-top: 31px;">Search </button>
                  <a href="{{ url('admin/grants/list') }}" class="btn btn-success" type="submit" style="margin-top: 31px;">Reset </a>
                  </div>

                  </div>
                </div>
              </form>
             </div>     
          </div>    
         </div>

          @include(' _message')

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grants List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive" style="overflow:auto; " >
              <table class="table table-striped">
                  <thead>
                    <tr>
                     
                      <th >Grants Name</th>
                      <th>Organization Host</th>
                      <th>Deadline</th>
                      <th>Description</th>
                      <th>Requirements</th>
                      <th>Link of Announcement</th>
                      <th >Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                      <tr>

                        <td>{{  $value->grants_name }}</td>
                        <td>{{  $value->organization_host }}</td>
                        <td>{{  $value->deadline }}</td>
                        <td>{{  $value->description }}</td>
                        <td>{{  $value->requirments }}</td>
                        <td>{{  $value->link_announcement }}</td>
                        <td>{{  date('m-d-Y  H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 140px;">
  <div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ url('admin/grants/show/'.$value->id) }}">Show</a>
      <a class="dropdown-item" href="{{ url('admin/grants/edit/'.$value->id) }}">Edit</a>
      <a class="dropdown-item" href="{{ url('admin/grants/delete/'.$value->id) }}">Delete</a>
    </div>
  </div>
</td>

                     
                      </tr> 
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </section> 
  </div>
  <!-- /.content-wrapper -->
    


@endsection