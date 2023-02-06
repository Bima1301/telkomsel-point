@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')
@if (session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Success ! </strong>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Page Heading -->
<h1 class="h3 mb-2 text-danger font-weight-bold">Store</h1>
<p class="mb-4">Store that you have created will be displayed in the table below</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Real Time Status Stock Table</h6>
        <a href="/store/create" class="text-gray-900 text-decoration-none"> 
            <i class="fas fa-plus p-1" style="background-color: red; color: white; border-radius: 5px"></i>
            Add New Store
            </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Store Name</th>
                        <th>Address</th>
                        <th>Setting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $store->store_name }}</td>
                        <td>{{ $store->address }}</td>
                        <td class="d-flex flex-row justify-content-around">
                            <div>
                                <a href="/store/{{ $store->id }}/edit" class="btn btn-success btn-rectangle">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div style="margin-left: 10px">
                                <a class="btn btn-danger btn-rectangle" data-toggle="modal"
                                    data-target="#myModal{{ $store->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $store->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body d-flex flex-column align-items-center">
                                            <img style="width: 200px; object-fit: contain" src="/img/trash.png"
                                                alt="">
                                            <p class="mt-3 text-dark">Are you sure want to remove <span
                                                    class="text-danger">{{ $store->merch_name }}</span>
                                                store?</p>
                                            <div class="mt-4 d-flex justify-content-around w-100">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="/store/{{ $store->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn border-danger">Save
                                                        changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('partials.foot')
@include('partials.footer')
