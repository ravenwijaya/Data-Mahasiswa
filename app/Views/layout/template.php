<html>

<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>

    <nav class="navbar navbar-dark bg-dark" style=" margin-bottom: -25px;">
        <a class="navbar-brand" href="#" style="font-size:30">DATA MAHASISWA</a>
        <a style="position:absolute;top:20; right:50;" class="btn btn-success" my-2 my-sm-0" href='add.php' class="btn btn-warning" role="button">Tambah Data</a>
    </nav>
    <br><br>
    <div style="width:fit-content">

        <?= $this->renderSection('content'); ?>

    </div>
    <footer class="bg-dark text-white" style="position: fixed; bottom: 0; 
            width: 100%; ">
        <div class="container">
            <div class="row text-center">
                <div class="col pt-3">
                    <p>Copyright© Raven & Jessi</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });

        var hapus = (nim) => Swal.fire({
            title: 'Apakah anda yakin',
            text: "Menghapus Mahasiswa NIM " + nim + " dari database?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!!'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Mahasiswa Berhasil Dihapus',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        location.href = "delete.php?nim=" + nim;
                    }
                })

            }
        });

        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script> -->
</body>


</html>