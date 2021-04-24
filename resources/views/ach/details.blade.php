@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-user-tie"></i> Agent Details</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('ach.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
            <div id="ach-msg" style="padding: 10px;"></div>
            <div class="col-md-12">
                <div class="panel panel-profile">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-userinfo">
                                    <table class="table table-condensed" style="margin: 0;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 120px;"><b>Name: </b></td>
                                                <td><span class="text-primary">{{ $brokerAgent->AgentName }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>NIPR: </b></td>
                                                <td><span class="text-primary">{{ $brokerAgent->NIPR ?? "N/A" }}</span></td>
                                            </tr>
                                            <tr>
                                                <td><b>FEIN: </b></td>
                                                <td><span class="text-primary">{{ $brokerAgent->FEIN ?? "N/A" }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="agent-allstates" style="margin-top: 10px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2><i class="fas fa-flag-usa"></i> All States</h2>
                                        </div>
                                        <div class="panel-body panel-no-padding">
                                            <table id="agentAllStates" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Appointed State Code</th>
                                                        <th>Is Residential</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($brokerAgent->allStates as $state)
                                                        <tr>
                                                            <td>{{ $state->AppointedStateCode }}</td>
                                                            <td>{{ $state->IsResidential }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="agent-contacts" style="margin-top: 10x;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2><i class="fas fa-phone"></i> Contacts</h2>
                                        </div>
                                        <div class="panel-body panel-no-padding">
                                            <table id="agentContacts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Contact Type</th>
                                                        <th>Contact Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Postal Address</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($brokerAgent->contacts as $contact)
                                                        <tr>
                                                            <td>{{ $contact->ContactType }}</td>
                                                            <td>{{ $contact->ContactName }}</td>
                                                            <td>{{ $contact->PhoneNumber }}</td>
                                                            <td>{{ $contact->EmailAddress }}</td>
                                                            <td>{{ $contact->PostalAddress }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="panel-advancedoptions">
                            <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                                <div id="ach-details" class="form-horizontal row-border">
                                    <div class="panel-heading">
                                        <h2><i class="fas fa-university"></i> Automated Clearing House</h2>
                                        <span style="float: right;"><a id="edit-ach" href="#">[Edit]</a></span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><b>Routing Number</b></label>
                                            <div class="col-sm-8" style="padding-top: 7px;">
                                                {{ $AgentRoutingNumber }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><b>Account Number</b></label>
                                            <div class="col-sm-8" style="padding-top: 7px;">
                                                {{ $AccountNumber }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form id="ach-frm" action="{{ route('ach.update', ['entityId' => $brokerAgent->EntityId]) }}" class="form-horizontal row-border" method="post" style="display: none;">
                                    @csrf
                                    <div class="panel-heading">
                                        <h2><i class="fas fa-university"></i> Automated Clearing House</h2>
                                        <span style="float: right;"><a id="cancel-ach" href="#">[Cancel]</a></span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Routing Number</label>
                                            <div class="col-sm-6">
                                                <input type="hidden" class="form-control" name="agent_name" id="agent_name" value="{{ $brokerAgent->AgentName }}" required>
                                                <input type="password" class="form-control" name="routing_number" id="routing_number" required>
                                            </div>
                                            <label class="col-sm-2 reveal" field="routing_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Verify Routing Number</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="verify_routing_number" id="verify_routing_number" required>
                                            </div>
                                            <label class="col-sm-2 reveal" field="verify_routing_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Account Number</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="account_number" id="account_number" required>
                                            </div>
                                            <label class="col-sm-2 reveal" field="account_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Verify Account Number</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="verify_account_number" id="verify_account_number" required>
                                            </div>
                                            <label class="col-sm-2 reveal" field="verify_account_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div id="ach-msg-container" style="display: none;">
                                            <div class="form-group" style="border: 0; padding-top: 0;">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-6" id="ach-msg-label-routing"></div>
                                            </div>
                                            <div class="form-group" style="border: 0; padding-top: 0;">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-6" id="ach-msg-label-account"></div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-primary btn" id="update-ach-btn"><i class="fas fa-save"></i> Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
<script>
        $(document).ready(function() {
            var updateAchBln = true;
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const save = urlParams.get('save');
            if (save === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; Automated Clearing House (ACH) udpated successfully.');
            } else if (save === "0") {
                setNotif('danger', '<i class="fa fa-fw fa-times"></i>&nbsp; An error has occured. Please try again.');
            }
            $("#routing_number, #verify_routing_number, #account_number, #verify_account_number").keyup(checkACHMatch);
            $(".reveal").click(function() {
                let field = $(this).attr("field");
                if ($(`#${field}`).attr("type") == "password") {
                    $(`#${field}`).attr("type", "text");
                    $(this).html('<i class="fas fa-eye-slash"></i> Hide')
                } else {
                    $(`#${field}`).attr("type", "password");
                    $(this).html('<i class="fas fa-eye"></i> Show')
                }
            });
            $("#edit-ach").click(function() {
                $("#ach-details").hide();
                $("#ach-frm").show();
            });
            $("#cancel-ach").click(function() {
                $("#ach-details").show();
                $("#ach-frm").hide();
            });
        });
        function setNotif(type, msg) {
            $('#ach-msg').html(
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
        function checkACHMatch() {
            var achRoutingBln = false;
            var achAccountBln = false;
            var routing_number = $("#routing_number").val();
            var verify_routing_number = $("#verify_routing_number").val();
            var account_number = $("#account_number").val();
            var verify_account_number = $("#verify_account_number").val();
            $('#ach-msg-container').show();
            if (routing_number && verify_routing_number) {
                if (routing_number != verify_routing_number) {
                    $("#ach-msg-label-routing").html("<span class='text-danger'><i class='fa fa-fw fa-times'></i> Routing number do not match!</span>");
                    achRoutingBln = false;
                } else {
                    $("#ach-msg-label-routing").html("<span class='text-success'><i class='fas fa-check'></i> Routing number match.</span>");
                    achRoutingBln = true;
                }
            }
            if (account_number && verify_account_number) {
                if (account_number != verify_account_number) {
                    $("#ach-msg-label-account").html("<span class='text-danger'><i class='fa fa-fw fa-times'></i> Account number do not match!</span>");
                    achAccountBln = false;
                } else {
                    $("#ach-msg-label-account").html("<span class='text-success'><i class='fas fa-check'></i> Account number match.</span>");
                    achAccountBln = true;
                }
            }
            if (!routing_number || !verify_routing_number) {
                $("#ach-msg-label-routing").html("");
            }
            if (!account_number || !verify_account_number) {
                $("#ach-msg-label-account").html("");
            }
            if (achRoutingBln && achAccountBln) {
                $('#update-ach-btn').prop('disabled', false);
            } else {
                $('#update-ach-btn').prop('disabled', true);
            }
        }
    </script>
@endpush
