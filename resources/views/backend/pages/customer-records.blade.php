@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S no.</th>
                    <th>Agent</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                 
                  	
                  	@php
                  	$sn =1 
                  	@endphp
                  	@foreach($customers as $customer)
                  <tr>
                    <td>{{$sn}}</td>
                    <td>{{$customer->agent}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{date('d-m-Y',strtotime($customer->created_at))}}</td>
                    <td><a class="btn btn-default "><i class="fa fa-eye"></i></a><a class="btn btn-default "><i class="fa fa-trash"></i></a></td>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection