<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <h4>
        Hello
    </h4>
    <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
    <h1 class="h3 mt-0 mb-0 text-gray-800">Data Obat</h1>
    <p class="mb-0">Berikut adalah halaman Obat</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6>
            <button type="button" class="btn btn-outline-success block" data-bs-toggle="modal"
                data-bs-target="#border-less">
                Tambah Data
            </button>
            <!-- BorderLess Modal Modal -->
            <div class="modal fade text-left modal-lg centered" id="border-less" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Data Obat</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row match-height">
                                <div class="col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Form Obat</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form form-horizontal" method="post"
                                                    enctype="multipart/form-data" action="" id="formobat">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Nama Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="nama_obat"
                                                                    class="form-control" name="nama_obat"
                                                                    placeholder="Masukan Nama Obat">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Keluhan</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="keluhan"
                                                                    class="form-control" name="keluhan"
                                                                    placeholder="Masukan Nama Keluhan">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Dosis</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="dosis"
                                                                    class="form-control" name="dosis"
                                                                    placeholder="Masukan Nama dosis">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Jenis</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="jenis" id="jenis"
                                                                    class="form-control" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="Kapsul">Kapsul</option>
                                                                    <option value="Tablet">Tablet</option>
                                                                    <option value="Pcs">Pcs</option>
                                                                    <option value="Box">Box</option>
                                                                    <option value="Fls">Fls</option>
                                                                    <option value="Kolf">Kolf</option>
                                                                    <option value="Botol">Botol</option>
                                                                    <option value="Tube">Tube</option>
                                                                    <option value="Roll">Roll</option>
                                                                    <option value="Pack">Pack</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Factory</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="factory" id="factory"
                                                                    class="form-control" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1">Factory 1</option>
                                                                    <option value="2">Factory 2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Foto Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="file"
                                                                    id="formFile" name="foto">
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1" id="tambahobat"
                                                                    name="simpan">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                data-bs-target="#border-less5">
                Tambah Stock Obat
            </button>
            <!-- BorderLess Modal Modal -->
            <div class="modal fade text-left modal-lg centered" id="border-less5" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Data Stock</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row match-height">
                                <div class="col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Form Stock Obat</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form form-horizontal" method="post"
                                                    enctype="multipart/form-data" action="<?= base_url() ?>/sobat">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Nama Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="id_obat"
                                                                    class="form-control" required>
                                                                    <option value="" disabled selected hidden>
                                                                        Pilih Obat </option>
                                                                    <?php foreach($listobat as $obat): ?>
                                                                    <option value="<?= $obat['id_obat'] ?>">
                                                                        <?= $obat['nama_obat'] ?> (FACT
                                                                        <?= $obat['factory'] ?>)</option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Stock Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="number" id="first-name"
                                                                    class="form-control" name="stock"
                                                                    placeholder="Masukan Stock Obat">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Harga</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="number" id="first-name"
                                                                    class="form-control" name="harga"
                                                                    placeholder="Masukan Harga">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Factory</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="factory" id="factory"
                                                                    class="form-control" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1">Factory 1</option>
                                                                    <option value="2">Factory 2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Tanggal Masuk Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="date" id="first-name"
                                                                    class="form-control" name="tgl_in_obat">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Tanggal Kadaluwarsa Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="date" id="first-name"
                                                                    class="form-control" name="tgl_kadaluwarsa">
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1"
                                                                    name="simpanstock"
                                                                    onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BorderLess Modal Modal -->
            <div class="modal fade text-left modal-lg centered" id="modalEditPemakaian" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Data Pemakaian</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row match-height">
                                <div class="col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Form Obat</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form form-horizontal" method="post"
                                                    enctype="multipart/form-data" action=""
                                                    id="formEditPemakaian">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Nama Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="unama_obat"
                                                                    class="form-control" name="nama_obat"
                                                                    placeholder="Masukan Nama Obat">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Keluhan</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="ukeluhan"
                                                                    class="form-control" name="keluhan"
                                                                    placeholder="Masukan Nama Keluhan">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Dosis</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="udosis"
                                                                    class="form-control" name="dosis"
                                                                    placeholder="Masukan Nama dosis">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Jenis</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="jenis" id="jenis"
                                                                    class="form-control" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="Kapsul">Kapsul</option>
                                                                    <option value="Tablet">Tablet</option>
                                                                    <option value="Pcs">Pcs</option>
                                                                    <option value="Box">Box</option>
                                                                    <option value="Fls">Fls</option>
                                                                    <option value="Kolf">Kolf</option>
                                                                    <option value="Botol">Botol</option>
                                                                    <option value="Tube">Tube</option>
                                                                    <option value="Roll">Roll</option>
                                                                    <option value="Pack">Pack</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Factory</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="factory" id="factory"
                                                                    class="form-control" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1">Factory 1</option>
                                                                    <option value="2">Factory 2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Foto Obat</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="file"
                                                                    id="formFile" name="foto">
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 mb-1" name="simpan"
                                                                    id="btn-update">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Keluhan</th>
                                <th>Stock</th>
                                <th>Jenis</th>
                                <th>Dosis</th>
                                <th>Factory</th>
                                <th>Gambar</th>
                                <th width="100px">ACTION</th>
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
                                Electric</a>.
                            Clinic System</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="<?= module('sweetalert2/dist/sweetalert2.all.min.js') ?>"></script>
    <script type="text/javascript">
        function confirmDelete(url) {
            // Menampilkan SweetAlert
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status === 200) {
                                Swal.fire({
                                    title: 'success',
                                    icon: 'success',
                                    text: 'Data berhasil dihapus',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                })
                                dataTable.ajax.reload();
                            } else {
                                Swal.fire({
                                    title: 'error',
                                    icon: 'Error',
                                    text: 'Data gagal dihapus',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                })
                            }
                        },
                        error: function(error) {
                            console.error(error);
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            });
                        }
                    })
                }
            });
        }
        var dataTable;
        $(document).ready(function() {
            var prefix = "<?= base_url() ?>";
            dataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: prefix + '/obat',
                columns: [{
                        data: 'id_obat',
                        name: 'id_obat',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'nama_obat',
                        name: 'nama_obat'
                    },
                    {
                        data: 'keluhan',
                        name: 'keluhan'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'dosis',
                        name: 'dosis'
                    },
                    {
                        data: 'factory',
                        name: 'factory'
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        render: function(data, type, row) {
                            return `<img src="<?= asset('/obat/') ?>${data}" alt="" width="100%">`;
                        }
                    },
                    {
                        data: 'id_obat',
                        name: 'action',
                        // orderable: false,
                        render: function(data, type, row) {
                            var src = "<?= base_url() ?>";
                            var unama_obat = row.nama_obat;
                            var ukeluhan = row.keluhan;
                            var udosis = row.dosis;
                            var ujenis = row.jenis;
                            var ufactory = row.factory;
                            var encID = btoa(data);
                            return `
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditPemakaian" 
                                onclick="fillModal('${data}','${unama_obat}', '${ukeluhan}', '${udosis}', '${ujenis}', '${ufactory}')"
                                id="modalupdatepemakaian" title="Ubah Data"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></button>
                            <a href="#" onclick="confirmDelete('${src}/dobat?id=${encID}')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        `;
                        },
                    },
                ],
                lengthMenu: [10, 25, 50, 100],
                dom: 'Blfrtip',
                // select: true,
                buttons: [{
                        extend: 'copy',
                        text: 'COPY',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'CETAK',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'EXCEL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'colvis',
                        text: 'COLUMN VISIBLE',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }
                ]
            });
            $('#tambahobat').on('click', function(e) {
                e.preventDefault();
                var formData = new FormData($('#formobat')[0]);
                Swal.fire({
                    title: 'Add',
                    icon: 'warning',
                    text: 'Apakah yakin ingin tambah data?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Tambah!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url() ?>/obat',
                            type: 'POST',
                            dataType: 'json',
                            processData: false, // Jangan memproses data
                            contentType: false,
                            data: formData,
                            success: function(response) {
                                if (response.status === 200) {
                                    Swal.fire({
                                        title: 'Success',
                                        icon: 'success',
                                        text: 'Obat berhasil ditambah',
                                    });
                                    dataTable.ajax.reload();
                                    $('#formobat')[0].reset();
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        icon: 'error',
                                        text: 'Gagal membuat obat',
                                    })
                                }
                            },
                            error: function(error) {
                                console.error(error);
                                Swal.fire({
                                    title: 'error',
                                    icon: 'error',
                                    text: 'Terjadi kesalahan saat memperbarui data',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                });
                            }
                        });
                    }
                });
            });
        });
        function fillModal(id, nama_obat, keluhan, dosis, jenis, factory) {
            document.getElementById('unama_obat').value = nama_obat;
            document.getElementById('ukeluhan').value = keluhan;
            document.getElementById('udosis').value = dosis;
            document.getElementById('jenis').value = jenis;
            document.getElementById('factory').value = factory;
            var formAction = "<?= base_url() ?>/uobat?id=" + id;
            document.getElementById('formEditPemakaian').action = formAction;
        };
        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            var url = $('#formEditPemakaian').attr('action');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Data ini akan dirubah!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah!!!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData($('#formEditPemakaian')[0]);
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data:formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'success',
                                    icon: 'success',
                                    text: 'Data berhasil di update',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                })
                                dataTable.ajax.reload();
                            } else {
                                Swal.fire({
                                    title: 'error',
                                    icon: 'error',
                                    text: 'Data gagal di update',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                })
                            }
                        },
                        error: function(error) {
                            console.error(error);
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Terjadi kesalahan saat update data',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            });
                        }
                    })
                }
            });
        });

    </script>
