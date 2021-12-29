<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="buscar" placeholder="Ingrese el nombre del usuario" class="form-control">

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <body>
                    @foreach ($user as $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <td width="10px">
                            <a href="" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </body>
            </table>

        </div>
          <div class="card-footer">
              {{$user->paginate()}}
          </div>
    </div>
</div>