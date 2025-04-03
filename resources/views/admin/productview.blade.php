@include('admin/headlayout')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">View</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admindash">Dashboard</a></li>
                <li class="breadcrumb-item active">Venues</li>
                <li class="breadcrumb-item active">View</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($data as $key=>$item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                 <td>{{$item->title2}}</td>
                                <td>{{$item->description2}}</td>

                                <!-- <td><img src="{{asset ('$item->image2')}}" alt=""></td> -->
                                <td><img src="{{ asset('storage/' . $item->image2) }}" width='70px' alt="Image">
                                </td>

                                
                                <td>
                                    <a class="btn btn-warning" href="{{ route('product.edit', $item->id) }}">Edit</a>
                                    <!-- <a class="btn btn-danger"
                                                href="{{ route('product.destroy', $item->id) }}">Delete</a> -->
                                                
                                    
                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this item?');">
    @csrf
    @method('DELETE')

    @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('token'))
        <div class="alert alert-success" role="alert">
            {{ session('token') }}
        </div>
    @endif

    <button type="submit" class="btn btn-danger">Delete</button>
</form>

                                    

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @include('admin/footerlayout')