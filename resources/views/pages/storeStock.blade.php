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
<div class="d-flex flex-lg-row flex-column align-items-center justify-content-between">
<div>
    <h1 class="h3 mb-2 text-danger font-weight-bold">{{ $store_name }}</h1>
    <p class="mb-4">Store Stock that you have created will be displayed in the table below</p>
</div>
<a href="/store" class="btn btn-secondary btn-icon-split mb-3 btn-sm" style="height: fit-content">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Back to Store</span>
</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">{{ $store_name }} Stock Data Table</h6>
        <a href="/store/store-stock/create/{{ $store_id }}" class="text-gray-900 text-decoration-none">
            <i class="fas fa-plus p-1" style="background-color: red; color: white; border-radius: 5px"></i>
            Add New Stock
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Merchandise</th>
                        <th>Stock In</th>
                        <th>Stock Out</th>
                        <th>PIC</th>
                        <th>Setting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($store_stock as $s_stock)
                        <tr>
                            <td>{{ $loop->iteration }} </td>
                            <td>{{ date('j F, Y', strtotime($s_stock->date)) }} </td>
                            <td>{{ $s_stock->merch_name }} </td>
                            <td>{{ $s_stock->stock_in }} </td>
                            <td>{{ $s_stock->stock_out }} </td>
                            <td>{{ $s_stock->PIC }} </td>
                            <td class="d-flex flex-row justify-content-around">
                                <div>
                                    <a href="/store/store-stock/edit/{{ $s_stock->id }}/{{ $store_id }}"
                                        class="btn-sm btn-success btn-rectangle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <div>
                                    <a  data-toggle="modal" data-target="#myModal{{ $s_stock->id }}"
                                        class="btn-sm btn-danger btn-rectangle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal{{ $s_stock->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body d-flex flex-column align-items-center">
                                                <img style="width: 200px; object-fit: contain" src="/img/trash.png"
                                                    alt="">
                                                <p class="mt-3 text-dark">Are you sure want to remove <span
                                                        class="text-danger">{{ $s_stock->merch_name }}</span>
                                                    ?</p>
                                                <div class="mt-4 d-flex justify-content-around w-100">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form action="/store/store-stock/destroy/{{ $s_stock->id }}/{{ $store_id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn border-danger">Remove</button>
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
