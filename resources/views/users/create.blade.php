@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header">Add User</div>
                  <div class="card-body">
  
                      <form action="{{ route('users.store') }}" method="POST">
                          @csrf
                          <div class="form-group row mt-3">
                              <label for="nm_anggota" class="col-md-4 col-form-label text-right">Nama Pengguna</label>
                              <div class="col-md-6">
                                  <input type="text" id="nm_anggota" class="form-control" name="nm_anggota" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="email_address" class="col-md-4 col-form-label text-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="password" class="col-md-4 col-form-label text-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                            <div class="form-group row mt-3">
                                <label for="hak_alses" class="col-md-4 col-form-label text-right">Hak Akses</label>
                                <div class="col-md-6">
                                    <select class="form-select" id="hak_alses" name="hak_alses" aria-label="hak_alses">
                                        <option value="">Choose</option>
                                        <option value="admin">Admin</option>
                                        <option value="anggota">Anggota</option>
                                    </select>
                                    @if ($errors->has('hak_alses'))
                                        <span class="text-danger">{{ $errors->first('hak_alses') }}</span>
                                    @endif
                                </div>
                            </div>
  
                          <div class="col-md-6 offset-md-4 mt-3 p-2 d-grid">
                              <button type="submit" class="btn btn-primary">
                                  Save
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection