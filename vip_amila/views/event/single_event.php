<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.imagemapster.js"></script>
<script type="text/javascript">
    $('img').mapster({
    mapKey: 'state',
    singleSelect: true
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('area').click(function() {
      var id = $(this).attr('id');

    });

    $('#showfloor').click(function() {
      $('#floorm').show();
      $(this).hide();
    });
    
    $('.heads').change(function(){
      var mCount = Number($('#male').val());
      var fmCount = Number($('#female').val());
      var ticketPrice = Number($('#ticketPrice').val());
      var tot = (mCount + fmCount)*ticketPrice;
      $('#totAmt').text(tot);
    });
  });
</script>
<h1>Make a Booking</h1>
<div>&nbsp;</div>
<div id="BUY">
  <form name="" action="index.php" method="POST">
  <div class="tableLike" style="width:100%">
  <div class="tableRow">
    <div class="normCell" style="width: 70%">
      <div class="tableLike" style="width: 100%">
        
        <div class="tableRow">
          <div class="normCell" style="width:1%">&nbsp;</div>
          <div class="normCell" style="width:98%; text-align: left;">
            <img src="images/events/<?php echo $imagePath; ?>" style="width:500px;" />
          </div>
          <div class="normCell" style="width:1%">&nbsp;</div>
        </div>

        <div class="tableRow">
          &nbsp;
        </div>
      </div>
    </div>
    <div class="normCell" style="width: 30%">
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;">
           <h4><?php echo $eventName; ?></h4>
        </div>        
        <div class="normCell" style="width:1%">&nbsp;</div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;">      
           <h2>Date: <?php echo $eventDate; ?></h2>
        </div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;"> 
          <h2>Time: <?php echo $starts . ' - ' . $end; ?></h2>
        </div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;"> 
          <h2>Location: <?php echo $street; ?></h2>
        </div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: justify;">
         <p><?php echo $description; ?></p>
        </div>
        <div class="normCell" style="width:1%">&nbsp;</div>
      </div>
    </div>
  </div>
</div>
<div style="clear:both">
<div id="TabbedPanels1" class="profilePanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Floor Plan</li>
    <li class="TabbedPanelsTab" tabindex="0">Buy Bottles</li>
    <li class="TabbedPanelsTab" tabindex="0">Buy a Ticket</li>
    <li class="TabbedPanelsTab" tabindex="0">Venue Info</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
          
          <?php if (sizeof($floorPlanData) > 0) { ?>
        
        <div id="floorm">
          <p>Pick the floor area you prefer.</p>
          <p>&nbsp;</p>
          <img src="images/events/<?php echo($floorImage); ?>" width="<?php echo($width); ?>" height="<?php echo($height); ?>"  class="map" usemap="#features" />

          <map name="features">
            <?php
            foreach ($floorPlanData as $key => $val) {
              ?>
              <area class="floor_area" id="area_<?php echo($val['area_id']); ?>" href="#" alt="<?php echo($val['area_name']); ?>" shape="rect" coords="<?php echo($val['area_coord_x']); ?>,<?php echo($val['area_coord_y']); ?>,<?php echo($val['area_coord_x2']); ?>,<?php echo($val['area_coord_y2']); ?>">

              <?php
            }
            ?>
          </map>
        </div>
            <?php
          }
          ?>
    </div>
    <div class="TabbedPanelsContent">
          <p>Add number of bottles from each type you prefer.</p>
    </div>
    <div class="TabbedPanelsContent">
          <p>&nbsp;</p>
          <div class="tableLike contact-form" style="width:100%">
  
          <div class="tableRow">

            <div class="normCell" style="width: 1%">&nbsp;</div>
            <div class="normCell" style="width: 69%">
              <div class="tableLike" style="width: 100%">
                <form action="index.php" method="POST">
                  <div class="tableRow">
                    <div class="normCell" style="width:100%">* all fields are mandatory</div>
                  </div>
                  <div class="tableRow">
                    <div class="normCell right-column" style="width:25%">Participants</div>
                    <div class="normCell" style="width:4%">&nbsp;</div>
                    <div class="normCell" style="width:71%;padding-top:5px;">
                      Male <select name="booking[male]" id="male" class="heads">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select> &nbsp;&nbsp;&nbsp;
                      Female <select name="booking[female]" id="female" class="heads">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>                </div>
                    <div class="normCell" style="width:60%">
                     
                    </div>
                  </div>
                  
                  <div class="tableRow">
                    <div class="normCell right-column" style="width:25%">Name</div>
                    <div class="normCell" style="width:4%">&nbsp;</div>
                    <div class="normCell" style="width:71%">
                      <input id="password" name="booking[name]" class="text" type="text" placeholder="your name" required />                   </div>

                  </div>
                  <div class="tableRow">
                     <div class="normCell right-column" style="width:25%">Email</div>
                     <div class="normCell" style="width:4%">&nbsp;</div>
                    <div class="normCell" style="width:71%">
                      <input id="password" name="booking[email]" class="text" type="email" placeholder="email" required />
                    </div>
                  </div>
                  <div class="tableRow">
                    <div class="normCell right-column" style="width:25%">Phone</div>
                     <div class="normCell" style="width:4%">&nbsp;</div>
                    <div class="normCell" style="width:71%">
                    <input id="password" name="booking[contact]" class="text" type="text" placeholder="contact number" required />
                    </div>
                  </div>
                  <div class="tableRow">
                    <p style="text-align:center;">
                      <button id="button" class="button">Purchase Now</button>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <div class="normCell" style="width: 30%">
                <div class="tableRow" style="border: 1px solid #CCCCCC;font-size: 16px; font-weight: bold;">
                  <div class="normCell" style="width: 100%;text-align: center; padding-top: 7px;">Ticket Price: <span style="color: #ffe45c"><?php echo(number_format($ticketPrice, 2, '.', ',')); ?></span></div>
                  <input type="hidden" name="booking[ticketPrice]" id="ticketPrice" value="<?php echo $ticketPrice; ?>" />
                </div>
                <div class="tableRow">
                  &nbsp;
                </div>
                <div class="tableRow">
                    
                      <h4><span style="font-weight:normal">Total Amount:</span> <span id="totAmt">0.00</span></h4>
                    </p>
                </div>
            </div>
          </div>
          </div>
    </div>
    <div class="TabbedPanelsContent">
          <h2>Venue Info</h2>
    </div>
  </div>
</div>
</div>
<div>&nbsp;</div>
  </form>
  </div>
  <div style="clear:both;">&nbsp;</div>
<div>&nbsp;</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>