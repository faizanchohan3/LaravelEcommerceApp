@extends("admin.layout")
@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile </li>
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
          <a href="{{ url('admin/manage_products') }}/0">   <button type="button" class="btn btn-primary" >Add product</button>
          </a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>item_code</th>
                                    <th>Price</th>
                                    <th>Category</th>
<th>Image</th>
                                    <th>description</th>
                                    <th>Keywords</th>
                                    <th>Brands</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $da)
                                    <tr>
                                        <td>ID</td>

                                        <td>{{$da->name}}</td>
                                        <td>{{$da->slug}}</td>
                                        <td>{{$da->item_code}}</td>
                                        <td>{{$da->price}}</td>
                                        <td>{{$da->category->name}}</td>
                                        <td>
                                            @if($da->image)
                                                <img src="{{ asset('storage/private/public/products/' . basename($da->image)) }}" alt="{{ $da->name }}" style="width: 100px; height: 100px; ">
                                                <div class="small text-muted">Path: {{$da->image}}</div>
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{$da->description}}</td>
                                        <td>{{$da->keyword}}</td>
                                        <td>{{$da->brand->text}}</td>


                                        <td>
                                            <a href="{{ url('admin/manage_products') }}/{{$da->id}}"><button type="button"
                                            onclick="savedata('{{$da->id}}','{{$da->category_id}}','{{$da->attribute_id}}')"class="btn btn-primary  "
                                            >Update</button></a>
                                        <button type="submit"
                                            onclick="deletedata('{{ $da->id }}','_category_attribute')"class="btn btn-danger">Danger</button>
                                    </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>item_code</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Size</th>
                                    <th>description</th>
                                    <th>Keywords</th>
                                    <th>Brands</th>
                                    <th>Created_At</th>
                                    <th>Update_At</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
 <div class="col">
                <!-- Button trigger modal -->
                            <form id="formsubmit" action="{{url('admin/addattributes')}}"  method="POST" enctype="multipart/form-data"     >
                                @csrf
                                       <!-- Modal -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Product</h5>
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
