<div class="row ">
    <div class="col-md-6 mx-auto mt-4 ">
        <div class="card card-primary ">
            <div class="card-header ">
                <h3 class="card-title ">Add New Users..</h3>
            </div>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                </div>
               

                <div class="form-group">

                    <input type="text" class="form-control" id="userRole" name="userRole" placeholder="Enter userRole" required>
                </div>
                <div class="col-md-12 text-center mb-3">
                    <button type="submit" class="btn btn-primary text-center ">Add User</button>
                </div>
            </form>


        </div>
    </div>