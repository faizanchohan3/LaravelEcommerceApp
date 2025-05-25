@extends("admin.layout")
@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Attribute</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Attributes </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>

            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Add Attribute</button>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th></th>
                                    <th>Created_At</th>
                                    <th>Uodate_At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $da)
                                    <tr>
                                        <td>ID</td>

                                        <td>{{$da->name}}</td>
<td>{{$da->slug}}</td>
                                        <td>12-12-12</td>

                                        <td>12-12-12</td>
                                        <td><button type="submit"   onclick="deletedata('{{$da->id}}','homebanners')"class="btn btn-primary  ">Update</button>
                                            <button type="submit"   onclick="deletedata('{{$da->id}}','atribute')"class="btn btn-danger  ">Danger</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>text</th>
                                    <th>Link</th>
                                    <th>Created_At</th>
                                    <th>Uodate_At</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <!-- Button trigger modal -->ard">
                            <form id="formsubmit" action="{{url('admin/addattributes')}}"  method="POST" enctype="multipart/form-data"     >
                                @csrf
                                       <!-- Modal -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Attributes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">




                                                <div class="border p-4 rounded">
                                                    <div class="card-title d-flex align-items-center">
                                                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                                        </div>
                                                        <h5 class="mb-0 text-info">Add Attributes</h5>
                                                    </div>
                                                    <hr/>
                                                    <div class="row mb-3">
                                                        <label for="enter_text" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="text" class="form-control" id="enter_text" placeholder="Enter Your Name">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="enter_text" class="col-sm-3 col-form-label">Slug</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="slug" class="form-control" id="enter_text" placeholder="Enter Your Name">
                                                        </div>
                                                    </div>


                                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
