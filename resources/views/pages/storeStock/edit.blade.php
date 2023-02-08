@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Store Stock</h1>

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add New Store</h6>
    </div>
    <div class="card-body">
        <form action="/store/store-stock/update/{{ $id_store_stock }}/{{ $id_store }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Date">Date <span style="color: red">*</span></label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                    name="date" value="{{ old('date', $store_stock->date) }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Merchandise">Merchandise <span style="color: red">*</span></label>
                <select class="form-control form-control-md" name="id_merchandise" id="id_merchandise">
                    @foreach ($merchandise as $merch)
                        @if ($merch->id == $store_stock->id_merchandise)
                            <option value={{ $merch->id }} selected>{{ $merch->merch_name }}</option>
                        @else
                            <option value={{ $merch->id }}>{{ $merch->merch_name }}</option>
                        @endif
                    @endforeach
                </select> @error('id_merchandise')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="PIC">PIC <span style="color: red">*</span></label>
                <input type="text" class="form-control @error('PIC') is-invalid @enderror" id="PIC"
                    name="PIC" value="{{ old('PIC', $store_stock->PIC) }}">
                @error('PIC')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Stock In">Stock In <span style="color: red">*</span></label>
                <input type="number" class="form-control @error('stock_in') is-invalid @enderror" id="stock_in"
                    name="stock_in" value="{{ old('stock_in', $store_stock->stock_in) }}">
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
