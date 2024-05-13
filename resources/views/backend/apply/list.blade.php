@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content"> 
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Apply</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Job Apply</li>
                </ol>
            </nav>
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
                            <th>Name</th>
                            <th>Email</th> 
                            <th>Message</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($getrecord as $key=>$item)
                        <tr>
                        <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>
                             <td>

                           
                    <a href="{{ route('delete.apply',$item->id) }}" id="delete" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach 

                    </tbody>

                </table>
               
            </div>
        </div>
    </div>

</div>




@endsection