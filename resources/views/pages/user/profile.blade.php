@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 font-weight-bold">Users Setting</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Profile Information</h6>
                        </div>
                        <div class="card-body">
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form  method="post" action="{{ route('profile.update') }}">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input class="form-control form-control-user" id="email" type="email"
                                        name="email" placeholder="Enter Email Address..." value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <p style="color: red;font-size: 14px;margin-top: 5px">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2 text-red" /> --}}
                                </div>
                                <button type="submit" class="btn btn-danger">Add</button>
                            </form>
                        </div>
                    </div>

@include('partials.foot')
@include('partials.footer')