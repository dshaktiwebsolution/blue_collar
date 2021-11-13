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
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="row">

                            <div class="col-md-12">
                                <a href="{{ url('/add_plan') }}" class="btn btn-primary">Add Plan</a>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Plan List</h5>
                            </div>
                            <table class="table responsive" id="ptable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="all">No.</th>
                                        <th class="all">Title</th>
                                        <th class="all">Duration</th>
                                        <th class="all">Status</th>
                                        <th class="all">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($plans as $val)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $val->title }}</td>
                                            <td>{{ $val->duration }}</td>
                                            <td>{{ $val->status == 1 ? 'Active' : 'Deactive' }}</td>
                                            <td>
                                                <form action="{{ route('delete_plan', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{ url('edit_plan?id='.$val->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
