<div class="card">
    <div class="card-body register-card-body">
        <form role="form" action="{{ route('update.profile', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="input-group mb-3">
                        <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-12">
                            <img src="{{ asset('images/'.auth()->user()->image) }}" width="90" style="border-radius: inherit;" alt="" class="mb-1 mr-1">
                        </div>
                    <div class="col-sm-12">
                        <input type="file" name="image">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputFile">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="name" :value="old('name')" required autofocus autocomplete="name" value="{{ auth()->user()->name }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputFile">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" :value="old('email')" required value="{{ auth()->user()->email }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputFile">Phone No</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Phone No" name="phone_no" :value="old('phone_no')" required value="{{ auth()->user()->phone_no }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputFile">Gender</label>
                    <div class="input mb-3">
                        <select name="gender" class="form-control" :value="old('gender')" placeholder="Gender" required>
                            <option>Gender</option>
                            <option value="0" {{ auth()->user()->gender == '0' ? 'selected' : '' }}>Male</option>
                            <option value="1" {{ auth()->user()->gender == '1' ? 'selected' : ''}}>Female</option>
                        </select> 
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputFile">Address</label>
                    <div class="input mb-3">
                        <textarea id="address" class="form-control" name="address" :value="old('address')" placeholder="Address" rows="3">{{ auth()->user()->address }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>  
    </div>
</div>