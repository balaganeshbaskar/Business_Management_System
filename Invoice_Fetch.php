<?php

    // require('session.php');
    require('connect.php');


    if(isset($_POST["cust_name"]))  
	{ 
        $data = [];
        $company = $_POST["cust_name"];

        $customer = $mysqli->query("SELECT * FROM customers where company = '$company'") or die($mysqli->error); 
        $per = $customer->fetch_assoc();

        $data += array('message' => $per['c_id']);

        if($customer)
        {            
            // $data += array('ctype' => $per['ctype']);
            // $data += array('salutation' => $per['salutation']);
            // $data += array('fname' => $per['fname']);
            // $data += array('lname' => $per['lname']);
            // $data += array('company' => $per['company']);
            // $data += array('dname' => $per['dname']);
            // $data += array('email' => $per['email']);
            // $data += array('mobile' => $per['mobile']);
            $billing_address = "";

            $taddr = explode("%",$per['baddress']);

            $billing_address = $billing_address.$taddr[0]."<br>".$taddr[1]."<br>".$taddr[2]."<br>".$per['bcity']."<br>";
            // $billing_address = $billing_address.$per['bstate']."<br>".$per['bcountry']."<br>";
            $billing_address = $billing_address.$per['bpincode']."<br>";

            $tmob = $per['mobile'];
            $mob = explode("+",$tmob);

            $mobile = "Phone:<br>";
            $c = 0;

            for($i=1; $i < count($mob); $i++)
            {
                $mobile = $mobile.$mob[$i]."<br>";
            }

            $billing_address = $billing_address.$mobile;

            $data += array('billing_addr' => $billing_address);

            // $data += array('vendorcode' => $per['vendorcode']);

            // $data += array('bankname' => $per['bankname']);
            // $data += array('accno' => $per['accno']);
            // $data += array('ifsc' => $per['ifsc']);
            // $data += array('branch' => $per['branch']);
            // $data += array('statecode' => $per['statecode']);
            // $data += array('gstno' => $per['gstno']);

            // $thsn = $per['hsn'];
            // $hsn = explode("+",$thsn);
            $data += array('hsn' => $per['hsn']);
            // if(count($hsn) == 2)
            // {
            //     $data += array('hsn1' => $hsn[1]);
            //     $data += array('hsn2' => '');
            //     $data += array('hsn3' => '');
            //     $data += array('hsn4' => '');
            //     $data += array('hsn5' => '');
            //     $data += array('hsn6' => '');
            // }
            // else if(count($hsn) == 3)
            // {
            //     $data += array('hsn1' => $hsn[1]);
            //     $data += array('hsn2' => $hsn[2]);
            //     $data += array('hsn3' => '');
            //     $data += array('hsn4' => '');
            //     $data += array('hsn5' => '');
            //     $data += array('hsn6' => '');
            // }
            // else if(count($hsn) == 4)
            // {
            //     $data += array('hsn1' => $hsn[1]);
            //     $data += array('hsn2' => $hsn[2]);
            //     $data += array('hsn3' => $hsn[3]);
            //     $data += array('hsn4' => '');
            //     $data += array('hsn5' => '');
            //     $data += array('hsn6' => '');
            // }
            // else if(count($hsn) == 5)
            // {
            //     $data += array('hsn1' => $hsn[1]);
            //     $data += array('hsn2' => $hsn[2]);
            //     $data += array('hsn3' => $hsn[3]);
            //     $data += array('hsn4' => $hsn[4]);
            //     $data += array('hsn5' => '');
            //     $data += array('hsn6' => '');
            // }
            // else if(count($hsn) == 6)
            // {
            //     $data += array('hsn1' => $hsn[1]);
            //     $data += array('hsn2' => $hsn[2]);
            //     $data += array('hsn3' => $hsn[3]);
            //     $data += array('hsn4' => $hsn[4]);
            //     $data += array('hsn5' => $hsn[5]);
            //     $data += array('hsn6' => '');
            // }
            // else if(count($hsn) == 7)
            // {
            //     $data += array('hsn1' => $hsn[1]);
            //     $data += array('hsn2' => $hsn[2]);
            //     $data += array('hsn3' => $hsn[3]);
            //     $data += array('hsn4' => $hsn[4]);
            //     $data += array('hsn5' => $hsn[5]);
            //     $data += array('hsn6' => $hsn[6]);
            // }


            $data += array('inv_gstrate' => $per['gstrate']);

            // $taddr = explode("%",$per['saddress']);
            // $data += array('saddr1' => $taddr[0]);
            // $data += array('saddr2' => $taddr[1]);
            // $data += array('saddr3' => $taddr[2]);
            // $data += array('scountry' => $per['scountry']);
            // $data += array('sstate' => $per['sstate']);
            // $data += array('scity' => $per['scity']);
            // $data += array('spincode' => $per['spincode']);
            // $data += array('sphone' => $per['sphone']);
            // $data += array('receivable' => $per['receivable']);

        }

        echo json_encode($data);  
	}
  
    

?>