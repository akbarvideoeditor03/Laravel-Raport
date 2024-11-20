@extends('layouts.ahmad_akbar')
@section('ahmad_akbar')
    <div class="card">
        <div class="card-header efekblur">
            <div class="row">
                <div class="col-xl-3">
                    <h4><b>{{ $judul }}</b></h4>
                </div>
                <div class="col-xl-2">
                    <a href="/walasalamat/create" style="width: 100%" class="btn btn-primary">Tambah Data Alamat</a>
                </div>
                <div class="col-xl-7">
                    <input class="form-control" style="width: 100%" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari...">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover" id="myTable">
                <thead>
                    <tr>
                        <td>NIP Wali Kelas</td>
                        <td>Nama Wali Kelas</td>
                        <td>Desa / Kelurahan</td>
                        <td>Kecamatan</td>
                        <td>Kabupaten / Kota</td>
                        <td>Provinsi</td>
                        <td>Ubah</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alamat as $a)
                        <tr>
                            <td>{{ $a->nip_walikelas }}</td>
                            <td>{{ $a->walas->nama_walikelas }}</td>
                            <td>{{ $a->kelurahan_desa }}</td>
                            <td>{{ $a->kecamatan }}</td>
                            <td>{{ $a->kabupaten_kota }}</td>
                            <td>{{ $a->provinsi }}</td>
                            <td style="width: 15%">
                                <center>
                                    <a href="{{ url('walasalamat/'. $a->id_alamatwalas.'/edit', []) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('walasalamat/delete/'.$a->id_alamatwalas, []) }}" class="btn btn-danger" onclick="return confirm('Apakah ingin dihapus?')">X</a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function searchTable() {
              // Get the search input value
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable"); // Assuming your table has an ID of "myTable"
                tr = table.getElementsByTagName("tr");
            
              // Loop through table rows and filter
                for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Filter by the second column (Nama Siswa)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>
        <script>
            window.onload = searchTable; // Call the search function on page load
        </script>
    </div>
@endsection