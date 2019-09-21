<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{csrf_token()}}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Contact List</title>
  <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css')}}">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
  <!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
  {{--
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  --}}
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu"
  data-col="2-columns">
  <!-- fixed-top-->
  @include('admin.admin_include.ad_navbar')
  @include('admin.admin_include.ad_sidebar')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        {{-- Page Title --}}
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Add Products</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="/admin/CreateProducts">Add Products</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
        {{-- Page Title --}}
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1"
              type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i>
              Settings</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a
                class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic CKEditor start -->
        <section id="basic">
          {{-- card --}}
          <div class="card" style="">
            <div class="card-header">
              <h4 class="card-title">Basic Justified Tab</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                @if ($errors)
                @foreach($errors as $message)
                <div id="form-messages" class="alert alert-success" role="success">
                  {{ $message }}
                </div>
                @endforeach
                @endif

                <div class="row mt-1" style="display :none;">
                  <div class="col-md-6 col-sm-12">
                    <button type="button" class="btn btn-lg btn-block btn-outline-success mb-2 modalcheck" id="type-success">Success</button>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <button type="button" class="btn btn-lg btn-block btn-outline-warning mb-2" id="type-warning">Warning</button>
                  </div>
                  <button type="button" class="btn btn-lg btn-block btn-outline-primary mb-2" id="cancel-button">Cancel
                    Button</button>
                </div>

                <table class="datatable mdl-data-table dataTable cell-border" cellspacing="0" width="100%" role="grid"
                  style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Contact ID</th>
                      <th>Contact Name</th>
                      <th>City</th>
                      <th>Province</th>
                      <th>Mobile # 1</th>
                      <th>Mobile # 2</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $item)
                    <tr>
                      <td>{{$item->contact_id}}</td>
                      <td>{{$item->contact_name}}</td>
                      <td>{{$item->contact_city}}</td>
                      <td>{{$item->contact_province}}</td>
                      <td>{{$item->contact_number1}}</td>
                      <td>{{$item->contact_number2}}</td>
                      <td>{{$item->contact_address}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Contact ID</th>
                      <th>Contact Name</th>
                      <th>City</th>
                      <th>Province</th>
                      <th>Mobile # 1</th>
                      <th>Mobile # 2</th>
                      <th>Address</th>
                    </tr>
                  </tfoot>
                </table>
              </div> {{-- Card Body --}}
            </div> {{-- Card Content --}}
          </div> {{-- Card --}}

      </div>
    </div>
    </section>
    <!-- Basic CKEditor end -->

  </div>
  </div>
  </div>

  <div class="swal-overlay" tabindex="-1">
    <div class="swal-modal">
      <div class="swal-icon swal-icon--warning">
        <span class="swal-icon--warning__body">
          <span class="swal-icon--warning__dot"></span>
        </span>
      </div>
      <div class="swal-title" style="">Warning!</div>
      <div class="swal-text" style="">You clicked the button!</div>
      <div class="swal-footer">
        <div class="swal-button-container">

          <button class="swal-button swal-button--confirm">OK</button>

          <div class="swal-button__loader">
            <div></div>
            <div></div>
            <div></div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
          href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All
        rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>

  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/forms/form-repeater.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
  {{-- <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
  --}}
  <!-- END MODERN JS-->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
  <!-- BEGIN PAGE LEVEL JS-->
  <script>
    var events = $('#events');
    var table = $('.datatable').DataTable({
      responsive: true,
      dom: 'Bfrtip',
      select: {
        style: 'single'
      },
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      buttons: [
        'print',
        {
          extend: 'copy',
          text: 'Copy to clipboard'
        },
        {
          extend: 'excelHtml5',
          customize: function (xlsx) {
            var sheet = xlsx.xl.worksheets['sheet1.xml'];
            // jQuery selector to add a border
            $('row c[r*="10"]', sheet).attr('s', '25');
          }
        },
        {
          extend: 'pdfHtml5',
          messageTop: 'This is the Contact list created by CodeForGeeks'
        },
        {
          text: 'Edit',
          action: function () {
            var count = table.rows({
              selected: true
            }).count();
            //            alert(count);
            if (count == 0 || count > 1) {
              $('#type-warning').on('click', function () {
                swal("Warning!", "Kindly select any column to edit! ", "warning");
              });
              $("#type-warning").click();
            } else {
              $('#type-success').on('click', function () {
                swal("Good job!", "Are you sure you want to edit?", "success");
              });
              $("#type-success").click();
              var a = table.rows({
                selected: true
              }).data();
              console.log(a[0][0]);
              var page_id = a[0][0];
              setTimeout(function () {
                location.href = "http://127.0.0.1:8000/admin/EditContacts/" + page_id;
              }, 2000);
            }
          }
        },
        {
          text: 'Delete',
          action: function () {
            var count = table.rows({
              selected: true
            }).count();
            if (count == 0 || count > 1) {
              return;
            } else {
              var a = table.rows({
                selected: true
              }).data();
              var page_id = a[0][0];
              console.log(a[0][0]);

              $('#cancel-button').on('click', function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Contact!",
                    icon: "warning",
                    buttons: {
                      cancel: {
                        text: "No, cancel Please!",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                      },
                      confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                      }
                    }
                  })
                  .then((isConfirm) => {
                    if (isConfirm) {
                      swal("Deleted!", "Your Contact has been deleted.", "success");
                      location.href = 'http://127.0.0.1:8000//admin/DeleteContact/' + page_id;
                    } else {
                      swal("Cancelled", "Your Contact is safe", "error");
                    }
                  });
              });

              $("#cancel-button").click();



            }
          }
        }
      ],
      "columnDefs": [{
          "width": "30%",
          "targets": 6,
        },
        {
          "targets": [0],
          "visible": false,
          "searchable": false
        },

      ]
    });
  </script>
  <!-- END PAGE LEVEL JS-->
</body>

</html>