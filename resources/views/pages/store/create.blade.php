@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Store</h1>

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add New Store</h6>
    </div>
    <div class="card-body">
        <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Store Name">Store Name <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name">
            @error('store_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
             @enderror
        </div>
        <div class="form-group">
            <label for="address">Address <span style="color: red">*</span></label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
            @error('address')
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
