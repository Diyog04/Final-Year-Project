@include('admin/headlayout')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

            <div class="card mb-4">
                @if (Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session::get('message') }}
                    </div>
                @endif
                <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 p-3">
                        <label for="title2" class="col-form-label">Card Title:</label>
                        <input type="text" name="title2" class="form-control" value="{{ $data->title2 }}">

                        <label for="description2" class="col-form-label">Card Text:</label>
                        <input type="text" name="description2" class="form-control"
                            value="{{ $data->description2 }}">

                        <label class="col-form-label" for="image2">Upload an image:</label>
                        <input type="file" id="imageUpload" name="image2" accept="image/*">
                        <img src="{{ asset('storage/' . $data->image2) }}" width='70px' alt="Image">
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Update</button>

                </form>
            </div>
        </div>
    </main>
    @include('admin/footerlayout')
