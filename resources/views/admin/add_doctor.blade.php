<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>

    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">

            </div>
        </div>



        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebard')

        <!-- partial -->
        @include('admin.navbar')


        <div  class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top:100px;">

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button id='closeModal' type="button" class="btn btn-danger" data-bs-dismiss="alert">Close</button>
                     {{ session() -> get('message') }}
                </div>
                @endif

                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div style="padding:15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" name="name" style="color: black;" placeholder="Write the name" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Phone</label>
                        <input type="number" name="number" style="color: black;" placeholder="Write the phone number" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Speciality</label>
                        <select name="speciality" style="color: black; width:200px;">
                            <option>--Select--</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="loung">Loung</option>
                        </select>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Room No</label>
                        <input type="text" name="room" style="color: black;" placeholder="Write the room number" required>
                    </div>

                    <div style="padding:15px;">
                        <label for="">Doctor Image</label>
                        <input type="file" name="file">
                    </div>

                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>

                </form>
            </div>

        </div>




        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
