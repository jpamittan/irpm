@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-briefcase"></i> Submissions</h1>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
                <a href="{{ route('dashboard.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
        </div>

        <div id="panel-advancedoptions">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-ctrls panel-ctrls-limit">
                            </div>
                        </div>
                        <div class="panel-body panel-no-padding">
                            <table id="example" class="table table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 120px;">ID</th>
                                        <th style="width: 80px;">Version</th>
                                        <th>Business Name</th>
                                        <th style="width: 200px;">Underwriter Name</th>
                                        <th style="width: 120px;">Outcome</th>
                                        <th style="width: 180px;">Date submission</th>
                                        <th style="width: 150px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>GigBOP1</td>
                                        <td>1</td>
                                        <td>Orbitfish Research and Technology Inc.</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #37bf8d;">Quote</b></td>
                                        <td>10-03-2020 06:52 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP2</td>
                                        <td>1</td>
                                        <td>Ell Lilly & Co</td>
                                        <td>Andrew Hill</td>
                                        <td><b style="color: #5394c9;">Refer</b></td>
                                        <td>9-12-2020 05:11 am</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>GigBOP3</td>
                                        <td>1</td>
                                        <td>Sanofi Aventis Medicine</td>
                                        <td>Jay Josselyn</td>
                                        <td><b style="color: #e36d4f;">Decline</b></td>
                                        <td>9-01-2020 03:30 pm</td>
                                        <td>
                                            <a href="{{ route('submissions.details') }}"><button class="btn btn-small btn-primary" style="width: 100%;">View</button></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <script src="{{ asset('plugins/form-daterangepicker/daterangepicker.js') }}"></script> <!-- Date Range Picker -->
	<script src="{{ asset('plugins/form-daterangepicker/moment.min.js') }}"></script> <!-- Moment.js for Date Range Picker -->
	<script src="{{ asset('plugins/easypiechart/jquery.easypiechart.js') }}"></script> <!-- EasyPieChart -->
	<script src="{{ asset('plugins/switchery/switchery.js') }}"></script> <!-- Switchery -->
	<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script> <!-- FullCalendar -->

	<!-- Charts -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.min.js') }}"></script> <!-- Flot Main File -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.stack.min.js') }}"></script> <!-- Flot Stacked Charts Plugin -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.orderBars.min.js') }}"></script> <!-- Flot Ordered Bars Plugin-->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.resize.min.js') }}"></script> <!-- Flot Responsive -->
	<script src="{{ asset('plugins/charts-flot/jquery.flot.tooltip.min.js') }}"></script> <!-- Flot Tooltips -->

	<!-- Maps -->
	<script src="{{ asset('plugins/jQuery-Mapael/js/raphael/raphael-min.js') }}"></script> <!-- Load Raphael as Dependency -->
	<script src="{{ asset('plugins/jQuery-Mapael/js/jquery.mapael.js') }}"></script> <!-- jQuery Mapael -->
	<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.min.js') }}"></script> <!-- MouseWheel Support -->
	<script src="{{ asset('plugins/jQuery-Mapael/js/maps/world_countries.js') }}"></script>
	<script src="{{ asset('plugins/jQuery-Mapael/js/maps/usa_states.js') }}"></script> <!-- Vector Data of USA States -->
   
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('demo/demo-datatables.js') }}"></script> <!-- Initialize scripts for this page-->

    <script>
        $(document).ready(function() {
            
        });
    </script>
@endpush
