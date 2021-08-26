<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            </div>
            <div class="modal-body">
                @if (session()->has('error'))
                    <small> {{ session('error') }}</small>
                @endif
                <form action="{{ route('login') }}" method="post" id="login">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">Email</label>
                        <input type="text" name="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Password</label>
                        <input type="text" name="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="justify-content: space-between !important;">
                <div class="google">
                    <button class="btn btn-google-plus" onclick='window.location = "{{ url('auth/google') }}" '>Login
                        With Google</button>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.querySelector('#login').submit()">login</button>
                </div>
            </div>
        </div>
    </div>
</div>
