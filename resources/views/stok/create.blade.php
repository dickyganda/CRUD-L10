@extends('layouts.main')

@section('title')
Insert Stok
@endsection

@section('content')
<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div id="panel-3" class="panel">
                <div class="panel-hdr">
                    <h2>Data Stok</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="#" id="tambahstok">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <select id="IdBarang" name="IdBarang" style="width: 100%"
                                                class="form-control form-control-sm select2">
                                                <option disabled selected>Select Kode Barang</option>
                                                @foreach ($barang as $item)
                                                <option value="{{ $item->IdBarang }}">
                                                    {{ $item->KodeBarang }}
                                                </option>
                                                @endforeach
                                            </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="JumlahStok" required="required" class="form-control form-control-sm" placeholder="Stok">
                            </div>

                            <br>
                            <button class="btn btn-success btn-xs"><i class="fal fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</main>

@endsection

@section('js-addon')
<script>
    $("#tambahstok").submit(function (event) {
        event.preventDefault()
        var formdata = new FormData(this);
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/stok/store',
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Swal.fire({
                    title: "Success!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(() => {
                    location.replace("/stok/index");
                });
            }
        });
    });
</script>
@endsection