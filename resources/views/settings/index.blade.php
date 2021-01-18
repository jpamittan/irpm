@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h1><i class="fas fa-cogs"></i> Account Settings</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-12" style="padding: 0px 20px 20px 20px;">
                    <a href="{{ route('dashboard.index') }}"><button class="btn btn-small btn-light"><i class="fa fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
            <div id="user-msg" style="padding: 10px;"></div>
            <div class="col-md-12">
                <div id="panel-advancedoptions">
                    <div class="panel panel-default" data-widget-editbutton="false" id="p1">
                        <form action="{{ route('settings.save', ['user' => $user->id]) }}" class="form-horizontal row-border" method="post">
                            @csrf
                            <div class="panel-heading">
                                <h2>Account Settings Configuration</h2>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        <i class="fas fa-database"></i> Environment Connection
                                    </label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="db_connection" required>
                                            @foreach ($environments as $key => $value)
                                                @if ($key == $user->db_connection)
                                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn-primary btn"><i class="fas fa-save"></i> Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const save = urlParams.get('save');
            if (save === "1") {
                setNotif('success', '<i class="fas fa-check"></i>&nbsp; Account settings udpated successfully.');
            } else if (save === "0") {
                setNotif('danger', '<i class="fa fa-fw fa-times"></i>&nbsp; An error has occured. Please try again.');
            }
        });
        function setNotif(type, msg) {
            $('#user-msg').html(
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
    </script>
@endpush
