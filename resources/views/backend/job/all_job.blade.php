@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content"> 
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Job</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Job</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.job') }}" class="btn btn-primary px-5">Add Job </a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->



    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Level</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($getRecord as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                          
                            <td>   @if(!empty($item->getImage()))
                      <img src="{{ $item->getImage() }}" style="height:60px; width:60px; border-radius:50px;" >
                      @endif
                        </td> 

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->level }}</td> 
                            <td><a href="{{ route('edit.job',$item->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('delete.job',$item->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach 

                    </tbody>

                </table>
               
            </div>
        </div>
    </div>

</div>




@endsection

