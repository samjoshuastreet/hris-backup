<div>
    @error('IC')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
    @error('DB')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
    <form wire:submit.prevent="login_user" action="">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input wire:model="email" type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            @error('email')
            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <div class="float-end">
                <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
            </div>
            <label class="form-label">Password</label>
            <div class="input-group auth-pass-inputgroup">
                <input wire:model="password" type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
            </div>
            @error('password')
            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember_value" id="remember-check">
            <label class="form-check-label" for="remember-check">
                Remember me
            </label>
        </div>

        <div class="mt-3 d-grid">
            <button class="btn btn-primary waves-effect waves-light" id="login_button" type="submit">Log In</button>
        </div>


        <div class="mt-4 text-center">
            <h5 class="font-size-14 mb-3">Sign in with</h5>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                        <i class="mdi mdi-google"></i>
                    </a>
                </li>
            </ul>
        </div>

    </form>
</div>