<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/<?php echo $_SESSION[staff_pix
];?>" alt=""><?php echo $_SESSION[staff_name];?>                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="faq.php">Help</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php
				   echo $newmail = mysql_num_rows(mysql_query("SELECT * FROM complain WHERE reply_to='$_SESSION[staffid]' AND msg_read='0' ")); ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                   
				     <?php
 $inbox = mysql_query("SELECT * FROM complain WHERE reply_to='$_SESSION[staffid]' AND msg_read='0' ORDER BY `complain`.`date` DESC limit 5");
while($row = mysql_fetch_array($inbox, MYSQL_BOTH))
{
$datetime=$row['date'];
?>
				    <li>
                      <a href="complain.php?message_id=<?php echo $row['id'];?>">
                        <span class="image"><?php   $dfrom = mysql_query("SELECT * FROM members_table WHERE  id='$row[reply_from]' ORDER BY `members_table`.`id` DESC");

while($rvow = mysql_fetch_array($dfrom, MYSQL_BOTH))
{
$sendpics= $rvow['pics'] ;
}

?><img src="../images/<?php echo $sendpics; ?>" alt="Profile Image" /></span>
                        <span>
                          <span><?php   $dfrom = mysql_query("SELECT * FROM members_table WHERE  id='$row[reply_from]' ORDER BY `members_table`.`id` DESC");

while($rvow = mysql_fetch_array($dfrom, MYSQL_BOTH))
{
echo $rvow['f_name'] ;
echo ",  ";
echo $rvow['l_name'] ;
}

?></span>
                          <span class="time"><?php 
$time=strtotime($datetime);
echo date("h:i A",$time);
?></span>
                        </span>
                        <span class="message">
                          <?php echo substr($row['message'], 0, 100)?>...
                        </span>
                      </a>
                    </li>
					<?php }?>
                   <li>
                      <div class="text-center">
                        <a href="complain.php">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>