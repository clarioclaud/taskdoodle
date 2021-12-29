<html>
    <head>
        <title>Student</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" ></script>        
    </head>
    <body>
        <div class="container-fluid">
           
            <h4 class="text-center" style="margin-top:40px">EDIT STUDENT</h4><br>
            <a href="{{ url('/') }}" class="btn btn-info" style="margin-left:350px;">Go Back</a><br><br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            Edit Student
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.student') }}" method="post">
                                @csrf
                                <input type="hidden" name="regid" value="{{ $detail->regid }}">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $detail->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="class" >Class</label>
                                    <input type="text" class="form-control" name="class" id="class" value="{{ $detail->class }}">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="form-check">
                                        
                                        <input type="radio" class="form-check-input" name="gender" id="male" value="male" {{ $detail->gender=='male'?'checked':'' }}>
                                        <label for="male" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        
                                        <input type="radio" class="form-check-input" name="gender" id="female" value="female" {{ $detail->gender=='female'?'checked':'' }}>
                                        <label for="female" class="form-check-label">Female</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dob" >DOB</label>
                                    <input type="date" class="form-control" name="dob" id="dob" value="{{ $detail->dob }}">
                                </div>
                                <div class="form-group">
                                    <label for="mobile" >Mobile</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $detail->mobile }}">
                                </div>
                                <div class="form-group">
                                    <label for="address" >Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="4" cols="4">{{ $detail->address }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Update</button>
                                <button type="button" class="btn btn-danger reset">Cancel</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </did>
        </div>
    </body>
    
</html>