<?php

    // require('session.php');
    require('connect.php');

    // CUSTOMER DETAILS
    $desc = '';
    $hsn = '';
    $quantity = '';
    $rate = '';
    $disc_amt = '';
    $disc_type = '';
    $gstrate = '';
    $amount = '';

    if(isset($_POST['invoice_submit']))
    {      
        // CUSTOMER DETAILS
        $customer_name_selected = $_POST['customer_name_selected'];
        $temp = explode(".",$customer_name_selected);
        $cust_id = $temp[0];

        // INVOICE DETAILS
        $creation_date = $_POST['creation_date'];
        $invoice_num = $_POST['invoice_num'];
        $invoice_date = $_POST['invoice_date'];
        $due_date_terms = $_POST['due_date_terms'];
        $due_date = $_POST['due_date'];
        $po_num = $_POST['po_num'];
        $po_date = $_POST['po_date'];
        $dc_num = $_POST['dc_num'];
        $dc_date = $_POST['dc_date'];

        $additional_title = $_POST['additional_title'];
        $additional_content = $_POST['additional_content'];


        // INVOICE ITEMS
        $inv_item_desc = $_POST['inv_item_desc'];
        $inv_hsn = $_POST['inv_hsn'];
        $inv_quantity = $_POST['inv_quantity'];
        $inv_rate = $_POST['inv_rate'];
        $inv_discount_amt = $_POST['inv_discount_amt'];
        $inv_discount_type = $_POST['inv_discount_type'];
        $inv_gstrate = $_POST['inv_gstrate'];
        $inv_amount = $_POST['inv_amount'];
        
        for($i=0; $i<count($inv_item_desc);$i++)
        {
            // echo $mob[$i]."<br>";
            $desc = $desc."+".$inv_item_desc[$i];
            $hsn = $hsn."+".$inv_hsn[$i];
            $quantity = $quantity."+".$inv_quantity[$i];
            $rate = $rate."+".$inv_rate[$i];
            $disc_amt = $disc_amt."+".$inv_discount_amt[$i];
            $disc_type = $disc_type."+".$inv_discount_type[$i];
            $gstrate = $gstrate."+".$inv_gstrate[$i];
            $amount = $amount."+".$inv_amount[$i];
        }


        $mysqli->query("SET AUTOCOMMIT=0");
		$mysqli->query("START TRANSACTION");

        // echo  $desc."<br>";
        // echo  $hsn."<br>";
        // echo  $quantity."<br>";
        // echo  $rate."<br>";
        // echo  $disc_amt."<br>";
        // echo  $disc_type."<br>";
        // echo  $gstrate."<br>";
        // echo  $amount."<br>";


        $itemscheck = $mysqli->query("INSERT INTO items ( inv_no, description, hsn, quantity, rate, disc_amt, disc_type, gstrate, amount) VALUES ('$invoice_num', '$desc', '$hsn', '$quantity', '$rate', '$disc_amt', '$disc_type', '$gstrate', '$amount')");

        $customer_notes = $_POST['customer_notes'];
        $terms_conditions = $_POST['terms_conditions'];

        $terms_notes_check = $mysqli->query("UPDATE customers SET terms_conditions = '$terms_conditions', customer_notes = ' $customer_notes' where c_id='$cust_id'");

        $inv_sub_total = $_POST['inv_sub_total'];
        $inv_shipping_charges = $_POST['inv_shipping_charges'];
        $inv_adjustments = $_POST['inv_adjustments'];
        $inv_round_off = $_POST['inv_round_off'];
        $inv_total = $_POST['inv_total'];


        $invoice_check = $mysqli->query("INSERT INTO invoice(cust_id, inv_no, creation_date, inv_date, inv_term, inv_due_date, inv_status, po_num, po_date, dc_num, dc_date, additional_field_title, additional_field_content, sub_total, shipping, adjustments, round_off, total) VALUES ('$cust_id', '$invoice_num', '$creation_date', '$invoice_date', '$due_date_terms', '$due_date', 'draft', '$po_num', '$po_date', '$dc_num', '$dc_date', '$additional_title', '$additional_content', '$inv_sub_total', '$inv_shipping_charges', '$inv_adjustments', '$inv_round_off', '$inv_total')");
        
 
        // header("location: index.php");

        if($itemscheck and $terms_notes_check and $invoice_check)
        {
            $mysqli->query("COMMIT");
            echo "Successfully Updated Customer!<br>";
            // $dat += array('message' => 'Successfully Updated Customer!');

            // $_SESSION['message'] = "New Customer Added Successfully!";
            // $_SESSION['msg_type'] = "success";
        }
        else
        {
            echo "Error!!!<br>";
            // $dat += array('message' => 'Shipping Address error!');
        }

        echo "Okkay!!";

    }

    // else if(isset($_POST['cust_update']))
    // { 

    //     $data = [];
    //     $ser_data = $_POST["cust_update"];


    //     echo json_encode($dat);
    // }


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