<html>
    <head>
        <title>Student</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" ></script>  
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>      
    </head>
    <body>
        <div class="container-fluid">
           
            <h4 class="text-center" style="margin-top:40px">STUDENT DETAILS</h4><br>
            <div class="section">
                <a href="{{ route('export') }}" class="btn btn-success" style="margin-left:560px;">Export Duplicate</a>
                <a href="{{ route('export.all') }}" class="btn btn-light" style="float:center">Export </a>
            </div>
            <br><br>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <table class="table table-striped" id="studentTable">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Id</th>
                        <th>Reg Id</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>Dob</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Joined At</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                @php
                    $i=1;
                @endphp
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->regid }}</td>
                        <td>{{ ucfirst($student->name) }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ ucfirst($student->gender) }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ Carbon\Carbon::parse($student->created_at)->format('d F Y h:i:s a') }}</td>
                        <td>
                            <a href="{{ route('update.student', $student->regid) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('delete.student', $student->regid) }}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>


           
            
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $('#studentTable').DataTable();
        });

        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Deleted!',
                'student has been deleted.',
                'success'
                )
            }
            });

        });    
    </script>
</html>