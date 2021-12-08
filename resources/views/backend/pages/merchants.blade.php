@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Merchant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Merchant</li>
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
              <form action="{{route('store-merchant')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Merchant Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="merchant_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Key</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="client_key">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Secret Key</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="client_secret_key">
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
                <h3 class="card-title">Merchants Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>S no.</th>
                    <th>Merchant Name</th>
                    <th>Client Key</th>
                    <th>Client Secret Key</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                 
                   
                    @php
                    $sn =1 
                    @endphp
                    @foreach($merchants as $merchant)
                  <tr>
                    <td>{{$sn}}</td>
                    <td>{{$merchant->merchant_name}}</td>
                    <td>{{$merchant->client_key}}</td>
                    <td>{{$merchant->client_secret_key}}</td>
                    @if($merchant->status == 0)
                    <td><span class="badge badge-success">Active</span></td>
                    @else
                    <td><span class="badge badge-warning">De-Active</span></td>
                    @endif
                    <td><a class="btn btn-default " id="merchantbtn" data-id="{{$merchant->id}}" data-name="{{$merchant->merchant_name}}" data-key="{{$merchant->client_key}}" data-secret_key="{{$merchant->client_secret_key}}" data-status="{{$merchant->status}}"><i class="fa fa-pen"></i></a><a class="btn btn-default " href="{{route('del-merchant',$merchant->id)}}"><i class="fa fa-trash"></i></a></td>
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
  <div class="modal" tabindex="-1" role="dialog" id="merchantModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
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
              <form action="{{route('edit-merchant')}}" method="post">
                @csrf
                    <input type="hidden" class="form-control id" id="exampleInputEmail1"  name="id">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Merchant Name</label>
                    <input type="text" class="form-control name" id="exampleInputEmail1"  name="merchant_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Key</label>
                    <input type="text" class="form-control key" id="exampleInputEmail1"  name="client_key">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Secret Key</label>
                    <input type="text" class="form-control secret_key" id="exampleInputEmail1"  name="client_secret_key">
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
    $(document).on('click','#merchantbtn',function(){
         $('#merchantModal').modal('show')
         var id = $(this).data('id');
         var name = $(this).data('name');
         var key = $(this).data('key');
         var secret_key = $(this).data('secret_key');
         var status = $(this).data('status');
         console.log(name);
         $('.id').val(id);
         $('.name').val(name);
         $('.key').val(key);
         $('.secret_key').val(secret_key);
         $('.status').val(status);
    });
  </script>
@endsection