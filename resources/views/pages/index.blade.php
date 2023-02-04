@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Dashboard</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Real Time Status Stock Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Merchandise</th>
                                            <th>Stock In</th>
                                            <th>Add Stock</th>
                                            <th>Stock Out</th>
                                            <th>Remaining Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($realtime_status as $rs)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rs->merch_name }}</td>
                                            <td>{{ $rs->stock_in }}</td>
                                            <td class="d-flex justify-content-center">
                                                <div>
                                                    <a href="{{url('realstock/edit')}}/{{$rs->id}}" class="btn btn-success btn-circle">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $rs->stock_out }}</td>
                                            <td>{{ $rs->remaining_stock }}</td>
                                        </tr>
                                        @endforeach
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@include('partials.foot')
@include('partials.footer')