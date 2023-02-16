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
<h1 class="h3 mb-2 text-danger font-weight-bold">Transaction</h1>
<p class="mb-4">Please choose the store to create new transaction</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Store Table</h6>

        <!-- ModalNEw Store -->
        <div class="modal fade" id="myModalCreateStore" tabindex="-1" role="dialog" aria-labelledby="myModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header bg-gray-700">
                            <h5 class="modal-title text-white" id="exampleModalLongTitle">Add New Store</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Store Name">Store Name <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('store_name') is-invalid @enderror"
                                    id="store_name" name="store_name" value="{{ old('store_name') }}">
                                @error('store_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address <span style="color: red">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Add Store</button>
                        </div>
                </div>
                </form>
            </div>
        </div>


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
                            <td>
                                <a href="/transaction/store-id/{{ $store->id }}" class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span style="width: 150px"  class="text">Add Transaction</span>
                                </a>
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
