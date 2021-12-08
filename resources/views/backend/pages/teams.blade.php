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
          <div class="col-12 ">
            <div class="card">
              <div class="card-body">
                <a class="btn btn-primary float-right" id="addbtn" > Add Team</a>
            <a class="btn btn-primary float-right" id="closebtn" style="display: none"> Cancel</a>
              </div>
            </div>
          </div>
          <!-- left column -->
          <div class="col-md-12" id="addteam" style="display: none">
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('store-team')}}" method="post">
                @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Team Name</label>
                    <input type="text" class="form-control " id="exampleInputEmail1"  name="team_name">
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teams Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-bordered table-striped projects">
                  <thead>
                  <tr>
                    <th style="width: 1%">S no.</th>
                    <th style="width: 20%">Team Name</th>
                    <th style="width: 55%">Team Memebers</th>
                    <th style="width: 4%">Status</th>
                    <th style="width: 20%">Actions</th>
                  </tr>
                  </thead>
                 
                   
                    @php
                    $sn =1 
                    @endphp
                    @foreach($teams as $team)
                  <tr>
                    <td>#{{$sn}}</td>
                    <td>{{$team->team_name}}</td>
                    <td> 
                      <ul class="list-inline">
                        @php
                        $agents = \App\Agent::where('team_id',$team->id)->get();
                        @endphp
                        @foreach($agents as $agent)
                        <li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="{{asset('public/backend-assets/assets/img/avatar.png')}}" id="agentbtn" data-name="{{$agent->name}}" data-email="{{$agent->email}}" data-phone="{{$agent->phone}}">
                        </li>
                        @endforeach
                      </ul>
                    </td>
                    @if($team->status == 0)
                    <td><span class="badge badge-success">Active</span></td>
                    @else
                    <td><span class="badge badge-warning">De-Active</span></td>
                    @endif
                    <td><a class="btn btn-info btn-sm" id="teambtn" data-id="{{$team->id}}" data-name="{{$team->team_name}}"  data-status="{{$team->status}}"><i class="fa fa-pen"></i></a> 
                      <a class="btn btn-danger btn-sm" href="{{route('del-team',$team->id)}}"><i class="fa fa-trash"></i></a></td>
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
  <div class="modal" tabindex="-1" role="dialog" id="teamModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Team</h5>
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
                <form action="{{route('edit-team')}}" method="post">
                  @csrf
                      <input type="hidden" class="form-control id" id="exampleInputEmail1"  name="id">

                  <div class="card-body">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Team Name</label>
                      <input type="text" class="form-control name" id="exampleInputEmail1"  name="team_name">
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

   <div class="modal" tabindex="-1" role="dialog" id="agentmodal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agent Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
              <!-- general form elements -->
               <div class="col-12  d-flex align-items-stretch flex-column">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                          <!-- Digital Strategist -->
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-7">
                              <h2 class="lead name"><b></b></h2>
                              
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email: <span class="email"></span></li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <span class="phone"></span></li>
                              </ul>
                            </div>
                            <div class="col-5 text-center">
                              <img src="{{asset('public/backend-assets/assets/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                          </div>
                        </div>
                        
                      </div>
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
      $('#addteam').css('display','block');
      $('#closebtn').css('display','block');
      $('#addbtn').css('display','none');
    });

    $(document).on('click','#closebtn',function(){
      $('#addteam').css('display','none');
      $('#closebtn').css('display','none');
      $('#addbtn').css('display','block');
    });
    $(document).on('click','#teambtn',function(){
         $('#teamModal').modal('show')
         var id = $(this).data('id');
         var name = $(this).data('name');
         var status = $(this).data('status');
         console.log(name);
         $('.id').val(id);
         $('.name').val(name);
         $('.status').val(status);
    });

    $(document).on('click','#agentbtn',function(){
         $('#agentmodal').modal('show')
         var email = $(this).data('email');
         var name = $(this).data('name');
         var phone = $(this).data('phone');
         // console.log(name);
         $('.email').text(email);
         $('.name').text(name);
         $('.phone').text(phone);
    });
  </script>
@endsection