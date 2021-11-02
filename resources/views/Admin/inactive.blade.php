@extends('Admin.addmaster')

@section('body')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css"/>

    <div class="page-content-area">
    <!-- Dashboard Section -->
    <section class="section-padding dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-box">
                    <table>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Inactive Job</h5>
                            </div>
                            <table class="table responsive" id="ptable" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="all">No.</th>
                                    <th class="all">Company Name</th>
                                    <th class="all">Job Title</th>
                                    <th class="all">Job Type</th>
                                    <th class="all">City-State</th>
                                    <th class="all">Qualification</th>
                                    <th class="none">Skills</th>
                                    <th class="none">Language</th>
                                    <th class="all">Salary</th>
                                    <th class="all">Contect Person</th>
                                    <th class="none">Contect Number</th>
                                    <th class="none">Contect E-mail</th>
                                    <th class="all"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($inactive as $val)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$val->company_name}}</td>
                                        <td>{{$val->job_title}}</td>
                                        <td>{{$val->job_type}}</td>
                                        <td>{{$val->city}}-{{$val->state}}</td>
                                        <td>{{$val->qualification}}</td>
                                        <td>{{(@unserialize($val->skills) == true) ? implode(',',unserialize($val->skills)) : $val->skills }}</td>
                                        <td>{{(@unserialize($val->language) == true) ? implode(',',unserialize($val->language)) : $val->language }} </td>
                                        <td>{{$val->min_salary}}-{{$val->max_salary}}</td>
                                        <td>{{$val->con_name}}</td>
                                        <td>{{$val->con_number}}</td>
                                        <td>{{$val->con_email}}</td>
                                        <td class="table-action">
                                            <a href="{{url('/inactivestatus')}}/{{$val->id}}"><i class="align-middle" data-feather="edit-2"> Active Job</i></a>
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
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#ptable').DataTable();
        });
    </script>

@endsection