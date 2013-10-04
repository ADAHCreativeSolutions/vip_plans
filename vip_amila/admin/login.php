<html>
<head>
  <title>VIPLANS</title>
  <link rel="stylesheet" type="text/css" href="css/vip-styles.css" />
</head>
<body>
   <div id="page_container" align="center">
      <div id="page_main_wrapper" align="center" style="background: #FFFFFF">
        <div class="tableLike" style="width: 100%">
          <div class="tableRow">
            <div class="normCell">&nbsp;</div>
          </div>
          <div class="tableRow">
            <div class="normCell" style="width: 20%">&nbsp;</div>
            <div class="normCell" style="width: 60%">
              <form action="index.php" method="POST" class="general">
                <input type="hidden" name="module" value="user" />
                <input type="hidden" name="action" value="login" />
              <div class="tableLike login" style="width:100%">
                <div class="tableRow">
                  <div class="normCell" style="width:30%">
                    <image src="images/viplan-logo.png" style="height: 150px;" />
                  </div>
                  <div class="normCell" style="width:70%">
                    &nbsp;
                  </div>
                </div>
                <div class="tableRow">
                  <div class="normCell" style="width:30%">
                    Username
                  </div>
                  <div class="normCell" style="width:70%">
                    <input type="text" name="user[username]" id="username" placeholder="username" value="" required />
                  </div>
                </div>
                <div class="tableRow">
                  <div class="normCell" style="width:30%">
                    Password
                  </div>
                  <div class="normCell" style="width:70%">
                    <input type="password" name="user[password]" id="username" placeholder="password" required />
                  </div>
                </div>
                
                <div class="tableRow">
                  <div class="normCell" style="width:30%">
                    &nbsp;
                  </div>
                  <div class="normCell" style="width:70%">
                    <input type="submit" name="submit" id="username" value="Login" />

                  </div>
                </div>
              </div>
              </form>
            </div>
            <div class="normCell" style="width: 20%">&nbsp;</div>
          </div>
        </div>
      </div>
   </div>
</body>
</html>