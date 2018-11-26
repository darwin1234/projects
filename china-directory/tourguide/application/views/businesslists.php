<script src="<?php echo base_url(); ?>/resources/scripts/imagecrop.js"></script>
<?php
	$item = (array)$list_of_records;
	$dslong = "";
	$dslat  = "";
	$personalAcc			= (array)$active_account[0];
	$first_name 			= $personalAcc['first_name'];
	$activeIDD				= $personalAcc['id_no'];
	$photo 					= $personalAcc['profile_pic'];
	$LeaderName 			= $personalAcc['first_name'] . ' ' . $personalAcc['maiden_name'] . ' ' . $personalAcc['last_name'];
	$maiden_name			= $personalAcc['maiden_name'];
	$last_name				= $personalAcc['last_name'];
	$EmailAddress			= $personalAcc['email'];
	$contactno 				= $personalAcc['contact'];
	$CivilStatus			= $personalAcc['civil_status'];
	$Work					= $personalAcc['work'];
	$Address				= $personalAcc['address'];
	
	$Role					= $personalAcc['role'];
	$Gender					= $personalAcc['Gender'];
	$birthmonth				= $personalAcc['birthmonth'];
	$birthdate				= $personalAcc['birthdate'];
	$birthyear				= $personalAcc['birthyear'];
?> 

<script src="<?php echo base_url(); ?>administrator/scripts/ajax.js"></script>
<script src="<?php echo base_url(); ?>administrator/scripts/search.js"></script>
<?php

							@$cpimt = 1;
							
					
							  
							?>
							
							<?php
								@$cpimt = 1;
											
								function disciplecount($test,$id_no){
														
									foreach($test as $discipleCount){
											if($discipleCount->mentor_id == $id_no && $discipleCount->added_as_close_cell == 1 && $discipleCount->active == 0){@$cpimt++;}
																
									}
									
									return @$cpimt;
								}
								

								function leaders($leaders,$leadersID){
									
									foreach($leaders as $leadersfields){
										if($leadersfields->id_no == $leadersID){
											
											@$leaderData =  "<a href='".base_url()."administrator/disciples/" . $leadersfields->id_no  . "'style='float:right; color:#fff; '>" . $leadersfields->first_name . "</a>";
											
										}
										
									}
									
									return @$leaderData;
									
								}
							
												
							?>
							
							
							<?php 

								function getRecordWithParentId($id, $records) {
								$records_under_parent = [];
									foreach ($records as $record) {
										if ($record->mentor_id == $id) {
											$records_under_parent[] = $record;
											$records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
										}
									}
									return $records_under_parent;
								}

								function getRecordOfSubRecordWithParenId($id, $records) {
									$records_under_parent = [];
									foreach ($records as $record) {
										if ($record->mentor_id == $id) {
											$records_under_parent[] = $record;
											$records_under_parent = array_merge($records_under_parent, getRecordOfSubRecordWithParenId($record->id_no, $records));
										}
									}
									return $records_under_parent;
								}
								
								
							?>
	
	
		  <!-- EDIT PERSONAL INFO -->
		  <div class="modal fade" id="editAccount" role="dialog">
			<div class="modal-dialog" id="EDITINFORMATION">
			
			  <!-- Modal content-->
			  
			  <div class="modal-content">
				<form id="EDIT_PERSONAL_INFO"> 
						<div class="modal-header">
					
							<h4 class="modal-title" style="font-size: 30px;">EDIT PERSONAL INFO</h4>
						</div>

								<input type="hidden" value="<?php echo @$userID; ?>" name="menthorID">
								<div class="modal-body">
									<div class="col-md-6">
										<div class="form-group" style="display: none">
											<label for="Photo">Change Photo</label>
											<input type="file" name="image" class="form-control" value="<?php echo @$photo; ?>"  >
											<input type="hidden" name="base_url" class="form-control" value="<?php echo base_url(); ?>">
											<input type="hidden" name="userID" class="form-control" value="<?php echo @$userID; ?>">
										  </div>
										  <div class="form-group">
												<label for="FirstName">First Name</label>
												<input type="text" name="first_name" class="form-control" value="<?php echo @$first_name; ?>">
												<label for="Maiden Name">Maiden Name</label>
												<input type="text" name="maiden_name" class="form-control" value="<?php echo @$maiden_name; ?>">
												<label for="Last Name">Last Name</label>
												<input type="text" name="last_name" class="form-control" value="<?php echo @$last_name; ?>">
										  
										  </div>

										  <div class="form-group">
											<script>
												function setBirthday(elem) {
													var month = [];
													month[1] = "Jan";
													month[2] = "Feb";
													month[3] = "Mar";
													month[4] = "Apr";
													month[5] = "May";
													month[6] = "Jun";
													month[7] = "Jul";
													month[8] = "Aug";
													month[9] = "Sep";
													month[10] = "Oct";
													month[11] = "Nov";
													month[12] = "Dec";
												
													var children = elem.parentElement.getElementsByTagName("select");
													var b = elem.value.split("/");
													children[0].value = month[b[0] * 1];
													children[1].value = b[1] * 1;
													children[2].value = b[2] * 1;
												}
											</script>
											<label for="birthdate">Birthday</label>
											
												
												<select aria-label="Month" class="form-control birthday" name="birthday_month" id="month" title="Month" style="display: none"><option value="0" selected="1">Month</option><option value="Jan" <?php echo @$birthmonth =="Jan" ? "selected" : "";?>>Jan</option><option value="Feb" <?php echo @$birthmonth =="Feb"? "Selected=1" : "";?>>Feb</option><option value="Mar"<?php echo @$birthmonth =="Mar"? "Selected=1" : "";?>>Mar</option><option value="Apr" <?php echo @$birthmonth =="Apr"? "Selected=1" : "";?>>Apr</option><option value="May" <?php echo @$birthmonth =="May"? "Selected=1" : "";?>>May</option><option value="Jun" <?php echo @$birthmonth =="Jun"? "Selected=1" : "";?>>Jun</option><option value="Jul" <?php echo @$birthmonth =="Jul"? "Selected=1" : "";?>>Jul</option><option value="Aug" <?php echo @$birthmonth =="Aug"? "Selected=1" : "";?>>Aug</option><option value="Sep" <?php echo @$birthmonth =="Sep"? "Selected=1 " : "";?>>Sep</option><option value="Oct" <?php echo @$birthmonth =="Oct"? "Selected=1" : "";?>>Oct</option><option value="Nov" <?php echo @$birthmonth =="Nov"? "Selected=1" : "";?>>Nov</option><option value="Dec" <?php echo @$birthmonth =="Dec"? "Selected=1" : "";?>>Dec</option></select>
												<select aria-label="Day"  class="form-control birthday" name="birthday_day" id="day" title="Day" style="display: none"><option value="0" selected="1">Day</option><option value="1" <?php echo @$birthdate == "1" ? "selected=1" : "";?>>1</option><option value="2" <?php echo @$birthdate == "2" ? "Selected=1" : "";?>>2</option><option value="3" <?php echo @$birthdate == "3" ? "Selected=1" : "";?>>3</option><option value="4" <?php echo @$birthdate == "4"? "Selected=1" : "";?>>4</option><option value="5" <?php echo @$birthdate == "5" ? "Selected=1" : "";?>>5</option><option value="6" <?php echo @$birthdate == "6" ? "Selected=1" : "";?>>6</option><option value="7" <?php echo @$birthdate == "7" ? "Selected=1" : "";?>>7</option><option value="8" <?php echo @$birthdate == "8" ? "Selected=1" : "";?>>8</option><option value="9" <?php echo @$birthdate == "9" ? "Selected=1" : "";?>>9</option><option value="10" <?php echo @$birthdate == "10" ? "Selected=1" : "";?>>10</option><option value="11" <?php echo @$birthdate == "11" ? "Selected=1" : "";?>>11</option><option value="12" <?php echo @$birthdate == "12" ? "Selected=1" : "";?>>12</option><option value="13" <?php echo @$birthdate == "13" ? "Selected=1" : "";?>>13</option><option value="14" <?php echo @$birthdate == "14" ? "Selected=1" : "";?>>14</option><option value="15" <?php echo @$birthdate == "15" ? "Selected=1" : "";?>>15</option><option value="16" <?php echo @$birthdate == "16" ? "Selected=1" : "";?>>16</option><option value="17" <?php echo @$birthdate == "17" ? "Selected=1" : "";?>>17</option><option value="18" <?php echo @$birthdate == "18" ? "Selected=1" : "";?>>18</option><option value="19" <?php echo @$birthdate == "19" ? "Selected=1" : "";?>>19</option><option value="20" <?php echo @$birthdate == "20" ? "Selected=1" : "";?>>20</option><option value="21" <?php echo @$birthdate == "21" ? "Selected=1" : "";?>>21</option><option value="22" <?php echo @$birthdate == "22" ? "Selected=1" : "";?>>22</option><option value="23" <?php echo @$birthdate == "23" ? "Selected=1" : "";?>>23</option><option value="24" <?php echo @$birthdate == "24" ? "Selected=1" : "";?>>24</option><option value="25" <?php echo @$birthdate == "25" ? "Selected=1" : "";?>>25</option><option value="26" <?php echo @$birthdate == "26" ? "Selected=1" : "";?>>26</option><option value="27" <?php echo @$birthdate == "27" ? "Selected=1" : "";?>>27</option><option value="28" <?php echo @$birthdate == "28" ? "Selected=1" : "";?>>28</option><option value="29" <?php echo @$birthdate == "29" ? "Selected=1" : "";?>>29</option><option value="30" <?php echo @$birthdate == "30" ? "Selected=1" : "";?>>30</option><option value="31"<?php echo @$birthdate == "31" ? "Selected=1" : "";?> >31</option></select>
												<select aria-label="Year" class="form-control birthday" name="birthday_year" id="year" title="Year" style="display: none"><option value="0" selected="1">Year</option><option value="2016"<?php echo @$birthyear == "2016" ? "selected=1" : "";?>>2016</option><option value="2015" <?php echo @$birthyear == "2015" ? "Selected=1" : "";?>>2015</option><option value="2014" <?php echo @$birthyear == "2014" ? "Selected=1" : "";?>>2014</option><option value="2013" <?php echo @$birthyear == "2013" ? "Selected=1" : "";?>>2013</option><option value="2012" <?php echo @$birthyear == "2012" ? "Selected=1" : "";?>>2012</option><option value="2011" <?php echo @$birthyear == "2011" ? "Selected=1" : "";?>>2011</option><option value="2010" <?php echo @$birthyear == "2010" ? "Selected=1" : "";?>>2010</option><option value="2009" <?php echo @$birthyear == "2009" ? "Selected=1" : "";?>>2009</option><option value="2008" <?php echo @$birthyear == "2008" ? "Selected=1" : "";?>>2008</option><option value="2007" <?php echo @$birthyear == "2007" ? "Selected=1" : "";?>>2007</option><option value="2006" <?php echo @$birthyear == "2006" ? "Selected=1" : "";?>>2006</option><option value="2005" <?php echo @$birthyear == "2005" ? "Selected=1" : "";?>>2005</option><option value="2004" <?php echo @$birthyear == "2004" ? "Selected=1" : "";?>>2004</option><option value="2003" <?php echo @$birthyear == "2003" ? "Selected=1" : "";?>>2003</option><option value="2002" <?php echo @$birthyear == "2002" ? "Selected=1" : "";?>>2002</option><option value="2001" <?php echo @$birthyear == "2001" ? "Selected=1" : "";?>>2001</option><option value="2000" <?php echo @$birthyear == "2000" ? "Selected=1" : "";?>>2000</option><option value="1999" <?php echo @$birthyear == "1999" ? "Selected=1" : "";?>>1999</option><option value="1998" <?php echo @$birthyear == "1998" ? "Selected=1" : "";?>>1998</option><option value="1997" <?php echo @$birthyear == "1997" ? "Selected=1" : "";?>>1997</option><option value="1996" <?php echo @$birthyear == "1996" ? "Selected=1" : "";?>>1996</option><option value="1995" <?php echo @$birthyear == "1995" ? "Selected=1" : "";?>>1995</option><option value="1994" <?php echo @$birthyear == "1994" ? "Selected=1" : "";?>>1994</option><option value="1993" <?php echo @$birthyear == "1993" ? "Selected=1" : "";?>>1993</option><option value="1992" <?php echo @$birthyear == "1992" ? "Selected=1" : "";?>>1992</option><option value="1991" <?php echo @$birthyear == "1991" ? "Selected=1" : "";?>>1991</option><option value="1990" <?php echo @$birthyear == "1990" ? "Selected=1" : "";?>>1990</option><option value="1989" <?php echo @$birthyear == "1989" ? "Selected=1" : "";?>>1989</option><option value="1988" <?php echo @$birthyear == "1988" ? "Selected=1" : "";?>>1988</option><option value="1987" <?php echo @$birthyear == "1987" ? "Selected=1" : "";?>>1987</option><option value="1986" <?php echo @$birthyear == "1986" ? "Selected=1" : "";?>>1986</option><option value="1985" <?php echo @$birthyear == "1985" ? "Selected=1" : "";?>>1985</option><option value="1984" <?php echo @$birthyear == "1984" ? "Selected=1" : "";?>>1984</option><option value="1983" <?php echo @$birthyear == "1983" ? "Selected=1" : "";?>>1983</option><option value="1982" <?php echo @$birthyear == "1982" ? "Selected=1" : "";?>>1982</option><option value="1981" <?php echo @$birthyear == "1981" ? "Selected=1" : "";?>>1981</option><option value="1980" <?php echo @$birthyear == "1980" ? "Selected=1" : "";?>>1980</option><option value="1979" <?php echo @$birthyear == "1979" ? "Selected=1" : "";?>>1979</option><option value="1978" <?php echo @$birthyear == "1978" ? "Selected=1" : "";?>>1978</option><option value="1977" <?php echo @$birthyear == "1977" ? "Selected=1" : "";?>>1977</option><option value="1976" <?php echo @$birthyear == "1976" ? "Selected=1" : "";?>>1976</option><option value="1975" <?php echo @$birthyear == "1975" ? "Selected=1" : "";?>>1975</option><option value="1974" <?php echo @$birthyear == "1974" ? "Selected=1" : "";?>>1974</option><option value="1973" <?php echo @$birthyear == "1973" ? "Selected=1" : "";?>>1973</option><option value="1972"<?php echo @$birthyear == "1972" ? "Selected=1" : "";?>>1972</option><option value="1971" <?php echo @$birthyear == "1971" ? "Selected=1" : "";?>>1971</option><option value="1970" <?php echo @$birthyear == "1970" ? "Selected=1" : "";?>>1970</option><option value="1969" <?php echo @$birthyear == "1969" ? "Selected=1" : "";?>>1969</option><option value="1968" <?php echo @$birthyear == "1968" ? "Selected=1" : "";?>>1968</option><option value="1967" <?php echo @$birthyear == "1967" ? "Selected=1" : "";?>>1967</option><option value="1966" <?php echo @$birthyear == "1966" ? "Selected=1" : "";?>>1966</option><option value="1965" <?php echo @$birthyear == "1965" ? "Selected=1" : "";?>>1965</option><option value="1964" <?php echo @$birthyear == "1964" ? "Selected=1" : "";?>>1964</option><option value="1963" <?php echo @$birthyear == "1963" ? "Selected=1" : "";?>>1963</option><option value="1962" <?php echo @$birthyear == "1962" ? "Selected=1" : "";?>>1962</option><option value="1961" <?php echo @$birthyear == "1961" ? "Selected=1" : "";?>>1961</option><option value="1960" <?php echo @$birthyear == "1960" ? "Selected=1" : "";?>>1960</option><option value="1959" <?php echo @$birthyear == "1959" ? "Selected=1" : "";?>>1959</option><option value="1958" <?php echo @$birthyear == "1958" ? "Selected=1" : "";?>>1958</option><option value="1957" <?php echo @$birthyear == "1957" ? "Selected=1" : "";?>>1957</option><option value="1956" <?php echo @$birthyear == "1956" ? "Selected=1" : "";?>>1956</option><option value="1955" <?php echo @$birthyear == "1955" ? "Selected=1" : "";?>>1955</option><option value="1954" <?php echo @$birthyear == "1954" ? "Selected=1" : "";?>>1954</option><option value="1953" <?php echo @$birthyear == "1953" ? "Selected=1" : "";?>>1953</option><option value="1952" <?php echo @$birthyear == "1952" ? "Selected=1" : "";?>>1952</option><option value="1951"<?php echo @$birthyear == "1951" ? "Selected=1" : "";?>>1951</option><option value="1950" <?php echo @$birthyear == "1950" ? "Selected=1" : "";?>>1950</option><option value="1949" <?php echo @$birthyear == "1949" ? "Selected=1" : "";?>>1949</option><option value="1948" <?php echo @$birthyear == "1948" ? "Selected=1" : "";?>>1948</option><option value="1947" <?php echo @$birthyear == "1947" ? "Selected=1" : "";?>>1947</option><option value="1946" <?php echo @$birthyear == "1946" ? "Selected=1" : "";?>>1946</option><option value="1945" <?php echo @$birthyear == "1945" ? "Selected=1" : "";?>>1945</option><option value="1944" <?php echo @$birthyear == "1944" ? "Selected=1" : "";?>>1944</option><option value="1943" <?php echo @$birthyear == "1943" ? "Selected=1" : "";?>>1943</option><option value="1942" <?php echo @$birthyear == "1942" ? "Selected=1" : "";?>>1942</option><option value="1941" <?php echo @$birthyear == "1941" ? "Selected=1" : "";?>>1941</option><option value="1940" <?php echo @$birthyear == "1940" ? "Selected=1" : "";?>>1940</option><option value="1939" <?php echo @$birthyear == "1939" ? "Selected=1" : "";?>>1939</option><option value="1938" <?php echo @$birthyear == "1938" ? "Selected=1" : "";?>>1938</option><option value="1937" <?php echo @$birthyear == "1937" ? "Selected=1" : "";?>>1937</option><option value="1936" <?php echo @$birthyear == "1936" ? "Selected=1" : "";?>>1936</option><option value="1935" <?php echo @$birthyear == "1935" ? "Selected=1" : "";?>>1935</option><option value="1934" <?php echo @$birthyear == "1934" ? "Selected=1" : "";?>>1934</option><option value="1933" <?php echo @$birthyear == "1933" ? "Selected=1" : "";?>>1933</option><option value="1932" <?php echo @$birthyear == "1932" ? "Selected=1" : "";?>>1932</option><option value="1931" <?php echo @$birthyear == "1931" ? "Selected=1" : "";?>>1931</option><option value="1930" <?php echo @$birthyear == "1930" ? "Selected=1" : "";?>>1930</option><option value="1929" <?php echo @$birthyear == "1929" ? "Selected=1" : "";?>>1929</option><option value="1928" <?php echo @$birthyear == "1928" ? "Selected=1" : "";?>>1928</option><option value="1927"<?php echo @$birthyear == "1927" ? "Selected=1" : "";?>>1927</option><option value="1926" <?php echo @$birthyear == "1926" ? "Selected=1" : "";?>>1926</option><option value="1925" <?php echo @$birthyear == "1925" ? "Selected=1" : "";?>>1925</option><option value="1924" <?php echo @$birthyear == "1924" ? "Selected=1" : "";?>>1924</option><option value="1923" <?php echo @$birthyear == "1923" ? "Selected=1" : "";?>>1923</option><option value="1922" <?php echo @$birthyear == "1922" ? "Selected=1" : "";?>>1922</option><option value="1921" <?php echo @$birthyear == "1921" ? "Selected=1" : "";?>>1921</option><option value="1920" <?php echo @$birthyear == "1920" ? "Selected=1" : "";?>>1920</option><option value="1919" <?php echo @$birthyear == "1919" ? "Selected=1" : "";?>>1919</option><option value="1918" <?php echo @$birthyear == "1918" ? "Selected=1" : "";?>>1918</option><option value="1917" <?php echo @$birthyear == "19216" ? "Selected=1" : "";?>>1917</option><option value="1916" <?php echo @$birthyear == "1916" ? "Selected=1" : "";?>>1916</option><option value="1915" <?php echo @$birthyear == "1915" ? "Selected=1" : "";?>>1915</option><option value="1914" <?php echo @$birthyear == "1914" ? "Selected=1" : "";?>>1914</option><option value="1913" <?php echo @$birthyear == "1913" ? "Selected=1" : "";?>>1913</option><option value="1912" <?php echo @$birthyear == "1912" ? "Selected=1" : "";?>>1912</option><option value="1911" <?php echo @$birthyear == "1911" ? "Selected=1" : "";?>>1911</option><option value="1910" <?php echo @$birthyear == "1910" ? "Selected=1" : "";?>>1910</option><option value="1909" <?php echo @$birthyear == "1909" ? "Selected=1" : "";?>>1909</option><option value="1908" <?php echo @$birthyear == "1908" ? "Selected=1" : "";?>>1908</option><option value="1907" <?php echo @$birthyear == "1907" ? "Selected=1" : "";?>>1907</option><option value="1906" <?php echo @$birthyear == "1906" ? "Selected=1" : "";?>>1906</option><option value="1905" <?php echo @$birthyear == "1905" ? "Selected=1" : "";?>>1905</option></select>
												
												<input onchange="setBirthday(this);" type="text" id="birthdate" value="<?php echo date('m/d/Y', strtotime($birthmonth . " " . $birthdate . ", " . $birthyear)); ?>" class="form-control">
											
										  </div>
										  

										  <div class="form-group">
											<label for="EmailAddress">Email Address:</label>
											<input type="text" name="EmailAddress" id="EmailAddress" autocomplete="off" onkeypress="CCCSystem.validationEmail()" value="<?php echo @$EmailAddress; ?>" class="form-control">
											<div class="EmailValidation"></div>
										  </div>
										 
									
								</div>
							<div class="col-md-6">
								 <div class="form-group">
											<label for="civil_status"> Civil Status </label>
												<select name="civil_status" id="civilstatus" class="form-control ">
														<option value="Single" <?php echo $CivilStatus == "Single" ? "selected" : ''; ?>>Single</option>
														<option value="Married" <?php echo $CivilStatus == "Married" ? "selected" : ''; ?>>Married</option>
														<option value="Widow" <?php echo $CivilStatus == "Widow" ? "selected" : ''; ?>>Widow</option>
												</select>
												
												<div id="statusfields" class="statusfields" style="display:none;">
													<label for="SpouseName">Spouse Name</label>
													<input type="text" name="SpouseName"  placeholder="Spouse Name" value="<?php echo @$spouse_name;?>" class="form-control">	
													<label>Wedding Anniversary</label>
													<select aria-label="Month"class="form-control Wedding_Anniversary" name="wedding_month" id="month" title="Month" style="display :none"><option value="0" selected="1">Month</option><option value="Jan" <?php echo @$wedding_month =="Jan" ? "selected" : "";?>>Jan</option><option value="Feb" <?php echo @$wedding_month =="Feb"? "Selected=1" : "";?>>Feb</option><option value="Mar"<?php echo @$wedding_month =="Mar"? "Selected=1" : "";?>>Mar</option><option value="Apr" <?php echo @$wedding_month =="Apr"? "Selected=1" : "";?>>Apr</option><option value="May" <?php echo @$wedding_month =="May"? "Selected=1" : "";?>>May</option><option value="Jun" <?php echo @$wedding_month =="Jun"? "Selected=1" : "";?>>Jun</option><option value="Jul" <?php echo @$wedding_month =="Jul"? "Selected=1" : "";?>>Jul</option><option value="Aug" <?php echo @$wedding_month =="Aug"? "Selected=1" : "";?>>Aug</option><option value="Sep" <?php echo @$wedding_month =="Sep"? "Selected=1 " : "";?>>Sep</option><option value="Oct" <?php echo @$wedding_month =="Oct"? "Selected=1" : "";?>>Oct</option><option value="Nov" <?php echo @$wedding_month =="Nov"? "Selected=1" : "";?>>Nov</option><option value="Dec" <?php echo @$wedding_month =="Dec"? "Selected=1" : "";?>>Dec</option></select>
													<select aria-label="Day"  class="form-control Wedding_Anniversary" name="wedding_date" id="day" title="Day" style="display :none"><option value="0" selected="1">Day</option><option value="1" <?php echo @$wedding_date == "1" ? "selected=1" : "";?>>1</option><option value="2" <?php echo @$wedding_date == "2" ? "Selected=1" : "";?>>2</option><option value="3" <?php echo @$wedding_date == "3" ? "Selected=1" : "";?>>3</option><option value="4" <?php echo @$wedding_date == "4"? "Selected=1" : "";?>>4</option><option value="5" <?php echo @$wedding_date == "5" ? "Selected=1" : "";?>>5</option><option value="6" <?php echo @$wedding_date == "6" ? "Selected=1" : "";?>>6</option><option value="7" <?php echo @$wedding_date == "7" ? "Selected=1" : "";?>>7</option><option value="8" <?php echo @$wedding_date == "8" ? "Selected=1" : "";?>>8</option><option value="9" <?php echo @$wedding_date == "9" ? "Selected=1" : "";?>>9</option><option value="10" <?php echo @$wedding_date == "10" ? "Selected=1" : "";?>>10</option><option value="11" <?php echo @$wedding_date == "11" ? "Selected=1" : "";?>>11</option><option value="12" <?php echo @$wedding_date == "12" ? "Selected=1" : "";?>>12</option><option value="13" <?php echo @$wedding_date == "13" ? "Selected=1" : "";?>>13</option><option value="14" <?php echo @$wedding_date == "14" ? "Selected=1" : "";?>>14</option><option value="15" <?php echo @$wedding_date == "15" ? "Selected=1" : "";?>>15</option><option value="16" <?php echo @$wedding_date == "16" ? "Selected=1" : "";?>>16</option><option value="17" <?php echo @$wedding_date == "17" ? "Selected=1" : "";?>>17</option><option value="18" <?php echo @$wedding_date == "18" ? "Selected=1" : "";?>>18</option><option value="19" <?php echo @$wedding_date == "19" ? "Selected=1" : "";?>>19</option><option value="20" <?php echo @$wedding_date == "20" ? "Selected=1" : "";?>>20</option><option value="21" <?php echo @$wedding_date == "21" ? "Selected=1" : "";?>>21</option><option value="22" <?php echo @$wedding_date == "22" ? "Selected=1" : "";?>>22</option><option value="23" <?php echo @$wedding_date == "23" ? "Selected=1" : "";?>>23</option><option value="24" <?php echo @$wedding_date == "24" ? "Selected=1" : "";?>>24</option><option value="25" <?php echo @$wedding_date == "25" ? "Selected=1" : "";?>>25</option><option value="26" <?php echo @$wedding_date == "26" ? "Selected=1" : "";?>>26</option><option value="27" <?php echo @$wedding_date == "27" ? "Selected=1" : "";?>>27</option><option value="28" <?php echo @$wedding_date == "28" ? "Selected=1" : "";?>>28</option><option value="29" <?php echo @$wedding_date == "29" ? "Selected=1" : "";?>>29</option><option value="30" <?php echo @$wedding_date == "30" ? "Selected=1" : "";?>>30</option><option value="31"<?php echo @$wedding_date == "31" ? "Selected=1" : "";?> >31</option></select>
													<select aria-label="Year" class="form-control Wedding_Anniversary" name="wedding_year" id="year" title="Year" style="display :none"><option value="0" selected="1">Year</option><option value="2016"<?php echo @$wedding_year == "2016" ? "selected=1" : "";?>>2016</option><option value="2015" <?php echo @$wedding_year == "2015" ? "Selected=1" : "";?>>2015</option><option value="2014" <?php echo @$wedding_year == "2014" ? "Selected=1" : "";?>>2014</option><option value="2013" <?php echo @$wedding_year == "2013" ? "Selected=1" : "";?>>2013</option><option value="2012" <?php echo @$wedding_year == "2012" ? "Selected=1" : "";?>>2012</option><option value="2011" <?php echo @$wedding_year == "2011" ? "Selected=1" : "";?>>2011</option><option value="2010" <?php echo @$wedding_year == "2010" ? "Selected=1" : "";?>>2010</option><option value="2009" <?php echo @$wedding_year == "2009" ? "Selected=1" : "";?>>2009</option><option value="2008" <?php echo @$wedding_year == "2008" ? "Selected=1" : "";?>>2008</option><option value="2007" <?php echo @$wedding_year == "2007" ? "Selected=1" : "";?>>2007</option><option value="2006" <?php echo @$wedding_year == "2006" ? "Selected=1" : "";?>>2006</option><option value="2005" <?php echo @$wedding_year == "2005" ? "Selected=1" : "";?>>2005</option><option value="2004" <?php echo @$wedding_year == "2004" ? "Selected=1" : "";?>>2004</option><option value="2003" <?php echo @$wedding_year == "2003" ? "Selected=1" : "";?>>2003</option><option value="2002" <?php echo @$wedding_year == "2002" ? "Selected=1" : "";?>>2002</option><option value="2001" <?php echo @$wedding_year == "2001" ? "Selected=1" : "";?>>2001</option><option value="2000" <?php echo @$wedding_year == "2000" ? "Selected=1" : "";?>>2000</option><option value="1999" <?php echo @$wedding_year == "1999" ? "Selected=1" : "";?>>1999</option><option value="1998" <?php echo @$wedding_year == "1998" ? "Selected=1" : "";?>>1998</option><option value="1997" <?php echo @$wedding_year == "1997" ? "Selected=1" : "";?>>1997</option><option value="1996" <?php echo @$wedding_year == "1996" ? "Selected=1" : "";?>>1996</option><option value="1995" <?php echo @$wedding_year == "1995" ? "Selected=1" : "";?>>1995</option><option value="1994" <?php echo @$wedding_year == "1994" ? "Selected=1" : "";?>>1994</option><option value="1993" <?php echo @$wedding_year == "1993" ? "Selected=1" : "";?>>1993</option><option value="1992" <?php echo @$wedding_year == "1992" ? "Selected=1" : "";?>>1992</option><option value="1991" <?php echo @$wedding_year == "1991" ? "Selected=1" : "";?>>1991</option><option value="1990" <?php echo @$wedding_year == "1990" ? "Selected=1" : "";?>>1990</option><option value="1989" <?php echo @$wedding_year == "1989" ? "Selected=1" : "";?>>1989</option><option value="1988" <?php echo @$wedding_year == "1988" ? "Selected=1" : "";?>>1988</option><option value="1987" <?php echo @$wedding_year == "1987" ? "Selected=1" : "";?>>1987</option><option value="1986" <?php echo @$wedding_year == "1986" ? "Selected=1" : "";?>>1986</option><option value="1985" <?php echo @$wedding_year == "1985" ? "Selected=1" : "";?>>1985</option><option value="1984" <?php echo @$wedding_year == "1984" ? "Selected=1" : "";?>>1984</option><option value="1983" <?php echo @$wedding_year == "1983" ? "Selected=1" : "";?>>1983</option><option value="1982" <?php echo @$wedding_year == "1982" ? "Selected=1" : "";?>>1982</option><option value="1981" <?php echo @$wedding_year == "1981" ? "Selected=1" : "";?>>1981</option><option value="1980" <?php echo @$wedding_year == "1980" ? "Selected=1" : "";?>>1980</option><option value="1979" <?php echo @$wedding_year == "1979" ? "Selected=1" : "";?>>1979</option><option value="1978" <?php echo @$wedding_year == "1978" ? "Selected=1" : "";?>>1978</option><option value="1977" <?php echo @$wedding_year == "1977" ? "Selected=1" : "";?>>1977</option><option value="1976" <?php echo @$wedding_year == "1976" ? "Selected=1" : "";?>>1976</option><option value="1975" <?php echo @$wedding_year == "1975" ? "Selected=1" : "";?>>1975</option><option value="1974" <?php echo @$wedding_year == "1974" ? "Selected=1" : "";?>>1974</option><option value="1973" <?php echo @$wedding_year == "1973" ? "Selected=1" : "";?>>1973</option><option value="1972"<?php echo @$wedding_year == "1972" ? "Selected=1" : "";?>>1972</option><option value="1971" <?php echo @$wedding_year == "1971" ? "Selected=1" : "";?>>1971</option><option value="1970" <?php echo @$wedding_year == "1970" ? "Selected=1" : "";?>>1970</option><option value="1969" <?php echo @$wedding_year == "1969" ? "Selected=1" : "";?>>1969</option><option value="1968" <?php echo @$wedding_year == "1968" ? "Selected=1" : "";?>>1968</option><option value="1967" <?php echo @$wedding_year == "1967" ? "Selected=1" : "";?>>1967</option><option value="1966" <?php echo @$wedding_year == "1966" ? "Selected=1" : "";?>>1966</option><option value="1965" <?php echo @$wedding_year == "1965" ? "Selected=1" : "";?>>1965</option><option value="1964" <?php echo @$wedding_year == "1964" ? "Selected=1" : "";?>>1964</option><option value="1963" <?php echo @$wedding_year == "1963" ? "Selected=1" : "";?>>1963</option><option value="1962" <?php echo @$wedding_year == "1962" ? "Selected=1" : "";?>>1962</option><option value="1961" <?php echo @$wedding_year == "1961" ? "Selected=1" : "";?>>1961</option><option value="1960" <?php echo @$wedding_year == "1960" ? "Selected=1" : "";?>>1960</option><option value="1959" <?php echo @$wedding_year == "1959" ? "Selected=1" : "";?>>1959</option><option value="1958" <?php echo @$wedding_year == "1958" ? "Selected=1" : "";?>>1958</option><option value="1957" <?php echo @$wedding_year == "1957" ? "Selected=1" : "";?>>1957</option><option value="1956" <?php echo @$wedding_year == "1956" ? "Selected=1" : "";?>>1956</option><option value="1955" <?php echo @$wedding_year == "1955" ? "Selected=1" : "";?>>1955</option><option value="1954" <?php echo @$wedding_year == "1954" ? "Selected=1" : "";?>>1954</option><option value="1953" <?php echo @$wedding_year == "1953" ? "Selected=1" : "";?>>1953</option><option value="1952" <?php echo @$wedding_year == "1952" ? "Selected=1" : "";?>>1952</option><option value="1951"<?php echo @$wedding_year == "1951" ? "Selected=1" : "";?>>1951</option><option value="1950" <?php echo @$wedding_year == "1950" ? "Selected=1" : "";?>>1950</option><option value="1949" <?php echo @$wedding_year == "1949" ? "Selected=1" : "";?>>1949</option><option value="1948" <?php echo @$wedding_year == "1948" ? "Selected=1" : "";?>>1948</option><option value="1947" <?php echo @$wedding_year == "1947" ? "Selected=1" : "";?>>1947</option><option value="1946" <?php echo @$wedding_year == "1946" ? "Selected=1" : "";?>>1946</option><option value="1945" <?php echo @$wedding_year == "1945" ? "Selected=1" : "";?>>1945</option><option value="1944" <?php echo @$wedding_year == "1944" ? "Selected=1" : "";?>>1944</option><option value="1943" <?php echo @$wedding_year == "1943" ? "Selected=1" : "";?>>1943</option><option value="1942" <?php echo @$wedding_year == "1942" ? "Selected=1" : "";?>>1942</option><option value="1941" <?php echo @$wedding_year == "1941" ? "Selected=1" : "";?>>1941</option><option value="1940" <?php echo @$wedding_year == "1940" ? "Selected=1" : "";?>>1940</option><option value="1939" <?php echo @$wedding_year == "1939" ? "Selected=1" : "";?>>1939</option><option value="1938" <?php echo @$wedding_year == "1938" ? "Selected=1" : "";?>>1938</option><option value="1937" <?php echo @$wedding_year == "1937" ? "Selected=1" : "";?>>1937</option><option value="1936" <?php echo @$wedding_year == "1936" ? "Selected=1" : "";?>>1936</option><option value="1935" <?php echo @$wedding_year == "1935" ? "Selected=1" : "";?>>1935</option><option value="1934" <?php echo @$wedding_year == "1934" ? "Selected=1" : "";?>>1934</option><option value="1933" <?php echo @$wedding_year == "1933" ? "Selected=1" : "";?>>1933</option><option value="1932" <?php echo @$wedding_year == "1932" ? "Selected=1" : "";?>>1932</option><option value="1931" <?php echo @$wedding_year == "1931" ? "Selected=1" : "";?>>1931</option><option value="1930" <?php echo @$wedding_year == "1930" ? "Selected=1" : "";?>>1930</option><option value="1929" <?php echo @$wedding_year == "1929" ? "Selected=1" : "";?>>1929</option><option value="1928" <?php echo @$wedding_year == "1928" ? "Selected=1" : "";?>>1928</option><option value="1927"<?php echo @$wedding_year == "1927" ? "Selected=1" : "";?>>1927</option><option value="1926" <?php echo @$wedding_year == "1926" ? "Selected=1" : "";?>>1926</option><option value="1925" <?php echo @$wedding_year == "1925" ? "Selected=1" : "";?>>1925</option><option value="1924" <?php echo @$wedding_year == "1924" ? "Selected=1" : "";?>>1924</option><option value="1923" <?php echo @$wedding_year == "1923" ? "Selected=1" : "";?>>1923</option><option value="1922" <?php echo @$wedding_year == "1922" ? "Selected=1" : "";?>>1922</option><option value="1921" <?php echo @$wedding_year == "1921" ? "Selected=1" : "";?>>1921</option><option value="1920" <?php echo @$wedding_year == "1920" ? "Selected=1" : "";?>>1920</option><option value="1919" <?php echo @$wedding_year == "1919" ? "Selected=1" : "";?>>1919</option><option value="1918" <?php echo @$wedding_year == "1918" ? "Selected=1" : "";?>>1918</option><option value="1917" <?php echo @$wedding_year == "19216" ? "Selected=1" : "";?>>1917</option><option value="1916" <?php echo @$wedding_year == "1916" ? "Selected=1" : "";?>>1916</option><option value="1915" <?php echo @$wedding_year == "1915" ? "Selected=1" : "";?>>1915</option><option value="1914" <?php echo @$wedding_year == "1914" ? "Selected=1" : "";?>>1914</option><option value="1913" <?php echo @$wedding_year == "1913" ? "Selected=1" : "";?>>1913</option><option value="1912" <?php echo @$wedding_year == "1912" ? "Selected=1" : "";?>>1912</option><option value="1911" <?php echo @$wedding_year == "1911" ? "Selected=1" : "";?>>1911</option><option value="1910" <?php echo @$wedding_year == "1910" ? "Selected=1" : "";?>>1910</option><option value="1909" <?php echo @$wedding_year == "1909" ? "Selected=1" : "";?>>1909</option><option value="1908" <?php echo @$wedding_year == "1908" ? "Selected=1" : "";?>>1908</option><option value="1907" <?php echo @$wedding_year == "1907" ? "Selected=1" : "";?>>1907</option><option value="1906" <?php echo @$wedding_year == "1906" ? "Selected=1" : "";?>>1906</option><option value="1905" <?php echo @$wedding_year == "1905" ? "Selected=1" : "";?>>1905</option></select>
													
													<input onchange="setBirthday(this);" type="text" id="wedannivdtpicker" value="<?php echo date('m/d/Y', strtotime(@$wedding_month . " " . @$wedding_date . ", " . @$wedding_year)); ?>" class="form-control">
													
													<script>
													  var j = jQuery.noConflict();
													  j( function() {
														j( "#wedannivdtpicker" ).datepicker();
													  } );
													  </script>
													
												</div>
								  
								</div>
												
								  <div class="form-group">
									<label for="CellNumber">Phone Number</label>
									<input type="text" name="CellNumber" min='11'  autocomplete="off" onkeypress="CCCSystem.validationCP()"  id="CellNumber" value="<?php echo @$CellNumber; ?>" class="form-control">
									<div class="CpValidation"></div>
								  </div>
								  
								  <div class="form-group">
									<label for="ProfesionalSkills">Work</label>
									<input type="text" name="ProfesionalSkills" value="<?php echo @$Work;?>" class="form-control">
								  </div>
								  
								   <div class="form-group">
									<label for="Address">Address</label>
									<input type="text" name="Address" value="<?php echo @$Address; ?>" class="form-control">
								  </div>
								  
								  <input type="hidden" name="MentorName" value="<?php echo @$LeaderName;?>" class="form-control">
							</div>	
							<div style="clear:both;">
								 
							</div>
							</div>
					
					
						 <div class="modal-footer">
							 <input type="submit" id="submitUpdate" class="btn btn-default">
							 <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
							 
						</div>
				</form>
			  </div>
			  
			</div>
		  </div>
			
		<div id="content">
		
<div id="left">
	<div id="menu">
		<div id="image_profile">
			<span>	
				<img id="user-image-profile" onload="this.style.opacity = 1" src="<?php echo base_url(); ?>administrator/userimage2/<?php echo $userID; ?>" style="border-radius:40px; height:40px; width:40px; margin-top:0px; padding:0;">
			</span>
			<span style="font-size:12px;">
				<strong>Hello, <?php echo @$first_name; ?></strong>
			</span>
		</div>		
		<?php if(isset($settings) && $setting ='display'){?>		
			<h6 id="h-menu-events"><a href="<?php echo base_url(); ?>administrator"><i class="dsfont fa fa-home" aria-hidden="true"></i>Dashboard</a></h6>
				<ul id="menu-events" class="closed">
					<li class="last"><a href="<?php echo base_url(); ?>administrator/newEvent">Users</a></li>
				</ul>
				<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>administrator/media"><i class="dsfont fas fa-folder-plus"></i>Media</a></h6>
				<h6 id="h-menu-settings"><a href="#settings"><i class="dsfont fas fa-folder-plus"></i>Pages</a></h6>
				<h6 id="h-menu-settings"><a href="<?php echo base_url(); ?>administrator/businesslist"><i class="dsfont fas fa-list-alt"></i>Business Lists</a></h6>
			<?php } ?>
	
	</div>
				
</div>
					
			
			
			<!-- end content / left --> 
			<!-- content / right -->
			<div id="right"> 
				<!-- table --> 
				<div class="box">
				
					<!-- box / title -->
					<div class="title" style="width:97%; margin:auto;"><h3>Businesses</h3> 							
					<a href="<?php echo base_url();?>administrator/addbusiness" style="float: right; margin-top: 10px; margin-right: 20px; background: #365899; color: #fff; padding: 2px; width: 120px; text-decoration:none;"><i class="dsfont fas fa-plus-circle"></i><span class="addbusinessbtn">Add Business</span></a></div>

					<!-- end box / title -->
					<div class="table">
						
					   
						
						
						<table>
							<thead>
								<tr>
									<th>Business Name</th>
									<th style="text-align:center;">Address</th>
									<th style="text-align:center;">Category</th>
									<th style="text-align:center;">Action</th>
									
							</tr>
							</thead>
							<tbody id="listofrecords">
							
							</tbody>
							</table>
						
						
						
						
						
						<div class="">
			
						
								

				

			</div>
					</div>

				
				</div>
				<!-- end table -->
				
				
		

				<style>
					#upcomingEventsFIRSTTD, #upcomingEventsLEFTTD {
						background-color: #467CC8 !important;
					}
					
					#upcomingEventsWrapper div {
						background-color: #EEEEEE;
						color: #222222;
					}
					
					#upcomingEventsWrapper div td {
						padding-left: 10px;
						padding-right: 10px;
						font-size: 12px;
						color: #888888;
					}
					
					#upcomingEventsWrapper .upcoming-event-title td {
						background-color: #E5E5E5;
						border-bottom: 1px #DDDDDD solid;
						padding: 5px !important;
						padding-left: 10px !important;
						padding-right: 10px !important;
						font-size: 18px;
						color: #777777 !important;
					}
					
					#upcomingEventsWrapper #upcoming-event-first {
						background-color: #467CC8 !important;
						color: #FFFFFF !important;
					}
					
					#upcomingEventsWrapper #upcoming-event-first table {
						margin-bottom: 10px;
					}
					
					
					#upcomingEventsWrapper #upcoming-event-first a {
						color: #1f4265;
					}
					
					#upcomingEventsWrapper a {
						font-size: 12px;
						padding: 5px;
						margin-top: 5px;
					}
					
					.eventpart-selected {
						padding: 2px;
						padding-left: 5px;
						padding-right: 5px;
						font-weight: bold;
						font-size: 12px !important;
						background-color: #4CAF50 !important;
						color: #FFFFFF !important;
						border-radius: 5px;
						vertical-align: middle;
						margin-top: 5px;
					}

					#upcomingEventsWrapper #upcoming-event-first td {
						color: #FFFFFF !important;
					}
					
					#upcomingEventsWrapper #upcoming-event-first .upcoming-event-title td {
						background-color: #467CC8;
						border: 0px #467CC8 solid;
						padding: 5px !important;
						padding-left: 10px !important;
						padding-right: 10px !important;
						font-size: 20px;
						color: #FFFFFF !important;
					}
				</style>

				<script>
					function _(id) { return document.getElementById(id); }
					
					function setEventPart(id, status) {
						var a = new ajax("<?php echo base_url(); ?>administrator/eventpart");
						a.success = function(r){
							if(r != "") { _('eventPartCounterTD' + id).innerHTML = r; }
						};
						a.params = {
							'id_no':<?php echo $realUserID; ?>,
							'event':id,
							'status':status
							};
						a.send();
					}
					
					function updateUpcomingEventsPaneResize() {
						var e = _('upcomingEventsMainWrapper');
						var w = parseInt(getComputedStyle(e).width.replace("px", ""));
						
						if(w < 750) {
							_('upcomingEventsFIRSTTD').appendChild(_('upcoming-event-first'));
							_('upcomingEventsLEFTTD').style.width = "0px";
						}
						else {
							_('upcomingEventsLEFTTD').appendChild(_('upcoming-event-first'));
							_('upcomingEventsLEFTTD').style.width = "35%";
						}
					}
					
					function createUpcomingEvents(source) {
						var template = _('upcomingEventsTemplate').value;
						var contents = [];
						var temp = "";
						var prevDate = "";
						var l = 0;
						
						var ids = [];
						for(var i = 0; i < source.length; i++) {
							temp = template.replace("_#title#_", source[i].title);
							temp = temp.replace("_#venue#_", source[i].venue);
							temp = temp.replace("_#datetime#_", source[i].date + (source[i].date == source[i].toDate ? "" : "&nbsp;&nbsp;-&nbsp;&nbsp;" + source[i].toDate) + (source[i].time != "12:00 AM" ? " @ " + source[i].time : ""));
							temp = temp.split("_#event#_").join(source[i].id);
							ids.push(source[i].id);
							
							l = contents.length - 1;
							if(prevDate == source[i].date) { contents[l] = contents[l] + temp; }
							else { contents.push(temp); }
							
							prevDate = source[i].date;
						}
						
						_('tempUpcomingEventsWrapper').innerHTML = '<div id="upcoming-event-first">' + contents.join("</div><div>") + "<div>";
						
						_('upcomingEventsFIRSTTD').innerHTML = "";
						_('upcomingEventsLEFTTD').innerHTML = "";
						_('upcomingEventsRESTTD').innerHTML = "";
						
						
						_('upcomingEventsLEFTTD').appendChild(_('tempUpcomingEventsWrapper').firstChild);
						while(_('tempUpcomingEventsWrapper').children.length != 0) { _('upcomingEventsRESTTD').appendChild(_('tempUpcomingEventsWrapper').children[0]); }
						
						updateUpcomingEventsPaneResize();
						for(i = 0; i < ids.length; i++) { setEventPart(ids[i], -1); }
					}
					
					eval("<?php echo $upcomingevents; ?>");
					createUpcomingEvents(upcomingevents);
					
					
					window.addEventListener("resize", updateUpcomingEventsPaneResize);
				</script>
				
				<!--dito-->
				<!-- messages -->
				<div id="box-tabs" class="box">
					<!-- box / title -->
					<div class="title" style="display:none">
						<h5>Upcomming Events</h5>
					</div>
					<!-- box / title -->
					<div id="box-messages" style="display:none">
						<div class="messages">

						
					
						</div>
					</div> 
					
					
					<!---EDIT USERNAME--->
							<div class="modal fade" id="editusername" role="dialog">
								<div class="modal-dialog">
								
								  <!-- Modal content-->
								  <div class="modal-content">
									<form id="frmEditusername">
									<div class="modal-header">
						
									  	<h4 class="modal-title" style="font-size: 30px;">Change Username</h4>
									</div>
									
									<div class="modal-body">
									
										
										
											<input type="hidden" value="<?php echo $userID; ?>" name="menthorID">
											<div class="form-group">
												<label>Old Username</label>
												<input type="text" name="old_username" class="form-control" value="" required style="float:left; width:95%;"><a href='#'  style="float:right; display:block; width:5%; color:#000; text-align:center"><img id="old_username_img" src="<?php echo base_url();?>images/exclamation.png"  style="margin:0;"></a>
												<input type="hidden" name="userID" id="userID"  class="form-control" value="<?php echo $userID; ?>">
											</div>
											
											<div class="form-group">
												<label>New Username</label>
												<input type="text" name="newusername" class="form-control" value="" required style="float:left; width:95%;"><a href='#'  style="float:right; display:block; width:5%; color:#000; text-align:center"><img id="newusername_img" src="<?php echo base_url();?>images/exclamation.png"  style="margin:0;"></a>
					 							
											</div>
											
											<div class="form-group">
												<label>Retype Username</label>
												<input type="text" name="re_newusername" class="form-control" value="" required style="float:left; width:95%;"><a href='#'  style="float:right; display:block; width:5%; color:#000; text-align:center"><img id="re_newusername_img" src="<?php echo base_url();?>images/exclamation.png"  style="margin:0;"></a>
												
											</div>
															 			
										
									</div>
									<div class="modal-footer">
											<input type="submit" class="btn  btn-default" value="Change" name="ChangePassword" disabled>			
									</div>
										
										</form>									
								  </div>
								</div>
							</div>	
					
							<!--EDIT PASSWORD-->
							
							
							<div class="modal fade" id="editpassword" role="dialog">
								<div class="modal-dialog">
								
								 <!--- Modal content-->
								  <div class="modal-content">
										<form id="frmEditPassword">
									<div class="modal-header">

									  	<h4 class="modal-title" style="font-size: 30px;">Change Password</h4>
									</div>
									
									<div class="modal-body">
									
									
										
											<input type="hidden" value="<?php echo $userID; ?>" name="menthorID">
											<div class="form-group">
												<label>Old Password</label>
												<input type="password" name="old_password"  class="form-control" value="" style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/eye.png" id="repeatPasswordIfcheck" style="margin:0;"></a>
												
											</div>
											
											<div class="form-group">
												<label>New Password</label>
												<input type="password" name="newpassword"  id="newpassword" class="form-control" value="" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center" id="changepasswordeye"><img src="<?php echo base_url();?>images/eye.png"  style="margin:0;"></a>
												
												
											</div>
											
											<div class="form-group">
												<label>Retype Password</label>
												<input type="password" name="re_password" id="re_password" class="form-control" value="" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/exclamation.png" id="changepasswordcheck" style="margin:0;"></a>
												
												
											</div>
																					
										
									</div>
									<div class="modal-footer">
										<input type="submit" class="btn  btn-default" value="update" name="updatepassword" disabled>
									</div>
									
										</form>									
								  </div>
								</div>
							</div>	
								  					
							  <!-- ADD DISCIPLES POPUP total to count desciples increment -->
							  <div class="modal fade" id="addDes" role="dialog">
							  <form id="formSubmit"> 
								<div class="modal-dialog">
									
									
									
								  <!-- Modal content-->
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">Add Disciple</h4>
									</div>
			
									<div id="UserAlreadyExist"></div>
									
									
									<input type="hidden" value="<?php echo $total; ?>" name="DesciplesCountTotal">
									<input type="hidden" value="<?php echo $userID; ?>" name="menthorID">
									<div class="modal-body">
									  <div id="FullNameData" class="form-group">
 
										
									  </div>
									
									  <div class="form-group">
										<label for="DiscipleName">Disciple Username:</label>
										<input type="text" name="discipleUsername" value="" class="form-control" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/exclamation.png" id="correctUsernameornot" style="margin:0;"></a>
									  </div>
									  <div class="form-group">
										<label for="disciplePassword">Disciple Password:</label>
										<input type="password" name="disciplePassword" class="form-control" required style="float:left; width:95%;"><a href='#' id="eye" style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/eye.png" style="margin:0;"></a>
									  </div>
									  
									    <div class="form-group">
										<label for="disciplePassword">Retype Disciple Password:</label>
										<input type="password" name="retypedisciplePassword" class="form-control" required style="float:left; width:95%;"><a href='#' style="float:right; display:block; width:5%; color:#000; text-align:center"><img src="<?php echo base_url();?>images/exclamation.png" id="repeatPasswordIfcheck" style="margin:0;"></a>
									  </div>
									 
										<input type="hidden" name="MentorUsername" value="<?php echo $username;?>" class="form-control">
																	 
									</div>
									
								
									<div class="modal-footer">
									   <input type="submit" id="AddDesciples" class="btn btn-default AddDesciples" disabled>
									  <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									</div>
									
								  </div>
								  
								</div>
								</form>
							  </div>
			
		<!-- scripts ($query) -->
		
		<div id="dialog-confirm" title="Alert"  style="display:none; z-index:111111111;">
		  <p style="text-align:center;"><h5>Updated</h5></p>
		</div>
				
		<div id="Changed_Saved" title="Alert" style="display:none; z-index:111111111;">
		  <p style="text-align:center;"><h5>Updated</h5></p>
		</div>
		
		<div id="Changed_Username_Saved" title="Alert" style="display:none; z-index:111111111;">
		  <p style="text-align:center;"><h5>Updated</h5></p>
		</div>
		
		<!--<div id="chatbox"></div>-->
		

		<script type="text/javascript">
			var cropper;
			
			var options =
				{
					imageBox: '.imageBox',
					thumbBox: '.thumbBox',
					spinner: '.spinner',
					imgSrc: 'avatar.png'
				}
			window.onload = function() {
				
			
				document.querySelector('#file').addEventListener('change', function(){
					var reader = new FileReader();
					reader.onload = function(e) {
						options.imgSrc = e.target.result;
						cropper = new cropbox(options);
					}
					reader.readAsDataURL(this.files[0]);
					this.files = [];
				})
				document.querySelector('#imagePicChange').addEventListener('submit', function(e){
					var img = cropper.getDataURL();
					var blobImage =  cropper.getBlob();
					
					var formdata = new FormData();
					formdata.append("myimageFile",blobImage);
					
					document.getElementById('user-image-profile').style.opacity = 0.25;
					
					$.ajax({
						url: "<?php echo base_url();?>administrator/changeprofilepic",
						type: "POST",
						data: formdata,
						processData: false,
						contentType: false,
					}).done(function(respond){
						$("#image_profile img").attr("src", "administrator/userimage/<?php echo $userID;?>");				
					});
					
					e.preventDefault();
					
			   })
				document.querySelector('#btnZoomIn').addEventListener('click', function(){
					cropper.zoomIn();
				})
				document.querySelector('#btnZoomOut').addEventListener('click', function(){
					cropper.zoomOut();
				})
				
				
				
				
			};
		
		
		
	
		</script>
