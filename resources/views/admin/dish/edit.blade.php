@extends('admin/layouts/app')

@section('main-content')
<div class="content-wrapper">
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
            <form role="form" method="post" action="{{ route('dish.update',$dish->id) }}" enctype="multipart/form-data">
            <!--<input type="hidden" name="_method" value="PATCH">-->
            {{ csrf_field() }}
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="InputNameofDish">Name of Dish</label>
                  <input type="text" class="form-control" value="{{$dish->name}}" id="InputNameofDish" name="InputNameofDish" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="InputCategory">Category</label>
                  <input type="text" class="form-control" value="{{$dish->category}}" id="InputCategory" name="InputCategory" placeholder="Category">
                </div>
                <div class="form-group">
                  <label for="InputPrice">Price</label>
                  <input type="number" class="form-control" value="{{$dish->price}}" id="InputPrice" name="InputPrice" placeholder="Price">
                </div>
                <div class="form-group">
                  <label for="InputImageFile">Image</label>
                  <img width="40" height="20" src="{{url('uploads/item/'.$dish->image)}}" alt="{{$dish->image}}"/>
                  <input type="file" id="InputImageFile" value="{{$dish->image}}" name="InputImageFile">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href=" {{ route('dish.index') }}">
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>
              </div>
            </form>
            </div>
@endsection