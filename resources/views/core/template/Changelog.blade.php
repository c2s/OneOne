@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Sximo5 <small> <b>Version 5.1.4 ( Revision Versio )</b> </small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('') }}">Home</a></li>
        <li> Config</li>
        <li class="active"> Changlog</li>
      </ul>

	</div>
 <div class="page-content-wrapper m-t">  
<div class="wrapper-container container" >
<div class="row">
  <div class="col-md-12 col-xs-12">

<h3> Version 5.1.4  Revision Version ( May 2 , 2016 )  </h3><hr class="notop">
    <ol>  
      <li> Add Switch module while editing module   </li>
      <li> Enhance : Rebuild with ajax load </li>
      <li> Enhance : Prevent routes error when working with composer </li>
      <li> Enhance : code to work with php 7 </li>
      <li> Add : Format Files/Download to table grid and view detail </li>  
      <li> Add : Format Checkbox/Radio to table grid and view detail </li>
      <li> Fixed : Small Issue for checkbox input </li> 
      <li> Enhance : some template backend </li>
      <li> Fixed : Remove current files/images </li>
    </ol> 


  <h3> Version 5.1.4  Reload Changelog ( April 15 , 2016 )  </h3><hr class="notop">
  <ol> 
      <li> Enchance : added login ajax    </li>
      <li> Enchance : added 4 dashboard template    </li>
      <li> Enchance : filter avatar upload ( only jpg ,jpeg,png,bmp,gif ) </li>
      <li> Enchance : filter File upload ( only zip ,xls,xlsx,doc,docx ) </li>
      <li> Enchance : add mapping from search result </li>
      <li> Enchance : New dashboard template </li>
      <li> Fixed : Search date range issue </li>
      <li> New Feature : Frontend Form Generator </li>
      <li> New Feature : Source Code editor for generated module </li>
      <li> New Feature : Source Code editor for Whole Files </li>
      <li> Fix : Add fieldLang function into SiteHelpers </li>
      <li> Free Bonus 4 Module ( Calendar , Blog , FAQ Management , Sximo Forum )</li>
      <li> Add ability to remove sub form </li>

    </ol>


  <h3> Version 5.1.4  Changelog ( April 5 , 2016 )  </h3><hr class="notop">
    <ol>
      <li> Enchance : set default page ( Page CMS )    </li>
      <li> Enchance : Controller function getShow() function    </li>
      <li> Fixed :  Notification filter for spesific users    </li>
      <li> Fixed :  notification status label ('success') when error  ( Sitehelpers , function showNotification() )  </li>
      <li> Fixed :  External menu at level 3   </li>
      <li> Added :  New feature integrated Frontend Grid  </li>
      <li> Added :  New setting for mail   </li>
      <li> Added : New setting for global date format  </li>
      <li> Fixed : Issue on keeping cookie session </li>
      <li> Enchance : Flow process and logical master detail </li>
      <li> Added :  new feature unlimited master detail view </li>
      <li> Added : New subform ( master detail form ) </li>
      <li> Added : Default Date Format </li>
      <li> Added : Format Date for GRID Row </li>
      <li> Added : Link Format for GRID Row </li>
      <li> Fixed : unremoved file pages when deleteing page list ( Page CMS )    </li>

    </ol>

  <h3> Version 5.1.3  Changelog ( August 17 , 2015 )  </h3><hr class="notop">
    <ol>
      <li> enhancement :  Filter view column and form from spesific USER ID    </li>
      <li> Fixed :  Remove view core module from code builder page    </li>
      <li> enhancement : Add new advance search feature  </li>
      <li> Fixed : Overlapping menu buttons in File Manager   </li>
      <li> enhancement : Only insecure passwords allowed   </li>
      <li> Fixed : Error creating module with custom MySQL Statment   </li>
      <li> Fixed uploading avatar on users module bug  </li>

    </ol>

  <h3> Version 5.1.2  Changelog ( July 28 , 2015 )  </h3><hr class="notop">
    <ol>
      <li> Fixed :  View home page from page CMS admin  </li>
      <li> Fixed :  Zip package issue #9   </li>
      <li> Fixed : Page CMS Module issue </li>
      <li> Fixed : error while save users </li>
      <li> Fixed : Link Icon from menus </li>
      <li> New Feature : Notification System  </li>

    </ol>

  <h3> Version 5.1.1  Changelog ( July 4 , 2015 )  </h3><hr class="notop">
    <ol>
      <li> Fixed : Group module ( action delete issue ) bug   </li>
      <li> Fixed : Captcha register issue </li>
      <li> Fixed : Error while extract source on windows OS bug  </li>
      <li> Fixed : Page CMS Theme issue bug </li>
      <li> Fixed : Contoller Report issue bug </li>
      <li> Fixed : Nested select combo issue bug </li>
      <li> Fixed : static page not working on window OS  </li>

    </ol>

  <h3> Version 5.1 LTS Changelog </h3><hr class="notop">
    <ol>
        
        <li> Migrate Script to Laravel version 5.1 LTS  </li>
        <li> Added : 3 Type of module generator  </li>
        <li> Added : Database Table management  </li>
        <li> Added : 3 Option color schema </li>
        <li> Added : Personal Filemanager </li>
        <li> Enhancement : added folder structur for Core and Sximo  </li>
        <li> Enhancement : Default Format Date  </li>
        <li> Enhancement : Online Users  </li>
        <li> Enhancement : Remember Me login  </li>
        <li> Enhancement : Databse session driver   </li>
        <li> Enhancement : Metakey & Metadesc ( Page CMS )   </li>
        <li> Added : Blocked IP Address </li>
        <li> Added : Allowed IP Address </li>
        <li> More Feature coming soon ....  </li>



    </ol> 



  <h3> Version 3.1 Changelog </h3><hr class="notop">
    <ol>        
      <li> fixed : dropdown Issue on column search #2 </li>
      <li> Fixed : Reset Password issue #5 </li>
      <li> Fixed : Missing assignment $message value for register when auto activation #14  </li>
      <li> Fixed : Add icon to submenu ( menu management ) #16  </li>
      <li> Fixed : Little issue @ Email template #18  </li>
      <li> Fixed : TextArea automatically added  paragraf #33   </li>
      <li> Fixed : Error select combo filter #35   </li>
      <li> Fixed : frontend multilang menu and link issue for submenu  #39   </li>
      <li> Fixed :  error while remove data if no rows selected #40    </li>
      <li> Fixed :  Set default languange is not working #32  </li>
      <li> Enhancement : Add select option for language at login page   </li>
      <li> Enhancement :  add button for remove uploaded file/picture #38    </li>
      <li> Enhancement :  add new javascript notification #41    </li>
      <li> Enhancement :  Disable , enable debug mode #41    </li>
      <li> Enhancement :  Fix expired session error at config and module page   </li>
    </ol> 

  <h3> Version 3.0 Changelog </h3><hr class="notop">
    <ol>
        
        <li> Fixed Login Issue </li>
        <li> Fixed Some Broken link at breadcrumb issue</li>
        <li> Fixed users list on same level issue </li>
        <li> Fixed Token Missmatch issue </li>
        <li> Fixed Reset password broken link </li>
        <li> Fixed Remove module issue </li>
        <li> Removing authen required validation </li>
        <li> Fixed Public grid helpers issue </li>
        <li> Fixed Limited checkbox or radio custom value  from 10 to unlimited </li>
        <li> Added new PDF library bundle ( only available for ajax add on ) </li>  


      </ol>   
  <h3> Version 2.9 Changelog </h3><hr class="notop">
        
        <li> Faster than old version  </li>
        <li> Fix Security issue at comboselect , combotable , combofield </li>
        <li> Fix Select custom issue </li>
        <li> Fix Total disabled frontend </li>
        <li> Fix Master detail Add / view / filter / delete </li>
        <li> Fix column Search with custom value    </li>
        <li> Added new feature : Select multiple ( Only for Custom value ) </li>
        <li> Added new feature : Form : Select display with 3 field <br>( example : title + firstname + lastname ) </li>
        <li> Added new feature : Grid  : Select display with 3 field <br>( example : title + firstname + lastname ) </li>
        <li> Added New feature : New Backend Template &amp; theme </li>       


      </ol> 
</div></div>
    
</div>

</div>
</div>
@stop