<div class="card">
    <div class="card-body register-card-body">
        <form role="form" action="{{ route('update.password') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label">Current Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="current_password" name="current_password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label">New Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label">Confirm Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
    

    
