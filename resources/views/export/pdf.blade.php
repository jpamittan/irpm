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
        #submissionTbl {
            margin-top: 10px;
            border: 1px solid #000000;
        }
        #submissionTbl td {
            padding: 5px;
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
                    <td colspan=3></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>