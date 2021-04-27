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

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><b>Bank Name</b></label>
                                            <div class="col-sm-8" style="padding-top: 7px;">
                                                {{ $achDetails->BankName }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><b>Bank Address</b></label>
                                            <div class="col-sm-8" style="padding-top: 7px;">
                                                {{ $achDetails->BankStreetAddressLine1 }} 
                                                @if ($achDetails->BankStreetAddressLine2)
                                                    {{ $achDetails->BankStreetAddressLine2 }} 
                                                @endif
                                                {{ $achDetails->BankCity }}, 
                                                {{ $achDetails->BankState }}, 
                                                {{ $achDetails->BankZIP }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><b>Type of Account</b></label>
                                            <div class="col-sm-8" style="padding-top: 7px;">
                                                {{ $achDetails->AccountType }}
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
                                                <input type="password" class="form-control" name="routing_number" id="routing_number" maxlength="9" required>
                                                <small><i>(9 Numerical Digits)</i></small>
                                            </div>
                                            <label class="col-sm-2 reveal" field="routing_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Verify Routing Number</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="verify_routing_number" id="verify_routing_number" maxlength="9" required>
                                            </div>
                                            <label class="col-sm-2 reveal" field="verify_routing_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Account Number</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control alphaonly" name="account_number" id="account_number" required>
                                                <small><i>(Alpha only)</i></small>
                                            </div>
                                            <label class="col-sm-2 reveal" field="account_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Verify Account Number</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control alphaonly" name="verify_account_number" id="verify_account_number" required>
                                            </div>
                                            <label class="col-sm-2 reveal" field="verify_account_number" style="padding-top: 7px;">
                                                <i class="fas fa-eye"></i> Show
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Bank Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="bank_name" id="bank_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Bank Address</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="address_line_1" id="address_line_1"  placeholder="Address line 1" required>
                                                <input type="text" class="form-control" name="address_line_2" id="address_line_2"  placeholder="Address line 2">
                                                <input type="text" class="form-control" name="address_city" id="address_city"  placeholder="City" required>
                                                <input type="text" class="form-control typeahead us-states" name="address_state" id="address_state"  placeholder="State" required>
                                                <input type="text" class="form-control" name="address_zip" id="address_zip"  placeholder="Zip" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Type of Account</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="type_of_account" required>
                                                    <option value="" selected>Please select...</option>
                                                    <option value="Checking">Checking</option>
                                                    <option value="Savings">Savings</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="ach-msg-container" style="display: none;">
                                            <div class="form-group" style="border: 0; padding-top: 0;">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-6" id="ach-msg-label-routing-length"></div>
                                            </div>
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
    <script src="{{ asset('plugins/form-typeahead/typeahead.bundle.min.js') }}"></script> <!-- Typeahead for Autocomplete -->
    <script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script> <!-- Date Range Picker -->
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
            $("#routing_number").numeric();
            $("#verify_routing_number").numeric();
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
            $('.alphaonly').bind('keyup blur',function(){ 
                var node = $(this);
                node.val(node.val().replace(/[^a-z]/g,'') ); }
            );
            $(".alphaonly").on("keydown", function(event){
                var arr = [8,9,16,17,20,35,36,37,38,39,40,45,46];
                for(var i = 65; i <= 90; i++){
                    arr.push(i);
                }
                if(jQuery.inArray(event.which, arr) === -1){
                    event.preventDefault();
                }
            });
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substrRegex;
                    matches = [];
                    substrRegex = new RegExp(q, 'i');
                    $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push({ value: str });
                    }
                    });
                    cb(matches);
                };
            };
            var states = [
                'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
                'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
                'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
                'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
                'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
                'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
                'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
                'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
                'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
            ];
            
            $('.us-states').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'states',
                displayKey: 'value',
                source: substringMatcher(states)
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
            if (routing_number) {
                if (routing_number.length < 9) {
                    $("#ach-msg-label-routing-length").html("<span class='text-danger'><i class='fa fa-fw fa-times'></i> Routing number should be 9 digits.</span>");
                    achRoutingBln = false;
                } else {
                    $("#ach-msg-label-routing-length").html("<span class='text-success'><i class='fas fa-check'></i> Routing number 9 digit passed.</span>");
                    achRoutingBln = true;
                }
            }
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
            if (!routing_number) {
                $("#ach-msg-label-routing-length").html("");
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
