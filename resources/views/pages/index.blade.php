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
<h1 class="h3 mb-2 text-gray-800 font-weight-bold">Dashboard</h1>
@canany(['superUser', 'PIC'])
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Real Time Status Stock Table</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Merchandise</th>
                        <th>Stock In</th>
                        @can('superUser')
                        <th>Add Stock</th>
                        @endcan

                        <th>Stock Out</th>
                        <th>Remaining Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($realtime_status as $key => $rs)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td  data-toggle="modal" data-target="#exampleModalCenter{{ $key }}" style="cursor: pointer">
                                {{ $rs->merch_name }}
                                <!-- Modal Image Preview-->
                                <div class="modal fade" id="exampleModalCenter{{ $key }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLongTitle">{{ $rs->merch_name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center">
                                                <img src="{{ asset('storage/' . $rs->image) }}" class="img-fluid col-md-10" alt="">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $rs->stock_in }}</td>
                            @can('superUser')
                            <td class="d-flex justify-content-center">
                                <div>
                                    <a id="create_modal" class="btn-sm btn-success btn-rectangle" data-toggle="modal"
                                        data-target="#myModal{{ $rs->id }}">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal{{ $rs->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ url('realstock/update') }}/{{ $rs->id }}"
                                                method="post">
                                                <div class="modal-header bg-gray-700">
                                                    @csrf
                                                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Merchandise
                                                        Stock</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true" class="text-white">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="Stock In">Edit Stock In for : <span
                                                                class="text-danger">{{ $rs->merch_name }}
                                                            </span></label>
                                                        <input type="number"
                                                            class="form-control @error('stock_in') is-invalid @enderror"
                                                            id="stock_in" name="stock_in" value="{{ $rs->stock_in }}">
                                                        @error('stock_in')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Save Changes</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>


                            </td>
                            @endcan
                            <td class="text-center">{{ $rs->stock_out }}</td>
                            <td class="text-center">{{ $rs->stock_in - $rs->stock_out }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
@endcanany

@include('partials.foot')
@include('partials.footer')
<script>
    @if (count($errors) > 0)
        $(document).ready(function() {
            $('#create_modal').trigger('click');
        });
    @endif
</script>