@include('admin/headlayout')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">View</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admindash">Dashboard</a></li>
                <li class="breadcrumb-item active">Notification</li>
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->title1}}</td>
                                <td>{{$item->description1}}</td>
                                
                                <td><a class="btn btn-warning" href="#">Edit</a>
                                    <a class="btn btn-danger" href="#">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div style="height: 100vh"></div>
            <div class="card mb-4">
                <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the
                    end of the static navigation demo.</div>
            </div>
        </div>
    </main>
    @include('admin/footerlayout')