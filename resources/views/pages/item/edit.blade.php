@extends('dashboard')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Layouts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Item</li>
                    <li class="breadcrumb-item active">Edit Item</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">

                <div class="col-lg-6 offset-md-3">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Item</h5>

                            <!-- Floating Labels Form -->
                            <form action="{{url('/dashboard/itemUpdate/'.$item->id)}}" method="post" class="row g-3">
                                 @csrf  {{--//cross-site-forgacy --}}
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName"
                                        name="item_name" value="{{$item->item_name}}"
                                            placeholder="Item Name">
                                        <label for="floatingName">Item Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="item_des" placeholder="Item Description" id="floatingTextarea" style="height: 100px;">{{$item->item_description}}</textarea>
                                        <label for="floatingTextarea">Item Description</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingEmail" name="item_price"
                                            placeholder="Price" value="{{$item->item_price}}">
                                        <label for="floatingEmail">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" name="item_quantity" class="form-control" id="floatingCity" placeholder="Quantity" value="{{$item->item_quantity}}">
                                            <label for="floatingCity" >Quantity</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select name="status" id="" class="form-control">
                                                <option value="">-----Select Status-----</option>
                                                <option value="1" {{$item->item_status==1? 'selected': ''}}>Active</option>
                                                <option value="0" {{$item->item_status==0? 'selected': ''}}>InActive</option>
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
