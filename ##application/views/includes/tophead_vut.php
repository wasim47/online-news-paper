<?php 
include('bangladate.php');

if($pageDetails!=""){
	$finaldetails = preg_replace('/font-family.+?;/', "", $pageDetails);
	$stringbottom1nat = strip_tags($finaldetails);
	if (strlen($stringbottom1nat) > 400) {
		  $stringCutnat = substr($stringbottom1nat, 0, 400);
		  $stringbottom1nat = substr($stringCutnat, 0, strrpos($stringCutnat, ' ')).'.....'; 
	}
}
else{
	$stringbottom1nat ="Risingnews24";
}
  
?>
<!DOCTYPE html>
<html lang="en" ng-app='wasimApp'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="News, GEE24, GEE24News, Latest News, Breaking News, Bangali News, National, International, Sports, Culture, Lyfetstyle, Entertainment, Science and Technology, Crime, Politics, Accident, Education, Amusement, Leisure, History, Play back, Photo Gallery, Video Gallery, Youtube, Google, Facebook, Best Bengali Newspaper, অনলাইন, পত্রিকা,হোম, সংবাদ, বাংলাদেশ,আন্তর্জাতিক, অপরাধ, অর্থ বানিজ্য, ক্যাম্পাস, বিনোদন, আনন্দের কথা, মুভি, তারকা, মিউজিক, নাটক ও মঞ্চ, খেলাধুলা, ফুটবল, ক্রিকেট, রেসলিং, উদিয়মান তারকা, লাইভ খেলা, ক্রিড়া ব্যক্তিত্ব, তথ্য প্রযুক্তি, শিক্ষা, সেরা শিক্ষা প্রতিষ্ঠান, এক্সক্লুসিভ, ফিচার, স্বাস্থ্য তথ্য, ইউটিউব, সব, লাইফস্টাইল, ফ্যাশন, ভ্রমন, রূপচর্চা, খাবার ও পানিয়, গৃহ ও অফিস সজ্জা, বিবিধ, শিল্প সাহিত্য, জানা অজানা, কলাম, সফলতার কথা, লাইভ টিভি"/>
<title><GEE24News | Latest and largest online news media></title>
<meta name="description" content="<?php echo $stringbottom1nat;?>">
<meta property="og:url"           content="<?php echo $fullurl;?>" />
<meta property="og:type"          content="Website"/>
<meta property="og:site_name"          content="GEE24.News"/>
<meta property="og:title"         content="<GEE24News | Latest and largest online news media"/>
<meta property="og:description"   content="<?php echo $stringbottom1nat;?>" />
<meta property="og:image"         content="<?php echo $pImgUrl;?>" />
<meta property="fb:app_id" content="761200730591422"/>
<meta name="author" content="Developed By: GEE IT | 01712571098 | gee24news@gmail.com">

<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/fabicon30x30.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/fabicon16x16.png" sizes="16x16" />

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/css/reset.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/css/slicknav.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/css/jquery.bxslider.css" rel="stylesheet" media="all">

<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick-theme.css">
<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
<link rel="stylesheet"  href="<?php echo base_url();?>assets/lightslider/lightslider.css"/>
<script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url();?>assets/lightslider/lightslider.js"></script> 
<script src="<?php echo base_url('asset/angular.1.6.1.min.js');?>"></script>
<script src="<?php echo base_url();?>asset/custom_script.js"></script> 

<script>
function openModal(ptype){
	$("#pagetype").val(ptype);
	//alert(ptype);
    $('#upsateContent').modal();
}  
</script>
</head>
<body ng-controller='myCont'>