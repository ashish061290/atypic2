<?php include("include/head.php"); ?>
<body>
   
<?php include("include/header.php"); ?>
  <!--=== End Header ===-->
    <!--=== Slider ===-->
  <?php include("include/slider.php"); ?><!--=== End Slider ===-->   
<div class="wrapper"> 
   <!--=== Content Part ===-->
  <div class="container-fluid content">
  <div class="row">
  <div class="col-md-12">
  <div class="col-md-9">
    <div class="shadow-wrapper">
      <div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
<h3>Divine Management Services</h3>
     <p> We are enlisted amongst the top-most service provider offering ISO Certification Services, to provide full convenience and avoid all the annoying procedures of certifying and registering your brand and company.

Divine Management Services (DMS) is a provider of consistent, competent & confidential services for ISO 9001 (QMS), ISO 27001 (ISMS), ISO13485 (Medical Devices), ISO 14001 (EMS), ISO 45001 (HSMS) , ISO 22000 (FSMS), Trade Mark & other branding services.
Divine Management has assisted in implementing various Management Systems which meet the requirements of ISO Standards. This assistance consists of development of ISO related documents such as Quality Policy, procedures, manual & records/formats.
<br/>
<h3>Our Awesome Services</h3>
<strong>Company Registration :</strong>
<ul style="padding-left:2%;">
<li>Registering a company is one of the most popular legal ways of starting a business in India, and should be chosen by anyone looking to build a scalable business.
</li>
</ul>
<strong>ISO Standards :</strong>
<li>Optimizing on our team of industry experts, sector specific knowledge and with the rudimentary understanding of our clients' requirements we offer customized solutions.
.</li>
</ul>
<strong>Other Certification</strong><br />We have been successfully supporting business and companies to achieve various certifications applicable in different countries needed for exports.
      <ol style="padding-left:2%; list-style-type:">
	    <li><i style='color:#000'>&#8226;</i> To Provide high quality Consultancy.</li>
	    <li><i style='color:#000'>&#8226;</i> Keeping customer satisfaction.</li>
	    <li><i style='color:#000'>&#8226;</i> To provide best quality solutions.</li>
	    <li><i style='color:#000'>&#8226;</i> Our focus on continually improving QMS is means of achienving organizational excellence and customer trust..</li>
	  </ol>
	  </div>
    </div>
	</div>
	
	<div class="col-md-3">
	<div class="shadow-wrapper">
	    <section>
  <div>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
		<div class="tag-box tag-box-v1 box-shadow shadow-effect-2">
          <div>
            <div>
              <h3 style="background-color:#670503; color:#ffc289;"><center>Enquiry Now</center></h3>
            </div>
            <form method="post" action="#" data-form-title="Enquiry">
              <div class="form-group">
                <input type="text" class="form-control" name="name" required="" placeholder="Name" data-form-field="Name" required="true">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" required="" placeholder="Email" data-form-field="Email" required="true">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="mobile" required="" placeholder="Mobile" data-form-field="Mobile" pattern="([0-9]{1,10})" required="true">
              </div>
              <div class="form-group">
                <select name="service" class="form-control" required="true">
				   <option value="0">--Select Section--</option>
  <option value="ISO 9001:2008">ISO 9001:2008</option>
  <option value="ISO 14001:2004">ISO 14001:2004</option>
  <option value="OHSAS 18001:2007">OHSAS 18001:2007</option>
  <option value="ISO 20000-1:2011">ISO 20000-1:2011</option>
  <option value="ISO 22000:2005">ISO 22000:2005</option>
  <option value="ISO 27001:2005">ISO 27001:2005</option>
  <option value="ISO 13485:2003">ISO 13485:2003</option>
  <option value="Food">Food</option>
  <option value="Electrical &amp; Electronics">Electrical &amp; Electronics</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Raw material">Raw material</option>
  <option value="Mill &amp; Pipelines">Mill &amp; Pipelines</option>
  <option value="Refineries, Chemicals and petrochemicals, Fertilizers">Refineries, Chemicals and petrochemicals, Fertilizers</option>
  <option value="Machinery">Machinery</option>
  <option value="Pre Shipment">Pre Shipment</option>
  <option value="construction &amp; building materials">construction &amp; building materials</option>
  <option value="Oil and gas, power generation and distribution">Oil and gas, power generation and distribution</option>
  <option value="Telecommunication">Telecommunication</option>
  <option value="CE Marking">CE Marking</option>
  <option value="GOST_R">GOST_R</option>
  <option value="ROHS">ROHS</option>
  <option value="WRAP">WRAP</option>
  <option value="SEDEX">SEDEX</option>
  <option value="C-TPAT">C-TPAT</option>
  <option value="GNP">GNP</option>
  <option value="Global GAP">Global GAP</option>
  <option value="HACCP">HACCP</option>
				</select>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Message" rows="7" data-form-field="Message" required="true"></textarea>
              </div>
              <div>
                <input type="submit" name="submit" class="form-control btn-danger" value="SUBMIT">
              </div>
            </form>
              <?php
                if(isset($_POST['submit'])){
                   $name = $_POST['name'];
                   $email = $_POST['email'];
                   $mobile = $_POST['mobile'];
                   $service = $_POST['service'];
                   $message = $_POST['message'];
                   $data = array("name"=>$name,"email"=>$email,"mobile"=>$mobile,
                                 "service"=>$service,"message"=>$message);
                   $date = date('Y-m-d');
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  $emsg = " <html>
                  <head>
                    </head>
                    <body>
                    <center><h3>Congratulations!!!</h3></center><br>
                    <p>
                    Dear Admin,   
                    Congratulation, you Get A new Enquiry in user name is ".$name." In a date ".$date." user is requred as a service name ".$service." and user mobile no ".$mobile." and specific message is ".$message."
                     <br>
                    <br/><br/>
                    Once again thank you, if you have any queries please contact us +919113415059 , +918602092757
                    </p>      
                    </body>
                    </html>";
                  //sending final confrimation mail after confirming user email id
                    //some header files...  
         $headers .= 'From: <divineisocert@gmail.com>' . "\r\n";
         $headers .= 'Bcc: ashish.preeminence@gmail.com' . "\r\n";
         $chkMail =  mail($email,'Customer Enquiry',$emsg,$headers);
         if(!$chkMail){ echo "<script>alert('Enquiry, email not send')</script>"; 
                } }
             ?>
          </div>
		      </div>
        </div>
      </div>
    </div>
  </div>
</section>
	</div>
	</div>
	</div>
	</div>
       
    <!-- Service Blocks -->
    <div class="container">
    <div class="row margin-bottom-40">
      <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img alt="iso certification for Medical devices " src="ftheme/assets/img/main/medical2.jpg" class="img-responsive">
                        </div>
                        <a href="" class="btn-more hover-effect">read more +</a>                   
                    </div>
                    <div class="caption">
                        <h3><a href="" class="hover-effect">ISO 13485: 2003 Certification</a></h3>
                        <p>Certification represents the requirements for a comprehensive management system for the design and manufacture of medical devices.
						All requirements of this International Standard are specific to organizations providing medical devices, 
						regardless of the type or size of the organization. ISO 13485: 2003 Certification supersedes earlier documents 
						such as EN 46001 and EN 46002 (both 1997), the ISO 13485 published in 1996 and ISO 13488 (1996). ISO 13485:2003 
						is a quality system standard designed specifically for medical device companies. <!--The standard is applied by most 
						Class II and III (plus Class IV in Canada) medical device manufacturers to meet the quality system requirements
						of Europe, Canada, Australia, Japan and other parts of the world.--></p>
                    </div>
                </div>
          
</div>   
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img alt="iso certification IMS" src="ftheme/assets/img/main/20082.png" class="img-responsive">
                        </div>
                        <a href="" class="btn-more hover-effect">read more +</a>                   
                    </div>
                    <div class="caption">
                        <h3><a href="" class="hover-effect">ISO 9001:2008 FSMS Certification</a></h3>
                        <p>Compliance with ISO 9001:2008 is often seen as the first step in achieving compliance with ISO 13485:2003, 
						which is based on the ISO 9001:2008 process model, suggests that the application and management of a system of 
						processes is an effective way to ensure good quality management. All requirements of this International Standard
						are specific to organizations providing Medical Devices, 
						regardless of the type or size of the organization. ISO 13485 certification is not accepted by the US FDA, although 
						it shares many of the same characteristics as FDA Good Manufacturing Practice. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img alt="iso certification for Medical devices " src="ftheme/assets/img/main/20152.png" class="img-responsive">
                        </div>
                        <a href="" class="btn-more hover-effect">read more +</a>                   
                    </div>
                    <div class="caption">
                        <h3><a href="" class="hover-effect">ISO 13485: 2003 EMS Certification</a></h3>
                        <p>ISO 13485 in part designed to produce a management system that facilitates compliance to the requirements
						of customers and various global regulators. While being certified to ISO13485 does not fulfill the requirements
						of either the FDA or foreign regulators, the certification aligns an organization’s management system to the 
						requirements of the FDA’s Quality System Regulation (QSR)
						requirements as well as many other regulatory requirements found throughout the world.The standard is applied by most 
						Class II and III (plus Class IV in Canada) medical device manufacturers. </p>
                    </div>
                </div>
            </div>
             <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img alt="iso certification body acceleration" src="ftheme/assets/img/main/medical2.jpg" class="img-responsive">
                        </div>
                        <a href="" class="btn-more hover-effect">read more +</a>                  
                    </div>
                    <div class="caption">
                        <h3><a href="" class="hover-effect">
                             ISO 13485 : 2003 FDA Certification</a></h3>
                        <p> ISO13485 certification serves to create a management system that can be thought of 
						as a framework on which to build compliance to various regulatory and customer requirements. 
						The ISO 13485 standard supplements ISO 9001 and has many of the same requirements. However, 
						there are additional requirements for process control, design control, retention of records, accountability, 
						traceability, customer satisfaction and more. Individual countries such as Canada and Japan have additional 
						requirements necessary to meet their specific regulations.</p>
                    </div>
                </div>
            </div>

    </div>
	

    <!--/row--> 
    <!-- End Info Blokcs --> 
    
    <!-- Our Clients -->
    <div class="owl-carousel-style-v2">
      <div class="headline">
        <h2>Our Clients</h2>
      </div>
      <div class="owl-slider-v3">
        <div class="item"> <img class="img-responsive" alt="iso certification consultant India" src="uploads/logo/Logo%202.png"> </div>
        <div class="item"> <img class="img-responsive" alt="iso certification IMS" src="uploads/logo/Logo%203.png"> </div>
        <div class="item"> <img class="img-responsive" alt="DMS  iso certification Team" src="uploads/logo/Logo%204.png"> </div>
        <div class="item"> <img class="img-responsive" alt="DMS  iso certification" src="uploads/logo/Logo%205.png"> </div>
        <div class="item"> <img class="img-responsive" alt="DMS  iso certification work place" src="uploads/logo/Logo%206.png"> </div>
        <div class="item"> <img class="img-responsive" alt="DMS  india's first iso certification provider" src="uploads/logo/Logo%207.png"> </div>
        <div class="item"> <img class="img-responsive" alt="iso certification consultant India" src="uploads/logo/Logo%208.png"> </div>
        <div class="item"> <img class="img-responsive" alt="iso certification IMS" src="uploads/logo/Logo%209.png"> </div>
        <div class="item"> <img class="img-responsive" alt="DMS  iso certification Team" src="uploads/logo/Logo%2010.png"> </div>
        <div class="item"> <img class="img-responsive" alt="DMS  iso certification" src="uploads/logo/Logo%2011.png"> </div>
    </div>
    <!-- End Our Clients --> 
  </div>
  	</div>
  <!--/container--> 

  </div>
<?php include("include/footer.php"); ?>

    

</body>


<!-- Mirrored from>DMS cert.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Dec 2019 15:19:44 GMT -->
</html>
 
