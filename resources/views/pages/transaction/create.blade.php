@include('partials.head')
@include('partials.sidebar')
@include('partials.navbar')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add Transaction for <span
        class="text-danger font-weight-bold">{{ $store_name->store_name }}</span></h1>
<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add New Transaction</h6>
    </div>
    <div class="card-body">
        <form action="/transaction/store-id/{{ $store_name->id }}/store" method="post">
            @csrf
            <div class="form-group">
                <label for="Date">Date <span style="color: red">*</span></label>
                <div class="new-form-group">
                    <span> <i class="fas fa-calendar"></i></span>
                    <input type="date" class="new-form-field @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date') }}">
                </div>
                @error('date')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="MSISDN">MSISDN <span style="color: red">*</span></label>
                <div class="new-form-group">
                    <span> <i class="fas fa-code"></i></span>
                    <input type="number" class="new-form-field  @error('msisdn') is-invalid @enderror" id="msisdn"
                        name="msisdn" value="{{ old('msisdn') }}">
                </div>
                @error('msisdn')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="Customer Name">Customer Name <span style="color: red">*</span></label>
                <div class="new-form-group">
                    <span> <i class="fas fa-users"></i></span>
                <input type="text" class="new-form-field @error('customer') is-invalid @enderror" id="customer"
                    name="customer" value="{{ old('customer') }}">
                </div>
                @error('customer')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="Merchandise">Merchandise <span style="color: red">*</span></label>
                <select onChange="this.selectedIndex;"
                    class="form-control form-control-md @error('id_merchandise') is-invalid @enderror"
                    name="id_merchandise" id="id_merchandise">
                    @foreach ($store_stock as $s_stock)
                        @if (old('id_merchandise') == $s_stock->id_merchandise)
                            <option value={{ $s_stock->id_merchandise }} selected>{{ $s_stock->merch_name }} </option>
                        @else
                            <option value={{ $s_stock->id_merchandise }}>{{ $s_stock->merch_name }} ( {{ date('j F, Y', strtotime($s_stock->date)) }}) </option>
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
                <label for="CS Name">CS Name <span style="color: red">*</span></label>
                <div class="new-form-group">
                    <span> <i class="fas fa-user"></i></span>
                <input type="text" class="new-form-field @error('cs_name') is-invalid @enderror" id="cs_name"
                    name="cs_name" value="{{ old('cs_name') }}">
                </div>
                @error('cs_name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <button onclick="reviewFunction()" type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#exampleModalCenter">
                Next
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class=" d-flex flex-row justify-content-between align-content-center py-3"
                            style="border-bottom: 1px solid #85879650">
                            <p></p>
                            <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLongTitle">Preview</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="margin-right: 15px">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <small class="text-center mt-3 px-4">Double check your transaction data below, after submitted
                            this form you <span class="text-danger"> can't make a change!</span></small>
                        <div class="modal-body">
                            <p>Customer Service : <span class="text-danger font-weight-bold" id="cs_review"></span> </p>
                            <div style="height: 35vh; overflow-y: scroll; padding-right: 10px">
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <div class="new-form-group">
                                        <span style="background-color: rgba(255, 0, 0, 0.547) !important; color: white">
                                            <i class="fas fa-calendar"></i></span>
                                        <input type="text" class="new-form-field" id="date_review" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="MSISDM">MSISDM</label>
                                    <div class="new-form-group">
                                        <span style="background-color: rgba(255, 0, 0, 0.547) !important; color: white">
                                            <i class="fas fa-code"></i></span>
                                        <input type="text" class="new-form-field" id="msisdn_review" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Customer">Customer</label>
                                    <div class="new-form-group">
                                        <span
                                            style="background-color: rgba(255, 0, 0, 0.547) !important; color: white">
                                            <i class="fas fa-user"></i></span>
                                        <input type="text" class="new-form-field" id="customer_review" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Merchandise">Merchandise</label>
                                    <div class="new-form-group">
                                        <span
                                            style="background-color: rgba(255, 0, 0, 0.547) !important; color: white">
                                            <i class="fas fa-gift"></i></span>
                                        <input type="text" class="new-form-field" id="id_merchandise_review"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Submit Data</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>



@include('partials.foot')
@include('partials.footer')
<script>
    function reviewFunction() {

        var date_review = document.getElementById("date").value
        document.getElementById("date_review").value = formatDate(date_review);

        var msisdn_review = document.getElementById("msisdn").value
        document.getElementById("msisdn_review").value = msisdn_review;

        var customer_review = document.getElementById("customer").value
        document.getElementById("customer_review").value = customer_review;

        var id_merchandise_review = document.getElementById("id_merchandise")
        var text = id_merchandise_review.options[id_merchandise_review.selectedIndex].text;
        document.getElementById("id_merchandise_review").value = text;

        var cs_review = document.getElementById("cs").value
        document.getElementById("cs_review").innerHTML = cs_review;

    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear(),
            months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [day, months[month - 1], year].join(' ');
    }
</script>
