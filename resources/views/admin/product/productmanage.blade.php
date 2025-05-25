@extends('admin.layout')
@section('content')
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


            <!-- Category Data Display Div -->


            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Server side</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form class="row g-3" id="formsubmit" action="{{ url('admin/saveproduct') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4">
                                        <label for="validationServer01" class="form-label">Name</label>
                                        <input type="name" class="form-control " id="validationServer01"
                                            value="{{ $pro->name }}" required="" name="name">
                                        <div class="valid-feedback" hidden>Looks good!</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationServer02" class="form-label">slug</label>
                                        <input type="slug" class="form-control " id="validationServer02"
                                            value="{{ $pro->slug }}" name="slug" required="">
                                        <div class="valid-feedback" hidden>Looks good!</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationServerUsername" class="form-label">item_code</label>
                                        <div class="input-group has-validation"> <span class="input-group-text"
                                                id="inputGroupPrepend3">@</span>
                                            <input type="item_code" class="form-control " name="item_code" id="validationServerUsername"
                                                aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback"
                                                required="">
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback hidden">
                                                Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationServer03" class="form-label">description</label>
                                        <textarea type="description" class="form-control " name="description" id="validationServer03"
                                            aria-describedby="validationServer03Feedback" required="">{{ $pro->description ?? '' }}</textarea>
                                        <div id="validationServer03Feedback" class="invalid-feedback hidden">Please provide
                                            a valid city.</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationServer04" class="form-label">keyword</label>
                                        <select class="form-select " id="validationServer04"
                                            aria-describedby="validationServer04Feedback" name="keyword" required="">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @foreach ($size as $ss)
                                                <option>{{ $ss->text }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationServer05" class="form-label">category</label>
                                        <select class="form-control " name="category" id="category">
                                            <option value="">Select an option</option>
                                            @foreach ($cat as $cate)
                                                <option value="{{ $cate->id }}">

                                                    {{ $cate->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col-md-3">

                                        <label class="text-primary fw-bold">Select Attribute</label>
                                        <div class="checkbox-group p-3 bg-light rounded" id="categoryData">



                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationServer05" class="form-label">brand</label>
                                        <select class="form-control " name="brand" id="">
                                            <option value="">Select an option</option>
                                            @foreach ($brand as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->text }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="product_image" class="form-label">Product Image</label>
                                        <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" required>
                                        <div class="form-text">Upload a product image (JPG, PNG, GIF up to 2MB)</div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <script>
                $("#category").change(function(e) {
                    var cat = document.getElementById('category').value;
                    var url = "{{ url('admin/getcategoryattributes') }}";
                    var html = '';
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: url,
                        data: {
                            'category': cat,
                        },
                        type: 'post',
                        success: function(result) {
                            // Clear previous data
                            $('#categoryData').empty();

                            // Create HTML content
                            var html = '<div class="category-info">';
                            jQuery.each(result.data, function(key, val) {

console.log(val);

                                html += '<div class="form-group">';
                                html += `<input class="form-check-input" value=`+val.attribute.singleattribute.id+` type="checkbox" name="roles" value= `+key+` id="roleAdmin" style="accent-color: #0d6efd;">`;
                                html += ' <label class="form-check-label text-dark" for="roleAdmin">'+val.attribute.singleattribute.name+'</label>';
                                html += '</div>';

                            html += '</div>';
                            });
                            // Append the new content
                            $('#categoryData').html(html);
                        }
                    });
                });
            </script>

        @endsection
