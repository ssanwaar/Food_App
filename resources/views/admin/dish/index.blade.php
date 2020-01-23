@extends('admin/layouts/app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>Dishes</b>
      </h1>
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

     <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
      -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              <a href="{{ route('dish.create') }}">
              <button type="button" class="btn btn-block btn-primary btn-lg">Add New Dish</button>
              </a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name Of Dish</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dishes as $dish)
                <tr>
                  <td>{{ $dish->name }}</td>
                  <td>{{ $dish->category }}</td>
                  <td>{{ $dish->price }}</td>
                  <td><img width="40" height="20" src="{{url('uploads/item/'.$dish->image)}}" alt="{{$dish->image}}"/></td>
                 <td>
                     <a href= "{{ route('dish.edit',$dish->id) }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                     <form id="delete-form-{{ $dish->id }}" action="{{ route('dish.destroy',$dish->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $dish->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="glyphicon glyphicon-trash"></i></a>
                     <!--<a href="/dishes/{{$dish->id}}/"><i class="material-icons">delete</i></button>-->
                 </td>
                </tr>
                @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endsection