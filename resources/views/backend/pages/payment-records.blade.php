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
            <div class="col-12 col-md-12 col-lg-12 ">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Merchants:</label>
                                                <select class="select2 form-control merch"   style="width: 100%;">
                                                    <option value="">--Select Merchant--</option>
                                                  
                                                  @foreach($merchants as $merchant)
                                                    <option value="{{$merchant->id}}">{{$merchant->merchant_name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Status:</label>
                                                <select class="select2 status" style="width: 100%;" >
                                                    <option value="">--Select Status--</option>

                                                    <option value="0">Paid</option>
                                                    <option value="1">Unpaid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Date:</label>
                                                <input type="date" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label>Agent:</label>
                                          <select class="select2 form-control agentid"   style="width: 100%;">
                                              <option value="">--Select Agent--</option>
                                            @foreach($agents as $agent)
                                              <option value="{{$agent->id}}">{{$agent->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <label>Keyword:</label>
                                            <div class="input-group ">
                                            <input type="search" class="form-control form-control-lg keyword" placeholder="Type your keywords here" >
                                                
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-lg btn-default" id="btnfilter">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                <div class="col-md-12">
                  <div class="card ">
                    
                    <div class="card-body">
                       <table id="" class="table table-bordered table-striped table-agents">
                          <thead>
                          <tr>
                            <th>Customer Email</th>
                            <th>Merchant</th>
                            <th>Agent Name</th>
                            <th>Card Num</th>
                            <th>Purpose</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                          </thead>
                         
                           
                          <tbody>
                            @foreach($payments as $payment)
                          <tr>
                            <td>{{$payment->c_email}}</td>
                            <td>{{$payment->merch_name}}</td>
                            <td>{{$payment->ag_name}}</td>
                            <td>{{str_pad(substr($payment->card_no, -4), strlen($payment->card_no), '*', STR_PAD_LEFT)}}</td>
                            <td>{{$payment->purpose}}</td>
                            <td>${{$payment->amount}}.00</td>
                            @if($payment->status == 0)
                            <td><span class="badge badge-success">Paid</span></td>
                            @else
                            <td><span class="badge badge-warning">Un-Paid</span></td>
                            @endif
                            <td><a class="btn btn-primary" id="viewbtn" data-id="{{$payment->id}}" data-cname="{{$payment->c_name}}" data-cemail ="{{$payment->c_email}}" data-merchname ="{{$payment->merch_name}}" data-agname ="{{$payment->ag_name}}" data-cardno ="{{str_pad(substr($payment->card_no, -4), strlen($payment->card_no), '*', STR_PAD_LEFT)}}" data-purpose ="{{$payment->purpose}}" data-amount ="{{$payment->amount}}" data-status="{{$payment->status}}" data-url ="{{route('generate-invoice',$payment->id)}}"><i class="fa fa-eye"></i> View</a> </td>
                          </tr>
                          
                          @endforeach
                          </tbody>
                        </table>
                       
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
          </div>
        
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="paymentModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Payment Details</h5>
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
              <table class="table table-striped table-bordered ">
                <tr>
                  <td class="bg-warning">Customer Name</td><td class="cname"></td>
                </tr>
                <tr>
                  <td class="bg-warning">Customer Email</td><td class="cemail"></td>
                </tr>
                <tr>
                  <td class="bg-warning">Merchant </td><td class="merchname"></td>
                </tr>
                <tr>
                  <td class="bg-warning">Agent Name</td><td class="agname"></td>
                </tr>
                <tr>
                  <td class="bg-warning">Card No.</td><td class="cardno"></td>
                </tr>
                <tr>
                  <td class="bg-warning">Amount</td><td class="amount">$</td>
                </tr>
                <tr>
                  <td class="bg-warning">Purpose</td><td class="purpose"></td>
                </tr>
                 <tr>
                  <td colspan="12"><center><a href="" class="invoicelink btn btn-success">Generate Invoice</a></center></td>
                </tr>
              </table>
            </div>
          </div>
      </div>
      
    </div>
  </div>
</div>

@endsection 
@section('page-script')

<script type="text/javascript">
    $(document).on('click','#viewbtn',function(){
         $('#paymentModal').modal('show')
         var id = $(this).data('id');
         var cname = $(this).data('cname');
         var cemail = $(this).data('cemail');
         var merchname = $(this).data('merchname');
         var agname = $(this).data('agname');
         var cardno = $(this).data('cardno');
         var amount = $(this).data('amount');
         var purpose = $(this).data('purpose');
         var status = $(this).data('status');
         var url = $(this).data('url');
         // console.log(cardno);
         $('.id').text(id);
         $('.cname').text(cname);
         $('.cemail').text(cemail);
         $('.merchname').text(merchname);
         $('.cardno').text(cardno);
         $('.agname').text(agname);
         $('.amount').text(amount);
         $('.purpose').text(purpose);
         $('.invoicelink').attr('href', url);
    });
  </script>
  <script type="text/javascript">

  $(document).ready(function(){
     $(document).on('click','#btnfilter',function(){

      var merch = $('.merch').val();
      var status = $('.status').val();
      var date = $('.date').val();
      var keyword = $('.keyword').val();
      var agent_id = $('.agentid').val();
      var html = '';
      console.log(keyword);
      $.ajax({
        type:"GET",
        url:"{{route('all-payment-filter')}}",
        data:{merch:merch,status:status,date:date,keyword:keyword,agentid:agent_id},
        success:function(resp){
           console.log(resp.data);
          $('.table-agents').find('tbody').html(resp.data);
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