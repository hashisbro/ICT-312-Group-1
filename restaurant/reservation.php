<?php include('header.php');?>
<?php include('nav.php');?>
       
       	<div class="content">
            <div class="content">
            	<h1>Welcome to Local Restaurant</h1>

                <h2>RESERVATION PAGE</h2>

                <script>
                    function confirm(){
                        var reserved_by = document.getElementById('reserved_by').value;
                        var phone_number = document.getElementById('phone_number').value;
                        var party_size = document.getElementById('party_size').value;
                        var date = document.getElementById('date').value;
                        var time = document.getElementById('time').value;
                        
                        if(reserved_by !== null && reserved_by !== '' && phone_number !== null && phone_number !== ''&& party_size !== null && party_size !== '' && date !== null && date !== '' && time !== null && time !== ''){                            
                        	alert("Thank you for reservation. We will inform you by phone call about your reservation status.");
                        }
                        
                        
                    }
                </script>

                <form method="post" action="processing/customer-reservation.php">
                    <table>
                        <tr>
                            <td>Reserved By (Name): *</td>
                            <td><input type="text" name="reserved_by" id="reserved_by" required="required"></td>
                        </tr>
                        <tr>
                            <td>Phone Number: *</td>
                            <td><input type="text" name="phone_number" id="phone_number" required="required"></td>
                        </tr>
                        <tr>
                        	<td>Party Size: *</td>
                        	<td>
                        		<select id="party_size" name="party_size">
                        			<option value="1 Guests">1 Guests</option>
                        			<option value="2 Guests">2 Guests</option>
                        			<option value="3 Guests">3 Guests</option>
                        			<option value="4 Guests">4 Guests</option>
                        			<option value="5 Guests">5 Guests</option>
                        			<option value="6 Guests">6 Guests</option>
                        			<option value="7 Guests">7 Guests</option>
                        			<option value="8 Guests">8 Guests</option>
                        			<option value="9 Guests">9 Guests</option>
                        			<option value="10+ Guests">10+ Guests</option>
                        		</select>
                        	</td>
                        </tr>
                        <tr>
                        	<td>Date:</td>
                        	<td><input type="date" name="date" id="date" required="required" min="<?php echo date("Y-m-d"); ?>"></td>
                        </tr>
                        <tr>
                        	<td>Time:</td>
                        	<td>
                        		<select id="time" name="time">
                        			<option value="11:00 AM">11:00 AM</option>
                        			<option value="11:30 AM">11:30 AM</option>
                        			<option value="12:00 PM">12:00 PM</option>
                        			<option value="12:30 PM">12:30 PM</option>
                        			<option value="01:00 PM">01:00 PM</option>
                        			<option value="01:30 PM">01:30 PM</option>
                        			<option value="02:00 PM">02:00 PM</option>
                        			<option value="02:30 PM">02:30 PM</option>
                        			<option value="03:00 PM">03:00 PM</option>
                        			<option value="03:30 PM">03:30 PM</option>
                        			<option value="04:00 PM">04:00 PM</option>
                        			<option value="04:30 PM">04:30 PM</option>
                        			<option value="05:00 PM">05:00 PM</option>
                        			<option value="05:30 PM">05:30 PM</option>
                        			<option value="06:00 PM">06:00 PM</option>
                        			<option value="06:30 PM">06:30 PM</option>
                        			<option value="07:00 PM">07:00 PM</option>
                        			<option value="07:30 PM">07:30 PM</option>
                        			<option value="08:00 PM">08:00 PM</option>
                        			<option value="08:30 PM">08:30 PM</option>
                        			<option value="09:00 PM">09:00 PM</option>
                        			<option value="09:30 PM">09:30 PM</option>
                        		</select>
                        	</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="CONFIRM RESERVATION" name="submit" id="submit" onclick="return confirm()"></td>
                        </tr>
                    </table>
                </form>
                
            
        		
        	</div>


        </div>

<?php include('footer.php');?>
       
        