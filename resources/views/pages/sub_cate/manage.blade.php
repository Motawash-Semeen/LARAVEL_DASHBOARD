@extends('dashboard')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sub Categories Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Sub Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sub Category Name</th>
                    <th scope="col">Sub Category Description</th>
                    <th scope="col">Sub Category Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                    @foreach ($subs as $value) 
                     <tr>
                    <th scope='row'>{{$i++}}</th>
                    <td>{{$value->sub_cat_name}}</td>
                    <td>{{$value->sub_cat_des}}</td>
                    <td>
                      @if ($value->sub_cat_status==1)
                      <a href="{{url('/dashboard/inActiveSub/'.$value->id)}}" class="btn btn-success btn-sm">Active</a>
                      @else
                      <a href="{{url('/dashboard/Activesub/'.$value->id)}}" class="btn btn-warning btn-sm">InActive</a>
                      @endif
                    </td>
                    <td>
                    <a href="{{url('/dashboard/EditSub/'.$value->id)}}" class='btn btn-info btn-sm'>Edit</a>
                    <button class='btn btn-danger btn-sm' data-bs-toggle="modal" data-bs-target="#basicModal{{$value->id}}">Delete</button>
                    <!-- Basic Modal -->
                    <div class="modal fade" id="basicModal{{$value->id}}" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Confirm Delete?
                          </div>
                          <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                            <a href="{{url('/dashboard/DeleteSub/'.$value->id)}}" class="btn btn-primary">Confirm</a>
                          </div>
                        </div>
                      </div>
                    </div><!-- End Basic Modal-->
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->


@endsection