<?php

namespace App\Http\Controllers;

use App\Models\{
    Submission
};
use Illuminate\Http\Request;

class ExcessLiabilityController extends Controller
{
    public function index(Request $request)
    {
        // "ONEviewContextToken" => "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJQcmVRdW90ZUlkIjoiMzNiYjM1OWEtNmIwZC00NmVmLTkyMjYtMTA0ODY0YmM3YjNkIiwiTG9CIjoiWFNVTUIiLCJPcGVyYXRpbmdJbiI6WyJDTyIsIldJIiwiTkoiLCJUWCIsIldZIiwiR0EiLCJOQyIsIk9LIiwiS1MiLCJMQSIsIk5EIiwiQ1QiLCJGTCIsIkFLIiwiV0EiLCJORSIsIkhJIl0sIlN1YmFnZW5jeUNvZGUiOiJUZXN0IEFnZW5jeSIsIkFjdGl2ZUNoYW5uZWwiOiJCcm9rZXJXZWIiLCJJZCI6Ii96aGwyTUhQaXdJWmt5VWUyWGw1MldVdmhud1lQSkgxIiwiSXNzdWVyIjoiT05FdmlldyIsIkV4cGlyeSI6IjIwMjEtMDctMTZUMTg6MDY6NDYuNDk1MTE1NVoiLCJTY29wZSI6ImFjY2VzcyJ9.P1o3vQgz5wkcR9JvS5wUl_-4WTO1p8sLjv2w_etgmTwhML76yNkYE98FmWJ-eVqn6HcKiXGxiCbcbCSoqwEsTXoQclCzCRDuTIoSx7zpu4lkrJUOP1vRqIoXKEQmdo3XEf9wkekV4ebcr8cyTiJX7AJxGaaWdu48O66RD-4WJ6DCWze0Hh_jyECUWXMeyY-sqscXBCm6auXTBDYzk1MY2RUkEw8SQzJOp5XjazAw9vhT0pIhBrubtvYnlf-fI2Sc8cIKSdqN5IrZGoRVzXI4rEA_aDSTz219BU8AgabK-W07LQl4Y8-g2MNI_nNxuOVQAJCktk_PboOy476x206nzA",
        // "Response" => '{
        //     "version":"1",
        //     "performance":"...",
        //     "issuer":"ONEview",
        //     "scope":"access",
        //     "expiry":"2021-07-16 18:06:46.497",
        //     "lob":"XSUMB",
        //     "submissionId":"1231232281",
        //     "action":"Refer",
        //     "id":"/zhl2MHPiwIZkyUe2Xl52WUvhnwYPJH1",
        //     "operatingIn":["CO","WI","NJ","TX","WY","GA","NC","OK","KS","LA","ND","CT","FL","AK","WA","NE","HI"],
        //     "program":"200004"
        // }'

        $response = $request->get('Response');
        $response = json_decode($response);

        $view = ($response['action'] == "Refer" || $response['action'] == "Quote") 
            ? 'lob.el.success'
            : 'lob.el.decline';

        return view($view, [
            'response' => $response
        ]);
    }
}
