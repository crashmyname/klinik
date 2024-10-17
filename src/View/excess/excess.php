<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <h4></h4>
    <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
    <h1 class="h3 mt-0 mb-0 text-gray-800">Data Permintaan Obat Lebih</h1>
    <p class="mb-0">Berikut adalah halaman Permintaan</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6>
            <button id="showModalButton" class="btn btn-outline-info block">Info</button>
            <div class="modal fade" id="karyawanModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informasi Karyawan</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Tempatkan informasi karyawan yang dipilih di sini -->
                            <div id="selectedKaryawanInfo"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="btn-delete" title="delete pemakaian" class="btn icon btn-outline-danger"><i
                    class="bi bi-trash"></i> Hapus</button>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Karyawan</th>
                                <th>Section</th>
                                <th>Keluhan</th>
                                <th>Jenis Obat</th>
                                <th>Jumlah</th>
                                <th>Tanggal Permintaan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="">
            <div class="container-fluid fixed-bottom">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Copyright &copy; 2023-2024</p>
                    </div>
                    <div class="float-end">
                        <p><a target="_blank" href="http://10.203.68.47:90/iseportal/">PT.Indonesia Stanley
                                Electric</a>. Clinic System</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
                    var prefix = "<?= base_url() ?>";
                    var dataTable = $('#datatables').DataTable({
                        processing: true,
                        serverSide: true,
                        responsive: true,
                        select: true,
                        ajax: prefix + '/pemakaian-lebih',
                        columns: [{
                                data: 'id_offer',
                                name: 'id_offer',
                                render: function(data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                },
                            },
                            {
                                data: 'nik',
                                name: 'nik'
                            },
                            {
                                data: 'nama',
                                name: 'nama'
                            },
                            {
                                data: 'kode_section',
                                name: 'kode_section'
                            },
                            {
                                data: 'keluhan',
                                name: 'keluhan'
                            },
                            {
                                data: 'nama_obat',
                                name: 'nama_obat',
                                searchable: true
                            },
                            {
                                data: 'jumlah',
                                name: 'jumlah'
                            },
                            {
                                data: 'tgl_pemakaian',
                                name: 'tgl_pemakaian'
                            },
                        ],
                        lengthMenu: [10, 25, 50, 100, <?= $count ?>],
                        dom: 'Blfrtip',
                        // select: true,
                        buttons: [{
                                extend: 'copy',
                                text: 'COPY',
                                exportOptions: {
                                    columns: ':visible',
                                    columnDefs: [{
                                        targets: -1,
                                        visible: false
                                    }]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                exportOptions: {
                                    columns: ':visible',
                                    columnDefs: [{
                                        targets: -1,
                                        visible: false
                                    }]
                                }
                            },
                            {
                                extend: 'print',
                                text: 'CETAK',
                                exportOptions: {
                                    columns: ':visible',
                                    columnDefs: [{
                                        targets: -1,
                                        visible: false
                                    }]
                                }
                            },
                            {
                                extend: 'csv',
                                text: 'CSV',
                                exportOptions: {
                                    columns: ':visible',
                                    columnDefs: [{
                                        targets: -1,
                                        visible: false
                                    }]
                                }
                            },
                            {
                                extend: 'excel',
                                text: 'EXCEL',
                                exportOptions: {
                                    columns: ':visible',
                                    columnDefs: [{
                                        targets: -1,
                                        visible: false
                                    }]
                                }
                            },
                            {
                                extend: 'colvis',
                                text: 'COLUMN VISIBLE',
                                exportOptions: {
                                    columns: ':visible',
                                    columnDefs: [{
                                        targets: -1,
                                        visible: false
                                    }]
                                }
                            }
                        ]
                    });
                    $('#showModalButton').on('click', function() {
                        var selectedData = dataTable.rows({
                            selected: true
                        }).data();
                        var modalContent = $('#selectedKaryawanInfo');

                        modalContent.empty(); // Kosongkan konten modal sebelum menambahkan informasi baru

                        if (selectedData.length > 0) {
                            // Jika ada data yang dipilih, tampilkan informasi dalam modal
                            // var info = '<ul>';
                            // selectedData.each(function (data) {
                            //     info += '<li>' + data.nik + ' - ' + data.nama + ' - ' + data.kode_section + ' - ' + data.nama_obat + ' - ' + data.jumlah + '</li>';
                            // });
                            // info += '</ul>';
                            var info = '<table>';
                            selectedData.each(function(data) {
                                const createdAt = new Date(data
                                    .created_at); // Mengonversi string ke objek Date
                                const formattedCreatedAt = createdAt.toLocaleString('en-US', {
                                    timeZone: 'Asia/Jakarta',
                                    year: 'numeric',
                                    month: '2-digit',
                                    day: '2-digit',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    second: '2-digit',
                                });
                                info += '<tr>' + '<td width="35%">' + 'NIK' + '</td>' + '<td width="10%">' +
                                    ':' + '</td>' + '<td class="form-control">' + data.nik + '</td>' +
                                    '</tr>' + '<tr>' + '<td>' + 'Nama' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.nama + '</td>' + '</tr>' + '<tr>' +
                                    '<td>' + 'Section' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.kode_section + '</td>' + '</tr>' +
                                    '<tr>' + '<td>' + 'Nama Obat' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.nama_obat + '</td>' + '</tr>' +
                                    '<tr>' + '<td>' + 'Jumlah' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.jumlah + '</td>' + '</tr>' + '<tr>' +
                                    '<td>' + 'Tanggal' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.tgl_pemakaian + '</td>' + '</tr>' +
                                    '<tr>' + '<td>' + 'Created' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.created_by + '</td>' + '</tr>' +
                                    '<tr>' + '<td>' + 'Updated' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + data.modify_by + '</td>' + '</tr>' +
                                    '<tr>' + '<td>' + 'Created at' + '</td>' + '<td>' + ':' + '</td>' +
                                    '<td class="form-control">' + formattedCreatedAt + '</td>' + '</tr>';
                            });
                            info += '</table>';
                            modalContent.html(info);
                        } else {
                            // Jika tidak ada data yang dipilih, tampilkan pesan kosong
                            modalContent.html('Tidak ada data yang dipilih.');
                        }

                        $('#karyawanModal').modal('show'); // Tampilkan modal
                    });
                    $('#btn-delete').on('click', function(e) {
                        e.preventDefault();
                        var selectedData = dataTable.rows({
                            selected: true
                        }).data();
                        Swal.fire({
                            title: 'Add',
                            icon: 'warning',
                            text: 'Apakah yakin ingin menghapus data?',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Hapus!!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                selectedData.each(function(data) {
                                        var iD = data.id_offer;
                                        // var encID = btoa(iD);
                                        $.ajax({
                                            type: 'POST',
                                            url: "<?= base_url() ?>/encrypt-id",
                                            data: {
                                                id: iD
                                            }, 
                                            dataType: 'json',
                                            success: function(response) {
                                                if (response.status == 200) {
                                                    var encID = response
                                                    .encID;
                                                    var url =
                                                        "<?= base_url() ?>/dover-obat?id=" +
                                                        encID;
                                                    $.ajax({
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        url: url,
                                                        processData: false,
                                                        contentType: false,
                                                        success: function(
                                                        response) {
                                                            if (response
                                                                .status == 200
                                                                ) {
                                                                Swal.fire({
                                                                    title: 'Success',
                                                                    icon: 'success',
                                                                    text: 'Pemakaian berhasil dihapus',
                                                                });
                                                                dataTable.ajax
                                                                    .reload();
                                                            } else {
                                                                Swal.fire({
                                                                    title: 'Error',
                                                                    icon: 'error',
                                                                    text: 'Gagal menghapus pemakaian',
                                                                });
                                                            }
                                                        }
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        title: 'Error',
                                                        icon: 'error',
                                                        text: 'Gagal mengenkripsi ID',
                                                    });
                                                }
                                            }
                                        });
                                    })
                                }
                            })
                        })
                    });

                    $("#nik").change(function() {
                        var nik = $("#nik").val();
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "<?= base_url() ?>/emp",
                            data: {
                                nik: nik,
                            },
                            success: function(data) {
                                var options = '';
                                data.forEach(function(m) {
                                    options += "<option value='" + m.nama + "'>" + m.nama +
                                        "</option>";
                                });
                                $("#nama").html(options);
                            }
                        });
                    });

                    $("#nik").change(function() {
                        var sect = $("#nik").val();
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "<?= base_url() ?>/sect",
                            data: {
                                nik: sect,
                            },
                            success: function(data) {
                                var options = '';
                                data.forEach(function(m) {
                                    options += "<option value='" + m.kode_section + "'>" + m
                                        .kode_section +
                                        "</option>";
                                });
                                $("#section").html(options);
                            }
                        });
                    });
    </script>
