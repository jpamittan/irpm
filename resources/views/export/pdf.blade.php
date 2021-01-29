<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{ $submission->submission_id }}-{{ $submission->version }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .page-break {
            page-break-after: always;
        }
        table {
            font-size: 9px;
            width: 100%;
            border-collapse: collapse !important;
        }
        .header-banner {
            font-size: 10px;
        }
        .logo-label {
            color: #1441a7;
        }
        #doc-title {
            text-align: center;
            padding: 10px;
            border: 1px solid #000000;
            font-size: 12px;
            background-color: #0AD2B0;
            font-weight: bold;
        }
        #submissionTbl, 
        #submissionModTbl,
        #submissionQuestionTbl,
        #submissionApiLogsTbl {
            margin-top: 10px;
            border: 1px solid #000000;
        }
        #submissionModTbl th, 
        #submissionQuestionTbl th,
        #submissionApiLogsTbl th {
            border: 1px solid #000000;
            background-color: #c6c6c6;
        }
        #submissionTbl td, 
        #submissionModTbl th, 
        #submissionQuestionTbl th,
        #submissionApiLogsTbl th,
        #submissionModTbl td,
        #submissionQuestionTbl td,
        #submissionApiLogsTbl td {
            padding: 5px;
            border-bottom: 1px solid #000000;
        }
        #submissionApiLogsTbl td {
            font-size: 8px;
        }
    </style>
</head>
<body>
    <div>
        <div id="header">
            <center>
                <img src="./img/synchronosure_blue_trans_logo.png" style="width: 300px;" />
                <p class="logo-label">
                    Insurance-As-A-Service
                </p>
                <p class="header-banner">
                    Phone: 888 389 0439
                    <br>
                    8521 Six Forks Road, Suite 105, Raleigh NC 27615, United States
                    <br>
                    <u>https://www.synchronosure.com</u>
                </p>
            </center>
        </div>
        <div>
            <table id="submissionTbl">
                <tr>
                    <td colspan=4 style="padding: 0;">
                        <div id="doc-title">
                            Individual Risk Premium Modification Worksheet
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;"><b>Submission ID:</b></td>
                    <td>{{ $submission->submission_id }}</td>
                    <td style="width: 50px;"><b>Version:</b></td>
                    <td style="width: 50px;">{{ $submission->version }}</td>
                </tr>
                <tr>
                    <td><b>Insured:</b></td>
                    <td>{{ $submission->business_name }}</td>
                    <td><b>Program:</b></td>
                    <td>{{ $submission->line_of_business }}</td>
                </tr>
                <tr>
                    <td><b>Underwriter Name:</b></td>
                    <td colspan=3>{{ $underWriter->full_name ?? "N/A" }}</td>
                </tr>
            </table>
            <h5>Risk Characteristics</h5>
            <table id="submissionModTbl">
                <tr>
                    <th style="text-align: left;">MODS</th>
                    <th>RANGE OF USED</th>
                    <th>MODS</th>
                    <th>COMMENTS</th>
                </tr>
                <tr>
                    <td>
                        <b>A. Location</b>
                        <br>
                        <small>Premises organization, housekeeping, yard protection</small>
                    </td>
                    <td style="text-align: center;">(Min) 0.90 - 1.10 (Max)</td>
                    <td style="text-align: center;"><u>{{ $submissionMod->location_outcome }}</u></td>
                    <td style="text-align: center;">{{ $submissionMod->comments_in_location }}</td>
                </tr>
                <tr>
                    <td>
                        <b>B. Premises</b>
                        <br>
                        <small>Cooperation in matters of safeguarding and proper handling of property covered</small>
                    </td>
                    <td style="text-align: center;">(Min) 0.90 - 1.10 (Max)</td>
                    <td style="text-align: center;"><u>{{ $submissionMod->premises_equipment_outcome }}</u></td>
                    <td style="text-align: center;">{{ $submissionMod->comments_premises_equipment }}</td>
                </tr>
                <tr>
                    <td>
                        <b>C. Equipment</b>
                        <br>
                        <small>Age, condition, scheduled maintenance</small>
                    </td>
                    <td style="text-align: center;">(Min) 0.90 - 1.10 (Max)</td>
                    <td style="text-align: center;"><u>{{ $submissionMod->building_features_outcome }}</u></td>
                    <td style="text-align: center;">{{ $submissionMod->comments_building_features }}</td>
                </tr>
                <tr>
                    <td>
                        <b>D. Classification</b>
                        <br>
                        <small>Age, condition, and unusual structural features</small>
                    </td>
                    <td style="text-align: center;">(Min) 0.90 - 1.10 (Max)</td>
                    <td style="text-align: center;"><u>{{ $submissionMod->management_outcome }}</u></td>
                    <td style="text-align: center;">{{ $submissionMod->comments_in_management }}</td>
                </tr>
                <tr>
                    <td>
                        <b>E. Employees</b>
                        <br>
                        <small>Selection, training, supervision and experience</small>
                    </td>
                    <td style="text-align: center;">(Min) 0.94 - 1.06 (Max)</td>
                    <td style="text-align: center;"><u>{{ $submissionMod->employees_outcome }}</u></td>
                    <td style="text-align: center;">{{ $submissionMod->comments_employees }}</td>
                </tr>
                <tr>
                    <td>
                        <b>F. Cooperation</b>
                        <br>
                        <small>Care, condition, and type</small>
                    </td>
                    <td style="text-align: center;">(Min) 0.96 - 1.04 (Max)</td>
                    <td style="text-align: center;"><u>{{ $submissionMod->protection_outcome }}</u></td>
                    <td style="text-align: center;">{{ $submissionMod->comments_protection }}</td>
                </tr>
            </table>
            <h5>Question List</h5>
            <table id="submissionQuestionTbl">
                <tr>
                    <th>No</th>
                    <th>Question Description</th>
                    <th>Answer</th>
                    <th>Score</th>
                </tr>
                @foreach($submissionReviews as $review)
                    <tr>
                        <td>{{ $review->question_id }}</td>
                        <td>{{ $review->question_text }}</td>
                        <td>{{ $review->answer_text }}</td>
                        <td>{{ $review->answer_value }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="page-break">
                <h5>API Logs</h5>
                <table id="submissionApiLogsTbl" cellspacing="0" width="100%" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="overflow-wrap: break-word;">API Endpoint</th>
                            <th style="overflow-wrap: break-word;">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submissionAPILogs as $log)
                            <tr>
                                <td style="overflow-wrap: break-word;">{{ $log->question_text }}</td>
                                <td style="overflow-wrap: break-word;">{{ $log->answer_text }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <div>
        </div>
    </div>
</body>
</html>