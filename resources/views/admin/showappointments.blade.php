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
    }
</style>

        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding: 100px;">
                <table>
                    <tr>
                        <th>Customer name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Approved</th>
                        <th>Cancel</th>
                    </tr>

                @foreach ($data as $appoint)
                    <tr>
                        <td>{{$appoint->name  }}</td>
                        <td>{{$appoint->email  }}</td>
                        <td>{{$appoint->phone  }}</td>
                        <td>{{$appoint->doctor  }}</td>
                        <td>{{$appoint->date  }}</td>
                        <td>{{$appoint->message  }}</td>
                        <td>{{$appoint->status  }}</td>
                        <td><a class="btn btn-success" href="{{ url('approved', $appoint->id) }}">Approved</a></td>
                        <td><a class="btn btn-danger" href="{{ url('canceled', $appoint->id) }}">Cancel</a></td>
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
