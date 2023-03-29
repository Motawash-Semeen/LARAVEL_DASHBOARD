@extends('dashboard')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">

                <div class="col-lg-6 offset-md-3">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Category</h5>

                            <!-- Floating Labels Form -->
                            <form action="{{url('/dashboard/UpdateCate/'.$category->id)}}" method="post" class="row g-3">
                                 @csrf  {{--//cross-site-forgacy --}}
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                        name="cat_name" value="{{$category->cat_name}}"
                                            placeholder="Category Name">
                                        <label for="floatingName">Category Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="cat_des" placeholder="Item Description" id="floatingTextarea" style="height: 100px;">{{$category->cat_description}}</textarea>
                                        <label for="floatingTextarea">Category Description</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select name="cat_status" id="" class="form-control">
                                                <option value="">-----Select Status-----</option>
                                                <option value="1" {{$category->cat_status==1? 'selected': ''}}>Active</option>
                                                <option value="0" {{$category->cat_status==0? 'selected': ''}}>InActive</option>
                                            </select>
                                            <label for="floatingstatus">Item Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                            <!-- End floating Labels Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
