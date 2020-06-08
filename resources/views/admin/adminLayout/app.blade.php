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
  <link href="{{asset('akun/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('akun/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text text-center">FreshShop</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboardAdmin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Lihat data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Admin</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kelola Admin:</h6>
              <a class="collapse-item" href="{{ url('/dataadmin') }}">List Admin</a>
              <a class="collapse-item" href="{{ url('/adminRegister') }}">Create Admin</a>
            </div>
          </div>
        </li>

      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
          <i class="fas fa-users"></i>
          <span>Data User</span></a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kelola User:</h6>
              <a class="collapse-item" href="{{ url('/datauser') }}">List User</a>
              <a class="collapse-item" href="{{ url('/responseadmin') }}">Review User</a>
              <a class="collapse-item" href="{{ url('/konfirmasiAdmin') }}">Pesanan User</a>
            </div>
        </div>
      </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-desktop"></i>
            <span>Product</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kelola Product:</h6>
              <a class="collapse-item" href="{{ url('/listproduct') }}">List Product</a>
              <a class="collapse-item" href="{{ url('/buatproduct') }}">Create Product</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span>
          </a>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kelola Category:</h6>
              <a class="collapse-item" href="{{ url('/listcategory') }}">List Categories</a>
              <a class="collapse-item" href="{{ url('/buatcategory') }}">Create Category</a>
            </div>
          </div>
        </li>


        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Couriers</span>
          </a>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kelola Courier:</h6>
              <a class="collapse-item" href="{{ url('/listcourier') }}">List Courier</a>
              <a class="collapse-item" href="{{ url('/buatcourier') }}">Create Courier</a>
            </div>
          </div>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        LAINNYA
      </div>



      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-money-check-alt"></i>
          <span>History Transaksi</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if(Auth::guard('admin')->user()->unreadNotifications->count())
                  <span class="badge badge-danger badge-counter">{{Auth::guard('admin')->user()->unreadNotifications->count()}}</span>
                @endif
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification Center
                </h6>
                <h6>
                  <a href="/markRead" class="dropdown-item d-flex align-items-center">Mark All as Read</a>
                </h6>
                @foreach(Auth::guard('admin')->user()->unreadNotifications as $notif)
                <a class="dropdown-item d-flex align-items-center btnunNotif" data-num="{{$loop->iteration}}" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$notif->created_at}}</div>
                    <span class="font-weight-bold" style="color:lightgray" >{{$notif->data['content']}}</span>
                    <input type="hidden" name="untype" id="untype_{{$loop->iteration}}" value="{{$notif->type}}">
                    <input type="hidden" name="unread_at" id="unread_at_{{$loop->iteration}}" value="{{$notif->read_at}}">
                    <input type="hidden" name="id_unntf" id="id_unntf_{{$loop->iteration}}" value="{{$notif->id}}">
                  </div>
                </a>
                @endforeach
                @foreach(Auth::guard('admin')->user()->readNotifications as $notif)
                <a class="dropdown-item d-flex align-items-center btnNotif" data-num="{{$loop->iteration}}" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$notif->created_at}}</div>
                    <span class="font-weight-bold" style="color:black">{{$notif->data['content']}}</span>
                    <input type="hidden" id="type_{{$loop->iteration}}" value="{{$notif->type}}">
                    <input type="hidden" id="read_at_{{$loop->iteration}}" value="{{$notif->read_at}}">
                    <input type="hidden" id="id_ntf_{{$loop->iteration}}" value="{{$notif->id}}">
                  </div>
                </a>
                @endforeach
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::guard('admin')->user()->username}}</span>
                <img class="img-profile rounded-circle" src="https://www.gstatic.com/images/branding/product/1x/admin_512dp.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="adminDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">Ã—</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/adminLogout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('akun/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('akun/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('akun/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('akun/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('akun/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('akun/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('akun/js/demo/datatables-demo.js')}}"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

  <script type="text/javascript">
      $('.btnNotif').click(function(){
        var number = $(this).data("num");
        $.ajax({
          url: "{{url('/getNotif')}}",
          type: "POST",
          data:{
            _token: '{{csrf_token()}}',
            id_ntf: $('#id_ntf_'+number).val(),
            type: $('#type_'+number).val(),
            read_at: $('#read_at_'+number).val(),
          },
          success: function(data){
            //1 = review baru, 2 = transaksi baru, 3 = upload proof
            if (data == 1) {
              window.location.href = "/responseadmin";
            }else if(data == 2){
              window.location.href = "/konfirmasiAdmin";
            }else if(data == 3){
              window.location.href = "/konfirmasiAdmin";
            }
            
            // window.location.href = "/";
          }
        });
      });

      $('.btnunNotif').click(function(){
        var number = $(this).data("num");
        $.ajax({
          url: "{{url('/getNotif')}}",
          type: "POST",
          data:{
            _token: '{{csrf_token()}}',
            id_ntf: $('#id_unntf_'+number).val(),
            type: $('#untype_'+number).val(),
            read_at: $('#unread_at_'+number).val(),
          },
          success: function(data){
            if (data == 1) {
              window.location.href = "/responseadmin";
            }else if(data == 2){
              window.location.href = "/konfirmasiAdmin";
            }else if(data == 3){
              window.location.href = "/konfirmasiAdmin";
            }
          }
        });
      });
  </script>

  <script>
    window.onload = $.ajax({
                        url: '/grafik',
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            // alert('sukses');
                            getChart(data);
                        }
                    });

    function getChart (data) {
         var options = {
          axisX: {
              interval:1,
              labelMaxWidth: 180,           
              labelAngle: -45, //90,
              labelFontFamily:"verdana0"
          },
          title: {
              text: "Grafik Jumlah Transaksi Tahun {{date('Y')}}"              
          },
          data: [              
          {
              // Change type to "doughnut", "line", "splineArea", etc.
              type: "column",
              dataPoints: [
                  { label: "Januari",  y: data[1]},
                  { label: "Februari", y: data[2]},
                  { label: "Maret", y: data[3]},
                  { label: "April", y: data[4]},
                  { label: "Mei",  y: data[5]},
                  { label: "Juni",  y: data[6]},
                  { label: "Juli",  y: data[7]},
                  { label: "Agustus", y: data[8]},
                  { label: "September", y: data[9]},
                  { label: "Oktober",  y: data[10]},
                  { label: "November",  y: data[11]},
                  { label: "Desember",  y: data[12]},
              ]
          }
          ]
      };
      
        $("#chartContainer").CanvasJSChart(options);
    }
  </script>

  <script type="text/javascript">
    var count = $("#counter").val();
    // alert(count);
    for(var i=1; i<=Number(count); i++){
      var modal = document.getElementById('confirmModal');
      var modalImg = document.getElementById('proof1');
      var captionText = document.getElementById('caption');  
      // alert("imageProof_"+i);
      $(".btnDetail").click(function(){
        $("#id_transaction").val($(this).data("id"));
        var j = $("#id_transaction").val();
        var img = document.getElementById('imageProof_'+j);
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
      }); 
    }
    
    $(".btnResponse").click(function(){
      $("#id_admin").val($(this).data("admin"));
      $("#id_review").val($(this).data("id"));
      $("#id_user").val($(this).data("user"));
    });

    jQuery(document).ready(function(e){
      console.log($('#bulan1').val())
          jQuery('#bulan').change(function(e){
                jQuery.ajax({
                    url: "{{url('/reportBulan')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        // console.log(result.data['total']);
                        $('#total').text(result.data['total']);
                        $('#unverified').text(result.data['unverified']);
                        $('#expired').text(result.data['expired']);
                        $('#canceled').text(result.data['canceled']);
                        $('#verified').text(result.data['verified']);
                        $('#success').text(result.data['success']);
                        $('#harga').text(result.data['harga']);
                    }
                });
          });

          jQuery('#tahun').change(function(e){
                jQuery.ajax({
                    url: "{{url('/reportTahun')}}",
                    method: 'post',
                    data: {
                        _token: $('#signup-token').val(),
                        bulan: $('#bulan').val(),
                        tahun: $('#tahun').val(),
                    },
                    success: function(result){
                        // console.log(result.data['total']);
                        $('#total').text(result.data_bulan['total']);
                        $('#unverified').text(result.data_bulan['unverified']);
                        $('#expired').text(result.data_bulan['expired']);
                        $('#canceled').text(result.data_bulan['canceled']);
                        $('#verified').text(result.data_bulan['verified']);
                        $('#success').text(result.data_bulan['success']);
                        $('#harga').text(result.data_bulan['harga']);

                        $('#total_tahun').text(result.data_tahun['total']);
                        $('#unverified_tahun').text(result.data_tahun['unverified']);
                        $('#expired_tahun').text(result.data_tahun['expired']);
                        $('#canceled_tahun').text(result.data_tahun['canceled']);
                        $('#verified_tahun').text(result.data_tahun['verified']);
                        $('#success_tahun').text(result.data_tahun['success']);
                        $('#harga_tahun').text(result.data_tahun['harga']);

                        createChart(result.tahun, $('#tahun').val());
                    }
                });
          });

          $(".status").click(function(e){
            var index = $(".status").index(this);
            var myStatus = '';
            switch(index){
                case 0:
                    myStatus = 'all';
                    break;
                case 1:
                    myStatus = 'unverified';
                    break;
                case 2:
                    myStatus = 'expired';
                    break;
                case 3:
                    myStatus = 'verified';
                    break;
                case 4:
                    myStatus = 'success';
                    break;
                case 5:
                    myStatus = 'canceled';
                    break;

            }

            jQuery.ajax({
                url: "{{url('/grafik')}}",
                method: 'post',
                data: {
                    _token: $('#signup-token').val(),
                    status: myStatus,
                    tahun: $('#tahun').val(),
                },
                success: function(result){
                    createChart(result.grafik, $('#tahun').val(), myStatus);
                }
            });
          });
    });

    function createChart(tahun, ttlTahun, judul = ''){
        var options = {
                            axisX: {
                                interval:1,
                                labelMaxWidth: 180,           
                                labelAngle: -45, //90,
                                labelFontFamily:"verdana0"
                            },
                            title: {
                                text: "Grafik Jumlah Transaksi "+judul+" Perbulan "+ttlTahun              
                            },
                            data: [              
                            {
                                // Change type to "doughnut", "line", "splineArea", etc.
                                type: "column",
                                dataPoints: [
                                    { label: "Januari",  y: tahun[1]},
                                    { label: "Februari", y: tahun[2]},
                                    { label: "Maret", y: tahun[3]},
                                    { label: "April", y: tahun[4]},
                                    { label: "Mei",  y: tahun[5]},
                                    { label: "Juni",  y: tahun[6]},
                                    { label: "Juli",  y: tahun[7]},
                                    { label: "Agustus", y: tahun[8]},
                                    { label: "September", y: tahun[9]},
                                    { label: "Oktober",  y: tahun[10]},
                                    { label: "November",  y: tahun[11]},
                                    { label: "Desember",  y: tahun[12]},
                                    
                                ]
                            }
                            ]
                        };
                        
                        $("#chartContainer").CanvasJSChart(options);
    }

    // function formatRupiah(angka, prefix){
    //   var number_string = angka.toString(),
    //   split       = number_string.split(','),
    //   sisa        = split[0].length % 3,
    //   rupiah        = split[0].substr(0, sisa),
    //   ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
    //   // tambahkan titik jika yang di input sudah menjadi angka ribuan
    //   if(ribuan){
    //     separator = sisa ? '.' : '';
    //     rupiah += separator + ribuan.join('.');
    //   }
 
    //   rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    //   return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    // }

    // img.onclick = function(){
    //   modal.style.display = "block";
    //   modalImg.src = this.src;
    //   captionText.innerHTML = this.alt;
    // }

  </script>

</body>

</html>