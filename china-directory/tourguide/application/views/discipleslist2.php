<?php

	@$cpimt = 1;
	function disciplecount($test,$id_no){
								
			foreach($test as $discipleCount){
					if($discipleCount->mentor_id == $id_no && $discipleCount->added_as_close_cell == 1 && $discipleCount->active == 0){@$cpimt++;}
										
			}
			
			return @$cpimt;
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
		return count($records_under_parent);
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
		<tr style="display: none">
			<td>
				<style>

					.search-transfer-result-item-name {
						font-size: 14px;
						border-width: 0px;
					}
					
					.search-transfer-result-bar {
						width: 100%;
						display: block;
					}
					
					#listofrecords .table a, .table th .a2{color:white!important;}
					#listofrecords .table a, .table th .a2:hover {color:#2B86EC!important;}

				</style>
				
				<script>
					
					var transferMentorID = 0;
					
					function setTransfer(elem, id, id2) {
						transferMentorID = id2;
						document.getElementById('transfer-search-results'+id).innerHTML = "";
						document.getElementById('search-transfer-'+id).value = elem.innerHTML.toUpperCase();
						document.getElementById('transferto-image'+id).src = "";
						document.getElementById('transferto-image'+id).src = "<?php echo base_url(); ?>Welcome/userimage2/"+id2;
						document.getElementById('transfer-load-image'+id).style.display = "";
						document.getElementById('transfer-button-'+id).style.display = "";
					}
				
					function doTransfer(id) {
						
						if(transferMentorID) {
							var a = new ajax('<?php echo base_url(); ?>Welcome/transferto2');
							a.params = {'id':id, 'mentor':transferMentorID};
							a.success = function(){
								if(a.responseText == "DONE") { window.location.reload(); }
								else { alert(a.responseText); } 
							};
							a.send();
							document.getElementById('transfer_'+id).click();
						}
						
					}
					
					function doDelete(id) {
						if(confirm("This action will delete the disciple's account/information permanently.\nContinue?")) {
							var a = new ajax('<?php echo base_url(); ?>Welcome/deleteaccount');
							a.params = {'id':id};
							a.success = function(r){
								if(r == "") { location.reload(); }
								else { alert(r); }
							};
							a.send();
						}
					}
				
				</script>
				
			</td>
		</tr>
		
		<?php  foreach(@$getRecordsDisplay as $records){  ?>
				<?php if($records->mentor_id == $userID){ ?> 
					<?php if($records->ranking >= 4 && $records->added_as_close_cell == 1 && $records->active == 0) { @$total++?>
					<tr>
					<th class="title"><img id="user-image-thumb<?php echo $records->id_no; ?>" src="<?php echo base_url() . "Welcome/userimage2/" . $records->id_no ?>" style="float:left; width:40px; height:40px; margin:0; margin-right:10px; padding:0; border-radius:20px; display:block;"> <a href="<?php echo base_url();?>Welcome/disciples/<?php echo $records->id_no; ?>" style="margin-left:10px; margin-top:14px; font-size:11px; display:block;"><?php echo strtoupper($records->first_name. ' '. $records->maiden_name. ' '. $records->last_name); ?></a></th>
				

					<th class="date" style="text-align:center;"><a href="#" style="text-align:center; font-size:12px;" data-toggle="modal" data-target="#myModal_<?php echo $records->id_no; ?>" style="text-align:right; display:block;" > <?php echo disciplecount($getRecordsDisplay,$records->id_no);?></a>
					<!-- Trigger the modal with a button -->
  

							<!-- Modal --> 
							<div id="myModal_<?php echo $records->id_no; ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header" style="clear:both;">
									<h1 style="text-align:center;"><?php echo $records->first_name; ?>'s Primary</h1>
								</div>
								 
								  <div class="modal-body"> 
								   <ul id="list_of_data_records_list"> 
									<?php foreach(@$getRecordsDisplay as $child_of_this_disciple) { ?>
										<?php if($child_of_this_disciple->mentor_id == $records->id_no && $child_of_this_disciple->added_as_close_cell == 1 && $child_of_this_disciple->active == 0){ ?>
											
											<li>
												<img src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $child_of_this_disciple->id_no; ?>" style="width:120px;">
												<a href="<?php echo base_url();?>/Welcome/disciples/<?php echo $child_of_this_disciple->id_no;?>"><span style="clear:both; width:100px; display:block;">
												<?php echo strtoupper( $child_of_this_disciple->first_name .' '. $child_of_this_disciple->maiden_name .' '. $child_of_this_disciple->last_name );?></span></a>
											</li>
										<?php } ?>
								   <?php }?>
								   </ul>
								  </div>
								  <div class="modal-footer" style="clear:both;">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
					</th>
							
						<th style="text-align:center; font-size:12px;"><?php echo getRecordWithParentId($records->id_no, @$getRecordsDisplay);?></th>		
						<th class="selected last" style="text-align:center;"><a style="text-align:center; font-size:12px;" href="javascript:void();" data-toggle="modal" data-target="#myModal_Edit<?php echo $records->id_no; ?>" style="text-align:right; display:block; padding-right:10px;"   ><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:15px;"></i></a><a href="#" href="javascript:void();" data-toggle="modal" data-target="#transfer_<?php echo $records->id_no;?>" >&nbsp;&nbsp;<i class="fa fa-exchange" aria-hidden="true"></i></a> 
					 	<!-- Modal -->
						
							<div id="changeprofileuser_<?php echo $records->id_no;?>" class="modal fade" role="dialog" style="z-index:11111;">
										  <div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content" >
											  <div class="modal-header">
												<h4 class="modal-title">Change Profile</h4>
											  </div>
											  <div class="modal-body"><?php echo $records->id_no;?>
												<p> <form id="imagePicChangeUser_<?php echo $records->id_no;?>" class="imagePicChange" enctype="multipart/form-data">
														<div class="imageBox" id="imageBox<?php echo $records->id_no;?>">
															<div class="thumbBox" id="thumbBox<?php echo $records->id_no;?>"></div>
															<div class="spinner" id="spinner<?php echo $records->id_no;?>" style="display: none">Loading...</div>
														</div>
														<div class="action">
															<input type="file" id="file<?php echo $records->id_no;?>" style="float:left; width: 250px">
															<input type="submit" id="btnCrop<?php echo $records->id_no;?>" value="Crop and Save" style="float: right">
															<input type="button" id="btnZoomIn<?php echo $records->id_no;?>" value="+" style="float: right">
															<input type="button" id="btnZoomOut<?php echo $records->id_no;?>" value="-" style="float: right">
														</div>
														
														<div class="cropped_<?php echo $records->id_no;?>" style="">

														</div>
													
														
														
													</form>
												</p>
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											  </div>
											</div>

										  </div>
										</div>
						
							<div id="myModal_Edit<?php echo $records->id_no; ?>" class="modal fade deactivate_activate" role="dialog">
							  <div class="modal-dialog" style="width:60%;">

								<!-- Modal content-->
								<div class="modal-content" style="background:rgba(0,0,0,0.6);">
								<div class="modal-header" style="clear:both;">
									<h1 style="text-align:center;"><?php echo $records->first_name; ?></h1>
								</div> 
								<script type="text/javascript">
									var cropper<?php echo $records->id_no; ?>;
									
									var options<?php echo $records->id_no; ?> =
										{
											imageBox: '#imageBox<?php echo $records->id_no;?>',
											thumbBox: '#thumbBox<?php echo $records->id_no;?>',
											spinner: '#spinner<?php echo $records->id_no;?>',
											imgSrc: 'avatar.png'
										};
										
									//window.onload = function() {
										
										document.querySelector('#file<?php echo $records->id_no;?>').addEventListener('change', function(){
											var reader = new FileReader();
											reader.onload = function(e) {
												options<?php echo $records->id_no; ?>.imgSrc = e.target.result;
												cropper<?php echo $records->id_no; ?> = new cropbox(options<?php echo $records->id_no; ?>);
											}
											reader.readAsDataURL(this.files[0]);
											this.files = [];
										});
										
										document.querySelector('#imagePicChangeUser_<?php echo $records->id_no;?>').addEventListener('submit', function(e){
											var img = cropper<?php echo $records->id_no; ?>.getDataURL();
											var blobImage =  cropper<?php echo $records->id_no; ?>.getBlob();
											
											var formdata = new FormData();
											formdata.append("myimageFile",blobImage);
											
											document.getElementById('image_profile_<?php echo $records->id_no;?>').style.opacity = 0.25;

											$.ajax({
												url: "<?php echo base_url();?>Welcome/changeprofilepic/<?php echo $records->id_no;?>",
												type: "POST",
												data: formdata,
												processData: false,
												contentType: false,
											}).done(function(respond){
												$("#image_profile_<?php echo $records->id_no;?>").attr("src", "<?php echo base_url();?>Welcome/userimage2/<?php echo $records->id_no;?>");
												$("#user-image-thumb<?php echo $records->id_no; ?>").attr("src", "<?php echo base_url();?>Welcome/userimage2/<?php echo $records->id_no;?>");
												
											});
											
											e.preventDefault();
											
									   })
										document.querySelector('#btnZoomIn<?php echo $records->id_no;?>').addEventListener('click', function(){
											cropper<?php echo $records->id_no; ?>.zoomIn();
										})
										document.querySelector('#btnZoomOut<?php echo $records->id_no;?>').addEventListener('click', function(){
											cropper<?php echo $records->id_no; ?>.zoomOut();
										})
										
										
										
										
									//}; 
								</script>
								
										
										
								   <form class='EditAccountInformation'> 
								 
										  <div class="modal-body">
											<input type="hidden" id="delegatesID" name="delegatesID" value="<?php echo $records->id_no; ?>">
										   <div class="form-group">
												<a data-toggle="modal" data-target="#changeprofileuser_<?php echo $records->id_no;?>" style="position:relative; display:block;">
													<span style="background-image: url('<?php echo base_url(); ?>Welcome/images/loading2.gif'); background-position: center center; width:150px; height: 150px; background-repeat: no-repeat; font-size: 100px; display: block; margin:auto;">
														<img onload="this.style.opacity = 1" id="image_profile_<?php echo $records->id_no;?>" src="<?php echo base_url(); ?>Welcome/userimage2/<?php echo $records->id_no; ?>" style="opacity: 0.25; width:150px; margin-top: 0px; vertical-align: top; ">
													</span>
												</a>
												
			
											<div style="float:left; width:45%; margin-bottom:20px;">
												
												 
												
												<p style="float:left; margin:0; padding:0; color:#fff;">First Name</p>
												<input type="text" name="first_name" class="form-control" value="<?php echo $records->first_name; ?>">
												<p style="float:left; margin:0; padding:0; color:#fff;">Maiden Name</p>
												<input type="text" name="maiden_name" class="form-control" value="<?php echo $records->maiden_name; ?>">
												<p style="float:left; margin:0; padding:0; color:#fff;">Last Name</p>
												<input type="text" name="last_name" class="form-control" value="<?php echo $records->last_name; ?>">
												<p style="text-align:left; margin:0; padding:0; color:#fff;">Birthday</p>
												
												<select aria-label="Month" class="form-control birthday" style="display: none; float:left; width:110px; margin-right:5px;" name="birthday_month" id="month<?php echo $records->id_no; ?>" title="Month" ><option value="0" selected="1">Month</option><option value="Jan" <?php echo $records->birthmonth =="Jan" ? "selected" : "";?>>Jan</option><option value="Feb" <?php echo $records->birthmonth =="Feb"? "Selected=1" : "";?>>Feb</option><option value="Mar"<?php echo $records->birthmonth =="Mar"? "Selected=1" : "";?>>Mar</option><option value="Apr" <?php echo $records->birthmonth =="Apr"? "Selected=1" : "";?>>Apr</option><option value="May" <?php echo $records->birthmonth =="May"? "Selected=1" : "";?>>May</option><option value="Jun" <?php echo $records->birthmonth =="Jun"? "Selected=1" : "";?>>Jun</option><option value="Jul" <?php echo $records->birthmonth =="Jul"? "Selected=1" : "";?>>Jul</option><option value="Aug" <?php echo $records->birthmonth =="Aug"? "Selected=1" : "";?>>Aug</option><option value="Sep" <?php echo $records->birthmonth =="Sep"? "Selected=1 " : "";?>>Sep</option><option value="Oct" <?php echo $records->birthmonth =="Oct"? "Selected=1" : "";?>>Oct</option><option value="Nov" <?php echo $records->birthmonth =="Nov"? "Selected=1" : "";?>>Nov</option><option value="Dec" <?php echo $records->birthmonth =="Dec"? "Selected=1" : "";?>>Dec</option></select>
												<select aria-label="Day"   class="form-control birthday" style="display: none; float:left; width:110px; margin-right:5px;" name="birthday_day" id="day<?php echo $records->id_no; ?>" title="Day" ><option value="0" selected="1">Day</option><option value="1" <?php echo $records->birthdate == "1" ? "selected=1" : "";?>>1</option><option value="2" <?php echo $records->birthdate == "2" ? "Selected=1" : "";?>>2</option><option value="3" <?php echo $records->birthdate == "3" ? "Selected=1" : "";?>>3</option><option value="4" <?php echo $records->birthdate == "4"? "Selected=1" : "";?>>4</option><option value="5" <?php echo $records->birthdate == "5" ? "Selected=1" : "";?>>5</option><option value="6" <?php echo $records->birthdate == "6" ? "Selected=1" : "";?>>6</option><option value="7" <?php echo $records->birthdate == "7" ? "Selected=1" : "";?>>7</option><option value="8" <?php echo $records->birthdate == "8" ? "Selected=1" : "";?>>8</option><option value="9" <?php echo $records->birthdate == "9" ? "Selected=1" : "";?>>9</option><option value="10" <?php echo $records->birthdate == "10" ? "Selected=1" : "";?>>10</option><option value="11" <?php echo $records->birthdate == "11" ? "Selected=1" : "";?>>11</option><option value="12" <?php echo $records->birthdate == "12" ? "Selected=1" : "";?>>12</option><option value="13" <?php echo $records->birthdate == "13" ? "Selected=1" : "";?>>13</option><option value="14" <?php echo $records->birthdate == "14" ? "Selected=1" : "";?>>14</option><option value="15" <?php echo $records->birthdate == "15" ? "Selected=1" : "";?>>15</option><option value="16" <?php echo $records->birthdate == "16" ? "Selected=1" : "";?>>16</option><option value="17" <?php echo $records->birthdate == "17" ? "Selected=1" : "";?>>17</option><option value="18" <?php echo $records->birthdate == "18" ? "Selected=1" : "";?>>18</option><option value="19" <?php echo $records->birthdate == "19" ? "Selected=1" : "";?>>19</option><option value="20" <?php echo $records->birthdate == "20" ? "Selected=1" : "";?>>20</option><option value="21" <?php echo $records->birthdate == "21" ? "Selected=1" : "";?>>21</option><option value="22" <?php echo $records->birthdate == "22" ? "Selected=1" : "";?>>22</option><option value="23" <?php echo $records->birthdate == "23" ? "Selected=1" : "";?>>23</option><option value="24" <?php echo $records->birthdate == "24" ? "Selected=1" : "";?>>24</option><option value="25" <?php echo $records->birthdate == "25" ? "Selected=1" : "";?>>25</option><option value="26" <?php echo $records->birthdate == "26" ? "Selected=1" : "";?>>26</option><option value="27" <?php echo $records->birthdate == "27" ? "Selected=1" : "";?>>27</option><option value="28" <?php echo $records->birthdate == "28" ? "Selected=1" : "";?>>28</option><option value="29" <?php echo $records->birthdate == "29" ? "Selected=1" : "";?>>29</option><option value="30" <?php echo $records->birthdate == "30" ? "Selected=1" : "";?>>30</option><option value="31"<?php echo $records->birthdate == "31" ? "Selected=1" : "";?> >31</option></select>
												<select aria-label="Year"  class="form-control birthday" style="display: none; float:left; width:110px;" name="birthday_year" id="year<?php echo $records->id_no; ?>" title="Year" ><option value="0" selected="1">Year</option><option value="2016"<?php echo $records->birthyear == "2016" ? "selected=1" : "";?>>2016</option><option value="2015" <?php echo $records->birthyear == "2015" ? "Selected=1" : "";?>>2015</option><option value="2014" <?php echo $records->birthyear == "2014" ? "Selected=1" : "";?>>2014</option><option value="2013" <?php echo $records->birthyear == "2013" ? "Selected=1" : "";?>>2013</option><option value="2012" <?php echo $records->birthyear == "2012" ? "Selected=1" : "";?>>2012</option><option value="2011" <?php echo $records->birthyear == "2011" ? "Selected=1" : "";?>>2011</option><option value="2010" <?php echo $records->birthyear == "2010" ? "Selected=1" : "";?>>2010</option><option value="2009" <?php echo $records->birthyear == "2009" ? "Selected=1" : "";?>>2009</option><option value="2008" <?php echo $records->birthyear == "2008" ? "Selected=1" : "";?>>2008</option><option value="2007" <?php echo $records->birthyear == "2007" ? "Selected=1" : "";?>>2007</option><option value="2006" <?php echo $records->birthyear == "2006" ? "Selected=1" : "";?>>2006</option><option value="2005" <?php echo $records->birthyear == "2005" ? "Selected=1" : "";?>>2005</option><option value="2004" <?php echo $records->birthyear == "2004" ? "Selected=1" : "";?>>2004</option><option value="2003" <?php echo $records->birthyear == "2003" ? "Selected=1" : "";?>>2003</option><option value="2002" <?php echo $records->birthyear == "2002" ? "Selected=1" : "";?>>2002</option><option value="2001" <?php echo $records->birthyear == "2001" ? "Selected=1" : "";?>>2001</option><option value="2000" <?php echo $records->birthyear == "2000" ? "Selected=1" : "";?>>2000</option><option value="1999" <?php echo $records->birthyear == "1999" ? "Selected=1" : "";?>>1999</option><option value="1998" <?php echo $records->birthyear == "1998" ? "Selected=1" : "";?>>1998</option><option value="1997" <?php echo $records->birthyear == "1997" ? "Selected=1" : "";?>>1997</option><option value="1996" <?php echo $records->birthyear == "1996" ? "Selected=1" : "";?>>1996</option><option value="1995" <?php echo $records->birthyear == "1995" ? "Selected=1" : "";?>>1995</option><option value="1994" <?php echo $records->birthyear == "1994" ? "Selected=1" : "";?>>1994</option><option value="1993" <?php echo $records->birthyear == "1993" ? "Selected=1" : "";?>>1993</option><option value="1992" <?php echo $records->birthyear == "1992" ? "Selected=1" : "";?>>1992</option><option value="1991" <?php echo $records->birthyear == "1991" ? "Selected=1" : "";?>>1991</option><option value="1990" <?php echo $records->birthyear == "1990" ? "Selected=1" : "";?>>1990</option><option value="1989" <?php echo $records->birthyear == "1989" ? "Selected=1" : "";?>>1989</option><option value="1988" <?php echo $records->birthyear == "1988" ? "Selected=1" : "";?>>1988</option><option value="1987" <?php echo $records->birthyear == "1987" ? "Selected=1" : "";?>>1987</option><option value="1986" <?php echo $records->birthyear == "1986" ? "Selected=1" : "";?>>1986</option><option value="1985" <?php echo $records->birthyear == "1985" ? "Selected=1" : "";?>>1985</option><option value="1984" <?php echo $records->birthyear == "1984" ? "Selected=1" : "";?>>1984</option><option value="1983" <?php echo $records->birthyear == "1983" ? "Selected=1" : "";?>>1983</option><option value="1982" <?php echo $records->birthyear == "1982" ? "Selected=1" : "";?>>1982</option><option value="1981" <?php echo $records->birthyear == "1981" ? "Selected=1" : "";?>>1981</option><option value="1980" <?php echo $records->birthyear == "1980" ? "Selected=1" : "";?>>1980</option><option value="1979" <?php echo $records->birthyear == "1979" ? "Selected=1" : "";?>>1979</option><option value="1978" <?php echo $records->birthyear == "1978" ? "Selected=1" : "";?>>1978</option><option value="1977" <?php echo $records->birthyear == "1977" ? "Selected=1" : "";?>>1977</option><option value="1976" <?php echo $records->birthyear == "1976" ? "Selected=1" : "";?>>1976</option><option value="1975" <?php echo $records->birthyear == "1975" ? "Selected=1" : "";?>>1975</option><option value="1974" <?php echo $records->birthyear == "1974" ? "Selected=1" : "";?>>1974</option><option value="1973" <?php echo $records->birthyear == "1973" ? "Selected=1" : "";?>>1973</option><option value="1972"<?php echo $records->birthyear == "1972" ? "Selected=1" : "";?>>1972</option><option value="1971" <?php echo $records->birthyear == "1971" ? "Selected=1" : "";?>>1971</option><option value="1970" <?php echo $records->birthyear == "1970" ? "Selected=1" : "";?>>1970</option><option value="1969" <?php echo $records->birthyear == "1969" ? "Selected=1" : "";?>>1969</option><option value="1968" <?php echo $records->birthyear == "1968" ? "Selected=1" : "";?>>1968</option><option value="1967" <?php echo $records->birthyear == "1967" ? "Selected=1" : "";?>>1967</option><option value="1966" <?php echo $records->birthyear == "1966" ? "Selected=1" : "";?>>1966</option><option value="1965" <?php echo $records->birthyear == "1965" ? "Selected=1" : "";?>>1965</option><option value="1964" <?php echo $records->birthyear == "1964" ? "Selected=1" : "";?>>1964</option><option value="1963" <?php echo $records->birthyear == "1963" ? "Selected=1" : "";?>>1963</option><option value="1962" <?php echo $records->birthyear == "1962" ? "Selected=1" : "";?>>1962</option><option value="1961" <?php echo $records->birthyear == "1961" ? "Selected=1" : "";?>>1961</option><option value="1960" <?php echo $records->birthyear == "1960" ? "Selected=1" : "";?>>1960</option><option value="1959" <?php echo $records->birthyear == "1959" ? "Selected=1" : "";?>>1959</option><option value="1958" <?php echo $records->birthyear == "1958" ? "Selected=1" : "";?>>1958</option><option value="1957" <?php echo $records->birthyear == "1957" ? "Selected=1" : "";?>>1957</option><option value="1956" <?php echo $records->birthyear == "1956" ? "Selected=1" : "";?>>1956</option><option value="1955" <?php echo $records->birthyear == "1955" ? "Selected=1" : "";?>>1955</option><option value="1954" <?php echo $records->birthyear == "1954" ? "Selected=1" : "";?>>1954</option><option value="1953" <?php echo $records->birthyear == "1953" ? "Selected=1" : "";?>>1953</option><option value="1952" <?php echo $records->birthyear == "1952" ? "Selected=1" : "";?>>1952</option><option value="1951"<?php echo $records->birthyear == "1951" ? "Selected=1" : "";?>>1951</option><option value="1950" <?php echo $records->birthyear == "1950" ? "Selected=1" : "";?>>1950</option><option value="1949" <?php echo $records->birthyear == "1949" ? "Selected=1" : "";?>>1949</option><option value="1948" <?php echo $records->birthyear == "1948" ? "Selected=1" : "";?>>1948</option><option value="1947" <?php echo $records->birthyear == "1947" ? "Selected=1" : "";?>>1947</option><option value="1946" <?php echo $records->birthyear == "1946" ? "Selected=1" : "";?>>1946</option><option value="1945" <?php echo $records->birthyear == "1945" ? "Selected=1" : "";?>>1945</option><option value="1944" <?php echo $records->birthyear == "1944" ? "Selected=1" : "";?>>1944</option><option value="1943" <?php echo $records->birthyear == "1943" ? "Selected=1" : "";?>>1943</option><option value="1942" <?php echo $records->birthyear == "1942" ? "Selected=1" : "";?>>1942</option><option value="1941" <?php echo $records->birthyear == "1941" ? "Selected=1" : "";?>>1941</option><option value="1940" <?php echo $records->birthyear == "1940" ? "Selected=1" : "";?>>1940</option><option value="1939" <?php echo $records->birthyear == "1939" ? "Selected=1" : "";?>>1939</option><option value="1938" <?php echo $records->birthyear == "1938" ? "Selected=1" : "";?>>1938</option><option value="1937" <?php echo $records->birthyear == "1937" ? "Selected=1" : "";?>>1937</option><option value="1936" <?php echo $records->birthyear == "1936" ? "Selected=1" : "";?>>1936</option><option value="1935" <?php echo $records->birthyear == "1935" ? "Selected=1" : "";?>>1935</option><option value="1934" <?php echo $records->birthyear == "1934" ? "Selected=1" : "";?>>1934</option><option value="1933" <?php echo $records->birthyear == "1933" ? "Selected=1" : "";?>>1933</option><option value="1932" <?php echo $records->birthyear == "1932" ? "Selected=1" : "";?>>1932</option><option value="1931" <?php echo $records->birthyear == "1931" ? "Selected=1" : "";?>>1931</option><option value="1930" <?php echo $records->birthyear == "1930" ? "Selected=1" : "";?>>1930</option><option value="1929" <?php echo $records->birthyear == "1929" ? "Selected=1" : "";?>>1929</option><option value="1928" <?php echo $records->birthyear == "1928" ? "Selected=1" : "";?>>1928</option><option value="1927"<?php echo $records->birthyear == "1927" ? "Selected=1" : "";?>>1927</option><option value="1926" <?php echo $records->birthyear == "1926" ? "Selected=1" : "";?>>1926</option><option value="1925" <?php echo $records->birthyear == "1925" ? "Selected=1" : "";?>>1925</option><option value="1924" <?php echo $records->birthyear == "1924" ? "Selected=1" : "";?>>1924</option><option value="1923" <?php echo $records->birthyear == "1923" ? "Selected=1" : "";?>>1923</option><option value="1922" <?php echo $records->birthyear == "1922" ? "Selected=1" : "";?>>1922</option><option value="1921" <?php echo $records->birthyear == "1921" ? "Selected=1" : "";?>>1921</option><option value="1920" <?php echo $records->birthyear == "1920" ? "Selected=1" : "";?>>1920</option><option value="1919" <?php echo $records->birthyear == "1919" ? "Selected=1" : "";?>>1919</option><option value="1918" <?php echo $records->birthyear == "1918" ? "Selected=1" : "";?>>1918</option><option value="1917" <?php echo $records->birthyear == "19216" ? "Selected=1" : "";?>>1917</option><option value="1916" <?php echo $records->birthyear == "1916" ? "Selected=1" : "";?>>1916</option><option value="1915" <?php echo $records->birthyear == "1915" ? "Selected=1" : "";?>>1915</option><option value="1914" <?php echo $records->birthyear == "1914" ? "Selected=1" : "";?>>1914</option><option value="1913" <?php echo $records->birthyear == "1913" ? "Selected=1" : "";?>>1913</option><option value="1912" <?php echo $records->birthyear == "1912" ? "Selected=1" : "";?>>1912</option><option value="1911" <?php echo $records->birthyear == "1911" ? "Selected=1" : "";?>>1911</option><option value="1910" <?php echo $records->birthyear == "1910" ? "Selected=1" : "";?>>1910</option><option value="1909" <?php echo $records->birthyear == "1909" ? "Selected=1" : "";?>>1909</option><option value="1908" <?php echo $records->birthyear == "1908" ? "Selected=1" : "";?>>1908</option><option value="1907" <?php echo $records->birthyear == "1907" ? "Selected=1" : "";?>>1907</option><option value="1906" <?php echo $records->birthyear == "1906" ? "Selected=1" : "";?>>1906</option><option value="1905" <?php echo $records->birthyear == "1905" ? "Selected=1" : "";?>>1905</option></select>
												
												<input onchange="setBirthday(this);" type="text" id="birthdate<?php echo $records->id_no; ?>" value="<?php echo date('m/d/Y', strtotime($records->birthmonth . " " . $records->birthdate . ", " . $records->birthyear)); ?>" class="form-control">
												
												<script>
												  var j = jQuery.noConflict();
												  j( function() {
													j( "#birthdate<?php echo $records->id_no; ?>" ).datepicker();
												  } );
												  </script>
												
											</div>
											
											<div style="float:right; width:45%;  margin-bottom:20px;">
												<p style="text-align:left; margin:0; padding:0; color:#fff;">Email Address:</p>
												<input type="text" name="EmailAddress" id="EmailAddress" autocomplete="off" onkeypress="CCCSystem.validationEmail()" value="<?php echo $records->email; ?>" class="form-control">
												<div class="EmailValidation"></div>	
												<p style="text-align:left; margin:0; padding:0; color:#fff;">Phone Number</p>
												<input type="text" name="CellNumber" min='11'  autocomplete="off" onkeypress="CCCSystem.validationCP()"  id="CellNumber" value="<?php echo $records->contact; ?>" class="form-control">
												<div class="CpValidation"></div>
												<p style="text-align:left; margin:0; padding:0; color:#fff;">Work</p>
												<input type="text" name="ProfesionalSkills" value="<?php echo $records->work;?>" class="form-control">
											
												<p style="text-align:left; margin:0; padding:0; color:#fff;">Address</p>
												<input type="text" name="Address" value="<?php echo  $records->address; ?>" class="form-control">
											</div>
										
														
											
											</div> 
											
										  </div>
								 
										  <div class="modal-footer" style="clear:both;">
											
											<table width="100%" style="background-color: transparent; border-width: 0px; margin: 0px">
												<tr>
													<td align="left" width="1" style="background-color: transparent; border-width: 0px;">
														<?php if($records->active == 0){ ?>	
															<button class="btn btn-default" onclick="CCCSystem.deactivateAccount('<?php echo $records->id_no; ?>','1')" style="clear:both; width: auto; display:block; border: 2px solid #2B86EC;">Deactive Account</button>
														<?php }else{?>
															
															 <button class="btn btn-default" onclick="CCCSystem.activateAccount('<?php echo $records->id_no; ?>','0')" style="clear:both;  width: auto; display:block; border:2px solid #2B86EC;">Activate Account</button>
														
														<?php } ?>
													</td>
													<td align="left" width="1" style="background-color: transparent; border-width: 0px;"><a class="a2" href="#" style="font-size: 15px; font-weight: bold; color: white;" onclick="doDelete(<?php echo $records->id_no; ?>)"><span style="font-family: FontAwesome; font-size: 20px;"></span>&nbsp;Delete&nbsp;Account</a></td>
													<td style="background-color: transparent; border-width: 0px;">
														<input type="submit" id="submitUpdate" class="btn btn-default" value="Save">
													</td>
												</tr>
											</table>

											 </form>
										   
										  </div>
								  
								</div>

							  </div>
							</div>
							
							
							<!--
							
							-->
							
								
					<div id="transfer_<?php echo $records->id_no;?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Transfer Disciple</h4>
							
						  </div>
						  <div class="modal-body">
							<table style="width: 100%; border-width: 0px; padding: 0px" cellpadding="0" cellspacing="0" class="transfer-search">
								<tr>
									<td rowspan="2" width="1" style="border-width: 0px;">
										<img src="<?php echo base_url() . "Welcome/userimage2/" . $records->id_no; ?>" style="width:100px; margin:0; padding:0; display:block;">
									</td>
									<td style="border-width: 0px;" valign="top">
										<div style="margin-bottom: 0px"><?php echo $records->first_name . ' ' . (($records->maiden_name) ? $records->maiden_name . ' ' : "") . $records->last_name; ?></div>
										<span style="font-size: 12px; color: #AAAAAA;"><i>Transfer to</i></span>
									</td>
									<td rowspan="2" width="1" style="border-width: 0px; vertical-align: top" id="transfer-to-image-container<?php echo $records->id_no; ?>" valign="top">
										
										<img onload="imageLoaded<?php echo $records->id_no; ?>();" src="http://massconline.com/memberpages/images/portrait_placeholder.jpg" style="vertical-align: top; width:100px; margin:0; padding:0; display:block;" id="transferto-image<?php echo $records->id_no; ?>">
										<img id="transfer-load-image<?php echo $records->id_no; ?>" src="<?php echo base_url() . "Welcome/images/imageloading.gif"; ?>" style="display: none; vertical-align: top; width: 100px; margin: 0px;">
										
										<script>
											function imageLoaded<?php echo $records->id_no; ?>() {
												document.getElementById('transfer-load-image<?php echo $records->id_no; ?>').style.display = "none";
												document.getElementById('transferto-image<?php echo $records->id_no; ?>').style.display = "";
											}
										</script>
									</td>
								</tr>
								<tr>
									<td style="border-width: 0px;">
										<script>
											var sss<?php echo $records->id_no; ?> = new search('<?php echo base_url(); ?>Welcome/search2');
											sss<?php echo $records->id_no; ?>.recordTemplate = '<tr><td align="right" width="100" style="border-right-width: 0px"><a style="" href="#" onclick="setTransfer(document.getElementById(\'trasfer-user-name-link<?php echo $records->id_no; ?>\'), <?php echo $records->id_no; ?>, <#id_no#>); return false;"><img src="<?php echo base_url(); ?>Welcome/userimage2/<#id_no#>" style="width: 40px; margin: 0px; margin-left: 50px"></a></td><td class="search-transfer-result-item-name" style="border-width: 0px; border-bottom-width: 1px;" align="left"><a id="trasfer-user-name-link<?php echo $records->id_no; ?>" href="#" onclick="setTransfer(this, <?php echo $records->id_no; ?>, <#id_no#>); return false;"><#full_name#></a></td></tr>';
											sss<?php echo $records->id_no; ?>.success = function(){
												var div = document.getElementById('transfer-search-results<?php echo $records->id_no; ?>');
												div.innerHTML = "";
												var t = "";
												var c = 0;
												while(r = sss<?php echo $records->id_no; ?>.fetchRecordAsText()) {
													if( c >= 10 ) break;
													t += r;
													c++;
												}   
												document.getElementById('transfer-search-loading-<?php echo $records->id_no; ?>').style.display = "none"; 
												div.innerHTML = (t) ? '<table style="width: 100%; border-width: 0px; padding: 0px"><tr>' + t + '</table>' : '<span style="font-size: 12px">No results found.</span>';
											};
												
											function doSearch<?php echo $records->id_no; ?>(s) {
												transferMentorID = 0;
												document.getElementById('transfer-button-<?php echo $records->id_no; ?>').style.display = "none";
												document.getElementById('transfer-search-results<?php echo $records->id_no; ?>').innerHTML = ""; 
												document.getElementById('transfer-search-loading-<?php echo $records->id_no; ?>').style.display = ""; 
												if(s.length == 0) { document.getElementById('transfer-search-loading-<?php echo $records->id_no; ?>').style.display = "none";  return; }
												sss<?php echo $records->id_no; ?>.search(s, <?php echo $userID; ?>, "all", 0, document.getElementById('user-gender').value, <?php echo $records->id_no; ?>, 1);
											} 
										</script> 
										
										<input type="text" onkeyup="doSearch<?php echo $records->id_no; ?>(this.value);" name="search-transfer-<?php echo $records->id_no; ?>" class="form-control"  placeholder="Search" value="" id="search-transfer-<?php echo $records->id_no; ?>" style="margin-bottom: 10px;">
										<button class="btn btn-default" id="transfer-button-<?php echo $records->id_no; ?>" style="display: none" onclick="doTransfer(<?php echo $records->id_no; ?>)">Confirm Transfer</button>
									</td>
								</tr>
								<tr>
									<td colspan="3" style="border-width: 0px;">
										<img style="display: none; margin: 0px" src="<?php echo base_url(); ?>Welcome/images/loading.gif" id="transfer-search-loading-<?php echo $records->id_no; ?>">
										<div id="transfer-search-results<?php echo $records->id_no; ?>" style="margin: 0px"></div>
									</td>
								</tr>
							</table>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
					 
					 </th>
					</tr>
					<?php }?>
			 <?php } ?>					
		<?php }  ?>	
		<tr>
			
			<td style="border:0px; background:transparent;" colspan="3" ><?php if(@$total < 12) { ?> <button type="button" style="" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addDes">Add Disciple</button><?php }?></td>
		</tr> 
		
		
		
		
		