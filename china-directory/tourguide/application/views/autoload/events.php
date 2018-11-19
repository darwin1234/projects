						<?php function reaction($rec,$status, $eventID,$userid){
								@$countInterested = 0;
									foreach($rec as $fieldsReact){
										
											if($fieldsReact->status == $status && $fieldsReact->eventid == $eventID){
												@$countInterested++;
												 
											}
											if($fieldsReact->status == $status && $fieldsReact->userid == $userid &&  $fieldsReact->eventid == $eventID){
												
												 @$descision = $fieldsReact->status;
											}
										
									}
								  echo  @$countInterested;
								
								return @$descision ;
							}?>
							<?php foreach($displayEvent as $ListofEvent){ ?>
							
							<div id="" class="" style="background:#fff; overflow:auto; margin-bottom:10px;">
								<div class="text">
									<h1 id="Event_Title" style='color:#4DB53C;'><?php echo $ListofEvent->title;?></h1>
									<span style="padding-left:20px;">
										Date: <?php echo $ListofEvent->start;?> | Time Start:  <?php echo $ListofEvent->time_start;?> | Time End: <?php echo $ListofEvent->time_end; ?> 
										
									</span>
									<span style="float:right;">
									    <span style="float:left;">
											<p style="text-align:center;"><?php $Interested = reaction($reactions,"Interested",$ListofEvent->id,$userID);?></p>
											<button class='btn btn-primary' <?php if($Interested == "Interested"){ echo "style='background:#ec4825; color:#fff;'"; }?> onclick="CCCSystem.Interested('<?php echo $ListofEvent->title; ?>','<?php echo $ListofEvent->id?>','Interested','<?php echo $userID;?>');">Interested</button>
										</span>
										 <span style="float:left;">
										 <p style="text-align:center;"><?php  $Going = reaction($reactions,"Going",$ListofEvent->id,$userID);?></p>
										 <button  class='btn btn-primary'  <?php if($Going == "Going"){ echo "style='background:#ec4825; color:#fff;'";  }?> onclick="CCCSystem.Going('<?php echo $ListofEvent->title; ?>','<?php echo $ListofEvent->id?>','Going','<?php echo $userID;?>');">Going</button>
										 </span>
										<span style="float:left;">										 
										<p style="text-align:center;"><?php $Maybe = reaction($reactions,"Maybe",$ListofEvent->id,$userID);?></p>
										<button class='btn btn-primary'<?php if($Maybe == "Maybe"){ echo "style='background:#ec4825;  color:#fff;'"; }?> onclick="CCCSystem.Maybe('<?php echo $ListofEvent->title; ?>','<?php echo $ListofEvent->id?>','Maybe','<?php echo $userID;?>');">Maybe</button>
										</span>
									    <span style="float:left;">
										<p style="text-align:center;"><?php  $Decline = reaction($reactions,"Decline",$ListofEvent->id,$userID);?></p>
										<button class='btn btn-primary' <?php if($Decline == "Decline"){echo "style='background:#ec4825;  color:#fff;'"; } ?>  onclick="CCCSystem.Decline('<?php echo $ListofEvent->title; ?>','<?php echo $ListofEvent->id?>','Decline','<?php echo $userID;?>');">Decline</button>
										</span>
								</div>
								 
							</div>
			 
			
							<?php } ?>	