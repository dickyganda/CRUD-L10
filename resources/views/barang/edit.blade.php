@extends('layouts.main')
{{-- @inject('carbon', 'Carbon\Carbon') --}}

@section('title')
Edit Barang
@endsection

@section('content')
<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div id="panel-3" class="panel">
                <div class="panel-hdr">
                    <h2>Data Barang</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        {{-- @foreach($barang as $item) --}}
                        <form id="editbarang" action="{{ route('barang.update', $barang->IdBarang) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control" name="NamaBarang" placeholder="Masukkan Nama Barang" value="{{ $barang->NamaBarang }}"></input>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                        {{-- @endforeach --}}
                        
                    </div>
                </div>
            </div>
        </div>

</main>

@endsection

@section('js-addon')
<script>
    $("#editbarang").submit(function(event) {
        event.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            type: 'POST'
            , dataType: 'json'
            , url: '/barang/update/{{ $barang->IdBarang }}'
            , data: formdata
            , contentType: false
            , cache: false
            , processData: false
            , success: function(data) {
                Swal.fire(
                    'Sukses!'
                    , data.reason
                    , 'success'
                ).then(() => {
                    location.replace("{{ route('barang.index') }}");
                });
            }
        });
    });
</script>
@endsection