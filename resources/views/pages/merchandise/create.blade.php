@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

<!-- Page Heading -->
<div class="d-flex flex-lg-row flex-column align-items-center justify-content-between">
    <div>
        <h1 class="h3 mb-2 text-danger font-weight-bold">Merchandise</h1>
        <p class="mb-4">Merchandise that you have created will be displayed in the table below</p>
    </div>
    <a href="/merchandise" class="btn btn-secondary btn-icon-split mb-3 btn-sm" style="height: fit-content">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back to Merchan List</span>
    </a>
</div>
<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add New Merchan</h6>
    </div>
    <div class="card-body">
        <form action="/merchandise" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Merch Name">Merch Name <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('merch_name') is-invalid @enderror" id="merch_name" name="merch_name">
         @error('merch_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
             @enderror
        </div>
        <div class="form-group">
            <label for="Keyword">Keyword <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword">
         @error('keyword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
             @enderror
        </div>
        <div class="form-group">
            <label for="Verification Keyword">Verification Keyword </label>
            <input type="text" class="form-control @error('verification_keyword') is-invalid @enderror" id="verification_keyword" name="verification_keyword">
         @error('verification_keyword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
             @enderror
        </div>
        <div class="form-group">
            <label for="Minimal Point">Minimal Point <span style="color: red">*</span></label>
            <input type="number" class="form-control @error('minimal_point') is-invalid @enderror" id="minimal_point" name="minimal_point">
         @error('minimal_point')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
             @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Input Image <span style="color: red">*</span></label>
            <img class="img-preview mb-3" style=" width: 140px;object-fit: cover; display: none">
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
