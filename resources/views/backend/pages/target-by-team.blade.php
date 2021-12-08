@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Team Target</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Target</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('store-team-target')}}" method="post">
                @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Target</label>
                    <input type="text" class="form-control " id="exampleInputEmail1"  name="target">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Team Name</label>
                    <select name="team_id" class="form-control ">
                    @foreach($teams as $team)
                     <option value="{{$team->id}}">{{$team->team_name}}</option>
                     @endforeach
                   </select>
                  </div>
                  
                   <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control status">
                      <option value="0">Active</option>
                      <option value="1">De-Active</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teams Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>S no.</th>
                    <th>Target</th>
                    <th>Team</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                 
                   
                    @php
                    $sn =1 
                    @endphp
                    @foreach($targets as $target)
                  <tr>
                    <td>{{$sn}}</td>
                    <td>${{$target->target}}</td>
                    @php
                    $team = \App\Team::where('id',$target->team_id)->first();
                    @endphp
                    <td>{{$team->team_name}}</td>
                    @if($target->status == 0)
                    <td><span class="badge badge-success">Active</span></td>
                    @else
                    <td><span class="badge badge-warning">De-Active</span></td>
                    @endif
                    <td><a class="btn btn-default " id="teamtargetbtn" data-id="{{$target->id}}" data-target="{{$target->target}}" data-team="{{$target->team_id}}"  data-status="{{$target->status}}"><i class="fa fa-pen"></i></a><a class="btn btn-default " href="{{route('del-team-target',$target->id)}}"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @php
                  $sn++
                  @endphp
                  @endforeach
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal" tabindex="-1" role="dialog" id="teamtargetModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Team Target</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('edit-team-target')}}" method="post">
                @csrf
                    <input type="hidden" class="form-control id" id="exampleInputEmail1"  name="id">

                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Target</label>
                    <input type="text" class="form-control target" id="exampleInputEmail1"  name="target">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Team Name</label>
                    <select name="team_id" class="form-control team">
                    @foreach($teams as $team)
                     <option value="{{$team->id}}">{{$team->team_name}}</option>
                     @endforeach
                   </select>
                  </div>
                  
                   <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control status">
                      <option value="0">Active</option>
                      <option value="1">De-Active</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
      </div>
      
    </div>
  </div>
</div>
  
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).on('click','#teamtargetbtn',function(){
         $('#teamtargetModal').modal('show')
         var id = $(this).data('id');
         var target = $(this).data('target');
         var team = $(this).data('team');
         var status = $(this).data('status');
         console.log(name);
         $('.id').val(id);
         $('.target').val(target);
         $('.team').val(team);
         $('.status').val(status);
    });
  </script>
@endsection