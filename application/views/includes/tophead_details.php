<?php 
include('bangladate.php');

  $stringbottom1nat = strip_tags($news_details['full_description']);
  if (strlen($stringbottom1nat) > 400) {
  $stringCutnat = substr($stringbottom1nat, 0, 400);
  $stringbottom1nat = substr($stringCutnat, 0, strrpos($stringCutnat, ' ')).'.....'; 
  }
  
$hit_query=$this->db->query("select read_count from news_manage where n_id='".$newsid."'");
foreach($hit_query->result() as $row);
$hitVal=$row->read_count;

if($hitVal!=0){
$total_hit=$hitVal+1;
}
else{
$total_hit=1;
}
$this->db->query("update news_manage set read_count='".$total_hit."' where n_id='".$newsid."'");
 $pdate=date('l d, F Y', strtotime($news_details['date']));
 $ptime=$news_details['time'];
 
$convertedDATE = str_replace($engDATE, $bangDATE, $pdate);
$convertedtime= str_replace($engDATE, $bangDATE, $ptime);
$totalreadnews= str_replace($engDATE, $bangDATE, $news_details['read_count']);
?>
<!DOCTYPE html>
<html lang="en" ng-app='wasimApp'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Risingnews24, bangla news, current News, bangla newspaper, bangladesh newspaper, online paper, bangladeshi newspaper, bangla news paper, bangladesh newspapers, newspaper, all bangla news paper, bd news paper, news paper, bangladesh news paper, daily, bangla newspaper, daily news paper, bangladeshi news paper, bangla paper, all bangla newspaper, bangladesh news, daily newspaper, অনলাইন, পত্রিকা, বাংলাদেশ, আজকের পত্রিকা, আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান, মঞ্চ, টেলিভিশন, নকশা, রস+আলো, ছুটির দিনে, অধুনা, স্বপ্ন নিয়ে, আনন্দ, অন্য আলো, সাহিত্য, গোল্লাছুট, প্রজন্ম ডট কম, বন্ধুসভা,কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, আইন ও বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর"/>
<title><?php echo $news_details['headline'];?></title>
<meta name="description" content="<?php echo $stringbottom1nat;?>">
<meta property="og:url"           content="http://geebd.com/details/<?php echo $news_details['slug'];?>" />
<meta property="og:type"          content="article" />
<meta property="og:site_name"          content="GEEBD" />
<meta property="og:title"         content="<?php echo $news_details['headline'];?>" />
<meta property="og:description"   content="<?php echo $stringbottom1nat;?>" />
<meta property="og:image"         content="http://geebd.com/asset/uploads/news/<?php echo $news_details['image'];?>" />
<meta property="fb:app_id" content="1708019032545494" />
<meta name="author" content="Developed By: www.geebd.com | 01754686706 | info@geebd.com">

<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/fabicon.gif" sizes="32x32" />
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="all">
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
<script src="<?php echo base_url();?>asset/custom_script.js"></script> </head>
<body ng-controller='myCont'>