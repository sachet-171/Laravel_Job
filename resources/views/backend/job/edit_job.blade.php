@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Job</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Job</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <form id="myForm" action="" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" value="{{old('name', $getRecord->name)}}" name="name"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Place</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" value="{{old('place', $getRecord->place)}}" name="place"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Email</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" value="{{old('email', $getRecord->email)}}" name="email"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Website</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" value="{{old('website', $getRecord->website)}}"
                                            name="website" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Contact</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" value="{{old('contact', $getRecord->contact)}}"
                                            name="contact" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Developer Level</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select name="level" class="form-control">
                                            <option value="" {{ $getRecord->level ? '' : 'selected' }}>--Select
                                                Developer Level--</option>
                                            <option value="junior"
                                                {{ $getRecord->level === 'junior' ? 'selected' : '' }}>Junior</option>
                                            <option value="intermediate"
                                                {{ $getRecord->level === 'intermediate' ? 'selected' : '' }}>
                                                Intermediate</option>
                                            <option value="experienced"
                                                {{ $getRecord->level === 'experienced' ? 'selected' : '' }}>Experienced
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job Price</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" value="{{old('price', $getRecord->price)}}"
                                            name="price" class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Message </h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <textarea name="description" class="form-control" id="input11"
                                            placeholder="Description ..."
                                            rows="3"> {{old('description', $getRecord->description)}}</textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Photo </h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input class="form-control" name="job_pic" type="file" id="image">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(!empty($getRecord->getImage()))

                                        <img src="{{$getRecord->getImage() }}" style="width:100px;">

                                        @endif
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Update Changes" />
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
    $('#image').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>




@endsection