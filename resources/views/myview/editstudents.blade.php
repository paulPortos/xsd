<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
            <div class="card">
                <div class="cardheader">
                    <h4>Update Students
                        <a href="{{url ('students')}}" class="btn btn-primary float-end">back</a>
                    </h4>
                </div>
                <div class="card-boy">
                    <form action="{{url('myview/'.$students->id. '/edit')}} " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$students->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Age</label>
                            <input type="number" name="age" class="form-control" value="{{$students->age}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{$students->address}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" class="form-control" value="{{$students->course}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{$students->subject}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">UPdate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>