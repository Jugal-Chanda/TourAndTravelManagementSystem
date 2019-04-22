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