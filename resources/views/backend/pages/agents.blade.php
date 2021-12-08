@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Agents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Agent</li>
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
          <div class="col-12 ">
            <div class="card">
              <div class="card-body">
                <a class="btn btn-primary float-right" id="addbtn" > Add Agent</a>
            <a class="btn btn-primary float-right" id="closebtn" style="display: none"> Cancel</a>
              </div>
            </div>
          </div>

          <div class="col-md-12" id="addagent" style="display: none">
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('store-agent')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Agent Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="name">
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
                    <label for="exampleInputEmail1">Agent Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Agent Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="phone">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Agent Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1"  name="password">
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Agents Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    @php
                    $sn =1 
                    @endphp
                    @foreach($agents as $agent)
                     @php
                    $team = \App\Team::where('id',$agent->team_id)->first();
                    @endphp
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                          <!-- Digital Strategist -->
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-7">
                              <h2 class="lead"><b>{{$agent->name}}</b></h2>
                              <p class="text-muted text-sm"><b>Team: </b>{{$team->team_name}}</p>
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email: {{$agent->email}}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$agent->phone}}</li>
                              </ul>
                            </div>
                            <div class="col-5 text-center">
                              <img src="{{asset('public/backend-assets/assets/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="text-right">
                            <a  class="btn btn-sm bg-teal" id="agentbtn" data-id="{{$agent->id}}" data-team="{{$agent->team_id}}" data-name="{{$agent->name}}" data-email="{{$agent->email}}" data-phone="{{$agent->phone}}" data-status="{{$agent->status}}">
                              <i class="fas fa-pen"></i>
                            </a>
                           <a class="btn btn-danger " href="{{route('del-agent',$agent->id)}}"><i class="fa fa-trash"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @php
                      $sn++
                      @endphp
                      @endforeach
                  </div>
                
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
  <div class="modal" tabindex="-1" role="dialog" id="agentModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Agent</h5>
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
              <form action="{{route('edit-agent')}}" method="post">
                @csrf
                    <input type="hidden" class="form-control id" id="exampleInputEmail1"  name="id">

                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Agent Name</label>
                    <input type="text" class="form-control name" id="exampleInputEmail1"  name="name">
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
                    <label for="exampleInputEmail1">Agent Email</label>
                    <input type="email" class="form-control email" id="exampleInputEmail1"  name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Agent Phone</label>
                    <input type="text" class="form-control phone" id="exampleInputEmail1"  name="phone">
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

    $(document).on('click','#addbtn',function(){
      $('#addagent').css('display','block');
      $('#closebtn').css('display','block');
      $('#addbtn').css('display','none');
    });

    $(document).on('click','#closebtn',function(){
      $('#addagent').css('display','none');
      $('#closebtn').css('display','none');
      $('#addbtn').css('display','block');
    });

    $(document).on('click','#agentbtn',function(){
         $('#agentModal').modal('show')
         var id = $(this).data('id');
         var name = $(this).data('name');
         var team = $(this).data('team');
         var email = $(this).data('email');
         var phone = $(this).data('phone');
         var status = $(this).data('status');
         console.log(name);
         $('.id').val(id);
         $('.name').val(name);
         $('.team').val(team);
         $('.email').val(email);
         $('.phone').val(phone);
         $('.status').val(status);
    });
  </script>
@endsection