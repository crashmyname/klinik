<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    
    <h4>hariindo</h4>
    <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data User Management</h1>
            <p class="mb-0">Berikut adalah halaman User Management</p>
            <!-- @if(session()->has('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('berhasil')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('update'))  
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('delete')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif -->
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
                                    <h5 class="modal-title">Input Data User</h5>
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
                                                    <h4 class="card-title">Form User Management</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data" action="" id="formtambahuser">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Nama User</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="nama_user"
                                                                            placeholder="Masukan Nama ">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Username</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="username"
                                                                            placeholder="Masukan Username">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Password</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="password" id="first-name"
                                                                            class="form-control" name="password"
                                                                            placeholder="Masukan Password">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Level</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="level"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="Administrator">Administrator</option>
                                                                            <option value="User">User</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Foto User</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="foto">
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="simpan" id="btn-tambah"
                                                                            >Submit</button>
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
                </div>
                <!-- BorderLess Modal Modal -->
            <div class="modal fade text-left modal-lg centered" id="modalEditPemakaian" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Data User</h5>
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
                                            <h4 class="card-title">Form User</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form form-horizontal" method="post"
                                                    enctype="multipart/form-data" action=""
                                                    id="formEditUser">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Nama User</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="unama_user"
                                                                    class="form-control" name="nama_user"
                                                                    placeholder="Masukan Nama">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Username</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" id="uusername"
                                                                    class="form-control" name="username"
                                                                    placeholder="Masukan Nama username">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Password</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="password" id="upassword"
                                                                    class="form-control" name="password"
                                                                    placeholder="Masukan password">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Level</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <select type="text" name="level" id="ulevel"
                                                                    class="form-control" required>
                                                                    <option value="" disabled selected hidden>-- Pilih --</option>
                                                                    <option value="Administrator">Administrator</option>
                                                                    <option value="User">User</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Foto</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="file"
                                                                    id="formFile" name="foto">
                                                                <img src="<?= asset('user')?>/" width="25%" alt="" id="upfoto">
                                                                <input type="hidden" name="oldfoto" id="">
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
                        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th width="200px">Foto</th>
                                    <th width="150px">ACTION</th>
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
                            <p><a target="_blank" href="http://10.203.68.47:90/iseportal/">PT.Indonesia Stanley Electric</a>. Clinic System</p>
                        </div>
                    </div>
                </div>
            </footer>
</div>
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
            function fillModal(id, nama_user, username, level, foto) {
            document.getElementById('unama_user').value = nama_user;
            document.getElementById('uusername').value = username;
            document.getElementById('ulevel').value = level;
            var formAction = "<?= base_url() ?>/udata-user?id=" + id;
            var newImageSrc = '<?= asset("user") ?>/'+foto;
            var imageElement = document.getElementById('upfoto');
            imageElement.src = newImageSrc;
            document.getElementById('formEditUser').action = formAction;
        }
    var dataTable;
        $(document).ready(function() {
            var prefix = "<?= base_url()?>";
            dataTable = $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                // select: true,
                ajax: prefix+'/data-user',
                columns: [{
                        data: 'id_user',
                        name: 'id_user',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'nama_user',
                        name: 'nama_user'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        render:function(data,type,row){
                            return `<img src="<?= asset('user/')?>${data}" width="25%">`;
                        }
                    },
                    {
                        data: 'id_user',
                        name: 'id_user',
                        render:function(data, type, row){
                            var src = "<?= base_url() ?>";
                            var foto = row.foto;
                            var nama_user = row.nama_user;
                            var username = row.username;
                            console.log(username);
                            var level = row.level;
                            var encID = btoa(data);
                            return `
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditPemakaian" 
                                onclick="fillModal('${data}','${nama_user}', '${username}', '${level}', '${foto}')"
                                id="modalupdatepemakaian" title="Ubah Data"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></button>
                            <a href="#" onclick="confirmDelete('${src}/ddata-user?id=${encID}')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        `;
                        }
                    },
                ],
                lengthMenu: [10, 25, 50, 100],
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
            $('#btn-tambah').on('click', function(e) {
                e.preventDefault();
                var formData = new FormData($('#formtambahuser')[0]);
                Swal.fire({
                    title: 'Add',
                    icon: 'warning',
                    text: 'Apakah yakin ingin tambah data?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Tambah!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url() ?>/data-user',
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
                                        text: 'User berhasil ditambah',
                                    });
                                    dataTable.ajax.reload();
                                    $('#formtambahuser')[0].reset();
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        icon: 'error',
                                        text: 'Gagal membuat User',
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
            </script>