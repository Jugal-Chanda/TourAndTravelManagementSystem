<?php
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header("Location: login.php");
}
$user_id = $_COOKIE[$cookie_name];
include 'php/connection.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>TTM</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/index_style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body onload="contant_index('dashbord')">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" >
           <!--  <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div> -->

            <ul class="list-unstyled components">
            	<li onclick="contant_index('dashbord')">                    
                    <a href="#">Deshbord</span></a>
                </li>
                <li onclick="contant_index('galary')">
                    <a href="#">Galary</a>
                </li>
                <li onclick="contant_index('toursit_place')">
                    <a href="#">Tourist Place</a>
                </li>
                <li onclick="contant_index('pakage_catagory')">
                    <a href="#">Special Pakage</a>
                </li>
               
                <!-- <li class="active">
                    <a href="#invoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Invoice</a>
                    <ul class="collapse list-unstyled" id="invoice">
                        <li onclick="contant_index('invoice_hotel')">
                            <a href="#">Hotel</a>
                        </li>
                        <li>
                            <a href="#">Ticket</a>
                        </li>
                        <li>
                            <a href="#">Payment</a>
                        </li>
                        <li>
                            <a href="#">Other</a>
                        </li>
                    </ul>
                </li> -->
                <li onclick="contant_index('profile')">
                    <a href="#">Profile</a>
                </li>
                <!-- <li>
                    <a href="#">About</a>
                </li> -->
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                    </div>
                </div>
            </nav>

            <!-- Dashbord -->
            <div id="dashbord" style="display: block;">
                <table style="width: 100%;border:1px solid black;text-align: center;" id="dashbord_body">
                    
                </table>
            </div>
            <!-- profile -->

             <div id="profile"  style="display: none;">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="row" >
                            <div class="col-md-2"></div>
                            <div class="col-md-8 profile_image_div" style="height: 300px;">
                                <img src="blankimage.jpg" class="profile_image" style="width: 100%;height: 100%;" id="profile_image_img_tag">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" style="margin-top: 5px;">
                                <form name="profile_image_upload_form">
                                    <input type="file" name="image_file">
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" style="margin-top: 5px;"><button onclick="profile_image_upload()"><span>Upload</span></button></div>
                            <div class="col-md-2"></div>
                        </div>
                        
                        
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div id="abc"></div>
                        <table style="width: 100%;">
                            <form id="" name="profile_save_change_form">
                            <tr style="margin-top: 15px;">
                                <td style="width: 20%;">User Name</td>
                                <td style="width: 80%;"><input type="text" name="user_name" value="Jugal" style="width: 40%;" id="profile_user_name"></td>
                            </tr>
                            <tr style="margin-top: 15px;">
                                <td style="width: 20%;">Full Name</td>
                                <td style="width: 80%;"><input type="text" name="name" value="Jugal Kishore Chanda" style="width: 40%;" id="profile_name"></td>
                            </tr>
                            <tr style="margin-top: 15px;">
                                <td style="width: 20%;">PayMent Type</td>
                                <td style="width: 80%;"><input type="text" name="payment_type" value="" style="width: 40%;" id="profile_payment_type"></td>
                            </tr>
                            <tr style="margin-top: 15px;">
                                <td style="width: 20%;">Account Number</td>
                                <td style="width: 80%;"><input type="text" name="acno" value="" style="width: 40%;" id="profile_ac_number"></td>
                            </tr>
                            <tr style="margin-top: 15px;">
                                <td style="width: 20%;">Email</td>
                                <td style="width: 80%;"><input type="Email" name="email" value="" style="width: 40%;" id="profile_email"></td>
                            </tr>
                            </form>
                            <tr >
                                <td style="border-top: 15px;"></td>
                                <td style="border-top: 15px;">
                                    <button onclick="profile_save_changes_onclick()">Save Changes</button>
                                </td>
                                
                            </tr>
                            
                        </table>

                    </div>
                </div>
            </div>

            <!-- invoice hotel -->
            <div style="display: none;" id="invoice_hotel">
                <div>
                    <button type="submit" style="height: 40px;float: right;" onclick="printDiv('hotel_confarmation_slip')"><i class="fa fa-print"></i>Print</button>
                </div>
                <div id="hotel_confarmation_slip">                   
                
                    <div class="invoice_hotel_header">                    
                        <div class="agency_name">
                            <span class="invoice_hotel_header_logo">
                                <img src="logo.png" >
                            </span>
                            Tour and Travel Management
                        </div>
                        <div class="details1">
                            Phone No: +8801780520287,+8801521461643
                        </div>
                        <div class="details1">
                            Email: jugalchanda7@gmail.com,abcd@gmail.com
                        </div>
                    </div>

                    <div class="hotel_customer_details">
                        <div class="hotel_details">
                            <table style="width: 100%;height: auto;">
                                <tr>
                                    <td>Hotel Name</td>
                                    <td>jacce tai hotel</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>Dhaka Bangladesh</td>
                                </tr>
                                <tr>
                                    <td>Email-1</td>
                                    <td>hotel1@emaill.com</td>
                                </tr>
                                <tr>
                                    <td>Phone no-1</td>
                                    <td>+8801712345678</td>
                                </tr>
                            </table>
                            
                        </div>
                        <div class="customer_details">
                            <table style="width: 100%;height: auto;">
                                <tr>
                                    <td>Customer Name</td>
                                    <td>Jugal Kishore Chanda</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>Dhaka Bangladesh</td>
                                </tr>
                                <tr>
                                    <td>Email-1</td>
                                    <td>hotel1@emaill.com</td>
                                </tr>
                                <tr>
                                    <td>Phone no-1</td>
                                    <td>+8801712345678</td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>

                    <div class="no_of_customer_details" style="margin-top: 5px;height: auto;">
                        <div style="float: left;display: inline-block;margin-left: 10%;">Start Time: <?php echo "23 March,2019"; ?>
                            
                        </div>
                        <div style="float: right;display: inline-block;margin-right: 10%;">End Time: <?php echo "23 March,2019"; ?>           
                        </div>                       
                    </div>
                    <div class="money_recipt_hotel" style="width: 100%;">
                        <table style="width: 100%; border: 1px solid black;" class="hotel_money_slip">
                            <tr>
                                <th>Serial No</th>
                                <th>Room No</th>
                                <th>Status</th>
                                <th>Class</th>
                                <th>Per Night Cost</th>
                                <th>No Of Night</th>
                                <th>Total Cost</th>
                                <
                            </tr>
                            <?php  for ($i=0; $i < 5; $i++) { ?>          
                            <tr class="striped">
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $i+1000; ?></td>
                                <td>Single</td>
                                <td>Five  Start</td>
                                <td>4000</td>
                                <td>5</td>
                                <td><?php echo 4000*5; ?></td>
                            </tr>

                        <?php  } ?>
                       
                        </table>
                        <table class="total_due_paid" style="width: 100%;">
                        <tr>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td >Total</td>
                            <td >10000</td>

                        </tr>
                        <tr style="border: none;">
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td >Paid</td>
                            <td >10000</td>

                        </tr>
                        <tr style="border: none;">
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td  style="border: none;"></td>
                            <td >Due</td>
                            <td >10000</td>

                        </tr>
                        </table>
                    </div>

                </div>
                
            </div>

            <!-- For hotel -->
            <div id="hotel" style="display: none;">                
            
                <div>
                     <input type="text" placeholder="Search.." class="hotel_search" onkeyup="search_hotel()" id="hotel_search">
                    <button type="submit" style="height: 40px;"><i class="fa fa-search"></i></button>                    
                </div>
                <div class="row" id="hotel_body" style="margin-left: 0px;margin-right: 0px;margin-top: 5px;">
                    
                     
                </div>
                <input type="text" name="" id="booked_id" value="" style="display: none;">

                <div class="modal fade" id="hotel_onclick" style="z-index: 5;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                        <!-- Modal Header -->
                            <div class="modal-header">
                                <div style="text-align: center;font-weight: bolder;color: black;width: 40%;margin-left: 30%;" id="hotel_onclick_hotel_name">Aftabnagar</div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12 col-md-6 col-lg-6" style="height: 400px;">

                                      <div class="" style="width: 100%;height: 100%;">
                                        <img src="" alt="Los Angeles" style="width: 100%;height: 100%;" id="hotel_onclick_image">
                                      </div>

                                  </div>
                                  <div class="col-sm-12 col-md-6 col-lg-6">
                                    <table style="width:100%;border:1px solid black;">
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%;border:1px solid black;">Hotel Name </td>
                                            <td style="width: 60%;" id="hotel_onclick_name"> </td>
                                        </tr>
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%; border:1px solid black;">Cost</td>
                                            <td style="width: 60%;" id="hotel_onclick_cost"></td>
                                        </tr>
                                      <tr style="border:1px solid black;">
                                        <td style="width: 40%; border:1px solid black;">Location</td>
                                        <td style="width: 60%;" id="hotel_onclick_location"></td> 
                                      </tr>                                           
                                    </table>
                                    <input type="text" name="" id="hotel_id" value="" style="display: none;">
                                    <button onclick="hotel_book()">Book Hotel</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- for galary -->
            <div id="galary" style="display: none;">
                
            
                <div>
                    <input type="text" placeholder="Search.." class="galary_search" id="galary_search" onkeyup="search_galary()">
                    <button type="submit" style="height: 40px;"><i class="fa fa-search"></i></button>
                </div>
                <div class="row" id="Galary_body" style="margin-left: 0px;margin-right: 0px;margin-top: 5px;">
                   
                     
                </div>

            </div>

            <!-- for tourist place  -->
            <div id="toursit_place" style="display: none;">               
            
                <div>
                    <input type="text" placeholder="Search.." class="tourist_place_search" id="tourist_place_search" onkeyup="search_tourist_place()">
                    <button type="submit" style="height: 40px;"><i class="fa fa-search"></i></button>
                    <button type="submit" style="height: 40px;">Rated
                        <div style="position: relative;display: inline;">
                            <i class="fa fa-sort-down" ></i>
                            <i class="fa fa-sort-up" style="position: absolute;left: 0px;top: 0px;"></i>
                        </div>
                    </button>
                     <button type="submit" style="height: 40px;" onclick="tourist_place_sort()">Travel Cost
                        <div style="position: relative;display: inline;">
                            <i class="fa fa-sort-down" ></i>
                            <i class="fa fa-sort-up" style="position: absolute;left: 0px;top: 0px;"></i>
                        </div>
                    </button>
                    
                </div>
                <div id="test_output"></div>
                <div class="row" id="tourist_place_body" style="margin-left: 0px;margin-right: 0px;margin-top: 5px;">
                      
                     
                </div>

                <div class="modal fade" id="tourist_place_onclick" style="z-index: 5;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                        <!-- Modal Header -->
                            <div class="modal-header">
                                <div style="text-align: center;font-weight: bolder;color: black;width: 40%;margin-left: 30%;" id="tourist_place_onclick_place_name_header">Aftabnagar</div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12 col-md-6 col-lg-6" style="height: 400px;">

                                      <div class="" style="width: 100%;height: 100%;">
                                        <img src="" alt="Los Angeles" style="width: 100%;height: 100%;" id="tourist_place_onclick_image">
                                      </div>

                                  </div>
                                  <div class="col-sm-12 col-md-6 col-lg-6">
                                    <table style="width:100%;border:1px solid black;">
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%; border:1px solid black;">Place Name </td>
                                            <td style="width: 60%; border:1px solid black;" id="tourist_place_onclick_place_name"> </td>
                                        </tr>
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%; border:1px solid black;">Cost</td>
                                            <td style="width: 60%; border:1px solid black;" id="tourist_place_onclick_travel_cost"></td>
                                        </tr>
                                      <tr style="border:1px solid black;">
                                        <td style="width: 40%; border:1px solid black;">Location</td>
                                        <td style="width: 60%; border:1px solid black;" id="tourist_place_onclick_location"></td> 
                                      </tr>                                           
                                    </table>

                                    <form enctype="multipart/form-data" id="booking_confirm_tourist_place" name="booking_confirm_tourist_place" method="POST" style="margin-top: 20px;">
                                        <input type="text" name="aca" placeholder="Enter The No of nights"  style="width: 100%; display: none;" value="" id="tourist_place_book_place_id">
                                        <input type="text" name="abc" placeholder="Enter The No of nights"  style="width: 100%; display: none;" value="" id="tourist_place_book_travel_cost">
                                        <input type="text" name="no_of_days" placeholder="Enter The No of nights"  style="width: 100%;" value="" id="tourist_place_book_no_of_days">
                                        <input type="text" name="No_of_person" placeholder="Enter The No of Person" style="width: 100%;" id="tourist_place_book_no_of_person">
                                    </form>
                                    <input type="date" name="starting_date" value="" style="width: 100%;" id="place_book_starting_date" placeholder="Date of you traveled">

                                    <button onclick="tourist_place_book('hotel',<?php echo $user_id; ?>)">Book Hotel</button>
                                    <button onclick="tourist_place_book('',<?php echo $user_id; ?>)">Book Only Place</button>
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- For Pakage Catagory -->

            <div id="pakage_catagory" style="display: none;">
                
            
                <div>
                    <input type="text" placeholder="Search For Place.." class="pakage_catagory_search" id="pakage_catagory_search" onkeyup="search_pakage_catagory()">
                    <button type="submit" style="height: 40px;"><i class="fa fa-search"></i></button>
                    <button type="submit" style="height: 40px;" onclick="pakage_sort()">Pakage Cost
                        <div style="position: relative;display: inline;">
                            <i class="fa fa-sort-down" ></i>
                            <i class="fa fa-sort-up" style="position: absolute;left: 0px;top: 0px;"></i>
                        </div>
                    </button>
                    
                </div>
                <div class="row" id="pakage_catagory_body" style="margin-left: 0px;margin-right: 0px;margin-top: 5px;">
                     
                     
                </div>

                <div class="modal fade" id="pakage_onclick" style="z-index: 5;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                        <!-- Modal Header -->
                            <div class="modal-header">
                                <div style="text-align: center;font-weight: bolder;color: black;width: 40%;margin-left: 30%;" id="pakage_onclick_pakage_name">Aftabnagar</div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-12 col-md-6 col-lg-6" style="height: 400px;">

                                      <div class="" style="width: 100%;height: 100%;">
                                        <img src="" alt="Los Angeles" style="width: 100%;height: 100%;" id="pakage_onclick_place_image">
                                      </div>                                 

                                  </div>
                                  <div class="col-sm-12 col-md-6 col-lg-6" style="height: 400px;">
                                      <div class="" style="width: 100%;height: 100%;margin-top: 1%;">
                                        <img src="" alt="Los Angeles" style="width: 100%;height: 100%;" id="pakage_onclick_hotel_image">
                                      </div>
                                  </div>
                                  <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;">
                                    <table style="width:100%;border:1px solid black;margin-bottom: 20px;">
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%;border:1px solid black;">Place Name </td>
                                            <td style="width: 60%;" id="pakage_onclick_place_name"> </td>
                                        </tr>
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%; border:1px solid black;">Hotel Name</td>
                                            <td style="width: 60%;" id="pakage_onclick_hotel_name"></td>
                                        </tr>
                                      <tr style="border:1px solid black;">
                                        <td style="width: 40%; border:1px solid black;">Place Location</td>
                                        <td style="width: 60%;" id="pakage_onclick_plae_location"></td> 
                                      </tr> 
                                      <tr style="border:1px solid black;">
                                            <td style="width: 40%; border:1px solid black;">Hotel Location </td>
                                            <td style="width: 60%;" id="pakage_onclick_hotel_location"> </td>
                                        </tr>
                                        <tr style="border:1px solid black;">
                                            <td style="width: 40%; border:1px solid black;">No Of Persons</td>
                                            <td style="width: 60%;" id="pakage_onclick_person"></td>
                                        </tr>
                                      <tr style="border:1px solid black;">
                                        <td style="width: 40%; border:1px solid black;">Duration</td>
                                        <td style="width: 60%;" id="pakage_onclick_duration"></td> 
                                      </tr>
                                      <tr style="border:1px solid black;">
                                        <td style="width: 40%; border:1px solid black;">Travel Cost</td>
                                        <td style="width: 60%;" id="pakage_onclick_travel_cost"></td> 
                                      </tr>                                        
                                    </table>
                                    <input type="text" name="" value="" id="pakage_id" style="display: none;">
                                    <input type="date" name="starting_date" value="" style="width: 100%;" id="pakage_book_starting_date" placeholder="Date of you traveled" style="margin-top: 50px;">
                                    
                                    <button style="margin-top: 10px;" onclick="pakage_book(<?php echo $user_id; ?>)">Book pakage</button>
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            

            

            

            
            
            
        </div>
    </div>

    <script type="text/javascript">
        
        
    </script>
    <script type="text/javascript" src="js/index_js.js"></script>
</body>

</html>