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
@if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed ! </strong>{{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Page Heading -->
<div class="d-flex flex-lg-row flex-column align-items-center justify-content-between">
    <div>
        <h1 class="h3 mb-2 text-danger ">Transaction in <span
                class="text-danger font-weight-bold">{{ $store_name->store_name }}</span></h1>
        <p class="mb-4">Transaction that you have created will be displayed in the table below</p>
    </div>
    <a href="/transaction" class="btn btn-secondary btn-icon-split mb-3 btn-sm" style="height: fit-content">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back to Store List</span>
    </a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Transaction Data Table</h6>
        <a href="/transaction/store-id/{{ $store_name->id }}/create" style="background-color: transparent; border: none"
            class="text-gray-900 text-decoration-none">
            <i class="fas fa-plus p-1" style="background-color: red; color: white; border-radius: 5px"></i>
            Add New Transaction
        </a>


    </div>
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <p class="mb-0">Export to : </p>
            <a href="/transaction/store-id/{{ $store_name->id }}/exportCSV" class="btn btn-warning mx-3">CSV</a>
            <a href="/transaction/store-id/{{ $store_name->id }}/exportExcel" class="btn btn-success">Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>MSISDN</th>
                        <th>Customer</th>
                        <th>Merchandise</th>
                        <th>CS Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $key => $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('j F, Y', strtotime($transaction->date)) }}</td>
                            <td>{{ $transaction->msisdn }}</td>
                            <td>{{ $transaction->customer }}</td>
                            <td  data-toggle="modal" data-target="#exampleModalCenter{{ $key }}" style="cursor: pointer">
                                {{ $transaction->merch_name }} ( {{ date('j F, Y', strtotime($transaction->store_stock_date)) }}  )
                            <!-- Modal Image Preview-->
                            <div class="modal fade" id="exampleModalCenter{{ $key }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLongTitle">{{ $transaction->merch_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <img src="{{ asset('storage/' . $transaction->image) }}" class="img-fluid col-md-10" alt="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td>{{ $transaction->cs_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('partials.foot')
@include('partials.footer')
