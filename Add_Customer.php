<?php

    // require('session.php');
    require('connect.php');

    // CUSTOMER DETAILS
    $ctype = '';
    $salutation = '';
    $fname = '';
    $lname = '';
    $company = '';
    $dname = '';
    $email = '';
    $mobile = '';
    $vendorcode = '';

    // BANK & GST
    $bankname = '';
    $accno = '';
    $ifsc = '';
    $branch = '';
    $statecode = '';
    $gstno = '';
    $hsn = '';
    $hsn_code = '';
    $gstrate = '';

    // BILLING ADDRESS
    $baddr1 = '';
    $baddr2 = '';
    $baddr3 = '';
    $baddress = "";
    $bcountry = '';
    $bstate = '';
    $bcity = '';
    $bpincode = '';
    $bphone = '';

    // SHIPPING ADDRESS
    $saddr1 = '';
    $saddr2 = '';
    $saddr3 = '';
    $saddress = "";
    $scountry = '';
    $sstate = '';
    $scity = '';
    $spincode = '';
    $sphone = '';
    $receivable = 0;

    if(isset($_POST['cust_submit']))
    {      
        echo "1 <br>";
        // CUSTOMER DETAILS
        $ctype = $_POST['ctype'];
        $salutation = $_POST['salutation'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $company = $_POST['company'];
        $dname = $_POST['dname'];
        $email = $_POST['email'];
        $mob = $_POST['mobile'];
        for($i=0; $i<count($mob);$i++)
        {
            // echo $mob[$i]."<br>";
            $mobile = $mobile."+".$mob[$i];
        }

        $vendorcode = $_POST['vendorcode'];

        // BANK & GST
        $bankname = $_POST['bankname'];
        $accno = $_POST['accno'];
        $ifsc = $_POST['ifsc'];
        $branch = $_POST['branch'];
        $statecode = $_POST['statecode'];
        $gstno = $_POST['gstno'];
        $hsn_code = $_POST['hsn'];
        for($i=0; $i<count($hsn_code);$i++)
        {
            // echo $mob[$i]."<br>";
            $hsn = $hsn."+".$hsn_code[$i];
        }

        $gstrate = $_POST['gstrate'];
        $receivable = $_POST['receivable'];

        // BILLING ADDRESS
        $baddr1 = $_POST['baddr1'];
        $baddr2 = $_POST['baddr2'];
        $baddr3 = $_POST['baddr3'];
        $baddress = $baddr1."%".$baddr2."%".$baddr3;
        $bcountry = $_POST['bcountry'];
        $bstate = $_POST['bstate'];
        $bcity = $_POST['bcity'];
        $bpincode = $_POST['bpincode'];
        $bphone = $_POST['bphone'];

        // SHIPPING ADDRESS
        $saddr1 = $_POST['saddr1'];
        $saddr2 = $_POST['saddr2'];
        $saddr3 = $_POST['saddr3'];
        $saddress = $saddr1."%".$saddr2."%".$saddr3;
        $scountry = $_POST['scountry'];
        $sstate = $_POST['sstate'];
        $scity = $_POST['scity'];
        $spincode = $_POST['spincode'];
        $sphone = $_POST['sphone'];

        echo "2 <br>";

        // console.log($ctype,  $bankname, $baddr1, $saddr1);
        // echo $ctype,  $bankname, $baddr1, $saddr1;

        // echo $mobile."<br>";

        echo "2a <br>";

        $mysqli->query("SET AUTOCOMMIT=0");

        echo "2b <br>";

		$mysqli->query("START TRANSACTION");

        echo "3 <br>";


        // $customercheck = 0;
        $customercheck = $mysqli->query("INSERT INTO customers (ctype, salutation, fname, lname, company, dname, email, mobile, vendorcode, bankname, accno, ifsc, branch, statecode, gstno, hsn, gstrate, baddress, bcountry, bstate, bcity, bpincode, bphone, saddress, scountry, sstate, scity, spincode, sphone, receivable) VALUES ('$ctype', '$salutation', '$fname', '$lname', '$company', '$dname', '$email', '$mobile', '$vendorcode', '$bankname', '$accno', '$ifsc', '$branch', '$statecode', '$gstno', '$hsn', '$gstrate', '$baddress','$bcountry', '$bstate', '$bcity', '$bpincode', '$bphone', '$saddress', '$scountry', '$sstate', '$scity', '$spincode', '$sphone', '$receivable')");
        
        // $customercheck = $mysqli->query("INSERT INTO customers (ctype, salutation, fname, lname, company, dname, email, mobile, vendorcode, bankname, accno, ifsc, branch, statecode, gstno, hsn, gstrate, baddress, bcountry, bstate, bcity, bpincode, bphone, saddress, scountry, sstate, scity, spincode, sphone) VALUES ('$ctype', '$salutation', '$fname', '$lname', '$company', '$dname', '$email', '$mobile', '$vendorcode', '$bankname', '$accno', `$ifsc', '$branch', '$statecode', '$gstno', '$hsn', '$gstrate', '$baddress','$bcountry', '$bstate', '$bcity', '$bpincode', '$bphone', '$saddress', '$scountry', '$sstate', '$scity', '$spincode', '$sphone')");

        echo "4 <br>";
        // echo "Customercheck: ".$customercheck."<br>";
        if($customercheck)
        {
            $mysqli->query("COMMIT");
            echo "Successfully Added Customer!<br>";

            // $_SESSION['message'] = "New Customer Added Successfully!";
            // $_SESSION['msg_type'] = "success";

        }
        else
        {
            $mysqli->query("ROLLBACK");
            echo "Could not Add Customer! Try again...<br>";

            // $_SESSION['message'] = "New Customer could not be Added! Try Again...";
            // $_SESSION['msg_type'] = "danger";
        }

        echo "5 <br>";

        header("location: index.php");

    }

    else if(isset($_POST['cust_update']))
    { 

        $data = [];
        $ser_data = $_POST["cust_update"];

        $pairs = explode("&",$ser_data);
        $count = 0;
        $mobile = '';

        $counth = 0;
        $hsn = '';
        for ($i = 0; $i < count($pairs); $i++)
        {
            $keyValuePair = explode("=",$pairs[$i]);
            $key = urldecode($keyValuePair[0]);
            $value = (count($keyValuePair) > 1) ? urldecode($keyValuePair[1]) : 'undefined';
            
            if($key == 'mobile[]')
            {
                $count = $count + 1;
                // $key = "mobile_".$count;
                $mobile = $mobile."+".$value;
            }
            else
            {
                $data += array($key => $value);
            }

            if($key == 'hsn[]')
            {
                $counth = $counth + 1;
                // $key = "mobile_".$count;
                $hsn = $hsn."+".$value;
            }
            else
            {
                $data += array($key => $value);
            }
        }

        $data += array('mobile' => $mobile);
        $data += array('hsn' => $hsn);

        // $data += array("varcount" => $count);
        // USE THE DATA IN $data to update the values in database

        $mysqli->query("SET AUTOCOMMIT=0");
		$mysqli->query("START TRANSACTION");

        $c_id = $data['c_id'];

        // CUSTOMER DETAILS
        $ctype = $data['ctype'];
        $salutation = $data['salutation'];
        $fname = $data['fname'];
        $lname = $data['lname'];
        $company = $data['company'];
        $dname = $data['dname'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $vendorcode = $data['vendorcode'];

        $first = $mysqli->query("UPDATE customers SET ctype='$ctype', salutation='$salutation', fname='$fname', lname='$lname', company='$company',dname='$dname', email='$email', mobile='$mobile', vendorcode='$vendorcode' where c_id='$c_id'");

        // ctype=business&salutation=Ms&fname=Daria%20Lambert&lname=Ciara%20Nicholson&company=Mcgee%20and%20Sexton%20Inc&dname=Cedric%20Kim&email=bawokyk%40mailinator.com&mobile%5B%5D=111111111111&mobile%5B%5D=222222222222&mobile%5B%5D=3333333333333&vendorcode=Officiis%20aliquid%20ame&bankname=Lawrence%20Mcmillan&accno=Sit%20officia%20sit%20cum&accnocheck=Sit%20officia%20sit%20cum&ifsc=Lorem%20quis%20laboris%20i&branch=Dicta%20molestiae%20fugi&statecode=GOA&gstno=Beatae%20dicta%20odio%20re&hsn=Dolores%20nostrum%20dolo&gstrate=12&baddr1=Eaque%20reprehenderit%20aperiam%20q&baddr2=Tenetur%20porro%20voluptas%20dolorem%20Dolorem&baddr3=aut%20enim%20exercitatione&bcountry=India&bstate=&bcity=&bpincode=41&bphone=1&saddr1=Eaque%20reprehenderit%20aperiam%20q&saddr2=Tenetur%20porro%20voluptas%20dolorem%20Dolorem&saddr3=aut%20enim%20exercitatione&scountry=United%20States&sstate=Illinois&scity=Alsip&spincode=41&sphone=1

        // BANK & GST
        $bankname = $data['bankname'];
        $accno = $data['accno'];
        $ifsc = $data['ifsc'];
        $branch = $data['branch'];
        $statecode = $data['statecode'];
        $gstno = $data['gstno'];
        $hsn = $data['hsn'];
        $gstrate = $data['gstrate'];
        $receivable = $data['receivable'];

        $second = $mysqli->query("UPDATE customers SET bankname='$bankname', accno='$accno', ifsc='$ifsc', branch='$branch', statecode='$statecode', gstno='$gstno', hsn='$hsn', gstrate='$gstrate', receivable='$receivable' where c_id='$c_id'");

        // BILLING ADDRESS
        $baddr1 = $data['baddr1'];
        $baddr2 = $data['baddr2'];
        $baddr3 = $data['baddr3'];
        $baddress = $baddr1."%".$baddr2."%".$baddr3;
        $bcountry = $data['bcountry'];
        $bstate = $data['bstate'];
        $bcity = $data['bcity'];
        $bpincode = $data['bpincode'];
        $bphone = $data['bphone'];

        $third = $mysqli->query("UPDATE customers SET baddress='$baddress', bcountry='$bcountry', bstate='$bstate', bcity='$bcity', bpincode='$bpincode', bphone='$bphone' where c_id='$c_id'");

        // SHIPPING ADDRESS
        $saddr1 = $data['saddr1'];
        $saddr2 = $data['saddr2'];
        $saddr3 = $data['saddr3'];
        $saddress = $saddr1."%".$saddr2."%".$saddr3;
        $scountry = $data['scountry'];
        $sstate = $data['sstate'];
        $scity = $data['scity'];
        $spincode = $data['spincode'];
        $sphone = $data['sphone'];

        $fourth = $mysqli->query("UPDATE customers SET saddress='$saddress', scountry='$scountry', sstate='$sstate', scity='$scity', spincode='$spincode', sphone='$sphone' where c_id='$c_id'");


        $dat = [];

        if($first)
        {
            if($second)
            {   
                if($third)
                {
                    if($fourth)
                    {
                        $mysqli->query("COMMIT");
                        // echo "Successfully Updated Customer!<br>";
                        $dat += array('message' => 'Successfully Updated Customer!');

                        // $_SESSION['message'] = "New Customer Added Successfully!";
                        // $_SESSION['msg_type'] = "success";
                    }
                    else
                    {
                        $dat += array('message' => 'Shipping Address error!');
                    }
                }
                else
                {
                    $dat += array('message' => 'Billing Address error!');
                }
            }
            else
            {
                $dat += array('message' => 'Banking details error!');
            }

        }
        else
        {
            $mysqli->query("ROLLBACK");
            echo "Could not Update Customer! Try again...<br>";

            $dat += array('message' => 'Could not Update Customer! Try again...');

            // $_SESSION['message'] = "New Customer could not be Added! Try Again...";
            // $_SESSION['msg_type'] = "danger";
        }


        echo json_encode($dat);
    }


    // function deparam(query) {
    //     var pairs, i, keyValuePair, key, value, map = {};
    //     // remove leading question mark if its there
    //     if (query.slice(0, 1) === '?') {
    //         query = query.slice(1);
    //     }
    //     if (query !== '') {
    //         pairs = query.split('&');
    //         for (i = 0; i < pairs.length; i += 1) {
    //             keyValuePair = pairs[i].split('=');
    //             key = decodeURIComponent(keyValuePair[0]);
    //             value = (keyValuePair.length > 1) ? decodeURIComponent(keyValuePair[1]) : undefined;
    //             map[key] = value;
    //         }
    //     }
    //     return map;
    // }






?>
