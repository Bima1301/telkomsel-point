@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Store</h1>

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add New Stock Data</h6>
    </div>
    <div class="card-body">
        <form action="{{url('realstock/update')}}/{{$realtime_status->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="Stock In">Stock In <span style="color: red">*</span></label>
                <input type="text" class="form-control @error('stock_in') is-invalid @enderror" id="stock_in"
                    name="stock_in" value="{{ old('stock_in', $realtime_status->stock_in) }}">
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
