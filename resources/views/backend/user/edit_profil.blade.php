@extends('backend.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profil</h4>

                        <div class="mb-4">
                            <h5 class="card-title">Nama :{{ Auth::user()->name }}</h5>
                            <br />
                            <h5 class="card-title">Email :{{ Auth::user()->email }}</h5>
                        </div>

                        <form method="POST" action="{{ route('user.update_profile', Auth::user()->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto"
                                    value="{{ Auth::user()->foto }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profil</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
