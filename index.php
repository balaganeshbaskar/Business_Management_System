
<?php require('connect.php');?>

<!doctype html>
<html lang="en">
	
	<head>
		<title>Tybon</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


		<!-- External stylesheet reference -->
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="fa/css/font-awesome.min.css">

		<!-- Google font CDN Integration -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<script src="//geodata.solutions/includes/countrystatecity.js"></script>

		<script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
		<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		
	

	</head>

	<script src="js/index.js"></script>

	<body onload="tabs_toggle('invoice');">
	
		<!-- <nav class="navbar navbar-expand-lg">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

				</ul>
				<div class="user_badge d-flex">
					<div class="nav-item dropdown">
						<a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle user-action"><img src="images/avatar.jpg" class="avatar" alt="Avatar"> Company Name <b class="caret"></b></a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
							<li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav> -->

		<div class="modal fade" id="new_customer_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Adding New Customer</b></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="Add_Customer.php" id="cust_form" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="padding-bottom:20px;">	
								<div class="cust_info_1"> 
									<div class="form-group" style="text-align: center; margin-bottom: 20px;">
										<label><b>Customer Details</b></label>	
									</div>
									<div class="form-group row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
											<label for="" class="col-form-label"><b>Customer Type</b></label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="ctype" id="business" value="business">
												<label class="form-check-label" for="business">Business</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="ctype" id="individual" value="individual">
												<label class="form-check-label" for="individual">Individual</label>
											</div>
										</div>
									</div>

									<hr style="width: 100%; margin-top: 2px; margin-bottom: 2px; border-top: 1px solid black;">

									<div class="form-group" style="margin-top: 20px;">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<label for="" class="col-form-label"><b>Primary Contact</b></label>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
												<select class="form-select" aria-label="Default select" name="salutation" id="salutation" required="true">
													<option selected>Salutaion</option>
													<option value="Ms">Ms. </option>
													<option value="Mr">Mr. </option>
													<option value="Mrs">Mrs. </option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-4">
										</div>
										<div class="col-sm-8">
											<input required type="text" maxlength="30" name="fname"  id="fname" class="form-control" placeholder="First Name">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-4">
										</div>
										<div class="col-sm-8">
											<input required type="text" maxlength="30" name="lname" id="lname" class="form-control" placeholder="Last Name">
										</div>
									</div>
									
									<div class="form-group row" style="margin-top: 40px;">
										<label for="staticEmail" class="col-sm-4 col-form-label"><b>Company Name</b></label>
										<div class="col-sm-8">
											<input required type="text" maxlength="20" name="company" id="company" class="form-control" placeholder="">
										</div>
									</div>
									
									<div class="form-group row" style="margin-top: 20px;">
										<label for="staticEmail" class="col-sm-4 col-form-label"><b>Display Name</b></label>
										<div class="col-sm-8">
											<input required type="text" maxlength="20" name="dname" id="dname"  class="form-control" placeholder="">
										</div>
									</div>
									
									<div class="form-group row" style="margin-top: 20px;">
										<label for="staticEmail" class="col-sm-4 col-form-label"><b>Customer Email</b></label>
										<div class="col-sm-8">
											<input required type="email" name="email"  id="email" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row" style="margin-top: 20px;">
										<label for="staticEmail" class="col-sm-4 col-form-label"><b>Customer Phone</b></label>
										<div class="col-sm-7">
											<input required type="number" name="mobile[]"  id="new_1" class="form-control" placeholder="">
										</div>
										<div class="col-sm-1" style="display: flex; justify-content: center;">
											<button onclick="add_phone_field(0)" title='Add alternate number' style='border-radius: 50%;' class="btn"><i  class="fa fa-plus"></i></button>
										</div>
									</div>
									<div id="new_field"></div>
									<input type="hidden" value="1" id="total_fields">
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label"><b>Vendor Code</b></label>
										<div class="col-sm-8">
											<input required type="text" id="vendorcode" name="vendorcode"  class="form-control" placeholder="">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding-bottom:20px;">
								<div class="cust_info_2"> 
									<div class="form-group" style="text-align: center; margin-bottom: 20px;">
										<label><b>Bank & GST Details</b></label>	
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>Bank Name</b></label>
										<div class="col-sm-8">
											<input required type="text" name="bankname"  id="bankname" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>Account Number (A/C)</b></label>
										<div class="col-sm-8">
											<input required type="text" name="accno"  id="accno" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>Re-Enter A/C Number</b></label>
										<div class="col-sm-8">
											<input required type="text" name="accnocheck"  id="accnocheck" onchange="checkacnumber()" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>IFSC Code</b></label>
										<div class="col-sm-8">
											<input required type="text" name="ifsc"  id="ifsc" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>Branch Name</b></label>
										<div class="col-sm-8">
											<input required type="text" name="branch"  id="branch" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>Amount Receivable</b></label>
										<div class="col-sm-8">
											<input required type="text" name="receivable"  id="receivable" class="form-control" value="0" placeholder="0">
										</div>
									</div>

									<hr style="width: 100%; margin-top: 20px; margin-bottom: 20px; border-top: 1px solid black;">

									<div class="form-group row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
											<label for="" class="col-form-label"><b>Place of Supply</b></label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
											<select class="form-select" aria-label="Default select" name="statecode" id="statecode" required="true">
												<option selected>State [Code]</option>
												<option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR [1]</option>
												<option value="HIMACHAL PRADESH">HIMACHAL PRADESH [2]</option>
												<option value="PUNJAB">PUNJAB [3]</option>
												<option value="CHANDIGARH">CHANDIGARH [4]</option>
												<option value="UTTARAKHAND">UTTARAKHAND [5]</option>
												<option value="HARYANA">HARYANA [6]</option>
												<option value="DELHI">DELHI	[7]</option>
												<option value="RAJASTHAN">RAJASTHAN	[8]</option>
												<option value="UTTAR PRADESH">UTTAR PRADESH	[9]</option>
												<option value="BIHAR">BIHAR	[10]</option>
												<option value="SIKKIM">SIKKIM [11]</option>
												<option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH	[12]</option>
												<option value="NAGALAND">NAGALAND [13]</option>
												<option value="MANIPUR">MANIPUR [14]</option>
												<option value="MIZORAM">MIZORAM [15]</option>
												<option value="TRIPURA">TRIPURA [16]</option>
												<option value="MEGHALAYA">MEGHALAYA [17]</option>
												<option value="ASSAM">ASSAM [18]</option>
												<option value="WEST BENGAL">WEST BENGAL [19]</option>
												<option value="JHARKHAND">JHARKHAND [20]</option>
												<option value="ODISHA">ODISHA [21]</option>
												<option value="CHATTISGARH">CHATTISGARH [22]</option>
												<option value="MADHYA PRADESH">MADHYA PRADESH [23]</option>
												<option value="GUJARAT">GUJARAT [24]</option>
												<option value="DADRA">DADRA, NAGAR HAVELI, DAMAN, DIU [26*]</option>
												<option value="MAHARASHTRA">MAHARASHTRA [27]</option>
												<option value="ANDHRA PRADESH">ANDHRA PRADESH [28]</option>
												<option value="KARNATAKA">KARNATAKA [29]</option>
												<option value="GOA">GOA [30]</option>
												<option value="LAKSHADWEEP">LAKSHADWEEP [31]</option>
												<option value="KERALA">KERALA [32]</option>
												<option value="TAMIL NADU">TAMIL NADU [33]</option>
												<option value="PUDUCHERRY">PUDUCHERRY [34]</option>
												<option value="ANDAMAN AND NICOBAR">ANDAMAN AND NICOBAR [35]</option>
												<option value="TELANGANA">TELANGANA	[36]</option>
												<option value="ANDHRA PRADESH">ANDHRA PRADESH [37]</option>
												<option value="LADAKH">LADAKH [38]</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label"><b>GSTIN</b></label>
										<div class="col-sm-8">
											<input required type="text" name="gstno" id="gstno" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label for="hsncode" class="col-sm-4 col-form-label"><b>HSN Code(s)</b></label>
										<div class="col-sm-7">
											<input required type="text" name="hsn[]"  id="hsn_1" class="form-control" placeholder="">
										</div>
										<div class="col-sm-1" style="display: flex; justify-content: center;">
											<button onclick="add_hsn_code(0)" title='Add all hsn codes' style='border-radius: 50%;' class="btn"><i  class="fa fa-plus"></i></button>
										</div>
									</div>
									<div id="new_hsn"></div>
									<input type="hidden" value="1" id="total_hsn">

									<div class="form-group row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">	
											<label for="" class="col-form-label"><b>GST Rates</b></label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">	
											<select class="form-select" aria-label="Default select" name="gstrate" id="gstrate" required="true">
												<option value="100" selected>GST Rate</option>
												<option value="0">No tax</option>
												<option value="5">5% [2.5% + 2.5%]</option>
												<option value="12">12% [6% + 6%]</option>
												<option value="18">18% [9% + 9%]</option>
												<option value="28">28% [14% + 14%]</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- style="border-bottom: 2px solid black;" -->
						<div class="cust_info_3"> 
							<div class="row" >
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="border-right: 1px solid black; padding-bottom:20px;">	
									<div class="form-group" style="text-align: center; margin-bottom: 20px;">
										<label><b>Billing Address</b></label>	
									</div>
									<div class="form-group row" style="margin-top: 40px;">
										<label class="col-sm-2 col-form-label"><b>Address</b></label>
										<div class="col-sm-10">
											<input required type="text" maxlength="30" name="baddr1" id="baddr1" class="form-control" placeholder="Line 1">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b></b></label>
										<div class="col-sm-10">
											<input required type="text" maxlength="30" name="baddr2" id="baddr2" class="form-control" placeholder="Line 2">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b></b></label>
										<div class="col-sm-10">
											<input required type="text" maxlength="30" name="baddr3" id="baddr3" class="form-control" placeholder="Line 3">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Country</b></label>
										<div class="col-sm-7" id="country_div">
											<!-- <input required type="text" name="bcountry"  class="form-control" placeholder=""> -->
											<select class="countries order-alpha presel-IN form-control" id="countryId" name="bcountry">
												<option value="">Select Country</option>
											</select>
											<input required type="text" name="bcountry" id="bcountry" class="form-control" placeholder="" hidden>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>State</b></label>
										<div class="col-sm-7" id="state_div">
											<!-- <input required type="text" name="bstate"  class="form-control" placeholder=""> -->
											<select class="states form-control" id="stateId" name="bstate">
												<option value="">Select State</option>
											</select>
											<input required type="text" name="bstate" id="bstate" class="form-control" placeholder="" hidden>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>City</b></label>
										<div class="col-sm-7" id="city_div">
											<!-- <input required type="text" name="bcity"  class="form-control" placeholder=""> -->
											<select class="cities form-control" id="cityId" name="bcity">
												<option value="">Select City</option>
											</select>
											<input required type="text" name="bcity" id="bcity" class="form-control" placeholder="" hidden>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Pincode</b></label>
										<div class="col-sm-7">
											<input required type="number" name="bpincode" id="bpincode" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Phone</b></label>
										<div class="col-sm-7">
											<input required type="number" name="bphone" id="bphone" class="form-control" placeholder="">
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
									<div class="form-group" style="text-align: center; margin-bottom: 20px;">
										<label><b>Shipping Address</b></label>	
									</div>
									<div class="form-check">
										<input class="form-check-input" onclick="copy_address(this)" name="copyaddress" type="checkbox" value="1" id="flexCheckDefault">
										<label style="color:blue;" class="form-check-label" for="flexCheckDefault">Same as Billing Address</label>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Address</b></label>
										<div class="col-sm-10">
											<input required type="text" maxlength="30" name="saddr1" id="saddr1" class="form-control" placeholder="Line 1">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b></b></label>
										<div class="col-sm-10">
											<input required type="text" maxlength="30" name="saddr2" id="saddr2" class="form-control" placeholder="Line 2">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b></b></label>
										<div class="col-sm-10">
											<input required type="text" maxlength="30" name="saddr3" id="saddr3" class="form-control" placeholder="Line 3">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Country</b></label>
										<div class="col-sm-7">
											<input required type="text" name="scountry" id="scountry" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>State</b></label>
										<div class="col-sm-7">
											<input required type="text" name="sstate"  id="sstate" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>City</b></label>
										<div class="col-sm-7">
											<input required type="text" name="scity" id="scity" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Pincode</b></label>
										<div class="col-sm-7">
											<input required type="number" name="spincode" id="spincode" class="form-control" placeholder="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label"><b>Phone</b></label>
										<div class="col-sm-7">
											<input required type="number" name="sphone" id="sphone" class="form-control" placeholder="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="text" name="c_id" id="c_id" placeholder="" hidden>
						<div class="form-group" style="text-align: right; margin-top: 40px;">
							<button type="submit" class="btn shadow-none btn-primary" id="cust_submit" name="cust_submit" disabled>Add Customer</button>
							<button type="button" class="btn shadow-none btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
				<!-- <div class="modal-footer">
					
				</div> -->
				</div>
			</div>
		</div>


		<div class="row tab_container">
			<!-- COLUMN 1 -->
			<div class="col-2 tab_button">
				<div class="self_brand_div">
					<!-- <a class="navbar-brand" href="#"><img src="images/tybon.jpg" class="tybon" alt="tybon"></a> -->
					<h1>Tybon</h1>
				</div>
				<button class="btn tabs" onclick="tabs_toggle('customers')" id="customer_btn">Customers<i class="fa fa-caret-right"></i></button>
				<button class="btn tabs" onclick="tabs_toggle('invoice')" id="invoice_btn">Invoice<i class="fa fa-caret-right"></i></button>
				<button class="btn tabs" onclick="tabs_toggle('quotes')" id="quotes_btn">Quotations<i class="fa fa-caret-right"></i></button>
				<button class="btn tabs" onclick="tabs_toggle('dc')" id="dc_btn">Delivery Challan<i class="fa fa-caret-right"></i></button>
			</div>
			<!-- COLUMN 2 -->
			<div class="col-10 tab_content">

				<div class="custom_navbar">
					<div class="user_badge">
							<div class="nav-item dropdown">
								<a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle user-action"><img src="images/avatar.jpg" class="avatar" alt="Avatar"> Company Name <b class="caret"></b></a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
									<li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a></li>
								</ul>
							</div>
						</div>
				</div>

				<!-- CUSTOMERS TAB CONTENT -->
				<!-- style="border: 2px solid green;" -->
				<div class="customer_tab_content" id="customer" hidden>
					<div style="text-align: center;">
						<!-- <h3>Customers List</h3> -->
						<!-- <h5 style="color:red;">NOTE: </h5> -->
						<!-- Filter Feature -->
						<div class="row filter_bar">
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
										<input type="checkbox" id="selectall_customer" style="margin-top: 8px; float: left; height: 20px; width: 20px;" value="" onchange="selectall(this)">
									</div>
									<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
										<button id="new_customer" type="button" style="float: left;" class="btn shadow-none btn-success new_customer"><i class="fa  fa-plus"></i>&nbsp;&nbsp;&nbsp;New</button>
									</div>	
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<!-- Empty Filler -->
									</div>
								</div>
							</div>		
							<!-- style="border: 1px solid red;" -->
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<!-- Empty Filler -->
							</div>
							<div id="filter_label" class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
								<p style="text-align: center; margin-top: 5px; font-size:20px;"><b>Search:</b></p>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<input class="form-control" type="text" id="namesearch" onkeyup="searchfun('customers')" placeholder="Type any Name" title="Type in a Company Name">
							</div>	
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<input type="text" class="form-control" id="citysearch" onkeyup="searchfun('customers')" placeholder="Type any City" title="Type in a City">
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<select name="level" id="amountsearch" class="form-control" onchange="searchfun('customers')" class="form-control">
									<option>Amount Receivable</option>
									<option>&lt;  ₹ 10,000</option>
									<option>₹ 10k - ₹ 50k</option>
									<option>₹ 50k - ₹ 1 Lakh</option>
									<option>₹ 1 Lakh - ₹ 10 Lakh</option>
									<option>&gt; ₹ 10 Lakh</option>
								</select>
							</div>
							<div id="clear_filters_div" class="col-lg-1 col-md-1 col-sm-12 col-xs-12" hidden>
								<button type="button" id="clear_filters" class="btn shadow-none btn-danger clear_filters" onclick="ClearFilters('customers')"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- Filter Feature End-->
						<br>

						<?php $customers = $mysqli->query("SELECT * FROM customers") or die($mysqli->error); 
							$total = 0;

						?>
						
						<!-- table content -->
						<div class="table_container panel panel-default">
						<!-- <h4 style="color:red;">check box | company name | Display Name| phone number | Email | city | Vendor Code | Amount Receivables</h4> -->
							<table id="customer_table" class="customer_table table table-hover">
								<thead class="customer_thead">
									<tr style="height: 50px;">
											<th style="vertical-align: middle; text-align: center; width: 5%;"></th>
											<th data-mdb-sort="false" style="vertical-align: middle; text-align: center; width: 20%; border-left: 1px solid lightgrey;">Company Name</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;">Display Name</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">Contact</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">E-Mail</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;">City</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">Vendor Code</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;">Amount receivable</th>
									</tr>
								</thead>
								
								<tbody>
								<?php while ($row = $customers->fetch_assoc()): ?>
								<?php 
									$c_id = $row['c_id'];

									$tmob = $row['mobile'];

									$mob = explode("+",$tmob);

									$total = $total + (int)$row['receivable'];
								?>
									<!-- onchange="rowsel()" -->
									<tr class='clickable-row' id='<?php echo $row['c_id'];?>'>
										<td style="vertical-align: middle;" class='non-clickable-row'>
											<input type="checkbox" name="rows_customer" value="" style="height: 18px; width: 18px;">
										</td>
										<td style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey;"><?php echo $row['company']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['dname']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $mob[1]; ?></td>
										<td style="vertical-align: middle; text-align: center;"><a onclick="GoToMail(); return false;"><?php echo $row['email']; ?></a></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['scity']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['vendorcode']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['receivable']; ?></td>
									</tr>
									
									<?php endwhile; ?>
									<tfoot>
										<tr style="height: 50px;" class=" noHover table_footer">
											<th style="vertical-align: middle; text-align: center; width: 5%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 20%; border-left: 1px solid lightgrey;"></th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">TOTAL</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"><?php echo $total; ?></th>
										</tr>
									</tfoot>
								</tbody>
							</table>
						</div>
					</div>

				</div>


				<div class="modal fade" id="new_invoice_modal" tabindex="-1" aria-labelledby="exampleModalLabel_invoice" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-xl">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel_invoice"><b>Adding New Invoice</b></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="Add_Invoice.php" id="cust_form" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom:20px;">	
										<div class="invoice_info_1"> 
											<div class="form-group" style="text-align: center; margin-bottom: 20px;">
												<label><b>Invoice Details</b></label>	
											</div>
											<?php $customers = $mysqli->query("SELECT * FROM customers") or die($mysqli->error);
												?>
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group" style="margin-top: 20px;">
														<div class="row">
															<label class="col-sm-4 col-form-label"><b>Customer Name</b></label>
															<div class="col-sm-8"> 
																<input onchange="customer_name(this)" onfocus="this.value=''" class="form-control shadow-none" placeholder="Select Customer Name" list="brow" name="customer_name_selected" id="customer_name_selected">
																<datalist id="brow">
																<?php while ($row = $customers->fetch_assoc()): ?>
																<option id="<?php echo $row['c_id']; ?>" value="<?php echo $row['c_id']; ?>.<?php echo $row['company']; ?>"></option>
																<?php endwhile; ?>
																<option value="Add Customer"></option>
																</datalist>  
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="address_show row" id="address_show" hidden>
												<!-- <hr style="width: 100%; margin-top: 2px; margin-bottom: 2px; border-top: 1px solid black;"> -->
												<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
													<p class="cust_address_show" ><b>BILLING ADDRESS</b><button class="btn shadow-none" title="Change Billing Address"><i class="fa fa-wrench"></i>&nbsp;&nbsp;</button></p>
													<p class="cust_address_show" id="billing_address" name="billing_address">
														<!-- 138 Barrows Circle Suite 377<br>
														Chennai<br>
														Tamilnadu 600023<br>
														India<br>
														Phone: 905.528.9079 -->
													</p>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
													<p class="cust_address_show"><b>SHIPPING ADDRESS</b><button class="btn shadow-none" title="Change Shipping Address"><i class="fa fa-wrench"></i>&nbsp;&nbsp;</button></p>
													<p class="cust_address_show" id="shipping_address" name="shipping_address">
														<!-- 138 Barrows Circle Suite 377<br>
														Chennai<br>
														Tamilnadu 600023<br>
														India<br>
														Phone: 905.528.9079 -->
													</p>
												</div>
											</div>
											
											<div class="row" style="margin-top: 40px;">
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row" style="margin-top: 10px;">
														<label class="col-sm-4 col-form-label"><b>Invoice Number</b></label>
														<div class="col-sm-7">
															<input required type="text" maxlength="20" name="invoice_num" id="invoice_num" class="form-control" placeholder="">
														</div>
														<div class="col-sm-1">
															<button class="inv_num_setting btn shadow-none" title="Invoice Number Generation Settings"><i class="fa fa-cog"></i></button>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-sm-2 col-form-label"><b>Invoice Date</b></label>
												<div class="col-sm-3">
													<input required type="date" onchange="update_due_date_terms()" maxlength="20" name="invoice_date" id="invoice_date"  class="form-control" placeholder="">
												</div>
												<div class="col-sm-1" style="text-align: center;">
													<p style="margin-top:8px;" >Terms</p>
												</div>
												<div class="col-sm-2">
													<select onchange="due_date_terms_change(this)" name="due_date_terms" id="due_date_terms" onchange="" class="form-control">
														<option value="Net 15 days">Net 15 days</option>
														<option  value="Net 30 days">Net 30 days</option>
														<option  value="Net 45 days">Net 45 days</option>		
														<option  value="Net 60 days">Net 60 days</option>
														<option  value="Due End of Month">Due End of Month</option>
														<option  value="Due On Receipt">Due On Receipt</option>
														<option  value="Custom">Custom</option>
													</select>
												</div>
												<div class="col-sm-1" style="text-align: center; color:grey;">
													<p style="margin-top:8px; font-size:1vw;" >Due Date</p>
												</div>
												<div class="col-sm-3">
													<input required type="date" onchange="custom_due_date()" maxlength="20" name="due_date" id="due_date"  class="form-control" style="color:grey;">
												</div>
											</div>

											<div class="row" style="margin-top: 40px;">
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="border-right: 2px solid lightgrey;">
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><b>PO Number</b></label>
														<div class="col-sm-8">
															<input required type="text" maxlength="20" name="po_num" id="po_num"  class="form-control" placeholder="">
														</div>
													</div>
													<div class="form-group row" style="margin-top: 20px;">
														<label class="col-sm-4 col-form-label"><b>PO Date</b></label>
														<div class="col-sm-8">
															<input required type="date" maxlength="20" name="po_date" id="po_date"  class="form-control" placeholder="">
														</div>
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><b>Cust. DC Number</b></label>
														<div class="col-sm-8">
															<input required type="text" maxlength="20" name="dc_num" id="dc_num"  class="form-control" placeholder="">
														</div>
													</div>
													<div class="form-group row" style="margin-top: 20px;">
														<label class="col-sm-4 col-form-label"><b>Cust. DC Date</b></label>
														<div class="col-sm-8">
															<input required type="date" maxlength="20" name="dc_date" id="dc_date"  class="form-control" placeholder="">
														</div>
													</div>
												</div>
											</div>


											<div class="row" style="margin-top: 40px;">
												<div class="form-group row">
													<div class="col-sm-3" >
														<button onclick="invoice_add_additional_field('add')" type="button" style="border: 1px solid lightgrey;" id="add_field_btn" class="btn btn-default">Add Extra Field</button>
													</div>
													<div class="col-sm-4" >
														<input required type="text" name="additional_title" id="additional_title"  class="form-control" value=" " placeholder="Title for field" hidden>
													</div>
													<div class="col-sm-5">
														<input required type="text" name="additional_content" id="additional_content"  class="form-control" value=" " placeholder="Content of field" hidden>
													</div>
												</div>				
											</div>

											<div class="form-group row" style="margin-top: 80px;">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
													<!-- <label class="col-sm-2 col-form-label"><b>Items & Pricing</b></label> -->
													<table id="invoice_items_table" class="invoice_items_table table table-hover" style="width:97%;">
														<thead class="invoice_items_thead">
															<tr style="height: 50px;">
																<th style="vertical-align: middle; text-align: center; width: 2%;"></th>
																<th style="vertical-align: middle; text-align: center; border-right:2px solid black; width: 30%;">Item Details</th>
																<th style="vertical-align: middle; text-align: center; border-right:2px solid black; width: 10%;">HSN</th>
																<th style="vertical-align: middle; text-align: center; border-right:2px solid black; width: 10%;">Quantity</th>
																<th style="vertical-align: middle; text-align: center; border-right:2px solid black; width: 10%;">Rate</th>
																<th style="vertical-align: middle; text-align: center; border-right:2px solid black; width: 5%;">Discount</th>
																<th style="vertical-align: middle; text-align: center; border-right:2px solid black; width: 18%;">Tax</th>
																<th style="vertical-align: middle; text-align: center; width: 15%;">Amount</th>
															</tr>
														</thead> 	
														
														<tbody>
															<tr id="24" style="border-top: 2px solid black;">
																<td style="vertical-align: middle; text-align: center; border-bottom:0px solid grey;">
																⋮
																</td> <!-- Dragger -->
																<td style="vertical-align: middle; text-align: center; border-right:1px solid grey; border-bottom:0px solid grey;">
																	<textarea class="form-control" rows="3" id="inv_item_desc_1" name="inv_item_desc[]" placeholder="Type Item name & Description"></textarea>
																</td> <!-- Item Description -->
																<td style="border-bottom:0px solid grey; border-right:1px solid grey;"><input required type="text" name="inv_hsn[]" id="inv_hsn_1"  class="form-control" value="" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;"></td> <!-- HSN -->
																<td style="border-bottom:0px solid grey; border-right:1px solid grey;"><input required type="number" name="inv_quantity[]" id="inv_quantity_1"  class="form-control" value="1" placeholder="" style="text-align: right; padding:5px 5px 5px 5px;" onchange="invoice_row_amount_calc('inv_item_desc_1','inv_hsn_1', 'inv_quantity_1', 'inv_rate_1', 'inv_discount_amt_1', 'inv_discount_type_1', 'inv_gstrate_1', 'inv_amount_1');"></td> <!-- Quantity -->
																<td style="border-bottom:0px solid grey; border-right:1px solid grey;"><input required type="number" name="inv_rate[]" id="inv_rate_1"  class="form-control" value="0" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;" onchange="invoice_row_amount_calc('inv_item_desc_1','inv_hsn_1', 'inv_quantity_1', 'inv_rate_1', 'inv_discount_amt_1', 'inv_discount_type_1', 'inv_gstrate_1', 'inv_amount_1');"></td> <!-- rate -->
																<td style="border-bottom:0px solid grey; border-right:1px solid grey;">
																	<div>
																		<div style="text-align: center;">
																			<input required type="number" name="inv_discount_amt[]" id="inv_discount_amt_1"  class="form-control" value="0" placeholder="" style="text-align: right; padding:5px 2px 5px 2px;" onchange="invoice_row_amount_calc('inv_item_desc_1','inv_hsn_1', 'inv_quantity_1', 'inv_rate_1', 'inv_discount_amt_1', 'inv_discount_type_1', 'inv_gstrate_1', 'inv_amount_1');">
																		</div>
																		<div style="padding-left: 0px; margin-top: 5px;">
																			<select style="text-align: center; padding-left:2px; padding-right:2px; " name="inv_discount_type[]" id="inv_discount_type_1" class="form-control" onchange="invoice_row_amount_calc('inv_item_desc_1','inv_hsn_1', 'inv_quantity_1', 'inv_rate_1', 'inv_discount_amt_1', 'inv_discount_type_1', 'inv_gstrate_1', 'inv_amount_1');">
																				<option value="%"><b>%</b></option>
																				<option value="Rs"><b>₹</b></option>
																			</select>
																		</div>
																	</div>
																</td> <!-- discount -->
																<td style="border-bottom:0px solid grey; border-right:1px solid grey;">
																	<select style="text-align: left; padding-left:5px; padding-right:5px; " class="form-select" aria-label="Default select" name="inv_gstrate[]" id="inv_gstrate_1" required="true" onchange="invoice_row_amount_calc('inv_item_desc_1','inv_hsn_1', 'inv_quantity_1', 'inv_rate_1', 'inv_discount_amt_1', 'inv_discount_type_1', 'inv_gstrate_1', 'inv_amount_1');">
																		<option value="100">GST Rate</option>
																		<option value="0">No tax</option>
																		<option value="5">5% [2.5% + 2.5%]</option>
																		<option value="12">12% [6% + 6%]</option>
																		<option value="18">18% [9% + 9%]</option>
																		<option value="28">28% [14% + 14%]</option>
																	</select>
																</td> <!-- gstrate -->
																<td style="border-bottom:0px solid grey;"><input readonly type="text" name="inv_amount[]" id="inv_amount_1"  class="form-control" value="0" style="text-align: right; padding:5px 5px 5px 2px;">
																<div style="position: relative;">
																	<button onclick="invoice_remove_row(24)" title='Remove this row' style='border-radius: 50%; position: absolute; right: -60px; top: -15px;' class="btn"><i  class="fa fa-times-circle-o fa-2x"></i></button>
																</div>
																</td> <!-- amount -->
															</tr>
														</tbody>

														<!-- <tfoot>
															<tr style="height: 50px;" class="noHover">
																<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
																<th style="vertical-align: middle; text-align: center; width: 10%;"></th>
																<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
																<th style="vertical-align: middle; text-align: center; width: 10%;"></th>
																<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
																<th style="vertical-align: middle; text-align: center; width: 10%;">TOTAL</th>
															</tr>
														</tfoot> -->

													</table>
													<div class="add_next_row">
														<button onclick="invoice_add_new_row()" type="button" class="btn btn-sm btn-secondary "><i  class="fa fa-plus"></i>&nbsp;&nbsp;Add New Row</button>
														<button onclick="invoice_add_new_header()" type="button" class="btn btn-sm btn-secondary "><i  class="fa fa-plus"></i>&nbsp;&nbsp;Add New Header</button>
													</div>
												</div>
											</div>

											<div class="form-group row" style="margin-top:80px; margin-left:5px; width: 97%;">
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-right:40px;">
													<div class="row">
														<div class="form-group">
															<label class="col-form-label"><b>Customer Notes</b></label>
															<div>
																<textarea class="form-control" rows="3" id="" name="customer_notes" placeholder="Type Notes for Customer here"></textarea>
															</div>
														</div>
													</div>
													<div class="row">
													<div class="form-group">
															<label class="col-form-label"><b>Terms & Conditions</b></label>
															<div>
																<textarea class="form-control" rows="5" id="" name="terms_conditions" placeholder="Type Terms and Conditions here"></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-right:20px; border-radius:25px; border: 2px solid lightgrey;">
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><b>Sub - Total (₹)</b></label>
														<div class="col-sm-4" style="text-align: right;">
															
														</div>
														<div class="col-sm-4" style="text-align: right;">
															<input style="text-align: right;" type="text" name="inv_sub_total" id="inv_sub_total"  class="form-control" placeholder="0.00" readonly>
															<!-- <input style="text-align: right;" type="text" maxlength="20" name="inv_sub_total" id="inv_sub_total"  class="form-control" placeholder="0.00" disabled> -->
															<!-- <p style="font-size: 1.2vw;" name="inv_sub_total" id="inv_sub_total">0.00</p> -->
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><b>Shipping Charges</b></label>
														<div class="col-sm-4" >
															<input style="text-align: right;" type="number" maxlength="20" name="inv_shipping_charges" id="inv_shipping_charges" class="form-control" value="0" placeholder="" onchange="sub_total_calc('copy_values')">
														</div>
														<div class="col-sm-4" style="text-align: right;">
															<!-- <p style="font-size: 1.2vw;" name="inv_shipping_charges_text" id="inv_shipping_charges_text">0.00</p> -->
															<input style="text-align: right;" type="text" name="inv_shipping_charges_text" id="inv_shipping_charges_text"  class="form-control" placeholder="0.00" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><b>Adjustments</b></label>
														<div class="col-sm-4">
															<input style="text-align: right;" required type="number"name="inv_adjustments" id="inv_adjustments"  class="form-control" value="0" placeholder="" onchange="sub_total_calc('copy_values')">
														</div>
														<div class="col-sm-4" style="text-align: right;">
															<!-- <p style="font-size: 1.2vw;" name="inv_adjustments_text" id="inv_adjustments_text">0.00</p> -->
															<input style="text-align: right;" type="text" name="inv_adjustments_text" id="inv_adjustments_text"  class="form-control" placeholder="0.00" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-sm-4 col-form-label"><b>Round-Off</b></label>
														<div class="col-sm-4">
										
														</div>
														<div class="col-sm-4" style="text-align: right;">
															<!-- <p style="font-size: 1.2vw;" name="inv_round_off" id="inv_round_off">0.00</p> -->
															<input style="text-align: right;" type="text" name="inv_round_off" id="inv_round_off"  class="form-control" placeholder="0.00" readonly>
														</div>
													</div>
													<div class="form-group row"  style="border-top: 2px solid lightgrey; padding-top:10px;">
														<label class="col-sm-4 col-form-label" style="font-size:1.5vw;"><b>TOTAL (₹)</b></label>
														<div class="col-sm-4">

														</div>
														<div class="col-sm-4" style="text-align: right;">
															<!-- <p style="font-size: 1.5vw;" name="inv_total" id="inv_total">0.00</p> -->
															<input style="text-align: right;" type="text"name="inv_total" id="inv_total"  class="form-control" placeholder="0.00" readonly>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- style="border-bottom: 2px solid black;" -->
								<input type="text" name="i_id" id="i_id" placeholder="" hidden>
								<input type="date" name="creation_date" id="creation_date" placeholder="" hidden>

								<div class="form-group" style="text-align: right; margin-top: 40px;">
									<button type="submit" class="inv_buttons btn shadow-none btn-primary" id="invoice_submit" name="invoice_submit">Add Invoice</button>
									<button class="inv_buttons btn shadow-none btn-warning" id="invoice_save_draft" name="invoice_save_draft">Save as Draft</button>
									<button type="button" class="inv_buttons btn shadow-none btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
						<!-- <div class="modal-footer">
							
						</div> -->
						</div>
					</div>
				</div>


				<!-- Modal NEW - INVOICE -->
				<div class="modal fade" id="invoice_number_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel_invoice"><b>Invoice Number</b></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="inv_num_body">
									<div class="row">
										<p>Your invoice numbers are set on auto-generate mode to save your time. Are you sure about changing this setting?</p>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<!-- <label for="" class="col-form-label"><b>Customer Type</b></label> -->
											<div class="form-check" style="margin-left:10px; margin-top:10px;">
												<input class="form-check-input" onclick="inv_num_creation(this)" type="radio" name="inv_num_gen" id="manual_inv_num" value="manual_inv_num">
												<label class="form-check-label" for="manual_inv_num">I will add them manually each time</label>
											</div>
											<div class="form-check" style="margin-left:10px; margin-top:10px;">
												<input class="form-check-input" onclick="inv_num_creation(this)" type="radio" name="inv_num_gen" id="auto_inv_num" value="auto_inv_num"> 
												<label class="form-check-label" for="auto_inv_num">Continue auto-generating invoice numbers</label>
											</div>
											<div id="inv_num_pattern" hidden>
												<br>
												<div class="row">
													<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
																
													</div>
													<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
														<label class="form-check-label">Prefix</label>
														<input required type="text" maxlength="20" name="order_num" id="order_num"  class="form-control" placeholder="">		
													</div>
													<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
														<label class="form-check-label">Next Number</label>
														<input required type="text" maxlength="20" name="order_num" id="order_num"  class="form-control" placeholder="">
													</div>
													<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
																
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>



				<!-- INVOICE TAB CONTENT -->
				<div class="invoice_tab_content" id="invoice" hidden>
					<div style="text-align: center;">
						<!-- <h5 style="color:red;">Add invoice items header value to invoice table or items table</h5>
						<h5 style="color:red;">NOTE: OUTSIDE TN CUSTOMERS HAVE IGST INSTEAD OF CGST. ASK THAT WHEN ADDING NEW CUSTOMER</h5>
						<h5 style="color:red;">NOTE: ADD multiple billing / shipping address choosable at invoice edit settings </h5> -->
						
						<!-- Filter Feature -->
						<div class="row filter_bar_invoice">
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
										<input type="checkbox" id="selectall_invoice" style="margin-top: 8px; float: left; height: 20px; width: 20px;" value="" onchange="selectall_invoice(this)">
									</div>
									<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
										<button id="new_invoice" type="button" style="float: left;" class="btn shadow-none btn-success new_invoice"><i class="fa  fa-plus"></i>&nbsp;&nbsp;&nbsp;New</button>
									</div>	
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<!-- Empty Filler -->
									</div>
								</div>
							</div>		
							<!-- style="border: 1px solid red;" -->
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<!-- Empty Filler -->
							</div>
							<div id="filter_label_invoice" class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
								<p style="text-align: center; margin-top: 5px; font-size:20px;"><b>Search:</b></p>
							</div>

							<!-- Change filter bar search ids after changing the table header -->
							
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<input class="form-control" type="text" id="namessssearch" onkeyup="searchfun('invoice')" placeholder="Type any Name" title="Type in a Company Name">
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<input type="text" class="form-control" id="cityssssearch" onkeyup="searchfun('invoice')" placeholder="Type any City" title="Type in a City">
							</div>
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<select name="level" id="amountssssearch" class="form-control" onchange="searchfun('invoice')" class="form-control">
									<option>Amount Receivable</option>
									<option>&lt;  ₹ 10,000</option>
									<option>₹ 10k - ₹ 50k</option>
									<option>₹ 50k - ₹ 1 Lakh</option>
									<option>₹ 1 Lakh - ₹ 10 Lakh</option>
									<option>&gt; ₹ 10 Lakh</option>
								</select>
							</div>
							<div id="clear_filters_invoice_div" class="col-lg-1 col-md-1 col-sm-12 col-xs-12" hidden>
								<button type="button" id="clear_filters_invoice" class="btn shadow-none btn-danger clear_filters_invoice" onclick="ClearFilters('invoice')"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- Filter Feature End-->
						<br>

						<?php $customers = $mysqli->query("SELECT * FROM customers") or die($mysqli->error); 
							$total = 0;
						?>
						
						<!-- table content -->
						<div class="table_container_invoice panel panel-default">
						<!-- <h4 style="color:red;">check box | company name | Display Name| phone number | Email | city | Vendor Code | Amount Receivables</h4> -->
							<table id="invoice_table" class="invoice_table table table-hover">
								<thead class="invoice_thead">
									<tr style="height: 50px;">
											<th style="vertical-align: middle; text-align: center; width: 5%;"></th>
											<th data-mdb-sort="false" style="vertical-align: middle; text-align: center; width: 10%; border-left: 1px solid lightgrey;">Date</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;">Invoice #</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">Order Number</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;">Customer</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">Status</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">Due Date</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;">Amount</th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">Balance Due</th>
									</tr>
								</thead> 
								
								<tbody>
								<?php while ($row = $customers->fetch_assoc()): ?>
								<?php
									$c_id = $row['c_id'];

									$tmob = $row['mobile'];
									$mob = explode("+",$tmob);

									$total = $total + (int)$row['receivable'];
								?>
									<!-- onchange="rowsel()" -->
									<tr class='clickable-row_invoice' id='<?php echo $row['c_id'];?>'>
										<td style="vertical-align: middle;" class='non-clickable-row_invoice'>
											<input type="checkbox" name="rows" value="" style="height: 18px; width: 18px;">
										</td>
										<td style="vertical-align: middle; text-align: center; border-left: 1px solid lightgrey;"><?php echo $row['company']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['dname']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $mob[1]; ?></td>
										<td style="vertical-align: middle; text-align: center;"><a onclick="GoToMail(); return false;"><?php echo $row['email']; ?></a></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['scity']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['vendorcode']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['receivable']; ?></td>
										<td style="vertical-align: middle; text-align: center;"><?php echo $row['receivable']; ?></td>
									</tr>
									
									<?php endwhile; ?>
									<tfoot>
										<tr style="height: 50px;" class=" noHover table_footer_invoice">
											<th style="vertical-align: middle; text-align: center; width: 5%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%; border-left: 1px solid lightgrey;"></th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"></th>
											<th style="vertical-align: middle; text-align: center; width: 10%;">TOTAL</th>
											<th style="vertical-align: middle; text-align: center; width: 15%;"><?php echo $total; ?></th>
										</tr>
									</tfoot>
								</tbody>
							</table>
						</div>	

						
					</div>
				</div>

				<!-- QUOTATION TAB CONTENT -->
				<div class="quotation_tab_content" id="quotation" hidden>
					<div style="text-align: center;">
						<h5 style="color:red;">NOTE: GET QUOTES SAMPLE AND BUILD BREAKUP TABLE ALSO</h5>
					</div>
				</div>

				<!-- DC TAB CONTENT -->
				<div class="dc_tab_content" id="dc" hidden>
					This is DC Tab!
				</div>

			</div>
			<!-- <hr style="width: 100%; margin-top:0px; margin-bottom: 2px; border-top: 2px solid black;"> -->
		</div>
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>

</html>