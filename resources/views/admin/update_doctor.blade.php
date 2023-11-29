<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
        <div class="a container-fluid page-body-wrapper">


            <style>
                input {
                    color: black;
                }

                select {
                    color: black;
                    width: 200px;
                }

                .inp {
                    width: 100px;
                    margin-top: 15px;
                }

                img {
                    width: 100px;
                    height: 100px;
                }
            </style>

            <form action="{{url('editdoctor',$doctors->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="inp">
                    <label for="">Doctor Name</label>
                    <input type="text" name="name"" value=" {{$doctors->name}}" required>
                </div>

                <div class="inp">
                    <label for="">Phone</label>
                    <input type="number" name="number" " value="{{$doctors->phoone}}" required>
                </div>

                <div class="inp">
                    <label for="">Speciality</label>
                    <select name="speciality">
                        <option>{{$doctors->speciality}}</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="loung">Loung</option>
                    </select>
                </div>

                <div class="inp">
                    <label for="">Room No</label>
                    <input type="text" name="room" value="{{$doctors->room}}" required>
                </div>

                <div class="inp">
                    <label for="">Doctor Image</label>
                    <img src="doctorimage/{{$doctors->image}}" alt="">
                    <input type="file" name="file">
                </div>

                <div class="inp">
                    <input type="submit" class="btn btn-success">
                </div>

            </form>
        </div>


        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
