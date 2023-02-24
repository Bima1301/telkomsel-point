@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')
@if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed ! </strong>{{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Store Stock</h1>

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 text-danger">Add New Store Stock For <span
                class="font-weight-bold">{{ $store_name[0]->store_name }}</span></h6>
    </div>
    <div class="card-body">
        <form action="/store/store-stock/store/{{ $id_store }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Date">Date <span style="color: red">*</span></label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                    name="date" value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Merchandise">Merchandise <span style="color: red">*</span></label>
                <select class="form-control form-control-md @error('id_merchandise') is-invalid @enderror" name="id_merchandise" id="id_merchandise">
                    @foreach ($merchandise as $merch)
                        @if (old('id_merchandise') == $merch->id)
                            <option value={{ $merch->id }} selected>{{ $merch->merch_name }}</option>
                        @else
                            <option value={{ $merch->id }}>{{ $merch->merch_name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('id_merchandise')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="PIC">PIC <span style="color: red">*</span></label>
                <input type="text" class="form-control @error('PIC') is-invalid @enderror" id="PIC"
                    name="PIC" value="{{ old('PIC') }}">
                @error('PIC')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Stock In">Stock In <span style="color: red">*</span></label>
                <input type="number" class="form-control @error('stock_in') is-invalid @enderror" id="stock_in"
                    name="stock_in" value="{{ old('stock_in') }}">
                @error('stock_in')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger">Add</button>
        </form>
    </div>
</div>

@include('partials.foot')
@include('partials.footer')
