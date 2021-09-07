<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            </div>
            <div class="modal-body">
                @if (session()->has('error'))
                    <small> {{ session('error') }}</small>
                @endif
                @if (session()->has('two_factory'))
                <form action="{{ route('verifiy_reg') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h5>Verifiy email</h5>
                        <label for="" class="col-form-label">Code : </label>
                        <input type="text" name="code" class="form-control">
                    <small>Check Your email Enter code here</h4>
                    </div>
                    <button class="btn btn-success">Complete</button>
                </form>
                @else
                    
                <form action="{{ route('register') }}" method="post" id="reg">
                    @csrf
                    <div class="form-group">
                        <label for="" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Email Address</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Phone Number</label>
                        <input type="number" name="phone" class="form-control">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="" class="col-form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        
                        <div class="form-group">
                            <label for="" class="col-form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </form>
                @endif
            </div>
            <div class="modal-footer">
                
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.querySelector('#reg').submit()">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>
