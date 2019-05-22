@extends('admin.layout.base')

@section('content')
        <!-- Start content -->
        <div class="content">

            <div class="">
                <div class="page-header-title">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>

            <div class="page-content-wrapper ">

                <div class="container">

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="panel text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title text-muted font-light">Total Subscription</h4>
                                </div>
                                <div class="panel-body p-t-10">
                                    <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>8952</b></h2>
                                    <p class="text-muted m-b-0 m-t-20"><b>48%</b> From Last 24 Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="panel text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title text-muted font-light">Order Status</h4>
                                </div>
                                <div class="panel-body p-t-10">
                                    <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-up text-success m-r-10"></i><b>6521</b></h2>
                                    <p class="text-muted m-b-0 m-t-20"><b>42%</b> Orders in Last 10 months</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="panel text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title text-muted font-light">Unique Visitors</h4>
                                </div>
                                <div class="panel-body p-t-10">
                                    <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-up text-success m-r-10"></i><b>452</b></h2>
                                    <p class="text-muted m-b-0 m-t-20"><b>22%</b> From Last 24 Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="panel text-center">
                                <div class="panel-heading">
                                    <h4 class="panel-title text-muted font-light">Monthly Earnings</h4>
                                </div>
                                <div class="panel-body p-t-10">
                                    <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>5621</b></h2>
                                    <p class="text-muted m-b-0 m-t-20"><b>35%</b> From Last 1 Month</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="m-t-0">Email Sent</h4>

                                    <ul class="list-inline widget-chart m-t-20 text-center">
                                        <li>
                                            <h4 class=""><b>3654</b></h4>
                                            <p class="text-muted m-b-0">Marketplace</p>
                                        </li>
                                        <li>
                                            <h4 class=""><b>954</b></h4>
                                            <p class="text-muted m-b-0">Last week</p>
                                        </li>
                                        <li>
                                            <h4 class=""><b>8462</b></h4>
                                            <p class="text-muted m-b-0">Last Month</p>
                                        </li>
                                    </ul>

                                    {{--<div id="morris-donut-example" style="height: 300px"></div>--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="m-t-0">Revenue</h4>

                                    <ul class="list-inline widget-chart m-t-20 text-center">
                                        <li>
                                            <h4 class=""><b>5248</b></h4>
                                            <p class="text-muted m-b-0">Marketplace</p>
                                        </li>
                                        <li>
                                            <h4 class=""><b>321</b></h4>
                                            <p class="text-muted m-b-0">Last week</p>
                                        </li>
                                        <li>
                                            <h4 class=""><b>964</b></h4>
                                            <p class="text-muted m-b-0">Last Month</p>
                                        </li>
                                    </ul>

                                    {{--<div id="morris-bar-example" style="height: 300px"></div>--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="m-t-0">Email Sent</h4>

                                    <ul class="list-inline widget-chart m-t-20 text-center">
                                        <li>
                                            <h4 class=""><b>3654</b></h4>
                                            <p class="text-muted m-b-0">Marketplace</p>
                                        </li>
                                        <li>
                                            <h4 class=""><b>954</b></h4>
                                            <p class="text-muted m-b-0">Last week</p>
                                        </li>
                                        <li>
                                            <h4 class=""><b>8462</b></h4>
                                            <p class="text-muted m-b-0">Last Month</p>
                                        </li>
                                    </ul>

                                    {{--<div id="morris-area-example" style="height: 300px"></div>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-7">
                            <div class="panel">
                                <div class="panel-body">
                                    <h4 class="m-b-30 m-t-0">Recent Contacts</h4>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover m-b-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Office</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th>Salary</th>
                                                    </tr>

                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Tiger Nixon</td>
                                                        <td>System Architect</td>
                                                        <td>Edinburgh</td>
                                                        <td>61</td>
                                                        <td>2011/04/25</td>
                                                        <td>$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>63</td>
                                                        <td>2011/07/25</td>
                                                        <td>$170,750</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ashton Cox</td>
                                                        <td>Junior Technical Author</td>
                                                        <td>San Francisco</td>
                                                        <td>66</td>
                                                        <td>2009/01/12</td>
                                                        <td>$86,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cedric Kelly</td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>Edinburgh</td>
                                                        <td>22</td>
                                                        <td>2012/03/29</td>
                                                        <td>$433,060</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Airi Satou</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>33</td>
                                                        <td>2008/11/28</td>
                                                        <td>$162,700</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brielle Williamson</td>
                                                        <td>Integration Specialist</td>
                                                        <td>New York</td>
                                                        <td>61</td>
                                                        <td>2012/12/02</td>
                                                        <td>$372,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Herrod Chandler</td>
                                                        <td>Sales Assistant</td>
                                                        <td>San Francisco</td>
                                                        <td>59</td>
                                                        <td>2012/08/06</td>
                                                        <td>$137,500</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-md-5">
                            <div class="panel">
                                <div class="panel-body">
                                    <h4 class="m-b-30 m-t-0">Goal Completion</h4>

                                    <p class="font-600 m-b-5">Add Product to cart <span class="text-primary pull-right"><b>80%</b></span></p>
                                    <div class="progress  m-b-20">
                                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                        </div><!-- /.progress-bar .progress-bar-danger -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600 m-b-5">Complete Purchases <span class="text-primary pull-right"><b>50%</b></span></p>
                                    <div class="progress  m-b-20">
                                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        </div><!-- /.progress-bar .progress-bar-pink -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600 m-b-5">Visit Premium plan <span class="text-primary pull-right"><b>70%</b></span></p>
                                    <div class="progress  m-b-20">
                                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                        </div><!-- /.progress-bar .progress-bar-info -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600 m-b-5">Send Inquiries <span class="text-primary pull-right"><b>65%</b></span></p>
                                    <div class="progress  m-b-20">
                                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
                                        </div><!-- /.progress-bar .progress-bar-warning -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600 m-b-5">Monthly Purchases <span class="text-primary pull-right"><b>25%</b></span></p>
                                    <div class="progress  m-b-20">
                                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                        </div><!-- /.progress-bar .progress-bar-warning -->
                                    </div><!-- /.progress .no-rounded -->

                                    <p class="font-600 m-b-5"> Daily Visits<span class="text-primary pull-right"><b>40%</b></span></p>
                                    <div class="progress  m-b-0">
                                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                        </div><!-- /.progress-bar .progress-bar-success -->
                                    </div><!-- /.progress .no-rounded -->
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->



                </div><!-- container -->


            </div> <!-- Page content Wrapper -->

        </div>
        <!-- content -->
@endsection