@extends('admin/layouts/app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>Enter Dish Details</b>
        </h1><br>
       
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>-->
      @if(count($errors) > 0)
      <div class="alert alert-danger">
       <ul>
       @foreach($errors->all() as $error)
            <li>{{$error}}</li> 
       @endforeach     
       </ul>
       </div>
      @endif
      @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
      @endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
             <a href="{{ route('dish.index') }}">
             <button type="button" class="btn btn-block btn-primary btn-lg">See Added Dishes</button></h3>
            </a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="{{ route('dish.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="InputNameofDish">Name of Dish</label>
                  <input type="text" class="form-control" id="InputNameofDish" name="InputNameofDish" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="InputCategory">Category</label>
                  <input type="text" class="form-control" id="InputCategory" name="InputCategory" placeholder="Category">
                </div>
                <div class="form-group">
                  <label for="InputPrice">Price</label>
                  <input type="number" class="form-control" id="InputPrice" name="InputPrice" placeholder="Price">
                </div>
                <div class="form-group">
                  <label for="InputImageFile">Image</label>
                  <input type="file" id="InputImageFile" name="InputImageFile">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-info">Clear</button>
                <a href="{{ route('dish.index') }}">
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>
              </div>
            </form>
@endsection