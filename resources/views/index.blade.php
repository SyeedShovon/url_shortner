<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sheba URL Shortner</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{asset('assets/img/kaiadmin/logo2.jpeg')}}"
    />

    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{asset('assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/kaiadmin.min.css')}}" />

  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="{{asset('assets/img/kaiadmin/logo3.jpeg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="40"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  href=""
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        @if(Session('success'))
        <div class="btn btn-success" style="float: right; margin:10px " id="sucDiv">
            {{ Session('success') }}
        </div>
        @endif 
        @error('mainLink')
        <div class="btn btn-danger" style="float: right; margin:10px " id="sucDiv">
            This URL can not be shortened !!
        </div>
        @enderror
        <div class="container">                     
          <div class="page-inner">  
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('generateLink') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Enter URL</label>
                            <input
                              type="text"
                              name="mainLink"
                              class="form-control"
                              required
                            />
                            <br>
                            <button class="btn btn-primary" type="submit">
                                <span class="btn-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </span>
                                Generate Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">All Links</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table
                            id="basic-datatables"
                            class="display table table-striped table-hover"
                          >
                            <thead>
                              <tr>
                                <th>S.N.</th>
                                <th style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Main Link</th>
                                <th>Short Link</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>S.N.</th>
                                <th style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Main Link</th>
                                <th>Short Link</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>
                                @if (isset($shortLinks))
                                    @foreach ($shortLinks as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a href="{{$row->mainLink}}" target="_blank">{{$row->mainLink}}</a></td>
                                        <td><a href="{{$row->mainLink}}" target="_blank">{{$row->shortLink}}</a></td>
                                        <td><a href="{{ url('delete',$row->id)}}" class="btn btn-danger btn-sm" id="alert_demo_3_3">Delete</a></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <div class="copyright">
              2024 made by
              <a href="https://github.com/SyeedShovon">Md. Abdullah Abu Syeed</a>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Datatables -->
    <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>
    <script>
        $(document).ready(function () {
          $("#basic-datatables").DataTable({});
  
          // Add Row
          $("#add-row").DataTable({
            pageLength: 5,
          });
  
          var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
  
          $("#addRowButton").click(function () {
            $("#add-row")
              .dataTable()
              .fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action,
              ]);
            $("#addRowModal").modal("hide");
          });
        });
        $("#alert_demo_3_3").click(function (e) {
            swal("Deleted!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
        });
        $('#sucDiv').delay(2000).fadeOut('slow');
      </script>
  </body>
</html>
