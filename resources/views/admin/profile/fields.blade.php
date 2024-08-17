<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Profile </h4>
        <p class="card-title-desc">Here you can edit your profile</p>
        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="name" placeholder="Enter Name...." required="">
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="email" placeholder="Enter Title Name...."
                    required="">
                @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
            <div class="col-md-10">
                <input class="form-control" type="file" name="image" placeholder="Enter Image Name...."
                    required="" >
                @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-md">Submit</button>
        </div>
    </div>
</div>