<?php

    // require('session.php');
    require('connect.php');


    if(isset($_POST["C_ID"]))  
	{ 
        $data = [];
        $c_id = $_POST["C_ID"];

        $customers = $mysqli->query("SELECT * FROM customers where c_id = '$c_id'") or die($mysqli->error); 
        $per = $customers->fetch_assoc();

        if($customers)
        {            
            $data += array('ctype' => $per['ctype']);
            $data += array('salutation' => $per['salutation']);
            $data += array('fname' => $per['fname']);
            $data += array('lname' => $per['lname']);
            $data += array('company' => $per['company']);
            $data += array('dname' => $per['dname']);
            $data += array('email' => $per['email']);
            // $data += array('mobile' => $per['mobile']);

            $tmob = $per['mobile'];
            $mob = explode("+",$tmob);

            // for($j=0; $j <count($mob); $j++)
            // {
            //     if($mob[$j] == '')
            //     {

            //     }
            // }
            if(count($mob) == 2)
            {
                $data += array('mobile1' => $mob[1]);
                $data += array('mobile2' => '');
                $data += array('mobile3' => '');
            }
            else if(count($mob) == 3)
            {
                $data += array('mobile1' => $mob[1]);
                $data += array('mobile2' => $mob[2]);
                $data += array('mobile3' => '');
            }
            else if(count($mob) == 4)
            {
                $data += array('mobile1' => $mob[1]);
                $data += array('mobile2' => $mob[2]);
                $data += array('mobile3' => $mob[3]);
            }

            $data += array('vendorcode' => $per['vendorcode']);

            $data += array('bankname' => $per['bankname']);
            $data += array('accno' => $per['accno']);
            $data += array('ifsc' => $per['ifsc']);
            $data += array('branch' => $per['branch']);
            $data += array('statecode' => $per['statecode']);
            $data += array('gstno' => $per['gstno']);

            $thsn = $per['hsn'];
            $hsn = explode("+",$thsn);

            if(count($hsn) == 2)
            {
                $data += array('hsn1' => $hsn[1]);
                $data += array('hsn2' => '');
                $data += array('hsn3' => '');
                $data += array('hsn4' => '');
                $data += array('hsn5' => '');
                $data += array('hsn6' => '');
            }
            else if(count($hsn) == 3)
            {
                $data += array('hsn1' => $hsn[1]);
                $data += array('hsn2' => $hsn[2]);
                $data += array('hsn3' => '');
                $data += array('hsn4' => '');
                $data += array('hsn5' => '');
                $data += array('hsn6' => '');
            }
            else if(count($hsn) == 4)
            {
                $data += array('hsn1' => $hsn[1]);
                $data += array('hsn2' => $hsn[2]);
                $data += array('hsn3' => $hsn[3]);
                $data += array('hsn4' => '');
                $data += array('hsn5' => '');
                $data += array('hsn6' => '');
            }
            else if(count($hsn) == 5)
            {
                $data += array('hsn1' => $hsn[1]);
                $data += array('hsn2' => $hsn[2]);
                $data += array('hsn3' => $hsn[3]);
                $data += array('hsn4' => $hsn[4]);
                $data += array('hsn5' => '');
                $data += array('hsn6' => '');
            }
            else if(count($hsn) == 6)
            {
                $data += array('hsn1' => $hsn[1]);
                $data += array('hsn2' => $hsn[2]);
                $data += array('hsn3' => $hsn[3]);
                $data += array('hsn4' => $hsn[4]);
                $data += array('hsn5' => $hsn[5]);
                $data += array('hsn6' => '');
            }
            else if(count($hsn) == 7)
            {
                $data += array('hsn1' => $hsn[1]);
                $data += array('hsn2' => $hsn[2]);
                $data += array('hsn3' => $hsn[3]);
                $data += array('hsn4' => $hsn[4]);
                $data += array('hsn5' => $hsn[5]);
                $data += array('hsn6' => $hsn[6]);
            }


            $data += array('gstrate' => $per['gstrate']);

            $taddr = explode("%",$per['baddress']);
            $data += array('baddr1' => $taddr[0]);
            $data += array('baddr2' => $taddr[1]);
            $data += array('baddr3' => $taddr[2]);
            $data += array('bcountry' => $per['bcountry']);
            $data += array('bstate' => $per['bstate']);
            $data += array('bcity' => $per['bcity']);
            $data += array('bpincode' => $per['bpincode']);
            $data += array('bphone' => $per['bphone']);

            $taddr = explode("%",$per['saddress']);
            $data += array('saddr1' => $taddr[0]);
            $data += array('saddr2' => $taddr[1]);
            $data += array('saddr3' => $taddr[2]);
            $data += array('scountry' => $per['scountry']);
            $data += array('sstate' => $per['sstate']);
            $data += array('scity' => $per['scity']);
            $data += array('spincode' => $per['spincode']);
            $data += array('sphone' => $per['sphone']);
            $data += array('receivable' => $per['receivable']);

        }

        echo json_encode($data);  
	}
  
    

?>