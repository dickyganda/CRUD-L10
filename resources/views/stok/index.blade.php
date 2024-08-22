@extends('layouts.main')

@section('title')
Master Stok
@endsection

@section('content')
<main id="js-page-content" role="main" class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div id="panel-3" class="panel">
                <div class="panel-hdr">
                    <h2>Master Stok</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        
                        <a href="/stok/create" class="btn btn-success btn-xs" title="Tambah Data Baru"
                                            role="button"><i class="fal fa-plus"></i>Tambah</a>

                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach ($stok as $s )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $s->KodeBarang }}</td>
                                    <td>{{ $s->NamaBarang }}</td>
                                    <td>{{ $s->JumlahStok }}</td>
                                    <td><a href="/stok/edit/{{ $s->IdStok }}" class="btn btn-icon btn-warning btn-xs btn-icon rounded-circle">
                                        <i class="fal fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-xs btn-icon rounded-circle">
                                        <i class="fal fa-print"></i>
                                    </a>
                                    <button type="button" data-id="{{ $s->IdStok }}" class="delete-barang btn btn-danger btn-xs btn-icon rounded-circle"><i class="fal fa-times"></i></button>

                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

</main>
@endsection

@section('js-addon')
<script>
    $(".delete-barang").on("click", function(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                deleteBarang($(this).data('id'));
            }
        });
    })

    function deleteBarang(idBarang) {
        var formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('_token', '{{ csrf_token() }}')
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/barang/delete/' + idBarang,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    location.replace("/barang/index");
                });

            }
        });
    }
</script>
@endsection