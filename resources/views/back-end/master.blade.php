<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/back-end/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/back-end/')}}/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="{{ asset('assets/DataTables/css/jquery.dataTables.min.css') }}">
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.min.css') }}">

  <!-- Bootstrap selector CSS -->
  <link rel="stylesheet" href="{{ asset('assets/bootstrap-select/css/bootstrap-select.min.css') }}">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->

   @include('back-end.includes.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">

    <!-- Topbar/Header -->
    @include('back-end.includes.header')
    <!-- End of Topbar/Header -->

    <!-- Begin Page Content -->
    @yield('mainContent')
    <!-- End Page Content -->

      </div>
      <!-- End of Main Content -->

    <!-- Footer -->
    @include('back-end.includes.footer')
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('back-end.includes.logout-modal')
 <!-- End Logout Modal-->
 

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/back-end/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('assets/back-end/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/back-end/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level chart plugins -->
  <script src="{{ asset('assets/back-end/')}}/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level chart scripts -->
  <script src="{{ asset('assets/back-end/')}}/js/demo/chart-area-demo.js"></script>
  <script src="{{ asset('assets/back-end/')}}/js/demo/chart-pie-demo.js"></script>

  <!--- Datatables JSS ---->
  <script src="{{ asset('assets/DataTables/js/jquery.dataTables.min.js') }}"></script>
  <!--- Toastr plugin --->
  <script src="{{ asset('assets/toastr/build/toastr.min.js') }}"></script>
  <!--- sweetalert2  js --->
  <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
  <!--- Bootstrap selector js --->
  <script src="{{ asset('assets/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
  <!--- ckeditor5  js --->
  <script src="{{ asset('assets/ckeditor5-classic/ckeditor.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/back-end/')}}/js/main.js"></script>

  {!! Toastr::message() !!}
  
  <script>
      @if($errors->any())
          @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                 });
          @endforeach
      @endif
  </script>


<!-- sweet-alert script -->

  <script type="text/javascript">
    function deleteData(id) {
      const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        event.preventDefault();
        document.getElementById('delete-form-'+id).submit();
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your data is safe :)',
          'error'
        )
      }
    })
    }
  </script>


<!--- ckeditor5  script --->
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
 

</body>

</html>
