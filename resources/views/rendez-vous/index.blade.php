{{-- @extends('layouts.navigation') --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

<x-app-layout>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Listing des Rendez-vous</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route("users.index")}}">Home</a></li>
                    <li class="breadcrumb-item active">Rendez-vous</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row mb-5">
                @role('patient')
                  <div class="text-right">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Nouveau Rendez-vous</button>
                  </div>
                  @endrole
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              
                  <div class="card">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>#</th>
                            @role('admin')
                            <th> Patient </th>
                            @endrole
                            <th>Date</th>
                            <th>Objet</th>
                            <th>Description</th>
                            <th>statut</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach ($rdvs as $rdv)
                                  <tr>
                                    <td>{{ $rdv->id }}</td>
                                    @role('admin')
                                        <th>{{ $rdv->users->nom }} {{ $rdv->users->prenom }}</th>
                                    @endrole
                                      <td>{{ $rdv->dateRdv }}</td>
                                      <td>{{ $rdv->objet }}</td>
                                      <td>{{ $rdv->description }}</td>
                                      <td>{{ $rdv->statut }}</td>
                                      @role('admin')
                                      <td>
                                        <form method="POST" action="{{route('rdv.confirmer',$rdv->id)}}">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-primary">Confirmer</button>
                                        </form>
                                        <form method="POST" action="{{route('rdv.annuler',$rdv->id)}}">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-danger">Annuler</button>
                                        </form>
                                      </td>
                                      @endrole
                                  </tr>
                              @endforeach
                          </tfoot>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
  
              <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
          </section>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nouveau Rendez-vous</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                

            <div class="modal-body">
                <form method="POST" action="{{route('rdv.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="date" class="form-control" placeholder="Date du rendez-vous" name="dateRdv">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Objet du rendez-vous" name="objet">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Description du rendez-vous" name="description"> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary" value="Enregistrer"></button> 
                    </div>
                </form>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</x-app-layout>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>