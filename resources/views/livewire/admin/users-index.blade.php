<div>
    <div class="container shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <table class="table table-striped rounded shadow p-3 mb-5 bg-white rounded">
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
                            <a href="{{route('admin.useredit', $user)}}" class="btn btn-primary shadow rounded">Editar</a>
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