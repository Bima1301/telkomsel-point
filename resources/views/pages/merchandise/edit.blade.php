@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Merchandise</h1>

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add New Merchan</h6>
    </div>
    <div class="card-body">
        <form action="/merchandise/{{ $merch->id }}" method="post" enctype="multipart/form-data">
            @method('put')
        @csrf
        <div class="form-group">
            <label for="Merch Name">Merch Name <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('merch_name') is-invalid @enderror" id="merch_name" name="merch_name" value="{{ old('merch_name', $merch->merch_name) }}">
        </div>
        <div class="form-group">
            <label for="Keyword">Keyword <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" value="{{ old('keyword', $merch->keyword) }}">
        </div>
        <div class="form-group">
            <label for="Verification Keyword">Verification Keyword </label>
            <input type="text" class="form-control @error('verification_keyword') is-invalid @enderror" id="verification_keyword" name="verification_keyword" value="{{ old('verification_keyword', $merch->verification_keyword) }}">
        </div>
        <div class="form-group">
            <label for="Minimal Point">Minimal Point <span style="color: red">*</span></label>
            <input type="number" class="form-control @error('minimal_point') is-invalid @enderror" id="minimal_point" name="minimal_point" value="{{ old('minimal_point', $merch->minimal_point) }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label w-100">Input Image <span style="color: red">*</span></label>
            @if ($merch->image)
            <img src="{{ asset('storage/'.$merch->image) }}" class="img-preview mb-3" style=" width: 140px;object-fit: cover;">
            @else
            <img class="img-preview mb-3" style=" width: 140px;object-fit: cover; display: none">
            @endif
            <input type="hidden" name="oldImage" id="" value="{{ $merch->image }}">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                name="image" onchange="previewImage()">
            @error('image')
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
<script>
    function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')
            imgPreview.style.display = 'block';
            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
</script>
@include('partials.footer')
