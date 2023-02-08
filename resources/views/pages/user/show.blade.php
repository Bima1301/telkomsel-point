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
                    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Users Setting</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">User's Data Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Edited At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->role }}</td>
                                            <td class="text-center">{{ $user->created_at }}</td>
                                            <td class="text-center">{{ $user->updated_at }}</td>
                                            <td class="d-flex justify-content-center">
                                                <div>
                                                    <a class="btn-sm btn-warning btn-rectangle" data-toggle="modal"
                                                        data-target="#myModal{{ $user->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal{{ $user->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="/data-of-user/update/{{ $user->id }}" method="post">
                                                            <div class="modal-header  bg-gray-700">
                                                                    @csrf
                                                                <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit User Role</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true" class="text-white">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <label for="">Change Role For : <span class="text-danger">{{ $user->name }}</span></label>
                                                                <select class="form-control" name="role" id="role">
                                                                    <option value="basicUser">Basic User</option>
                                                                    <option value="smallUser">Small User</option>
                                                                    <option value="middleUser">Middle User</option>
                                                                  </select>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Save Changes</button>
                                                              </div>
                                                            </div>
                                                        </form>
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