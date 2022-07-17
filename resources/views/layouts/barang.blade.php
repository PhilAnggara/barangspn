@extends('index')

@section('container')
    @if (session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show mt-3 mb-4" role="alert">
            {{ session('berhasil') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('update'))
        <div class="alert alert-success alert-dismissible fade show mt-3 mb-4" role="alert">
            {{ session('update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (auth()->user()->level == 'admin')
        {{--  <button type="button" class="btn btn-sm btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#inputBarang{{ $kategori->kat }}">
            <i class="fa-solid fa-keyboard"></i> Input Barang  --}}
        {{--  </button>  --}}
        <a class="btn btn-sm btn-primary mt-5" href="/inputBarang">
            <i class="fa-solid fa-keyboard"></i> Input Barang
        </a>
    @endif




    <table class="table table-striped mt-4">
        <thead class="table-head table-dark">
            <th scope="col">NO</th>
            <th scope="col">JENIS BARANG</th>
            <th scope="col">NAMA BARANG</th>
            <th scope="col">DESKRIPSI</th>
            <th scope="col">KATEGORI</th>
            <th scope="col">KONDISI</th>
            <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody class="table-body table-light">
            @foreach ($kats as $item)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $item->jenis_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->kategori->kat }}</td>
                    <td>{{ $item->kondisi_barang }}</td>

                    <td>
                        @if (auth()->user()->level == 'admin')
                            <button type="button" class="btn btn-sm btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#editBarang{{ $item->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{--  <a class="btn btn-sm btn-primary" href="/editBarang/{{ $item->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>  --}}

                            <button type="button" class="btn btn-sm btn-danger mt-3" data-bs-toggle="modal"
                                data-bs-target="#hapusBarang{{ $item->id }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        @endif

                        @if (auth()->user()->level == 'personil')
                            <button type="button" class="btn btn-sm btn-secondary mt-3" data-bs-toggle="modal"
                                data-bs-target="#pinjamBarang{{ $item->id }}">
                                <i class="fa-brands fa-artstation"></i>Pinjam
                            </button>
                        @endif
                    </td>


                </tr>
            @endforeach

        </tbody>
    </table>
    @include('modals.modals')
@endsection