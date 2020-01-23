@extends('admin/layouts/app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <b> Messages</b>
       <!-- <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>-->
    </section> 

    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <!--  <h3 class="box-title">Responsive Hover Table</h3> -->

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
                @foreach ($contacts as $contact)
                <tr>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->email}}</td>
                  <td style="color:#006400">{{$contact->subject}}</td>
                  <td style="color:blue">{{$contact->message}}</td>
                  <td><form id="delete-form-{{ $contact->id }}" action="{{ route('contacts.destroy',$contact->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $contact->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
      @endsection