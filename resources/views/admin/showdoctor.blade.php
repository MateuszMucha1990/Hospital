<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
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

<style>
    th{
        padding: 10px;
    }
    td{
        background-color: skyblue;
        padding-left: 10px;
    }
    img{
        height: 100px;
        width: auto;
    }

    table{
        width: 800px;
    }

</style>

<div class="a container-fluid page-body-wrapper">
            <div class="b" align="center" style="padding: 100px;">
                <table>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Speciality</th>
                        <th>Room</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>

                    </tr>

                    @foreach ($doctors as $doctor)

                    <tr>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phoone}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td><img src="doctorimage/{{$doctor->image}}" alt=""></td>
                        <td ><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('deletedoctor', $doctor->id) }}">Delete</a></td>
                        <td ><a class="btn btn-primary" href="{{ url('updatedoctor', $doctor->id) }}">Update</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>



    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
  </body>
</html>
