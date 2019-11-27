<?php 

  if(isset($_POST['btn']))
  {
    if(!empty($_POST['email']))
    {
      $alert = true;
      extract($_POST);
      date_default_timezone_set("Asia/Kolkata");
      $date_today = date("Y-m-d");
      $current_time = date("h:i:sa");
      include('mailsystem/PHPMailerAutoload.php');
      include('mailsystem/class.phpmailer.php');
      include('mailsystem/class.smtp.php');
        $mail= new PHPMailer();
      $mail->isSMTP();
      $mail->SMTPAuth=false;
      $mail->SMTPSecure=false;
      $mail->SMTPAutoTLS = false;
      $mail->Host="localhost";
      $mail->Port=25;

      $mail->Username='tst1234500@gmail.com';
      $mail->Password = "1@Rishuthakur";
    
      $mail->Subject="elphantom";
      $mail->Body="Hi ".$email.", Thanks for subscribing us!. This is system genrated mail do not reply to it";
      $mail->addAddress($email);
      $mymail = $mail->Send();
      if(!$mymail)
      {
        $mail_status =  "mail not sent";
      }
      else
      {
        $mail_status =  "mail sent";
      }
      $connect = mysqli_connect("localhost","rishu","Rdb404#rdx","rishu1") or die("Error establishing connection");
      $sql_id = "select count(id) as idno from subs;";
        $result =mysqli_query($connect,$sql_id) or die("Error in inserting data:".mysqli_error($connect));
        $row = mysqli_fetch_array($result);
        $id=$row['idno']+1;
      $sql = "insert into subs values($id,'$email','$date_today','$current_time','$mail_status')";
      $run = mysqli_query($connect,$sql) or die("Error in inserting data:".mysqli_error($connect));
      
      if($run!=NULL)
      {
        
        echo "
            <div class='mydiv' id='subdiv'>
          <div class='div2'>
          <center>
          <h2> Thanks for Subscribing us!</h2>
          <button class='btn btn-primary' onclick='closefun()'>ok</button>
          </center>
          </div>
        </div>
        ";
      }
      else
      {
          echo "
           <div class='mydiv' id='subdiv'>
          <div class='div2'>
          <center>
          <h2 style='color:red'> Error! please try after sometime</h2>
          <button class='btn btn-danger' onclick='closefun()'>ok</button>
          </center>
          </div>
        </div>
          ";
      }
    }
    else
    {
      $formVAlidate = "Please Enter Your Email";
    }
  }

?>

<html lang="en">
<head>
  <title>mypage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse navbar-expand-md navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <i class="fas fa-car"></i><span class="logo"> Elphantom</span>
      </a>
    </div>
    <button  onclick="show_hide_menu(this);" class="navbar-toggler menubutton" type="button" data-toggle="collapse" data-target="#Navbar">
    <!-- <span class="navbar-toggler-icon"></span> -->
    <i class="fas fa-sliders-h"></i>
  </button>
  <div class="collapse navbar-collapse" id="Navbar">
    <ul class="nav navbar-nav">
      <li class=""><a href="#" onmouseover="show(store);" onmouseout="hide(store);" ><i id="store" class="fas fa-home"></i> Home</a></li>
       <li><a href="#"  onmouseover="show(gallery);" onmouseout="hide(gallery);"><i id="gallery" class="fas fa-images"></i> gallery</a></li>
      <li><a href="#ourteam" onmouseover="show(team);" onmouseout="hide(team);"><i id="team" class="fas fa-users"></i> team</a></li>
      <li><a href="#connect"  onmouseover="show(support);" onmouseout="hide(support);"><i id="support" class="fas fa-headset"></i> contact</a></li>
    </ul>
  </div>
</div>
</nav>
  <section class="banner">
 <!-- <div class="bannerPic"></div> -->
 <div class="text">
   Make the Everyday Extraordinary
 </div>

 <div class="shopbutton">
    Know more <i class="fas fa-arrow-circle-right"></i>
 </div>
</section>

<div class="container sub-banner">
  <div class="left">
    <div class="top">
      <div class="left-top-before">
        <div class="left-top-before-title">
          Our Vision    
        </div>
        <div class="left-top-before-description">
           Elphantom team works day and night to make this world a better place.
        </div>
      </div>
    </div>
    <div class="bottom">
      <div class="left-bottom-after"></div>
    </div>
  </div>
  <div class="right">
    <div class="right-after">
      <div class="projectBannerTitle">Other Projects</div>
      <div class="otherProjects">
         Apart from this we have worked on several projects. Our aim is to help people and make their life more better. To view our other projects please follow the given link.
      </div>
      <center>
        <div class="viewall" style="min-width: 165px;" onclick="alert('link not available. Please check back in few days')">view demo <i class="fas fa-arrow-circle-right"></i></div>
      </center>
    </div>
  </div>
</div>
<!-- benifits of self driving Cars -->
<section class="yourHomeisYou">
  <div class="container">
    <div class="whyElphantom">
      Benifts Of Automation
    </div>
      <div class="row benifits">
          <div class="col-sm-3" style="height: auto;">
            <div class="benifits-title">Experience A Automated Lifestyle</div>
            <div class="benifits-description">
              Automation in driving provides lots of benifits to common person as it reduces accidental chances, reduces human errors, give you and other padestrians a safe road, ensure your comfort, reduces traffic jams and others.   
            </div>
          </div>
          <div class="col-sm-3 safety">
            <div class="icon-details">
              <i class="fas fa-shield-alt"></i><br>Safety
            </div>
          </div>
          <div class="col-sm-3 comfort">
            <div class="icon-details">
              <i class="fas fa-heart"></i><br>Comfort
            </div>
          </div>
          <div class="col-sm-3 traffic">
            <div class="icon-details">
              <i class="fas fa-traffic-light"></i><br>Traffic
            </div>
          </div>
      </div>
    </div>
</section>
<!-- @benifits ends -->
<!-- how far we have conqured -->
<section class="howWeMade">
  <div class="container" style="padding-top:20px;padding-bottom: 20px;">
    <div class="row">
      <div class="col-sm-6" style="height: auto;">
        <div class="howWeMade-title">How Far We Have Conquered</div>
        <div class="date"><i>Last Update: 23 May. 2019</i></div>
        <div class="benifits-description1" style="background: transparent;color:#999;font-size: 16px;margin-top:0px;">
              we have completed till level two according to our documantation and looking forward to compelet other level as soon as possible. We are hell bend on completing this project this year. We have already completed body design and other mechnical milstones. Now we ready to dive into the next level. Current we are working on wippper moter stuff. Elphantom team thanks to our mentor and other supports for helping us out whenever we needed. 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="video-cover"></div>
        <iframe frameborder="0" style="width: 100%;height: 100%;" src="https://www.youtube.com/embed/kLqHAEUUffo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         <div class="video-bottom-cover"></div>
      </div>
    </div>
  </div>
</section>
<!-- @howFarEnds -->
<!-- team section starts -->
<section class="team" id="ourteam">
  <div class="mot">
     Our Team
  </div>
  <div class="container">
    <hr>
    <div class="teamDIscription">
      <p>
       We have one of the best team members. We are working hard to complete this project ASAP as it will help lot of people and make their life more eaiser in comparrison to their current status. We are respects each other works and motivate each other to work hard. We are looking forward to continue these habits.  
      </p>
    </div>
    <!-- 1st Row of team members###design and developed by Rishu -->
    <div class="teamMemberRow">
      <div class=" teamMemberLeft">
        <div class="picPart">
          <div class="teampic">
            <img src="img/raj1.jpg">
          </div>
        </div>
        <div class="desPart">
          <div class="memberName">Rajvansh</div>
          <div class="memberPost">Mentor</div>
          <div class="teamconnect">
            <i class="fab fa-linkedin" onclick="alert('link not available. Please check back in few days')"></i>
            <i class="fab fa-twitter-square" onclick="alert('link not available. Please check back in few days')"></i>
              <i class="fab fa-facebook-square" onclick="alert('link not available. Please check back in few days')"></i>
          </div>
        </div>
      </div>
      <div class="teamMemberRight">
        <div class="picPart">
          <div class="teampic">
            <img src="https://media.licdn.com/dms/image/C5103AQEBjBE4jL1BHg/profile-displayphoto-shrink_800_800/0?e=1561593600&v=beta&t=F8bfGgkkb2lVr5AG_gibcevNFTYMhkBejvUdz2gk2fM">
          </div>
        </div>
        <div class="desPart">
          <div class="memberName">Ashish Jangra</div>
          <div class="memberPost">IoT/AI/Deep Learning (Leader)</div>
          <div class="teamconnect">
            <a href="https://www.linkedin.com/in/ashish-jangra/"><i class="fab gray fa-linkedin"></i></a>
            <i class="fab gray fa-twitter-square" onclick="alert('link not available. Please check back in few days')"></i>
            <a href="https://www.facebook.com/ashishzangra"><i class="fab gray fa-facebook-square"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- 1st Row ends -->
    <!-- 2nd Row starts.. -->
    <div class="teamMemberRow" ">
      <div class=" teamMemberLeft">
        <div class="picPart">
          <div class="teampic">
            <img src="img/sakshi.jpg">
          </div>
        </div>
        <div class="desPart">
          <div class="memberName">Sakshi Awasthi</div>
          <div class="memberPost">IoT Developer</div>
          <div class="teamconnect">
            <a href="https://www.linkedin.com/in/sakshi-awasthi-24585914a/"><i class="fab gray fa-linkedin"></i></a>
             <i class="fab gray fa-twitter-square" onclick="alert('link not available. Please check back in few days')"></i>
            <a href="https://www.facebook.com/profile.php?id=100004535565343"><i class="fab gray fa-facebook-square"></i></a>
          </div>
        </div>
      </div>
      <div class="teamMemberRight">
        <div class="picPart">
          <div class="teampic">
            <img src="img/guri.jpg">
          </div>
        </div>
        <div class="desPart">
          <div class="memberName">Gurpreet Singh</div>
          <div class="memberPost">Circuit Designer</div>
          <div class="teamconnect">
            <a href="https://www.linkedin.com/in/gurpreet-singh-618634148/"><i class="fab gray fa-linkedin"></i></a>
             <i class="fab gray fa-twitter-square" onclick="alert('link not available. Please check back in few days')"></i>
            <a href="https://www.facebook.com/raina.error404"><i class="fab gray fa-facebook-square"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- 2nd Row ends!! -->

    <div id="restmembers" class="collapse">
      <!-- 3rd row for team members -->
      <div class="teamMemberRow">
      <div class=" teamMemberLeft">
        <div class="picPart">
          <div class="teampic">
            <img src="https://media.licdn.com/dms/image/C5603AQHnFuAsAC-qHQ/profile-displayphoto-shrink_800_800/0?e=1561593600&v=beta&t=gZeic_VQOg6C2fII47jil6OG8cvv14S52kf_CCbn64A">
          </div>
        </div>
        <div class="desPart">
          <div class="memberName">Gaurav Kumar</div>
          <div class="memberPost">IoT Developer</div>
          <div class="teamconnect">
            <a href="https://www.linkedin.com/in/xixeon/"><i class="fab gray fa-linkedin"></i></a>
             <i class="fab gray fa-twitter-square" onclick="alert('link not available. Please check back in few days')"></i>
              <i class="fab gray fa-facebook-square" onclick="alert('link not available. Please check back in few days')"></i>
          </div>
        </div>
      </div>
      <div class="teamMemberRight">
        <div class="picPart">
          <div class="teampic">
            <img src="https://media.licdn.com/dms/image/C4E03AQGxb6hUzwgDDA/profile-displayphoto-shrink_800_800/0?e=1561593600&v=beta&t=-sKrTwqCoBdvRtrzIvrQWnJpu18aNzf2SBjMYphmHSk">
          </div>
        </div>
        <div class="desPart">
          <div class="memberName">Vikrant</div>
          <div class="memberPost">IoT/Body Designer</div>
          <div class="teamconnect">
            <a href="https://www.linkedin.com/in/vikranth-reddy-samala-667618148/"><i class="fab gray fa-linkedin"></i></a>
             <i class="fab gray fa-twitter-square" onclick="alert('link not available. Please check back in few days')"></i>
              <i class="fab gray fa-facebook-square" onclick="alert('link not available. Please check back in few days')"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- the desiginer's box -->
    <div class="teamMemberRow">
      <div></div>
      <div class=" teamMemberLeft rishuBorder" style="position: relative;left: 50%;transform: translateX(-50%);overflow: hidden;">
        <div class="picPart" style="background: #000;">
          <div class="teampic">
            <img src="https://media.licdn.com/dms/image/C5603AQG79g5Ja430kQ/profile-displayphoto-shrink_200_200/0?e=1563408000&v=beta&t=NvQO0Y8JbT9GWZUQgPcbZgPFFdKwxfYMBTBZ8AsNqjk">
          </div>
        </div>
        <div class="desPart" style="background: #111;">
          <div class="memberName">Rishu Kumar</div>
          <div class="memberPost">Full Stack Developer</div>
          <div class="teamconnect">
          <a href="https://www.linkedin.com/in/rishu-kumar-9a39ab148/"><i class="fab gray fa-linkedin"></i></a>
            <a href="https://twitter.com/Rishuku40034989"><i class="fab gray fa-twitter-square"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100007999032053"><i class="fab gray fa-facebook-square"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- desiginer box ends -->
    <!-- 3rd row ends!! -->
    </div>
     <center><div onclick="show_hide(this)" class="viewall" data-toggle="collapse" data-target="#restmembers">view all <i class="fas fa-arrow-circle-right"></i></div></center>
  </div>
</section>
<section class="footer" id="connect">
  <div class="container">
    <div class="row" style="margin-top: 60px;border-bottom: 0.1em solid #282828">
       <div class="col-sm-4">
        <div class="iconPart">
          <i class="fas fa-brain"></i><br>
           <div class="icon-title">Machine Learning</div>
        </div>
       </div>
       <div class="col-sm-4">
        <div class="iconPart">
          <i class="fas fa-microchip"></i><br>
           <div class="icon-title">IoT</div>
        </div>
       </div>
       <div class="col-sm-4">
        <div class="iconPart">
         <i class="fab fa-python"></i><br>
           <div class="icon-title">Python</div>
        </div>
       </div>
    </div>
    <div class="row" style="margin-top: 10px;border-bottom: 0.1em solid #282828">
      <div class="col-sm-6" style="height: auto;">
        <div class="subscribe">
          <form id="subsForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="email-title">Stay Connected</div>
          <div class="email-box" id="emailbox">
            <input class="email" id="email" type="email" onfocus="myFocus()" onfocusout="myfocusout()" name="email" placeholder="Enter Email Address">
            <input type="hidden" name="btn" id="button">
            <div class="submit" onclick="formSubmit()"><i class="fas fa-arrow-right"></i></div>
          </form>
          </div>
          <p id="jsvalidation" style="color:red;position:absolute;top: 75%;"></p>
          <?php if(isset($formVAlidate)){ echo "<br><span style='color:red;'>".$formVAlidate."</span>"; } ?>
        </div>
      </div>
      <div class="col-sm-6" style="height:auto;display: flex;">
        <div class="connecct-icons">
          <i class="fab fa-linkedin" onclick="alert('link not available. Please check back in few days')"></i>
          <i class="fab fa-twitter" onclick="alert('link not available. Please check back in few days')"></i>
          <i class="fab fa-facebook" onclick="alert('link not available. Please check back in few days')"></i>
          <i class="fab fa-instagram" onclick="alert('link not available. Please check back in few days')"></i>
          <i class="fab fa-youtube" onclick="alert('link not available. Please check back in few days')"></i>
        </div>
      </div>
    </div>
    <div class="copyright">
      © 2019 elPhantom.com. All Rights Reserved. elPhantom is a website for a project being developed by students of Lovely professional University. This website is developed by Rishu kumar. TERMS AND CONDITIONS |  PRIVACY POLICY  |  TERMS OF VISIT
    </div>
  </div>
</section>
<script type="text/javascript">
  function formSubmit() {
    var formVAlidatejs = document.getElementById('email').value;
    var NULL = '';
    if(formVAlidatejs==NULL)
    {
      document.getElementById("jsvalidation").innerHTML = "*Please Enter Your Email";
    }
    else{
    document.getElementById("button").value = "1";
    document.getElementById("subsForm").submit();
    }
  }
  function show(x) {
    x.style.color="#fff";
  }
  function hide(x) {
    x.style.color="#000";
  }
  var i=0;
  var j=0;
  function show_hide(x) {
    if(i==0)
    {
      x.innerHTML="VIEW LESS <i class='fas fa-times-circle'></i>";
      i=1;
    }

    else{
       x.innerHTML="VIEW ALL <i class='fas fa-arrow-circle-right'>";
      i=0;
    }
  }
  function show_hide_menu(x) {
    if(j==0)
    {
      x.innerHTML="<i class='fas fa-times-circle rotate'></i>";
      j=1;
    }
    
    else{
       x.innerHTML="<i class='fas fa-sliders-h'></i>";
      j=0;
    }
  }
  function myFocus() {
    document.getElementById('emailbox').style.border = "1px solid #286090";
  }
   function myfocusout() {
    document.getElementById('emailbox').style.border = "1px solid #282828";
  }
    function closefun() {
    document.getElementById('subdiv').style.display="none";
  }
</script>
</body>
</html>
