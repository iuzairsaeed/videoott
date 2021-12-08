@extends('backend.layout.master')
@section('content')
<style type="text/css">
  @media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
  .main-footer ,.side {
    display:none;
  }
  
  
}
</style>
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
    <section class="content">

       <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="{{asset('public/logo.png')}}" style="width:200px">
                    <small class="float-right">Date: {{date('d-M-Y',strtotime($invoice->created_at))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Codyfied Technologies</strong><br>
                   277 halsey street newark NJ 07102<br>
                    Phone: (+1) (415) 8531107<br>
                    Email: sales@codyfied.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>

                    @php
                    $p_data = \App\Payment::select('payments.*','customers.email as c_email','customers.name as c_name')
                           ->leftjoin('customers','customers.id','payments.customer_id')
                           ->where('payments.id',$invoice->payment_id)
                           ->first();
                    @endphp
                    <strong>{{$p_data->c_name}}</strong><br>
                    Email: {{$p_data->c_email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice {{$invoice->invoice_no}}</b><br>
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Purpose</th>
                      <th>Amount</th>
                      <th>Card no</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{$p_data->purpose}}</td>
                      <td>${{$p_data->amount}}.00</td>
                      <td>{{str_pad(substr($p_data->card_no, -4), strlen($p_data->card_no), '*', STR_PAD_LEFT)}}</td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Subtotal:</th>
                        <td>${{$p_data->amount}}.00</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>${{$p_data->amount}}.00</td>
                      </tr>
                      <tr>
                        <th></th>
                        <td>
                          @if($p_data->status == 0)
                  <img src="{{asset('public/paid.PNG')}}" width="200" height="200" class="float-right">
                  @endif
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-default" id="print"><i class="fas fa-print"></i> Print</button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
         
        </div><!-- /.row -->
    </section>
</div>
@endsection 
@section('page-script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(document).on('click','#print',function(){
  window.print();
});
</script>
@endsection   
