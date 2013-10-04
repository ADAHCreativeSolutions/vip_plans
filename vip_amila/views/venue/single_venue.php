<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
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
            <img src="images/venue/main/<?php echo $venueData['main_image_path']; ?>" style="width:500px;" />
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
           <h4><?php echo $venueData['venue_name']; ?></h4>
        </div>        
        <div class="normCell" style="width:1%">&nbsp;</div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;">      
           <h2>Opening Hours:</h2>
        </div>
      </div>
      
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;"> 
          <h2>Location: <?php echo $venueData['street'] . ', ' . $venueData['city']; ?></h2>
        </div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: justify;">
         <p><?php echo $venueData['description']; ?></p>
        </div>
        <div class="normCell" style="width:1%">&nbsp;</div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;"> 
          <h2>Email: <?php echo $venueData['email']; ?></h2>
        </div>
      </div>
      <div class="tableRow">
        <div class="normCell" style="width:1%">&nbsp;</div>
        <div class="normCell" style="width:98%; text-align: left;"> 
          <h2>Contact: <?php echo $venueData['contact_no']; ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="clear:both">
<div id="TabbedPanels1" class="profilePanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Venue Types</li>
    <li class="TabbedPanelsTab" tabindex="0">Buy Bottles</li>
    <li class="TabbedPanelsTab" tabindex="0">Book a Table</li>
    
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
    <?php
    $sOfT = sizeof($types);
      if($sOfT > 0){ ?>
      <div class="tableLike" style="width:100%">
      <div class="tableRow">
      <?php
        
        foreach($types as $key=>$value){ 
          if($key%3 == 0 && $key !=0){ ?>
            </div>
            <div class="tableRow">
        <?php
          }
          ?>
      <div class="normCell" style="width: 1%">&nbsp;</div>
      <div class="normCell" style="width: 32%"><?php echo $value['type']; ?></div>
      <?php
        }
      ?>
            </div>
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
                       <select name="booking[male]" id="male" class="heads">
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
                      </div>
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
                      <button id="button" class="button">Reserve Now</button>
                    </p>
                  </div>
                </form>
              </div>
            </div>
            <div class="normCell" style="width: 30%">
                &nbsp;
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