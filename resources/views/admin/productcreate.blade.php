@include('admin/headlayout')


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Venue</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <div class="card mb-4">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ session::get('message') }}
                        </div>
                    @endif
                    <div class="mb-3 p-3">
                        <label for="title2" class="col-form-label">Card Title:</label>
                        <input type="text" name="title2" class="form-control" id="recipient-name">

                        <label for="description2" class="col-form-label">Card Text:</label>
                        <textarea name="description2" class="form-control" id="message-text"></textarea>

                        <label class="col-form-label" for="imageUpload2">Upload an image:</label>
                        <input type="file" id="imageUpload" name="imageUpload2" accept="image/*" required>
                        </br>

                        <label for="contact" class="col-form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" id="recipient-contact">

                        <label for="Packege" class="col-form-label">Packeges</label>
                        <input type="text" name="packege" class="form-control" id="packege">

                        <label for="location" class="col-form-label">Location</label>
                        <input type="text" name="location" class="form-control" id="location">

                        <label for="events" class="col-form-label">Event types</label>
                        <input type="text" name="events" class="form-control" id="events">


                    </div>
                    <button type="submit" class="btn btn-primary w-25">Submit</button>
                </form>
            </div>
        </div>
    </main>
    @include('admin/footerlayout')
