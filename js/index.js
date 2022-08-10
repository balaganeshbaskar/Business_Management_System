


function tabs_toggle(type)
{   
    // background-image: linear-gradient(#6560b4, #9089e4);
    var c = "black";
    var d = "#212529";

    var a =  'linear-gradient(to right, #6560b4, #9089e4)';
    var b = "white";

    document.getElementById("customer_btn").style.backgroundColor = '';
    document.getElementById("customer_btn").style.color = b;
    document.getElementById("customer_btn").style.backgroundImage  = a;
    document.getElementById("invoice_btn").style.backgroundColor = '';
    document.getElementById("invoice_btn").style.color = b;
    document.getElementById("invoice_btn").style.backgroundImage  = a;
    document.getElementById("quotes_btn").style.backgroundColor = '';
    document.getElementById("quotes_btn").style.color = b;
    document.getElementById("quotes_btn").style.backgroundImage  = a;
    document.getElementById("dc_btn").style.backgroundColor = '';
    document.getElementById("dc_btn").style.color = b;
    document.getElementById("dc_btn").style.backgroundImage  = a;

    if(type == 'customers')
    {
        document.getElementById("customer").hidden = false;
        document.getElementById("invoice").hidden = true;
        document.getElementById("quotation").hidden = true;
        document.getElementById("dc").hidden = true;

        document.getElementById("customer_btn").style.backgroundColor = b;
        document.getElementById("customer_btn").style.backgroundImage  = '';
        document.getElementById("customer_btn").style.color = c;   
    }
    else if(type == 'invoice')
    {
        document.getElementById("customer").hidden = true;
        document.getElementById("invoice").hidden = false;
        document.getElementById("quotation").hidden = true;
        document.getElementById("dc").hidden = true;

        document.getElementById("invoice_btn").style.backgroundColor = b;
        document.getElementById("invoice_btn").style.backgroundImage  = '';
        document.getElementById("invoice_btn").style.color = c;   
    }
    else if(type == 'quotes')
    {
        document.getElementById("customer").hidden = true;
        document.getElementById("invoice").hidden = true;
        document.getElementById("quotation").hidden = false;
        document.getElementById("dc").hidden = true;

        document.getElementById("quotes_btn").style.backgroundColor = b;
        document.getElementById("quotes_btn").style.backgroundImage  = '';
        document.getElementById("quotes_btn").style.color = c;   
    }
    else if(type == 'dc')
    {
        document.getElementById("customer").hidden = true;
        document.getElementById("invoice").hidden = true;
        document.getElementById("quotation").hidden = true;
        document.getElementById("dc").hidden = false;

        document.getElementById("dc_btn").style.backgroundColor = b;
        document.getElementById("dc_btn").style.backgroundImage  = '';
        document.getElementById("dc_btn").style.color = c;   
    }
}

function GoToMail()
{   
    window.open("mailto:xyz@abc.com");
}


function ClearFilters(tab_name)
{   
    // alert("Content Change!");
    // console.log("sdsdf");

    if(tab_name == "customers")
    {
        // alert("Content Change!");

        document.getElementById("namesearch").value = "";
        document.getElementById("citysearch").value = "";
        document.getElementById("amountsearch").value = "Amount Receivable";

        searchfun("customers");

        document.getElementById("filter_label").style.marginLeft  = "0px"; 
        document.getElementById("clear_filters_div").hidden  = true;
    }

    else if(tab_name == "invoice")
    {
        // alert("Content Change!");

        // document.getElementById("namesearch").value = "";
        // document.getElementById("citysearch").value = "";
        // document.getElementById("amountsearch").value = "Amount Receivable";

        // searchfun("customers");

        // document.getElementById("filter_label").style.marginLeft  = "0px"; 
        // document.getElementById("clear_filters_div").hidden  = true;
    }
}


function searchfun(tab_name) // Filter function for all tab_name
{
    document.getElementById("filter_label").style.marginLeft  = "-105px"; 
    document.getElementById("clear_filters_div").hidden  = false;

    if(tab_name == "customers")
    {
        // alert("works!");
        var n,c,a, nfilter, cfilter, afilter, table, tr, td, i, txtValue;

        n = document.getElementById("namesearch");
        nfilter = n.value.toUpperCase();

        c = document.getElementById("citysearch");
        cfilter = c.value.toUpperCase();

        a = document.getElementById("amountsearch");
        afilter = a.value;

        table = document.getElementById("customer_table");
        tr = table.getElementsByTagName("tr");


        // Showing all rows first
        for (i = 0; i < tr.length; i++) 
        {
            tr[i].style.display = "";   
        }

        // To clear all checkboxes when filter changed
        var checkboxes = document.getElementsByName('rows_customer');
        document.getElementById("selectall_customer").checked = false;
        
        for (let i = 0; i < checkboxes.length; i++)
        {
            checkboxes[i].checked = false;
            tr[i+1].style.backgroundColor= "white";
        }

        // applying filter
        for (let i = 0; i < tr.length; i++) 
        {
            if(n.value.length > 0)
            {	
                td = tr[i].getElementsByTagName("td")[1];
                if(td)
                {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(nfilter) > -1 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else 
                    {
                        tr[i].style.display = "none";
                    }
                }	
            } 


            if(c.value.length > 0)
            {
                td = tr[i].getElementsByTagName("td")[5];
                if(td)
                {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(cfilter) > -1 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else 
                    {
                        tr[i].style.display = "none";
                    }
                }
            }


            if(a.value != "Amount Receivable")
            {
                td = tr[i].getElementsByTagName("td")[7];
                if(td)
                {
                    txtValue = td.textContent;
                    price = txtValue;
                    // const myArray = txtValue.split(" ");
                    // let number = myArray[1];
                    // const numarray = number.split(",");
                    // var price = "";
                    
                    // for(let j =0; j < numarray.length; j++)
                    // {
                    //     price = price.concat(numarray[j]);
                    // }

                    if (a.value == "< ₹ 10,000" && parseInt(price) < 10000 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else if (a.value == "₹ 10k - ₹ 50k" && parseInt(price) > 10000 && parseInt(price) < 50000 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else if (a.value == "₹ 50k - ₹ 1 Lakh" && parseInt(price) > 50000 && parseInt(price) < 100000 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else if (a.value == "₹ 1 Lakh - ₹ 10 Lakh" && parseInt(price) > 100000 && parseInt(price) < 1000000 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else if (a.value == "> ₹ 10 Lakh" && parseInt(price) > 1000000 && tr[i].style.display == "") 
                    {
                        tr[i].style.display = "";
                    } 
                    else 
                    {
                        tr[i].style.display = "none";
                    }

                }
            }

        }

    } // customers if end
    
    else if(tab_name == "invoice")
    {

    }


    
}	


function selectall(ele) 
{
    var table, tr, checkboxes, check;
    var counter;
    counter = 0;
    
    checkboxes = document.getElementsByName('rows');
    table = document.getElementById("customer_table");
    tr = table.getElementsByTagName("tr");
    check = false;

    // console.log("Row length: " + tr.length);
    // console.log("No of checkboxes: " + checkboxes.length);

    if (ele.checked) 
    {
        for (var i = 0; i < checkboxes.length; i++) 
        {
            if(tr[i+1].style.display == "")
            {
                checkboxes[i].checked = true;
                tr[i+1].style.backgroundColor= "#F5F5F5";
                check = true;

                counter = counter + 1;
            }  
        }
    } 
    else 
    {
        for (var i = 0; i < checkboxes.length; i++) 
        {
            if(tr[i+1].style.display == "")
            {
                checkboxes[i].checked = false;
                tr[i+1].style.backgroundColor= "white";
                check = false;

                // counter = counter + 1;
            } 
        }
    }


    console.log("Number of rows selected: " + counter);
    // if(check)
    // {
    //     document.getElementById("send_mail").disabled = false;
    //     document.getElementById("promote").disabled = false;
    // }
    // else
    // {
    //     document.getElementById("send_mail").disabled = true;
    //     document.getElementById("promote").disabled = true;
    // }		
    
}


// Adding more phone numbers
function add_phone_field(input)
{   
    if(input == 0)
    {
        var c = document.getElementsByName("mobile[]");
        var d = c.length;
    }
    else
    {
        var d = input;
    }
    // alert("dfsdf");
    

    // console.log(c.length);
    if(d < 3)
    {
        var new_field_no = parseInt($('#total_fields').val()) + 1;
        var new_input = "<input type='text' id='new_" + new_field_no + "'>";

        var new_input ="<div class='form-group row' id='"+ (new_field_no+95) +"' >"+
                            "<label class='col-sm-4 col-form-label'></label>"+
                            "<div class='col-sm-7'>"+
                                "<input required type='number' name='mobile[]' id='new_"+ new_field_no +"' class='form-control' placeholder='alternate number'>"+
                            "</div>"+
                            "<div class='col-sm-1' style='display: flex; justify-content: center;'>"+
                                "<button title='Remove this field' onclick='remove_phone_field("+ (new_field_no+95) +")' style='border-radius: 50%;'  class='btn'><i  class='fa fa-minus'></i></button>"+
                            "</div>"+
                        "</div>";

        $('#new_field').append(new_input);
        $('#total_fields').val(new_field_no);
    }
    else
    {
        alert("You can add only 2 alternate contact numbers!");
    }
    
}
  

function remove_phone_field(ele)
{
    $('#' + ele).remove();
    var new_field_no = parseInt($('#total_fields').val()) - 1;
    
    if(new_field_no == 0)
    {
        $('#total_fields').val(1);
    }
    else
    {
        $('#total_fields').val(new_field_no);
    }
}


// Adding more phone numbers
function add_hsn_code(input)
{
    if(input == 0)
    {
        var c = document.getElementsByName("hsn[]");
        var d = c.length;
    }
    else
    {
        var d = input;
    }
    // alert("dfsdf");
    

    // console.log(c.length);
    if(d < 6)
    {
        var new_field_no = parseInt($('#total_hsn').val()) + 1;
        var new_input = "<input type='text' id='hsn_" + new_field_no + "'>";

        var new_input ="<div class='form-group row' id='"+ (new_field_no+48) +"' >"+
                            "<label class='col-sm-4 col-form-label'></label>"+
                            "<div class='col-sm-7'>"+
                                "<input required type='text' name='hsn[]' id='hsn_"+ new_field_no +"' class='form-control' placeholder='Alternate HSN Code'>"+
                            "</div>"+
                            "<div class='col-sm-1' style='display: flex; justify-content: center;'>"+
                                "<button title='Remove this field' onclick='remove_hsn_code("+ (new_field_no+48) +")' style='border-radius: 50%;'  class='btn'><i  class='fa fa-minus'></i></button>"+
                            "</div>"+
                        "</div>";

        $('#new_hsn').append(new_input);
        $('#total_hsn').val(new_field_no);
    }
    else
    {
        alert("You can add only 5 alternate HSN Codes!");
    }
    
}


function remove_hsn_code(ele)
{
    $('#' + ele).remove();
    var new_field_no = parseInt($('#total_hsn').val()) - 1;
    
    if(new_field_no == 0)
    {
        $('#total_hsn').val(1);
    }
    else
    {
        $('#total_hsn').val(new_field_no);
    }
}



function copy_address(ele)
{
    if(ele.checked)
    {
        // console.log("Checked!");
        baddr1 = document.getElementsByName('baddr1')[0].value;
        baddr2 = document.getElementsByName('baddr2')[0].value;
        baddr3 = document.getElementsByName('baddr3')[0].value;
        bcountry = document.getElementsByName('bcountry')[0].value;
        if(bcountry == "")
        {
            bcountry = document.getElementsByName('bcountry')[1].value;
        }
        bstate = document.getElementsByName('bstate')[0].value;
        if(bstate == "")
        {
            bstate = document.getElementsByName('bstate')[1].value;
        }
        bcity = document.getElementsByName('bcity')[0].value;
        if(bcity == "")
        {
            bcity = document.getElementsByName('bcity')[1].value;
        }
        bpincode = document.getElementsByName('bpincode')[0].value;
        bphone = document.getElementsByName('bphone')[0].value;
        // console.log(saddr1, saddr2, saddr3, scountry, sstate, scity, spincode, sphone);
        // console.log(bcountry, bstate, bcity);

        document.getElementsByName('saddr1')[0].value = baddr1;
        document.getElementsByName('saddr2')[0].value = baddr2;
        document.getElementsByName('saddr3')[0].value = baddr3;
        document.getElementsByName('scountry')[0].value = bcountry;
        document.getElementsByName('sstate')[0].value = bstate;
        document.getElementsByName('scity')[0].value = bcity;
        document.getElementsByName('spincode')[0].value = bpincode;
        document.getElementsByName('sphone')[0].value = bphone;

        document.getElementsByName('saddr1')[0].readOnly = true;
        document.getElementsByName('saddr2')[0].readOnly = true;
        document.getElementsByName('saddr3')[0].readOnly = true;
        document.getElementsByName('scountry')[0].readOnly = true;
        document.getElementsByName('sstate')[0].readOnly = true;
        document.getElementsByName('scity')[0].readOnly = true;
        document.getElementsByName('spincode')[0].readOnly = true;
        document.getElementsByName('sphone')[0].readOnly = true;

    }
    else if(!ele.checked)
    {
        // console.log("Not Checked!");
        document.getElementsByName('saddr1')[0].value = "";
        document.getElementsByName('saddr2')[0].value = "";
        document.getElementsByName('saddr3')[0].value = "";
        document.getElementsByName('scountry')[0].value = "";
        document.getElementsByName('sstate')[0].value = "";
        document.getElementsByName('scity')[0].value = "";
        document.getElementsByName('spincode')[0].value = "";
        document.getElementsByName('sphone')[0].value = "";

        document.getElementsByName('saddr1')[0].readOnly = false;
        document.getElementsByName('saddr2')[0].readOnly = false;
        document.getElementsByName('saddr3')[0].readOnly = false;
        document.getElementsByName('scountry')[0].readOnly = false;
        document.getElementsByName('sstate')[0].readOnly = false;
        document.getElementsByName('scity')[0].readOnly = false;
        document.getElementsByName('spincode')[0].readOnly = false;
        document.getElementsByName('sphone')[0].readOnly = false;
    }
}


function checkacnumber()
{
    var acc = document.getElementsByName('accno')[0];
    var accheck = document.getElementsByName('accnocheck')[0];
    // console.log(acc.value, accheck.value);
    if (acc.value == accheck.value)
    {
        accheck.style.borderColor = "#2EFE2E";
        document.getElementById("cust_submit").disabled = false;

    }    
    else
    {
        accheck.style.borderColor = "red";
        document.getElementById("cust_submit").disabled = true;
    }
        
}


function update_cust()
{
    var ser_data = $("#cust_form").serialize();
    // alert(ser_data);
    // console.log(ser_data);
    $.ajax({
        url:"Add_Customer.php",  
        method:"POST", 
        data:{cust_update:ser_data},  
        dataType:"json",  
        success:function(data)
        {   
            alert(data.message);

            // alert("Customer Information Updated Successfully!");
            location.reload();

        }  

    });

}

// function nohover(ele)
// {
//     // alert("hover");
//     ele.style.backgroundColor = "#212529";
//     ele.style.color = "white";
// }



// #################################################################################
//                              JQUERY FROM HERE
// #################################################################################

$(document).ready( function () {
    $('#customer_table').DataTable({
        paging: false,
        "searching": false,
        "info": false
    });
    
} );


$('#new_customer_modal').on('hidden.bs.modal', function (e) {
    alert("called!");
    $(this)
      .find("input,textarea,select")
         .val('')
         .end()
      .find("input[type=checkbox], input[type=radio]")
         .prop("checked", "")
         .end();
  });


$(document).on('click', '.non-clickable-row', function(event){   // function to stop calling the .clickable-row function to show modal
    // alert("called!");
    event.stopPropagation();
});


// Customer table row on click function
$(document).on('click', '.clickable-row', function(){  
    // alert("C_ID: " + $(this).attr('id'));
    // window.location = $(this).data('href');
    var c_id = $(this).attr('id');
    $.ajax({
        url:"Customer_Fetch.php",  
        method:"POST", 
        data:{C_ID:c_id},  
        dataType:"json",  
        success:function(data)
        {  
            $('#c_id').val(c_id);

            $("#cust_submit").html("Update");
            $("#cust_submit").removeClass('btn shadow-none btn-primary').addClass('btn shadow-none btn-warning');
            $("#cust_submit").attr("disabled", false);
            $("#cust_submit").attr("type", 'button');
            $("#cust_submit").attr('onClick','update_cust()');

            $("#exampleModalLabel").html("Updating Customer Details");

            $('#countryId').attr("hidden", true);
            $('#bcountry').attr("hidden", false);
            $("#countryId").attr("disabled", true);
            $("#bcountry").attr("disabled", false);

            $('#stateId').attr("hidden", true);
            $('#bstate').attr("hidden", false);
            $("#stateId").attr("disabled", true);
            $("#bstate").attr("disabled", false);

            $('#cityId').attr("hidden", true);
            $('#bcity').attr("hidden", false);
            $("#cityId").attr("disabled", true);
            $("#bcity").attr("disabled", false);

            if(data.ctype == 'business')
            {
                $('#business').attr('checked',true);
            }
            else
            {
                $('#individual').attr('checked',true);
            }

            $('#salutation').val(data.salutation);
            $('#fname').val(data.fname);
            $('#lname').val(data.lname);
            $('#company').val(data.company);
            $('#dname').val(data.dname);
            $('#email').val(data.email);

            if(data.mobile1 != '' && data.mobile2 == '' && data.mobile3 == '')
            {   
                remove_phone_field(97);
                remove_phone_field(98);
                $('#new_1').val(data.mobile1);
            }
            else if (data.mobile1 != '' && data.mobile2 != '' && data.mobile3 == '')
            {   

                remove_phone_field(97);
                remove_phone_field(98);

                add_phone_field(1); // creating mobile input field for showing second number

                $('#new_1').val(data.mobile1);
                $('#new_2').val(data.mobile2);
            }
            else if (data.mobile1 != '' && data.mobile2 != '' && data.mobile3 != '')
            {   
                remove_phone_field(97);
                remove_phone_field(98);


                add_phone_field(1);
                add_phone_field(1); // creating mobile input field for showing second and third number

                $('#new_1').val(data.mobile1);
                $('#new_2').val(data.mobile2);
                $('#new_3').val(data.mobile3);
            }

            // console.log(data.mobile1);
            // console.log(data.mobile2);
            // console.log(data.mobile3);

            $('#vendorcode').val(data.vendorcode);

            $('#bankname').val(data.bankname);
            $('#accno').val(data.accno);
            $('#accnocheck').val(data.accno);
            $('#ifsc').val(data.ifsc);
            $('#branch').val(data.branch);
            $('#statecode').val(data.statecode);
            $('#gstno').val(data.gstno);
            $('#hsn').val(data.hsn);

            if(data.hsn1 != '' && data.hsn2 == '' && data.hsn3 == '' && data.hsn4 == '' && data.hsn5 == '' && data.hsn6 == '')
            {   
                remove_hsn_code(50);
                remove_hsn_code(51);
                remove_hsn_code(52);
                remove_hsn_code(53);
                remove_hsn_code(54);

                $('#hsn_1').val(data.hsn1);
            }
            else if(data.hsn1 != '' && data.hsn2 != '' && data.hsn3 == '' && data.hsn4 == '' && data.hsn5 == '' && data.hsn6 == '')
            {   
                remove_hsn_code(50);
                remove_hsn_code(51);
                remove_hsn_code(52);
                remove_hsn_code(53);
                remove_hsn_code(54);

                add_hsn_code(1); // creating mobile input field for showing second number

                $('#hsn_1').val(data.hsn1);
                $('#hsn_2').val(data.hsn2);
            }
            else if(data.hsn1 != '' && data.hsn2 != '' && data.hsn3 != '' && data.hsn4 == '' && data.hsn5 == '' && data.hsn6 == '')
            {   
                remove_hsn_code(50);
                remove_hsn_code(51);
                remove_hsn_code(52);
                remove_hsn_code(53);
                remove_hsn_code(54);

                add_hsn_code(1); // creating mobile input field for showing second number
                add_hsn_code(1);

                $('#hsn_1').val(data.hsn1);
                $('#hsn_2').val(data.hsn2);
                $('#hsn_3').val(data.hsn3);
            }
            else if(data.hsn1 != '' && data.hsn2 != '' && data.hsn3 != '' && data.hsn4 != '' && data.hsn5 == '' && data.hsn6 == '')
            {   
                remove_hsn_code(50);
                remove_hsn_code(51);
                remove_hsn_code(52);
                remove_hsn_code(53);
                remove_hsn_code(54);

                add_hsn_code(1); // creating mobile input field for showing second number
                add_hsn_code(1);
                add_hsn_code(1);

                $('#hsn_1').val(data.hsn1);
                $('#hsn_2').val(data.hsn2);
                $('#hsn_3').val(data.hsn3);
                $('#hsn_4').val(data.hsn4);
            }
            else if(data.hsn1 != '' && data.hsn2 != '' && data.hsn3 != '' && data.hsn4 != '' && data.hsn5 != '' && data.hsn6 == '')
            {   
                remove_hsn_code(50);
                remove_hsn_code(51);
                remove_hsn_code(52);
                remove_hsn_code(53);
                remove_hsn_code(54);

                add_hsn_code(1); // creating mobile input field for showing second number
                add_hsn_code(1);
                add_hsn_code(1);
                add_hsn_code(1);

                $('#hsn_1').val(data.hsn1);
                $('#hsn_2').val(data.hsn2);
                $('#hsn_3').val(data.hsn3);
                $('#hsn_4').val(data.hsn4);
                $('#hsn_5').val(data.hsn5);
            }
            else if(data.hsn1 != '' && data.hsn2 != '' && data.hsn3 != '' && data.hsn4 != '' && data.hsn5 != '' && data.hsn6 != '')
            {   
                remove_hsn_code(50);
                remove_hsn_code(51);
                remove_hsn_code(52);
                remove_hsn_code(53);
                remove_hsn_code(54);

                add_hsn_code(1); // creating mobile input field for showing second number
                add_hsn_code(1);
                add_hsn_code(1);
                add_hsn_code(1);
                add_hsn_code(1);

                $('#hsn_1').val(data.hsn1);
                $('#hsn_2').val(data.hsn2);
                $('#hsn_3').val(data.hsn3);
                $('#hsn_4').val(data.hsn4);
                $('#hsn_5').val(data.hsn5);
                $('#hsn_6').val(data.hsn6);
            }



            $('#gstrate').val(data.gstrate);

            $('#baddr1').val(data.baddr1);
            $('#baddr2').val(data.baddr2);
            $('#baddr3').val(data.baddr3);
            $('#bcountry').val(data.bcountry);
            $('#bstate').val(data.bstate);
            $('#bcity').val(data.bcity);
            $('#bpincode').val(data.bpincode);
            $('#bphone').val(data.bphone);

            $('#saddr1').val(data.saddr1);
            $('#saddr2').val(data.saddr2);
            $('#saddr3').val(data.saddr3);
            $('#scountry').val(data.scountry);
            $('#sstate').val(data.sstate);
            $('#scity').val(data.scity);
            $('#spincode').val(data.spincode);
            $('#sphone').val(data.sphone);
            $('#receivable').val(data.receivable);
            // CHANGE BUTTON ONCLICK LINK TO UPDATE RATHER THAN SUBMIT!

            $('#new_customer_modal').modal('show');
        }  
    });

 });



 $(document).on('click', '.new_customer', function(){  
    // alert("adding customer..");
    // window.location = $(this).data('href');

    $("#cust_submit").html("Add Customer");
    $("#cust_submit").removeClass('btn shadow-none btn-warning').addClass('btn shadow-none btn-primary');
    $("#cust_submit").attr("disabled", true);
    $("#cust_submit").attr("type", 'submit');
    $("#cust_submit").attr('onClick','');

    $("#exampleModalLabel").html("Adding New Customer");

    $('#new_customer_modal').find('form').trigger('reset');

    $('#countryId').attr("hidden", false);
    $('#bcountry').attr("hidden", true);
    $("#countryId").attr("disabled", false);
    $("#bcountry").attr("disabled", true);

    $('#stateId').attr("hidden", false);
    $('#bstate').attr("hidden", true);
    $("#stateId").attr("disabled", false);
    $("#bstate").attr("disabled", true);

    $('#cityId').attr("hidden", false);
    $('#bcity').attr("hidden", true);
    $("#cityId").attr("disabled", false);
    $("#bcity").attr("disabled", true);

    $('#new_customer_modal').modal('show');
 });





// ##################################################################################################################
//                                                  INVOICE FUNCTIONS
// ##################################################################################################################


 function selectall_invoice(ele) 
{
    var table, tr, checkboxes, check;
    var counter;
    counter = 0;
    
    checkboxes = document.getElementsByName('rows');
    table = document.getElementById("invoice_table");
    tr = table.getElementsByTagName("tr");
    check = false;

    // console.log("Row length: " + tr.length);
    // console.log("No of checkboxes: " + checkboxes.length);

    if (ele.checked) 
    {
        for (var i = 0; i < checkboxes.length; i++) 
        {
            if(tr[i+1].style.display == "")
            {
                checkboxes[i].checked = true;
                tr[i+1].style.backgroundColor= "#F5F5F5";
                check = true;

                counter = counter + 1;
            }  
        }
    } 
    else 
    {
        for (var i = 0; i < checkboxes.length; i++) 
        {
            if(tr[i+1].style.display == "")
            {
                checkboxes[i].checked = false;
                tr[i+1].style.backgroundColor= "white";
                check = false;

                // counter = counter + 1;
            } 
        }
    }


    console.log("Number of rows selected: " + counter);
    // if(check)
    // {
    //     document.getElementById("send_mail").disabled = false;
    //     document.getElementById("promote").disabled = false;
    // }
    // else
    // {
    //     document.getElementById("send_mail").disabled = true;
    //     document.getElementById("promote").disabled = true;
    // }		
    
}

function customer_name(ele)
{
    
    // if(ele.value == '')
    // {
    //     $("#address_show").attr("hidden", true);
    // }
    $temp = ele.value;
    $name = $temp.split(".");

    // alert($name[1]);
    // alert(ele.value);


    $.ajax({
        url:"Invoice_Fetch.php",  
        method:"POST",
        data:{cust_name:$name[1]},  
        dataType:"json",
        success:function(data)
        {   
            // alert(data.message);
            $('#billing_address').html(data.billing_addr);
            $('#shipping_address').html(data.billing_addr);
            // alert("Customer Information Updated Successfully!");
            // location.reload();
            $("#address_show").attr("hidden", false);

            $('#inv_gstrate_1').val(data.inv_gstrate);
            $('#inv_hsn_1').val(data.hsn);

            // alert(data.invoice_gstrate);

            
        }  

    });
}


function inv_num_creation(ele)
{
    // alert(ele.value);

    if(ele.value == "auto_inv_num")
    {
        $("#inv_num_pattern").attr("hidden", false);
    }
    else
    {
        $("#inv_num_pattern").attr("hidden", true);
    }
    
}

function update_due_date_terms()
{
    due_date_terms_change(document.getElementById('due_date_terms'));
}

function SetDate()
{
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    // console.log(day);
    // console.log(month);
    // console.log(year);

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById('invoice_date').value = today;
    document.getElementById('creation_date').value = today;
    // console.log(document.getElementById('due_date_terms').value);

    due_date_terms_change(document.getElementById('due_date_terms'));
}

// program to check leap year
function checkLeapYear(year)
{
    var yes = 0;
    //three conditions to find out the leap year
    if ((0 == year % 4) && (0 != year % 100) || (0 == year % 400)) 
    {
        yes = 1;
    } 
    else 
    {
        yes = 0;
    }

    return yes;
}


function addDays(date, days)
{
    var result = new Date(date);

    if(days == -1)
    {
        var day = result.getDate();
        var month = result.getMonth() + 1;
        var year = result.getFullYear();


        var leap = checkLeapYear(year);

        if (month < 10) month = "0" + month;

        if(month == 2)
        {
            if(leap == 1)
            {
                day = 29;
            }
            else
            {
                day = 28;
            }
            
        }
        else if(month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12)
        {

            day = 31;
        }
        else if(month == 4 || month == 6 || month == 9 || month == 11)
        {
            day = 30;
        }

        var fdate = year + "-" + month + "-" + day;
    }
    else
    {
        result.setDate(result.getDate() + days);

        var day = result.getDate();
        var month = result.getMonth() + 1;
        var year = result.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;


        var fdate = year + "-" + month + "-" + day;
    }

    return fdate;
}

function custom_due_date()
{
    document.getElementById('due_date_terms').value = "Custom";
}

function due_date_terms_change(ele)
{
    // alert(ele.value);
    var inv_date = document.getElementById('invoice_date').value

    if(ele.value == "Net 15 days")
    {
        var due_date = addDays(inv_date, 15);
        document.getElementById('due_date').value = due_date;
    }
    else if(ele.value == "Net 30 days")
    {
        var due_date = addDays(inv_date, 30);
        document.getElementById('due_date').value = due_date;
    }
    else if(ele.value == "Net 45 days")
    {
        var due_date = addDays(inv_date, 45);
        document.getElementById('due_date').value = due_date;
    }
    else if(ele.value == "Net 60 days")
    {
        var due_date = addDays(inv_date, 60);
        document.getElementById('due_date').value = due_date;
    }
    else if(ele.value == "Due End of Month")
    {
        var due_date = addDays(inv_date, -1);
        document.getElementById('due_date').value = due_date;
    }
    else if(ele.value == "Due On Receipt")
    {
        document.getElementById('due_date').value = inv_date;
    }

}

function invoice_add_additional_field(type)
{   
    if(type=="add")
    {
        $("#additional_title").attr("hidden", false);
        $("#additional_content").attr("hidden", false);

        $("#add_field_btn").html("Remove Extra Field");
        $("#add_field_btn").attr('onClick','invoice_add_additional_field("remove")');
    }
    else if(type=="remove")
    {
        $("#additional_title").attr("hidden", true);
        $("#additional_content").attr("hidden", true);

        $("#add_field_btn").html("Add Extra Field");
        $("#add_field_btn").attr('onClick','invoice_add_additional_field("add")');
    }
}


function invoice_add_new_row()
{
    // alert("Adding new row!");
    var c = document.getElementsByName("inv_item_desc[]");

    // alert(c.length);
    var new_id_no = c.length + 1;

    // var tr_id = "inv_row_"+new_id_no;

    // class="draggable"

    var new_row = '<tr id="'+(new_id_no+23)+'" style="border-top: 2px solid black;">'+
                        '<td style="vertical-align: middle; text-align: center; border-bottom:0px solid grey;">'+
                        '⋮'+
                        '</td> <!-- Dragger -->'+
                        '<td style="vertical-align: middle; text-align: center; border-right:1px solid grey; border-bottom:0px solid grey;">'+
                            '<textarea class="form-control" rows="3" id="inv_item_desc_'+new_id_no+'" name="inv_item_desc[]" placeholder="Type Item name & Description"></textarea>'+
                        '</td> <!-- Item Description -->'+
                        '<td style="border-bottom:0px solid grey; border-right:1px solid grey;"><input required type="text" name="inv_hsn[]" id="inv_hsn_'+new_id_no+'"  class="form-control" value="" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;"></td> <!-- HSN -->'+
                        '<td style="border-bottom:0px solid grey; border-right:1px solid grey;"><input required type="number" name="inv_quantity[]" id="inv_quantity_'+new_id_no+'"  class="form-control" value="1" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;" onchange="invoice_row_amount_calc(inv_item_desc_'+new_id_no+', inv_hsn_'+new_id_no+', inv_quantity_'+new_id_no+',inv_rate_'+new_id_no+',inv_discount_amt_'+new_id_no+',inv_discount_type_'+new_id_no+',inv_gstrate_'+new_id_no+',inv_amount_'+new_id_no+');"></td> <!-- Quantity -->'+
                        '<td style="border-bottom:0px solid grey; border-right:1px solid grey;"><input required type="number" name="inv_rate[]" id="inv_rate_'+new_id_no+'"  class="form-control" value="0" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;" onchange="invoice_row_amount_calc(inv_item_desc_'+new_id_no+', inv_hsn_'+new_id_no+', inv_quantity_'+new_id_no+',inv_rate_'+new_id_no+',inv_discount_amt_'+new_id_no+',inv_discount_type_'+new_id_no+',inv_gstrate_'+new_id_no+',inv_amount_'+new_id_no+');"></td> <!-- rate -->'+
                        '<td style="border-bottom:0px solid grey; border-right:1px solid grey;">'+
                            '<div>'+
                                '<div style="text-align: center;">'+
                                   '<input required type="number" name="inv_discount_amt[]" id="inv_discount_amt_'+new_id_no+'"  class="form-control" value="0" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;" onchange="invoice_row_amount_calc(inv_item_desc_'+new_id_no+', inv_hsn_'+new_id_no+', inv_quantity_'+new_id_no+',inv_rate_'+new_id_no+',inv_discount_amt_'+new_id_no+',inv_discount_type_'+new_id_no+',inv_gstrate_'+new_id_no+',inv_amount_'+new_id_no+');">'+
                                '</div>'+
                                '<div style="padding-left: 0px; margin-top: 5px;">'+
                                    '<select style="text-align: center; padding-left:2px; padding-right:2px; " name="inv_discount_type[]" id="inv_discount_type_'+new_id_no+'" class="form-control" onchange="invoice_row_amount_calc(inv_item_desc_'+new_id_no+', inv_hsn_'+new_id_no+', inv_quantity_'+new_id_no+',inv_rate_'+new_id_no+',inv_discount_amt_'+new_id_no+',inv_discount_type_'+new_id_no+',inv_gstrate_'+new_id_no+',inv_amount_'+new_id_no+');">'+
                                        '<option><b>%</b></option>'+
                                        '<option><b>₹</b></option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>	'+
                        '</td> <!-- discount -->'+
                        '<td style="border-bottom:0px solid grey; border-right:1px solid grey;">'+
                           '<select style="text-align: left; padding-left:5px; padding-right:5px; " class="form-select" aria-label="Default select" name="inv_gstrate[]" id="inv_gstrate_'+new_id_no+'" required="true" onchange="invoice_row_amount_calc(inv_item_desc_'+new_id_no+', inv_hsn_'+new_id_no+', inv_quantity_'+new_id_no+',inv_rate_'+new_id_no+',inv_discount_amt_'+new_id_no+',inv_discount_type_'+new_id_no+',inv_gstrate_'+new_id_no+',inv_amount_'+new_id_no+');">'+
                                '<option value="100">GST Rate</option>'+
                                '<option value="0">No tax</option>'+
                                '<option value="5">5% [2.5% + 2.5%]</option>'+
                                '<option value="12">12% [6% + 6%]</option>'+
                                '<option value="18">18% [9% + 9%]</option>'+
                                '<option value="28">28% [14% + 14%]</option>'+
                            '</select>'+
                        '</td> <!-- gstrate -->'+
                        '<td style="border-bottom:0px solid grey;"><input readonly type="text" name="inv_amount[]" id="inv_amount_'+new_id_no+'"  class="form-control" value="0" style="text-align: right; padding:5px 5px 5px 2px;">'+
                        '<div style="position: relative;">'+
                            '<button onclick="invoice_remove_row('+(new_id_no+23)+')" title="Remove this row" style="border-radius: 50%; position: absolute; right: -60px; top: -15px;" class="btn"><i  class="fa fa-times-circle-o fa-2x"></i></button>'+
                        '</div>'+
                        '</td> <!-- amount -->'+
                    '</tr>';

    $('#invoice_items_table').append(new_row);
    draggable_table();

}


function draggable_table()
{
    const table = document.getElementById('invoice_items_table');

    let draggingEle;
    let draggingRowIndex;
    let placeholder;
    let list;
    let isDraggingStarted = false;

    // The current position of mouse relative to the dragging element
    let x = 0;
    let y = 0;

    // Swap two nodes
    const swap = function (nodeA, nodeB) {
        const parentA = nodeA.parentNode;
        const siblingA = nodeA.nextSibling === nodeB ? nodeA : nodeA.nextSibling;

        // Move `nodeA` to before the `nodeB`
        nodeB.parentNode.insertBefore(nodeA, nodeB);

        // Move `nodeB` to before the sibling of `nodeA`
        parentA.insertBefore(nodeB, siblingA);
    };

    // Check if `nodeA` is above `nodeB`
    const isAbove = function (nodeA, nodeB) {
        // Get the bounding rectangle of nodes
        const rectA = nodeA.getBoundingClientRect();
        const rectB = nodeB.getBoundingClientRect();

        return rectA.top + rectA.height / 2 < rectB.top + rectB.height / 2;
    };
    var count = "hi";

    const cloneTable = function () {
        const rect = table.getBoundingClientRect();
        const width = parseInt(window.getComputedStyle(table).width);

        list = document.createElement('div');
        list.classList.add('clone-list');
        list.style.position = 'absolute';
        // list.style.left = `${rect.left}px`;
        // list.style.top = `${rect.top}px`;
        table.parentNode.insertBefore(list, table);

        // Hide the original table
        table.style.visibility = 'hidden';
        
        table.querySelectorAll('tr').forEach(function (row) {

            // Create a new table from given row
            const item = document.createElement('div');
            item.classList.add('draggable'); 

            const newTable = document.createElement('table');
            newTable.setAttribute('class', 'clone-table');
            newTable.style.width = `${width}px`;

            // if(count == "hi")
            // {
            //     // alert(count);

            //     const newRow = document.createElement('thead');            
            //     const cells = [].slice.call(row.children);
            //     cells.forEach(function (cell) {
            //         const newCell = cell.cloneNode(true);
            //         newCell.style.width = `${parseInt(window.getComputedStyle(cell).width)}px`;
            //         newRow.appendChild(newCell);
            //     });
            //     count = "ho";

            //     newTable.appendChild(newRow);
            // }
            // else
            // {
            //     const newRow = document.createElement('tr');            
            //     const cells = [].slice.call(row.children);
            //     cells.forEach(function (cell) {
            //         const newCell = cell.cloneNode(true);
            //         newCell.style.width = `${parseInt(window.getComputedStyle(cell).width)}px`;
            //         newRow.appendChild(newCell);
            //     });

            //     newTable.appendChild(newRow);
            // }
            const newRow = document.createElement('tr');            
            const cells = [].slice.call(row.children);
            cells.forEach(function (cell) {
                const newCell = cell.cloneNode(true);
                newCell.style.width = `${parseInt(window.getComputedStyle(cell).width)}px`;
                newRow.appendChild(newCell);
            });

            newTable.appendChild(newRow);

            item.appendChild(newTable);
            list.appendChild(item);
        });
    };

    const mouseDownHandler = function (e) {
        // Get the original row
        const originalRow = e.target.parentNode;
        draggingRowIndex = [].slice.call(table.querySelectorAll('tr')).indexOf(originalRow);

        // Determine the mouse position
        x = e.clientX;
        y = e.clientY;

        // Attach the listeners to `document`
        document.addEventListener('mousemove', mouseMoveHandler);
        document.addEventListener('mouseup', mouseUpHandler);
    };

    const mouseMoveHandler = function (e) {
        if (!isDraggingStarted) {
            isDraggingStarted = true;

            cloneTable();

            draggingEle = [].slice.call(list.children)[draggingRowIndex];
            draggingEle.classList.add('dragging');

            // Let the placeholder take the height of dragging element
            // So the next element won't move up
            placeholder = document.createElement('div');
            placeholder.classList.add('placeholder');
            draggingEle.parentNode.insertBefore(placeholder, draggingEle.nextSibling);
            placeholder.style.height = `${draggingEle.offsetHeight}px`;
        }

        // Set position for dragging element
        draggingEle.style.position = 'absolute';
        draggingEle.style.top = `${draggingEle.offsetTop + e.clientY - y}px`;
        // draggingEle.style.left = `${draggingEle.offsetLeft + e.clientX - x}px`;

        // Reassign the position of mouse
        x = e.clientX;
        y = e.clientY;

        // The current order
        // prevEle
        // draggingEle
        // placeholder
        // nextEle
        const prevEle = draggingEle.previousElementSibling;
        const nextEle = placeholder.nextElementSibling;

        // The dragging element is above the previous element
        // User moves the dragging element to the top
        // We don't allow to drop above the header
        // (which doesn't have `previousElementSibling`)
        if (prevEle && prevEle.previousElementSibling && isAbove(draggingEle, prevEle)) {
            // The current order    -> The new order
            // prevEle              -> placeholder
            // draggingEle          -> draggingEle
            // placeholder          -> prevEle
            swap(placeholder, draggingEle);
            swap(placeholder, prevEle);
            return;
        }

        // The dragging element is below the next element
        // User moves the dragging element to the bottom
        if (nextEle && isAbove(nextEle, draggingEle)) {
            // The current order    -> The new order
            // draggingEle          -> nextEle
            // placeholder          -> placeholder
            // nextEle              -> draggingEle
            swap(nextEle, placeholder);
            swap(nextEle, draggingEle);
        }
    };

    const mouseUpHandler = function () {
        // Remove the placeholder
        placeholder && placeholder.parentNode.removeChild(placeholder);

        draggingEle.classList.remove('dragging');
        draggingEle.style.removeProperty('top');
        draggingEle.style.removeProperty('left');
        draggingEle.style.removeProperty('position');

        // Get the end index
        const endRowIndex = [].slice.call(list.children).indexOf(draggingEle);

        isDraggingStarted = false;

        // Remove the `list` element
        list.parentNode.removeChild(list);

        // Move the dragged row to `endRowIndex`
        let rows = [].slice.call(table.querySelectorAll('tr'));
        draggingRowIndex > endRowIndex
            ? rows[endRowIndex].parentNode.insertBefore(rows[draggingRowIndex], rows[endRowIndex])
            : rows[endRowIndex].parentNode.insertBefore(
                    rows[draggingRowIndex],
                    rows[endRowIndex].nextSibling
                );

        // Bring back the table
        table.style.removeProperty('visibility');

        // Remove the handlers of `mousemove` and `mouseup`
        document.removeEventListener('mousemove', mouseMoveHandler);
        document.removeEventListener('mouseup', mouseUpHandler);
    };

    table.querySelectorAll('tr').forEach(function (row, index) {
        // Ignore the header
        // We don't want user to change the order of header
        if (index === 0) {
            return;
        }

        const firstCell = row.firstElementChild;
        firstCell.classList.add('draggable');
        firstCell.addEventListener('mousedown', mouseDownHandler);
    });
}


function invoice_remove_row(ele)
{
    // alert(ele);

    // var c = document.getElementsByName("inv_item_desc[]").length;
    
    // if(c > 1)
    // {
    //     $('#' + ele).remove();
    //     sub_total_calc("subtotal");   
    // }
    // else
    // {
    //     alert("Can not delete the only row!");
    // }

    $('#' + ele).remove();
    sub_total_calc("subtotal");
}

function invoice_remove_header(ele)
{
    // alert(ele.id);

    // var c = document.getElementsByName("inv_header[]").length;
    $('#' + ele.id).remove();
}




function invoice_add_new_header()
{
    // alert("Adding new header!");
    var c = document.getElementsByName("inv_header[]").length;
    c += 1;
    var header_id = "header_"+ c;
    // alert(header_id);

    var new_row = '<tr id="'+header_id+'" style="border-top: 2px solid black;">'+
        '<td style="vertical-align: middle; text-align: center; border-bottom:0px solid grey;">'+
        '⋮'+
        '</td> <!-- Dragger -->'+
       '<td style="border-bottom:0px solid grey;" colspan="7">'+
            '<input required type="text" name="inv_header[]" id="inv_header_1"  class="form-control" placeholder="Add Header Title" style="font-weight:bold; font-size:1.2vw; text-align: left; padding:5px 2px 5px 10px; margin-top:10px; margin-bottom:10px;" onchange="">'+
            '<div style="position: relative;">'+
                '<button onclick="invoice_remove_header('+header_id+')" title="Remove this row" style="border-radius: 50%; position: absolute; right: -60px; top: -50px;" class="btn"><i  class="fa fa-times-circle-o fa-2x"></i></button>'+
            '</div>'+
        '</td>'+
    '</tr>';

    $('#invoice_items_table').append(new_row);
    draggable_table();

}


function invoice_row_amount_calc(description, hsncode, quantity, rate, discount_amt, discount_type, gstrate, total_amount)
{

    if(quantity == 'inv_quantity_1')
    {

        // alert(document.getElementById(quantity).value+"\n"+
    // document.getElementById(rate).value+"\n"+
    // document.getElementById(discount_amt).value+"\n"+
    // document.getElementById(discount_type).value+"\n"+
    // (document.getElementById(gstrate).value/100)+"\n"+
    // document.getElementById(total_amount).value);

        if(document.getElementById(discount_type).value == "%")
        {
            var actual_amount = document.getElementById(quantity).value * document.getElementById(rate).value;
            var after_discount = actual_amount * (1 - (document.getElementById(discount_amt).value/100));

            var gstrate = parseInt(document.getElementById(gstrate).value);
            if(gstrate == '100')
            {
                var after_tax = after_discount;
            }
            else
            {
                var after_tax = after_discount * (1 + (gstrate/100));
            }

            document.getElementById(total_amount).value =  Math.round((after_tax + Number.EPSILON) * 100) / 100;

            // alert("q * rate: " + actual_amount + "\n After disc: " + after_discount + "\n After Tax: " + after_tax);
        }
        else
        {
            var actual_amount = document.getElementById(quantity).value * document.getElementById(rate).value;
            var after_discount = actual_amount - document.getElementById(discount_amt).value;

            var gstrate = parseInt(document.getElementById(gstrate).value);
            if(gstrate == '100')
            {
                var after_tax = after_discount;
            }
            else
            {
                var after_tax = after_discount * (1 + (gstrate/100));
            }

            document.getElementById(total_amount).value = Math.round((after_tax + Number.EPSILON) * 100) / 100;

            // alert("q * rate: " + actual_amount + "\n After disc: " + after_discount + "\n After Tax: " + after_tax);
        }
    }
    else
    {

        // alert(quantity.value+"\n"+
        // rate.value+"\n"+
        // discount_amt.value+"\n"+
        // discount_type.value+"\n"+
        // (gstrate.value/100)+"\n"+
        // total_amount.value);

        if(discount_type.value == "%")
        {
            var actual_amount = quantity.value * rate.value;
            var after_discount = actual_amount * (1 - (discount_amt.value/100));

            var gstrate = parseInt(gstrate.value);
            if(gstrate == '100')
            {
                var after_tax = after_discount;
            }
            else
            {
                var after_tax = after_discount * (1 + (gstrate/100));
            }

            total_amount.value =  Math.round((after_tax + Number.EPSILON) * 100) / 100;

            // alert("q * rate: " + actual_amount + "\n After disc: " + after_discount + "\n After Tax: " + after_tax);
        }
        else
        {
            var actual_amount = quantity.value * rate.value;
            var after_discount = actual_amount - discount_amt.value;

            var gstrate = parseInt(gstrate.value);
            if(gstrate == '100')
            {
                var after_tax = after_discount;
            }
            else
            {
                var after_tax = after_discount * (1 + (gstrate/100));
            }

            total_amount.value =  Math.round((after_tax + Number.EPSILON) * 100) / 100;

            // alert("q * rate: " + actual_amount + "\n After disc: " + after_discount + "\n After Tax: " + after_tax);
        }
    }
    
    sub_total_calc("subtotal");
}



function sub_total_calc(option)
{
    if(option == "subtotal")
    {
        var subtotals = document.getElementsByName("inv_amount[]");

        var subtotal = 0.00;
        for (let i = 0; i < subtotals.length; i++)
        {
            subtotal += parseFloat(subtotals[i].value);
        }
        // alert(subtotals[0].value);
        document.getElementById('inv_sub_total').value = Math.round((subtotal + Number.EPSILON) * 100) / 100;

        var inv_shipping_charges = document.getElementById('inv_shipping_charges').value;
        var inv_adjustments = document.getElementById('inv_adjustments').value;

        var total =  (Math.round((subtotal + Number.EPSILON) * 100) / 100) +  parseInt(inv_shipping_charges) + parseInt(inv_adjustments);

        var round_off = Math.round(((total - Math.round(total)) + Number.EPSILON) * 100) / 100;

        var final_total = total - round_off;
        document.getElementById('inv_total').value = (Math.round((final_total + Number.EPSILON) * 100) / 100);

        round_off = round_off * -1;
        document.getElementById('inv_round_off').value = round_off;
        
    }

    if(option == "copy_values")
    {
        // Shipping charges
        var value_entered = document.getElementById('inv_shipping_charges').value;
        if(value_entered == "")
        {
            document.getElementById('inv_shipping_charges_text').value = "0.00";
            document.getElementById('inv_shipping_charges').value = 0;
        }
        else
        {
            document.getElementById('inv_shipping_charges_text').value = value_entered;
        }
        

        // Adjustments
        var value_entered = document.getElementById('inv_adjustments').value;
        if(value_entered == "")
        {
            document.getElementById('inv_adjustments_text').value = "0.00";
            document.getElementById('inv_adjustments').value = 0;
        }
        else
        {
            document.getElementById('inv_adjustments_text').value = value_entered;
        }

        sub_total_calc("subtotal");   
    }
}


$(document).on('click', '.new_invoice', function(){  

    // alert("adding Invoice..");
    // window.location = $(this).data('href');

    $("#invoice_submit").html("Add Invoice");
    $("#invoice_submit").removeClass('btn shadow-none btn-warning').addClass('btn shadow-none btn-primary');
    // $("#invoice_submit").attr("disabled", true);
    $("#invoice_submit").attr("type", 'submit');
    $("#invoice_submit").attr('onClick','');

    $("#exampleModalLabel_invoice").html("Adding New Invoice");

    $('#new_invoice_modal').find('form').trigger('reset');

    $("#address_show").attr("hidden", true);
    $("#additional_title").attr("hidden", true);
    $("#additional_content").attr("hidden", true);
    $("#add_field_btn").html("Add Extra Field");

    // $('#cityId').attr("hidden", false);
    // $('#bcity').attr("hidden", true);
    // $("#cityId").attr("disabled", false);
    // $("#bcity").attr("disabled", true);
    SetDate();
    $('#new_invoice_modal').modal('show');
 });


 $(document).on('click', '.inv_num_setting', function(){  

    // alert("adding Invoice..");
    // window.location = $(this).data('href');

    // $("#invoice_submit").html("Add Invoice");
    // $("#invoice_submit").removeClass('btn shadow-none btn-warning').addClass('btn shadow-none btn-primary');
    // $("#invoice_submit").attr("disabled", true);
    // $("#invoice_submit").attr("type", 'submit');
    // $("#invoice_submit").attr('onClick','');

    // $("#exampleModalLabel_invoice").html("Adding New Invoice");

    // $('#new_invoice_modal').find('form').trigger('reset');

    // $("#address_show").attr("hidden", true);

    // $('#cityId').attr("hidden", false);
    // $('#bcity').attr("hidden", true);
    // $("#cityId").attr("disabled", false);
    // $("#bcity").attr("disabled", true);

    $('#invoice_number_edit_modal').modal('show');
 });

 $(document).on('show.bs.modal', '.modal', function() {
    const zIndex = 1040 + 10 * $('.modal:visible').length;
    $(this).css('z-index', zIndex);
    setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
  });