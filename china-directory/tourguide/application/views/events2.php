<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<style>

.modal-header {
	background-color: #372d50;
	border-radius: 6px 6px 0px 0px;
}

.modal {
	text-align: center;
	padding: 0px !important;
	position: fixed !important;
	top: 0px !important;
    right: 0px !important;
    bottom: 0px !important;
    left: 0px !important;
	vertical-align: middle !important;
	overflow: hidden;
	overflow-y: visible;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

#eventsListModalBody tr:nth-child(odd) { background: rgb(236, 236, 236); }
#eventsListModalBody tr:nth-child(even) { background: #FAFAFA; }

#eventsListModalBody tr, #eventsListModalBody tr:hover {
	height : 45px;
}

#eventsListModalBody tr:hover {
	cursor: default;
	background-color: #abf5b7 !important;
}

#eventsListModalBody td {
	vertical-align: middle;
}

.modal-body thead td {
	padding: 5px;
	font-weight: bold;
}

.modal-body label {
	margin: 0px !important;
	font-weight: normal !important;
}

.modal-body input[type=checkbox] {
	margin-left: 10px !important;
	margin-right: 5px !important;
}

.activeButton {
	margin-top: 5px;
	margin-bottom: 5px;
	border: 1px #AAAAAA solid;
	border-radius: 10px;
	background-color: #CCCCCC;
	height: 30px;
}

.defaultButton {
	margin-top: 5px;
	margin-bottom: 5px;
	border-radius: 10px;
	border: 1px #CCCCCC solid;
	background-color: rgb(250, 250, 250);
	height: 30px;
}

</style>

<script src="<?php echo base_url(); ?>Welcome/scripts/ajax.js"></script>
<table width="100%" height="100%">
	<tr>
		<td width="10%">&nbsp;</td>
		<td style="padding: 20px; padding-top: 60px; background-color: #FFFFFF; border-left: 1px #CCCCCC solid; border-right: 1px #CCCCCC solid;">
			<h1>Events</h1>

			<?php
			//date_default_timezone_set('Etc/GMT+8');
			date_default_timezone_set('Asia/Manila');
			
			$date = getdate();
			$m = ($date["mon"] < 10) ? "0" . $date["mon"] : $date["mon"];
			$d = ($date["mday"] < 10) ? "0" . $date["mday"] : $date["mday"];
			$y = $date["year"];
			
			$mm = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			
			$m1 = $date['mon'] + 1;
			$m1 = ($m1 <= 12) ? $mm[$m1] . "&nbsp;" . $date["year"] : $mm[$m1 - 12] . "&nbsp;" . ($date["year"] + 1);
			
			$m2 = $date['mon'] + 2;
			$m2 = ($m2 <= 12) ? $mm[$m2] . "&nbsp;" . $date["year"] : $mm[$m2 - 12] . "&nbsp;" . ($date["year"] + 1);
			
			$m3 = $date['mon'] + 3;
			$m3 = ($m3 <= 12) ? $mm[$m3] . "&nbsp;" . $date["year"] : $mm[$m3 - 12] . "&nbsp;" . ($date["year"] + 1);
			
			?>
			
			<table width="100%" cellpadding="0" cellspacing="0" style="border: 1px #EDEDED solid;">
				<tr style="background-color: #f5f5f5 !important;">
					<td colspan="6">
						<h2 style="text-align: center !important;">
						<?php 
							switch(key($_GET)) {
								case "last": echo date("F Y", strtotime("$y-$m-$d -1 month")); break;
								case "": echo date("F Y", strtotime("$y-$m-$d")); break;
								case "next1": echo date("F Y", strtotime("$y-$m-$d +1 month")); break;
								case "next2": echo date("F Y", strtotime("$y-$m-$d +2 month")); break;
								case "next3": echo date("F Y", strtotime("$y-$m-$d +3 month")); break;
							}
						?>
						</h2>
					</td>
				</tr>
				<tr style="background-color: #f5f5f5 !important;">
					<td width="1" style="padding-left: 5px;"><button onclick="location.href='<?php echo base_url(); ?>Welcome/eventspage?last'" type="button" style="margin-right: 5px;" class="<?php echo (key($_GET) == "last" ? "activeButton" : "defaultButton"); ?>">Last&nbsp;Month</button></td>
					<td width="1"><button onclick="location.href='<?php echo base_url(); ?>Welcome/eventspage'" type="button" style="margin-right: 5px;" class="<?php echo (key($_GET) == "" ? "activeButton" : "defaultButton"); ?>">This&nbsp;Month</button></td>
					<td>&nbsp;</td>
					<td width="1"><button onclick="location.href='<?php echo base_url(); ?>Welcome/eventspage?next1'" type="button" style="margin-right: 5px;" class="<?php echo (key($_GET) == "next1" ? "activeButton" : "defaultButton"); ?>"><?php echo $m1; ?></button></td>
					<td width="1"><button onclick="location.href='<?php echo base_url(); ?>Welcome/eventspage?next2'" type="button" style="margin-right: 5px;" class="<?php echo (key($_GET) == "next2" ? "activeButton" : "defaultButton"); ?>"><?php echo $m2; ?></button></td>
					<td width="1" style="padding-right: 5px;"><button onclick="location.href='<?php echo base_url(); ?>Welcome/eventspage?next3'" type="button" class="<?php echo (key($_GET) == "next3" ? "activeButton" : "defaultButton"); ?>"><?php echo $m3; ?></button></td>
				</tr>
			</table>
			
			<?php echo $eventsCalendar; ?>
			<br>
			<br>
			<br>
			<br>
			<br>
		</td>
		<td width="10%">&nbsp;</td>
	</tr>
</table>

<div id="eventsListModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="eventsListModalTitle">DATE STRING</h4>
      </div>
      <div class="modal-body">
        <table border="1" width="100%">
			<thead>
				<td>&nbsp;&nbsp;Event</td>
				<td>Venue</td>
				<td>Time</td>
				<td>&nbsp;</td>
			</thead>
			<tbody id="eventsListModalBody">
				
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modalNewEvent" onclick="openNewEvent()" style="float: left; font-weight: normal;">New Event</button>
        <button type="button" class="btn btn-default" onclick="closeModal('eventsListModal'); currentEventTD.setAttribute('style', '');">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="newEventModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="width: 400px">
<form onsubmit="saveNewEvent(); return false;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Event</h4>
      </div>
      <div class="modal-body">
			Event Title:<br>
			<input class="form-control" type="text" value="" id="newEventTitle"><br>
			Venue:<br>
			<input class="form-control" type="text" value="" id="newEventVenue"><br>
			Time:<br>
			<input class="form-control" type="text" value="" placeholder="00:00 AM" id="newEventTime"><br>
			Days:<br>
			<input class="form-control" type="text" value="1" id="newEventDays"><br>
			Visibility:<br>
			<input type="checkbox" checked id="newEventAll"><label for="newEventAll">All Networks</label><br>
			<input type="checkbox" checked id="newEventPrimary"><label for="newEventPrimary">My Primary Only</label><br>
			<input type="checkbox" checked id="newEvent144"><label for="newEvent144">My 144 Only</label><br>
			<input type="checkbox" checked id="newEvent1728"><label for="newEvent1728">My 1728 Only</label><br>
			<input type="checkbox" checked id="newEvent20736"><label for="newEvent20736">My 20736 Only</label><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="saveNewEventButton" style="font-weight: normal;">Save Event</button>
        <button type="button" class="btn btn-default" id="closeNewEventButton" onclick="closeModal('newEventModal')">Close</button>
      </div>
    </div>
	</form>
  </div>
</div>

<div id="editEventModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="width: 400px">
<form onsubmit="updateEvent(); return false;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Event</h4>
      </div>
      <div class="modal-body">
			Event Title:<br>
			<input class="form-control" type="text" value="" id="updateEventTitle"><br>
			Venue:<br>
			<input class="form-control" type="text" value="" id="updateEventVenue"><br>
			Time:<br>
			<input class="form-control" type="text" value="" placeholder="00:00 AM" id="updateEventTime"><br>
			Visibility:<br>			
			<input type="checkbox" checked id="updateEventAll"><label for="updateEventAll">All Networks</label><br>
			<input type="checkbox" checked id="updateEventPrimary"><label for="updateEventPrimary">My Primary Only</label><br>
			<input type="checkbox" checked id="updateEvent144"><label for="updateEvent144">My 144 Only</label><br>
			<input type="checkbox" checked id="updateEvent1728"><label for="updateEvent1728">My 1728 Only</label><br>
			<input type="checkbox" checked id="updateEvent20736"><label for="updateEvent20736">My 20736 Only</label><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="updateEventButton" style="font-weight: normal;">Update Event</button>
        <button type="button" class="btn btn-default" id="closeUpdateEventButton" onclick="closeModal('editEventModal')">Close</button>
      </div>
    </div>
	</form>
  </div>
</div>

<script>
	function _(id) { return document.getElementById(id); }

	var currentEventDate = "";
	var currentEventTD = null;
	var currentEventID = 0;
	
	function openEvent(dt, ds, td) {
		var table = td.getElementsByTagName("table")[0];
		if(table.className == "eventDone") { _('modalNewEvent').style.display = "none"; }
		else { _('modalNewEvent').style.display = ""; }
	
		_('eventsListModal').style.display = "inline-block";
		_('eventsListModalTitle').innerHTML = ds;
		_('eventsListModalBody').innerHTML = '<td colspan="4" style="background-color: #FFFFFF !important">&nbsp;&nbsp;<img style="margin: 0px;" src="<?php echo base_url(); ?>Welcome/images/loading2.gif">&nbsp;Loading events ...</td>';
		currentEventDate = dt;
		currentEventTD = td;
		
		var t = setTimeout(function(){
			_('eventsListModal').className = "modal fade in";
			td.setAttribute("style", "background-color: #FFE683 !important");
			clearTimeout(t);
		}, 100);
		
		
		var a = new ajax("<?php echo base_url(); ?>Welcome/getevents");
		a.currentDate = dt;
		a.success = function(r){
			if(currentEventDate == this.currentDate) {
				if(r == "") { document.getElementById('eventsListModalBody').innerHTML = '<td colspan="4" style="background-color: #FFFFFF !important">&nbsp;&nbsp;No events</td>'; }
				else { _('eventsListModalBody').innerHTML = r; }
			}
		};
		a.params = {'id_no':'<?php echo $userID; ?>','date':a.currentDate};
		a.send();
	}
	
	
	function closeModal(m) {
		_(m).className = "modal fade out";
		var t = setTimeout(function(){
			_(m).style.display = "none";
		}, 250);
	}
	
	function openNewEvent() {
		_('newEventModal').style.display = "inline-block";
		
		_('newEventTitle').value = "";
		_('newEventVenue').value = "";
		_('newEventTime').value = "";
		_('newEventDays').value = "1";
		
		_('newEventPrimary').checked = false;
		_('newEvent144').checked = false;
		_('newEvent1728').checked = false;
		_('newEvent20736').checked = false;
		_('newEventAll').checked = true;
		
		_('newEventPrimary').disabled = true;
		_('newEvent144').disabled = true;
		_('newEvent1728').disabled = true;
		_('newEvent20736').disabled = true;
		
		
		var t = setTimeout(function(){
			_('newEventModal').className = "modal fade in";
			clearTimeout(t);
		}, 100);
	}
	
	function saveNewEvent() {
		_('newEventTitle').disabled = true;
		_('newEventVenue').disabled = true;
		_('newEventTime').disabled = true;
		_('newEventDays').disabled = true;
		_('newEventPrimary').disabled = true;
		_('newEvent144').disabled = true;
		_('newEvent1728').disabled = true;
		_('newEvent20736').disabled = true;
		_('newEventAll').disabled = true;
		
		_('saveNewEventButton').disabled = true;
		_('closeNewEventButton').disabled = true;
		
		
		var visibility = "self";
		
		if(_('newEventAll').checked) { visibility = "all"; }
		else {
			if(_('newEventPrimary').checked) { visibility += ",primary"; }
			if(_('newEvent144').checked) { visibility += ",144"; }
			if(_('newEvent1728').checked) { visibility += ",1728"; }
			if(_('newEvent20736').checked) { visibility += ",20736"; }
		}
		
		var a = new ajax("<?php echo base_url(); ?>Welcome/saveevent");
		a.success = function(r){
			if(r != "") {
				alert(r);
				
				_('newEventTitle').disabled = false;
				_('newEventVenue').disabled = false;
				_('newEventTime').disabled = false;
				_('newEventDays').disabled = false;
				
				_('newEventPrimary').disabled = _('newEventAll').checked;
				_('newEvent144').disabled = _('newEventAll').checked;
				_('newEvent1728').disabled = _('newEventAll').checked;				
				_('newEvent20736').disabled = _('newEventAll').checked;				
				_('newEventAll').disabled = false;
				
				_('saveNewEventButton').disabled = false;
				_('closeNewEventButton').disabled = false;
				
			}
			else { location.reload(); }
		};
		a.params = {
			'do':"NEW",
			'id_no':'<?php echo $userID; ?>',
			'date':currentEventDate,
			'title':_('newEventTitle').value,
			'venue':_('newEventVenue').value,
			'time':_('newEventTime').value,
			'days':_('newEventDays').value,
			'visibility': visibility
			};
		a.send();
	}
	
	function to12HoursFormat(dt) {
		var s = dt.split(":");
		hour = ((parseInt(s[0]) + 11) % 12 + 1);
		suffix = (parseInt(s[0]) >= 12)? 'PM' : 'AM';
		
		return (hour < 10 ? "0" + hour : hour) + ":" + s[1] + " " + suffix;
	}
	
	function openEditEvent(id) {
		currentEventID = id;
		_('editEventModal').style.display = "inline-block";
		
		_('updateEventTitle').value = "";
		_('updateEventVenue').value = "";
		_('updateEventTime').value = "";
		
		
		_('updateEventPrimary').checked = false;
		_('updateEvent144').checked = false;
		_('updateEvent1728').checked = false;
		_('updateEvent20736').checked = false;
		
		_('updateEventAll').checked = true;
		
		
		_('updateEventTitle').disabled = true;
		_('updateEventVenue').disabled = true;
		_('updateEventTime').disabled = true;
		_('updateEventPrimary').disabled = true;
		_('updateEvent144').disabled = true;
		_('updateEvent1728').disabled = true;
		_('updateEvent20736').disabled = true;
		_('updateEventAll').disabled = true;
		_('updateEventButton').disabled = true;
		
		var t = setTimeout(function(){
			_('editEventModal').className = "modal fade in";
			clearTimeout(t);
		}, 100);
		
		var a = new ajax("<?php echo base_url(); ?>Welcome/getevent/" + id);
		a.success = function(r){
			eval(r);
			
			_('updateEventTitle').value = EventTitle;
			_('updateEventVenue').value = EventVenue;
			_('updateEventTime').value = (EventTime != "00:00:00" ? to12HoursFormat(EventTime) : "");
			
			if(Visibility == "all") {
				_('updateEventPrimary').checked = false;
				_('updateEvent144').checked = false;
				_('updateEvent1728').checked = false;
				_('updateEvent20736').checked = false;
				
				_('updateEventAll').checked = true;
				
				_('updateEventPrimary').disabled = true;
				_('updateEvent144').disabled = true;
				_('updateEvent1728').disabled = true;
				_('updateEvent20736').disabled = true;
			} else {
				_('updateEventAll').checked = false;
				
				_('updateEventPrimary').checked = (Visibility.indexOf('primary') != -1);
				_('updateEvent144').checked = (Visibility.indexOf('144') != -1);
				_('updateEvent1728').checked = (Visibility.indexOf('1728') != -1);
				_('updateEvent20736').checked = (Visibility.indexOf('20736') != -1);
				
				_('updateEventPrimary').disabled = false;
				_('updateEvent144').disabled = false;
				_('updateEvent1728').disabled = false;
				_('updateEvent20736').disabled = false;
			}
			
			_('updateEventTitle').disabled = false;
			_('updateEventVenue').disabled = false;
			_('updateEventTime').disabled = false;
			_('updateEventAll').disabled = false;
			_('updateEventButton').disabled = false;
		};
		a.send();
	}
	
	function updateEvent() {
		_('updateEventTitle').disabled = true;
		_('updateEventVenue').disabled = true;
		_('updateEventTime').disabled = true;
		_('updateEventPrimary').disabled = true;
		_('updateEvent144').disabled = true;
		_('updateEvent1728').disabled = true;
		_('updateEvent20736').disabled = true;
		_('updateEventAll').disabled = true;
		_('updateEventButton').disabled = true;
		_('closeUpdateEventButton').disabled = true;
				
		var visibility = "self";
		
		if(_('updateEventAll').checked) { visibility = "all"; }
		else {
			if(_('updateEventPrimary').checked) { visibility += ",primary"; }
			if(_('updateEvent144').checked) { visibility += ",144"; }
			if(_('updateEvent1728').checked) { visibility += ",1728"; }
			if(_('updateEvent20736').checked) { visibility += ",20736"; }
		}
		
		var a = new ajax("<?php echo base_url(); ?>Welcome/saveevent");
		a.success = function(r){
			if(r != "") {
				alert(r);
				
				_('updateEventTitle').disabled = false;
				_('updateEventVenue').disabled = false;
				_('updateEventTime').disabled = false;
				
				_('updateEventPrimary').disabled = _('updateEventAll').checked;
				_('updateEvent144').disabled = _('updateEventAll').checked;
				_('updateEvent1728').disabled = _('updateEventAll').checked;				
				_('updateEvent20736').disabled = _('updateEventAll').checked;				
				_('updateEventAll').disabled = false;				
			}
			else { location.reload(); }
		};
		a.params = {
			'do':"UPDATE",
			'event':currentEventID,
			'title':_('updateEventTitle').value,
			'venue':_('updateEventVenue').value,
			'time':_('updateEventTime').value,
			'visibility': visibility
			};
		a.send();
	}
	
	function deleteEvent(id, title) {
		if(confirm("Are you sure you want to delete '" + title + "' ?")) {
			var a = new ajax("<?php echo base_url(); ?>Welcome/removeevent");
			a.success = function(r){
				if(r != "") { alert(r); }
				else { location.reload(); }
			};
			a.params = {'id':id};
			a.send();
		}
	}
	
	_('newEventAll').onchange = function() {
		if(this.checked) {
			_('newEventPrimary').checked = false;
			_('newEvent144').checked = false;
			_('newEvent1728').checked = false;
			_('newEvent20736').checked = false;
			
			_('newEventPrimary').disabled = true;
			_('newEvent144').disabled = true;
			_('newEvent1728').disabled = true;
			_('newEvent20736').disabled = true;
		} else {
			_('newEventPrimary').disabled = false;
			_('newEvent144').disabled = false;
			_('newEvent1728').disabled = false;
			_('newEvent20736').disabled = false;
		}
	};
	
	_('updateEventAll').onchange = function() {
		if(this.checked) {
			_('updateEventPrimary').checked = false;
			_('updateEvent144').checked = false;
			_('updateEvent1728').checked = false;
			_('updateEvent20736').checked = false;
			
			_('updateEventPrimary').disabled = true;
			_('updateEvent144').disabled = true;
			_('updateEvent1728').disabled = true;
			_('updateEvent20736').disabled = true;
		} else {
			_('updateEventPrimary').disabled = false;
			_('updateEvent144').disabled = false;
			_('updateEvent1728').disabled = false;
			_('updateEvent20736').disabled = false;
		}
	};
	
</script>