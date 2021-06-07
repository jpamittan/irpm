@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fa fa-briefcase"></i> Submission Review</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('submissions.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
                    <a href="{{ route('export.pdf', ['submissionId' => $submission->id]) }}" target="_blank" style="float: right;">
                        <button class="btn btn-small btn-danger"><i class="fas fa-file-pdf"></i> PDF</button>
                    </a>
                </div>
            </div>
            <div id="submission-msg" style="padding: 10px;"></div>
            <div class="col-md-12">
                <div class="panel panel-profile">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-responsive table-userinfo">
                                    <table class="table table-condensed" style="margin: 0;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 120px;"><b>Submission ID: </b></td>
                                                <td><span class="text-primary">{{ $submission->submission_id }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Version: </b></td>
                                                <td><span class="text-primary">{{ $submission->version }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Insured: </b></td>
                                                <td><span class="text-primary">{{ $submission->business_name ?? "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Program: </b></td>
                                                <td><span class="text-primary">{{ $submission->line_of_business ??  "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Score: </b></td>
                                                <td><span class="text-primary">{{ $totalScore ??  "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>Average Score: </b></td>
                                                <td><span class="text-primary">{{ $averageScore ??  "N/A" }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="options" style="text-align: right;">
                                    @if($lob == "sqlsrv_exl")
                                        <div class="btn-toolbar" style="display: inline-block;">
                                            <form 
                                                id="frm-worksheet"
                                                action="https://uat-el.synchronosure.com/api/api/redirect/policy?submissionId={{ $submission->submission_id }}" 
                                                method="post" 
                                                target="worksheet_iframe"
                                            >
                                                <input type="hidden" name="ONEviewContextToken" value="{{ $ONEviewContextToken }}" />
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-file-alt"></i> Worksheet
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    <div class="btn-toolbar" style="display: inline-block;">
                                        <a href="#apiLogsModal" id="apiLogsLink" data-toggle="modal" class="btn btn-default" data-backdrop="static" data-keyboard="false">
                                            <i class="fas fa-clipboard-list"></i> API Logs
                                        </a>
                                    </div>
                                    <div class="btn-toolbar" style="display: inline-block;">
                                        <a href="{{ route('mods.index', ['submissionId' => $submission->id]) }}" class="btn btn-default"><i class="fa fa-fw fa-cog"></i> Mods</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="outsider">
                        <div id="iframe-loader" class="text-center" style="margin-top: 20px; margin-bottom: 20px; display: none;">
                            <i class="fa fa-spinner fa-spin"></i> 
                            <br>
                            Loading. Please wait...
                        </div>
                        <iframe 
                            id="worksheet_iframe" 
                            name="worksheet_iframe" 
                            src="#" 
                            style="width:100%;height:800px;border:1px solid #999999;display: none;"
                        >
                        </iframe>
                        <div id="panel-attachments">
                            <div class="panel panel-default">
                                <form 
                                    id="frm-gen-attachments"
                                    action="{{ 
                                        route('submissions.upload', [
                                            'lob' => $submission->line_of_business, 
                                            'id' => $submission->id,
                                            'submissionId' => $submission->submission_id, 
                                            'version' => $submission->version
                                        ]) 
                                    }}" 
                                    class="form-horizontal row-border" 
                                    method="post" 
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="panel-heading">
                                        <h2><i class="fas fa-paperclip"></i> General Attachments</h2>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group" style="padding-bottom: 0;">
                                            <label class="col-sm-2 control-label">Attachment:</label>
                                            <div class="col-sm-8" style="padding-top: 5px;">
                                                <input type="file" id="attachment" name="attachment">
                                                <small><i>(25mb filesize limit)</i></small>
                                                <div id="upload-err" style="color: #e64433;"></div>
                                                <button type="submit" id="btn-attach" class="btn-primary btn" style="margin-top: 10px;">
                                                    Attach
                                                </button>
                                            </div>
                                        </div>
                                        @if(count($attachments))
                                            <div class="form-group" style="padding-top: 0; padding-bottom: 0; margin-top: 10px;">
                                                <div class="col-sm-12" style="padding-top: 5px;">
                                                    @foreach($attachments as $attachment)
                                                        <a href="{{ $attachment->url }}" download="{{ $attachment->file_name }}">
                                                            <i class="fas fa-paperclip"></i> 
                                                            {{ $attachment->file_name }}
                                                            <small>({{ $attachment->file_size }})</small>
                                                        </a>
                                                        &nbsp;
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="panel-api-score-logs">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2><i class="fas fa-hashtag"></i> API score logs</h2>
                                            <div class="panel-ctrls">
                                            </div>
                                        </div>
                                        <div class="panel-body panel-no-padding">
                                            <table id="apiScoreLogs" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>API Key</th>
                                                        <th>Score</th>
                                                        <th>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($submissionAPILogs as $log)
                                                        @if ($log->answer_value)
                                                            <tr>
                                                                <td style="overflow-wrap: break-word;">{{ $log->question_text }}</td>
                                                                <td style="overflow-wrap: break-word;">{{ $log->answer_value }}</td>
                                                                <td style="overflow-wrap: break-word;">{{ $log->answer_text }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="panel-advancedoptions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2><i class="fas fa-question-circle"></i> Question & Answer</h2>
                                            <div class="panel-ctrls">
                                            </div>
                                        </div>
                                        <div class="panel-body panel-no-padding">
                                            <table id="submissionDetails" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 120px;">Question No</th>
                                                        <th>Question Description</th>
                                                        <th style="width: 400px;">Answer</th>
                                                        <th style="width: 80px;">Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($submissionReviews as $review)
                                                        <tr>
                                                            <td>{{ $review->question_id }}</td>
                                                            <td>{{ $review->question_text }}</td>
                                                            <td>{{ $review->answer_text }}</td>
                                                            <td>{{ $review->answer_value }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="apiLogsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:90%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fas fa-clipboard-list"></i> API Logs</h4>
                    </div>
                    <div class="modal-body">
                        <table id="submissionAPILogs" class="table table-striped table-bordered" cellspacing="0" width="100%" style="table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th style="overflow-wrap: break-word;">API Endpoint</th>
                                    <th style="overflow-wrap: break-word;">Score</th>
                                    <th style="overflow-wrap: break-word;">Response</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($submissionAPILogs as $log)
                                    <tr>
                                        <td style="overflow-wrap: break-word;">{{ $log->question_text }}</td>
                                        <td style="overflow-wrap: break-word;">{{ $log->answer_value }}</td>
                                        <td style="overflow-wrap: break-word;">{{ $log->answer_text }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <!-- Switchery -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#submissionDetails').dataTable({
                language: {
                    lengthMenu: "_MENU_",
                    searchPlaceholder: "Search..."
                },
                iDisplayLength: 20,
                paging: false,
                ordering: false,
                // "order": [[ 3, "desc" ]]
            });
            $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
            $('.panel-ctrls').append("<i class='separator'></i>");
            $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");
            $('.panel-footer').append($(".dataTable+.row"));
            $('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
            $('#apiLogsLink').click(function() {
                $('#submissionAPILogs').dataTable({
                    language: {
                        lengthMenu: "_MENU_",
                        searchPlaceholder: "Search..."
                    },
                    paging: false,
                    ordering: false
                });
                $('#submissionAPILogs_filter').addClass("pull-right");
            });
            $('#apiLogsModal').on('hidden.bs.modal', function() {
                $('#submissionAPILogs').dataTable().fnDestroy();
            });
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const save = urlParams.get('save');
            if (save === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; New submission version created successfully.');
            }
            if (save === "0") {
                setNotif('danger', '<i class="fa fa-fw fa-times"></i>&nbsp; An error has occured. Please try again.');
            }
            var isWorksheetOn = false;
            $("#frm-worksheet").submit(function(e) {
                $('#panel-advancedoptions').toggle();
                $('#panel-attachments').toggle();
                $('#panel-api-score-logs').toggle();
                isWorksheetOn = !isWorksheetOn;
                if (!isWorksheetOn) {
                    e.preventDefault();
                    $('#worksheet_iframe').hide();
                } else {
                    $('#iframe-loader').show();
                    setTimeout(() => {
                        $('#iframe-loader').hide();
                        $('#worksheet_iframe').show();
                    }, 20000);
                }
            });
            $('#attachment').on('change', function(evt) {
                if (exceedsFileSize(this.files[0].size)) {
                    $('#btn-attach').prop("disabled", true);
                    $('#upload-err').html("File size exceeds limit.");
                } else {
                    $('#btn-attach').prop("disabled", false);
                    $('#upload-err').html("");
                }
            });
            $("#frm-gen-attachments").submit(function(e) {
                if (!$('#attachment').val()) {
                    e.preventDefault();
                } else {
                    if (!confirm('Are you sure you want to attach the file?')) {
                        e.preventDefault();
                    }
                }
            });
        });
        function setNotif(type, msg) {
            $('#submission-msg').html(
                '<div class="row">'+
                    '<div class="col-md-12" style="margin-bottom: 20px;">'+
                        '<div class="form-group">'+
                            '<div class="col-xs-12" style="padding: 0;">'+
                                '<div class="alert alert-dismissable alert-'+type+'" style="margin: 0;">'+
                                    msg +
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
            );
        }
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
        function exceedsFileSize(size) {
            var FileSize = size / 1024 / 1024; // in MB
            return (FileSize > 25);
        }
    </script>
@endpush
