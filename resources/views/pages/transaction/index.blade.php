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
        <h1 class="h3 mb-2 text-danger ">Transaction in <span class="text-danger font-weight-bold">{{ $store_name->store_name }}</span></h1>
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
        <a href="/transaction/store-id/{{ $store_name->id }}/create" style="background-color: transparent; border: none" class="text-gray-900 text-decoration-none" >
            <i class="fas fa-plus p-1" style="background-color: red; color: white; border-radius: 5px"></i>
            Add New Transaction
        </a>


    </div>
    <div class="card-body">
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
                    @foreach ($transaction as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('j F, Y', strtotime($transaction->date)) }}</td>
                        <td>{{ $transaction->msisdn }}</td>
                        <td>{{ $transaction->customer }}</td>
                        <td>{{ $transaction->merch_name }}</td>
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
