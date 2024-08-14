<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
            <div class="card">
                <div class="cardheader">
                    <h4>ADD Teachers
                        <a href="{{url ('teachers')}}" class="btn btn-primary float-end">back</a>
                    </h4>
                </div>
                <div class="card-boy">
                    <form action="{{url('myview/createteachers')}} " method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Age</label>
                            <input type="number" name="age" class="form-control" value="{{old('age')}}">
                        </div
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deparment</label>
                            <input type="text" name="department" class="form-control" value="{{old('department')}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>