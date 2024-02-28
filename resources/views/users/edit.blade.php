@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header">Edit User</div>
                  <div class="card-body">
  
                      <form action="{{ route('users.update' , $user->id) }}"  method="POST">
                        @csrf
                        @method('PUT')
                          <div class="form-group row mt-3">
                              <label for="nm_anggota" class="col-md-4 col-form-label text-right">Name</label>
                              <div class="col-md-6">
                                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                    <input type="text" id="nm_anggota" class="form-control" name="nm_anggota" required autofocus value="{{ $user->nm_anggota }}">
                                  @if ($errors->has('nm_anggota'))
                                      <span class="text-danger">{{ $errors->first('nm_anggota') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="email_address" class="col-md-4 col-form-label text-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required value="{{ $user->email }}">
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row mt-3">
                              <label for="password" class="col-md-4 col-form-label text-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" >
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
                                    <option value="admin" {{ ( $user->hak_alses == "admin") ? "selected" : ""}}>Admin</option>
                                    <option value="anggota"  {{ ( $user->hak_alses == "anggota") ? "selected" : ""}}>Anggota</option>
                                </select>
                                @if ($errors->has('hak_alses'))
                                    <span class="text-danger">{{ $errors->first('hak_alses') }}</span>
                                @endif
                            </div>
                          </div>

                          

                          <div class="form-group row mt-3">
                            <label for="status" class="col-md-4 col-form-label text-right">Status</label>
                            <div class="col-md-6">
                                <select class="form-select" id="status" name="status" aria-label="status">
                                    <option value="">Choose</option>
                                    <option value="active" {{ ( $user->status == "active") ? "selected" : ""}}>Active</option>
                                    <option value="inactive" {{ ( $user->status == "inactive") ? "selected" : ""}}>In Active</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
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