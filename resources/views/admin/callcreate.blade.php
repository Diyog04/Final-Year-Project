@include('admin/headlayout')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Notification</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <div class="card mb-4">
                <form action="{{ route('call.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 p-3">
                        <label for="title1" class="col-form-label">Card Title:</label>
                        <input type="text" name="title1" class="form-control" id="recipient-name">

                        <label for="description1" class="col-form-label">Card Text:</label>
                        <textarea name="description1" class="form-control" id="message-text"></textarea>

                        <label class="col-form-label" for="imageUpload1">Upload an image:</label>
                        <input type="file" id="imageUpload" name="imageUpload1" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Submit</button>
                </form>
            </div>
        </div>
    </main>
    @include('admin/footerlayout')