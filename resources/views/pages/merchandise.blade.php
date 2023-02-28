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
<h1 class="h3 mb-2 text-danger font-weight-bold">Merchandise</h1>
<p class="mb-4">Merchandise that you have created will be displayed in the table below</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Merchandise Data Table</h6>
        @can('superUser')
            <a href="/merchandise/create" class="text-gray-900 text-decoration-none">
                <i class="fas fa-plus p-1" style="background-color: red; color: white; border-radius: 5px"></i>
                Add New Merchandise
            </a>
        @endcan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Merch Name</th>
                        <th>Photo</th>
                        <th>Keyword</th>
                        <th>Verification Keyword</th>
                        <th>Minimal Point</th>
                        @can('superUser')
                            <th>Setting</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchans as $key => $merchan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $merchan->merch_name }}</td>
                            <td data-toggle="modal" data-target="#exampleModalCenter{{ $key }}" style="cursor: pointer">
                                <img style=" width: 80px;object-fit: cover;" class="object-cover mb-3"
                                    src="{{ asset('storage/' . $merchan->image) }}" alt="">

                                <!-- Modal Image Preview-->
                                <div class="modal fade" id="exampleModalCenter{{ $key }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLongTitle">{{ $merchan->merch_name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center">
                                                <img src="{{ asset('storage/' . $merchan->image) }}" class="img-fluid col-md-10" alt="">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $merchan->keyword }}</td>
                            <td>{{ $merchan->verification_keyword }}</td>
                            <td>{{ $merchan->minimal_point }}</td>
                            @can('superUser')
                                <td class="d-flex flex-row justify-content-around">
                                    <div>
                                        <a href="/merchandise/{{ $merchan->id }}/edit"
                                            class="btn-sm btn-success btn-rectangle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>

                                    {{-- <div>
                                        <a class="btn-sm btn-danger btn-rectangle" data-toggle="modal"
                                            data-target="#myModal{{ $merchan->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $merchan->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body d-flex flex-column align-items-center">
                                                    <img style="width: 200px; object-fit: contain" src="/img/trash.png"
                                                        alt="">
                                                    <p class="mt-3 text-dark">Are you sure want to remove <span
                                                            class="text-danger">{{ $merchan->merch_name }}</span>
                                                        merchandise?</p>
                                                    <div class="mt-4 d-flex justify-content-around w-100">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="/merchandise/{{ $merchan->id }}" method="post"
                                                            class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn border-danger">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </td>
                            @endcan
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('partials.foot')
@include('partials.footer')
