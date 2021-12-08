@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment Records</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <section class="content">

      <!-- Default box -->
     
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="col-md-12">
                   <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                              <div class="col-6">
                                  <div class="form-group">
                                      <label>Status:</label>
                                      <select class="select2 status" style="width: 100%;" >
                                          <option value="">--Select Status--</option>

                                          <option value="0">Paid</option>
                                          <option value="1">Unpaid</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-6">
                                  <div class="form-group">
                                      <label>Date:</label>
                                      <input type="date"  class="form-control date">
                                  </div>
                              </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-12">
                                  <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <input type="search" class="form-control form-control-lg invoiceno" placeholder="Type your Invoice No. here" >
                                        <div class="input-group-append">
                                            <button type="button" id="btnfilter" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="card ">
                    
                    <div class="card-body">
                       <table id="" class="table table-bordered table-striped table-invoice">
                  <thead>
                  <tr>
                    
                    <th>Invoice No</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                 
                   
                    
                    @foreach($invoices as $invoice)
                  <tr>
                    <td>{{$invoice->invoice_no}}</td>
                    @if($invoice->status == 0)
                    <td><span class="badge badge-success">Paid</span></td>
                    @else
                    <td><span class="badge badge-warning">Un-Paid</span></td>
                    @endif
                    <td><a class="btn btn-primary" href="{{route('singleinvoice',$invoice->id)}}"><i class="fa fa-eye"></i> View</a> <a class="btn btn-danger " href="{{route('send-invoice',$invoice->id)}}"><i class="fa fa-envelope"></i> Send Email</a></td>
                  </tr>
                 
                  @endforeach
                  
                </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
           
          </div>
        
    </section>

    
</div>
@endsection 
@section('page-script')


<script type="text/javascript">

  $(document).ready(function(){
     $(document).on('click','#btnfilter',function(){

      var status = $('.status').val();
      var date = $('.date').val();
      var invoiceno = $('.invoiceno').val();
      var html = '';
      $.ajax({
        type:"GET",
        url:"{{route('invoicefilter')}}",
        data:{status:status,date:date,invoiceno:invoiceno},
        success:function(resp){
           console.log(resp.data);
          $('.table-invoice').find('tbody').html(resp.data);
           // window.location.href="{{route('agent-dashboard')}}";
        },
        error:function(resp)
        {
          console.log(resp.data);
        }
      });
     });
  });
  

</script>
@endsection   
