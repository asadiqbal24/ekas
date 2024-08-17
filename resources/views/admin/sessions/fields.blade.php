<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add Packages</h4>
        <p class="card-title-desc">You can add your Packages here</p>
        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-10">
                <input class="form-control" name="price" type="number" placeholder="Enter price...." required="" value="{{$session->price ?? ''}}">
                @error('price')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Minutes</label>
            <div class="col-md-10">
                <input class="form-control" name="minutes" type="number" placeholder="Enter Minutes ...."
                    required="" value="{{$session->minutes ?? ''}}">
                @error('minutes')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Session</label>
            <div class="col-md-10">
                <input class="form-control" name="session" type="number" placeholder="Enter Session ...."
                    required="" value="{{$session->session ?? ''}}">
                    @error('sessioin')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>




        <div class="card" style="margin-top:30px;text-align:center; background:#2b3a4a; color:white;">
            <div class="card-body">

                <h4 class="card-title">What is Included</h4>
                <p class="card-title-desc" style="color:white;">You can add What is Includes here</p>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Ist</label>
            <div class="col-md-10">
                <input class="form-control" name="ist" type="text" placeholder="Enter Ist ...."  value="{{$session->ist ?? ''}}">
                @error('ist')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            </div>
        </div>


        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Second</label>
            <div class="col-md-10">
                <input class="form-control" name="second" type="text" placeholder="Enter Second ...."
                     value="{{$session->second ?? ''}}">
                    @error('second')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>



        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Third</label>
            <div class="col-md-10">
                <input class="form-control" name="third" type="text" placeholder="Enter Third ...."  value="{{$session->third ?? ''}}">
                @error('third')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            </div>
        </div>


        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Fourth</label>
            <div class="col-md-10">
                <input class="form-control" name="fourth" type="text" placeholder="Enter Fourth ...."
                    value="{{$session->fourth ?? ''}}">
                    @error('fourth')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="example-text-input" class="col-md-2 col-form-label">Five</label>
            <div class="col-md-10">
                <input class="form-control" name="five" type="text" placeholder="Enter Five ...." value="{{$session->five ?? ''}}">
                @error('five')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-md">Submit</button>
        </div>
    </div>
</div>
