<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mb-5">
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Nouveau Patient</button>
                </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th> Nom </th>
                          <th>Prénom</th>
                          <th>Email(s)</th>
                          <th>Date</th>
                          <th>Téléphone</th>
                          <th>Adresse</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->nom }}</td>
                                    <td>{{ $user->prenom }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->dateNaissance }}</td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->adresse }}</td>
                                    <td>{{ $user->roles[0]->name }}</td>
                                    <td>Buton rdv</td>
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
        <!-- /.content -->
      </div>
      <!-- /.Modal -->
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nouveau Patient</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                

            <div class="modal-body">
                <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Nom" name="nom">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Prénom" name="prenom">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Téléphone" name="telephone">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="date" class="form-control" placeholder="Date de naissance" name="dateNaissance">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input class="form-control" placeholder="Adresse" name="adresse">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group ">
                              <select name="role" class="form-control">
                                @foreach ($roles as $role)
                                  <option disabled selected hidden> {{$user->roles[0]->name ?? 'Rôle'}}</option>
                                  <option value="{{$role->name}}"> {{$role->name}} </option>
                                  {{-- <option value="Féminin">Féminin</option> --}}
                                @endforeach
                              </select>
                            </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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