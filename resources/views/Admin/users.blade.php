@extends('Admin.addmaster')

@section('body')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" />

    <div class="page-content-area">
        <!-- Dashboard Section -->
        <section class="section-padding dashboard-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-box">
                        <table>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('/users') }}" class="btn {{ Request::has('user_type') ? 'btn-primary' : 'btn-success' }}">All User</a>
                                    <a href="{{ url('/users?user_type=0') }}" class="btn {{ Request::input('user_type') == '0' ? 'btn-success' : 'btn-primary' }}">Company</a>
                                    <a href="{{ url('/users?user_type=1') }}" class="btn {{ Request::input('user_type') == '1' ? 'btn-success' : 'btn-primary' }}">Individual</a>
                                    <a href="{{ url('/users?user_type=2') }}" class="btn {{ Request::input('user_type') == '2' ? 'btn-success' : 'btn-primary' }}">Job Seeker</a>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">User List</h5>
                                </div>
                                <table class="table responsive" id="ptable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="all">No.</th>
                                            <th class="all">Name</th>
                                            <th class="all">Email</th>
                                            <th class="all">Mobile</th>
                                            <th class="all">Gender</th>
                                            <th class="all">Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach ($users as $val)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $val->user_type == 2 ? $val->first_name ." ". $val->last_name : $val->name }}</td>
                                                <td>{{ $val->email }}</td>
                                                <td>{{ $val->mobile_number }}</td>
                                                <td>{{ $val->gender }}</td>
                                                <td>
                                                    @if (!empty($val->uimage) && file_exists(public_path("assets/photo/pic/". $val->uimage->image)))
                                                        <img src="public/assets/photo/pic/{{ $val->uimage->image }}" width="50px" height="50px">
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#ptable').DataTable();
        });
    </script>

@endsection
