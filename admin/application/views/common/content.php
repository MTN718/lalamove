<?php
switch ($userInfo->user_type_id) {
  case 1: // customer
  switch ($pageName) {
    case "DASHBOARD":
    include ("contents/customer_dashboard.php");
    break;
    case "ACCOUNT":
    include ("contents/customer_account.php");
    break;
    case "NOTIFICATIONS":
    include ("contents/customer_notifications.php");
    break;
    case "SENTNOTIFICATIONS":
    include ("contents/customer_sentnotifications.php");
    break;
    case "TRASHNOTIFICATIONS":
    include ("contents/customer_trashnotifications.php");
    break;
    case "SCHEDULE":
    include ("contents/customer_schedule.php");
    break;
    case "DOGS":
    include ("contents/customer_dogs.php");
    break;
    case "INVOICES":
    include ("contents/customer_invoices.php");
    break;
    case "REQUESTWALK":
    include("contents/customer_request_walk.php");         
    break;
    case "WALKTYPE":
    include ("contents/customer_walktype.php");
    break;
    case "CUSTOMERWALKTYPEREQUEST":
    include ("contents/customer_walktype_request.php");
    break;
    case "EDITWALKTYPEREQUEST":
    include ("contents/edit_walktype_request.php");
    break;
    case "CUSTOMERCONTACTEDIT":
    include ("contents/customer_customercontact_edit.php");
    break;
    case "CUSTOMERADDRESSINFOEDIT":
    include ("contents/customer_customeraddressinfo_edit.php");
    break;
    case "CUSTOMERDOGINFOEDIT":
    include ("contents/customer_doginfo_edit.php");
    break;
    case "CUSTOMERCOMPOSRMAIL":
    include ("contents/customer_composemail.php");
    break;
    case "INVOICEOVERVIEW":
    include ("contents/customer_invoiceoverview.php");
    break;
    case "CUSTOMERMAILOVERVIEW":
    include ("contents/customer_mailoverview.php");
    break;
    


  }
  break;
  case 2: //Dogwalker
  switch ($pageName) {
    case "DASHBOARD":
    include ("contents/dogwalker_dashboard.php");
    break;
    case "ACCOUNT":
    include ("contents/dogwalker_account.php");
    break;
    case "NOTIFICATIONS":
    include ("contents/dogwalker_notifications.php");
    break;
    case "SENTNOTIFICATIONS":
    include ("contents/dogwalker_sentnotifications.php");
    break;
    case "TRASHNOTIFICATIONS":
    include ("contents/dogwalker_trashnotifications.php");
    break;
    case "SCHEDULE":
    include ("contents/dogwalker_schedule.php");
    break;
    case "PAYMENT":
    include ("contents/dogwalker_payment.php");
    break;
    case "DOGWALKERCOMPOSRMAIL":
    include ("contents/dogwalker_composemail.php");
    break;
    case "DOGWALKERMAILOVERVIEW":
    include ("contents/dogwalker_mailoverview.php");
    break;
   




  }
  break;
  case 3://Manager
  switch ($pageName) {
    case "DASHBOARD":
    include ("contents/manager_dashboard.php");
    break;
    case "ACCOUNT":
    include ("contents/manager_account.php");
    break;
    case "NOTIFICATIONS":
    include ("contents/manager_notifications.php");
    break;
    case "SENTNOTIFICATIONS":
    include ("contents/manager_sentnotifications.php");
    break;
    case "TRASHNOTIFICATIONS":
    include ("contents/manager_trashnotifications.php");
    break;
    case "DOGWALKERNOTIFICATIONS":
    include ("contents/manager_dogwalkernotification.php");
    break;
    case "SCHEDULE":
    include ("contents/manager_schedule.php");
    break;
    case "WALKERS":
    include ("contents/manager_walkers.php");
    break;
    case "CUSTOMERS":
    include ("contents/manager_customers.php");
    break;
    case "PAYMENTS":
    include ("contents/manager_payments.php");
    break;
    case "MANAGERCUSTOMEROVERVIEW":
    include ("contents/manager_customeroverview.php");
    break;
    case "WALKTYPE":
    include ("contents/manager_walktype.php");
    break;
    case "MANAGERWALKTYPEREQUEST":
    include ("contents/manager_walktype_request.php");
    break;
    case "MANAGERCUSTOMERDOGINFOEDIT":
    include ("contents/manager_customerdoginfo_edit.php");
    break;
    case "MANAGERCUSTOMERADDRESSINFOEDIT":
    include ("contents/manager_customeraddressinfo_edit.php");
    break;
    case "MANAGERCUSTOMERCONTACTEDIT":
    include ("contents/manager_customercontact_edit.php");
    break;
    case "MANAGERCUSTOMERBASICINFOEDIT":
    include ("contents/manager_customerbasicinfo_edit.php");
    break;
    case "MANAGERWALKERBASICINFOEDIT":
    include ("contents/manager_walkersbasicinfo_edit.php");
    break;
    case "WALKEROVERVIEW":
    include ("contents/manager_walkersoverview.php");
    break;
    case "MANAGERCOMPOSRMAIL":
    include ("contents/manager_composemail.php");
    break;
    case "MANAGERADDRESSINFOEDIT":
    include ("contents/manager_manageraddressinfo_edit.php");
    break;
    case "MANAGERSCHEDULEEDITWALK":
    include ("contents/manager_schedule_editwalk.php");
    break;
    case "MANAGERMAILOVERVIEW":
    include ("contents/manager_mailoverview.php");
    break;
    
    
    
    }
  break;
  case 4://Admin
  switch ($pageName) {
    case "DASHBOARD":
    include ("contents/admin_dashboard.php");
    break;
    case "ACCOUNT":
    include ("contents/admin_account.php");
    break;
    case "WALKS":
    include ("contents/admin_walks.php");
    break;
    case "NOTIFICATIONS":
    include ("contents/admin_notifications.php");
    break;
    case "SENTNOTIFICATIONS":
    include ("contents/admin_sentnotifications.php");
    break;
    case "TRASHNOTIFICATIONS":
    include ("contents/admin_trashnotifications.php");
    break;
    case "PAYMENTS":
    include ("contents/admin_payments.php");
    break;
    case "INVOICES":
    include ("contents/admin_invoices.php");
    break;
    case "MANAGERS":
    include ("contents/admin_managers.php");
    break;
    case "CUSTOMERS":
    include ("contents/admin_customers.php");
    break;
    case "DOGWALKERS":
    include ("contents/admin_dogwalkers.php");
    break;
    case "MANAGEROVERVIEW":
    include ("contents/admin_manageroverview.php");
    break;
    case "CUSTOMEROVERVIEW":
    include ("contents/admin_customeroverview.php");
    break;
    case "DOGWALKEROVERVIEW":
    include ("contents/admin_dogwalkeroverview.php");
    break;
    case "WALKTYPE":
    include ("contents/admin_walktype.php");
    break;
    case "ADMINWALKTYPEREQUEST":
    include ("contents/admin_walktype_request.php");
    break;
    case "EDITWALKTYPEREQUEST":
    include ("contents/edit_walktype_request.php");
    break;
    case "ADMINCUSTOMERBASICINFOEDIT":
    include ("contents/admin_customerbasicinfo_edit.php");
    break;
    case "ADMINMANAGERBASICINFOEDIT":
    include ("contents/admin_managerbasicinfo_edit.php");
    break;
    case "CUSTOMERCONTACTEDIT":
    include ("contents/admin_customercontact_edit.php");
    break;
    case "ADMINMANAGERADDRESSINFOEDIT":
    include ("contents/admin_manageraddressinfo_edit.php");
    break;
    case "ADMINDOGWALKERBASICINFOEDIT":
    include ("contents/admin_dogwalkerbasicinfo_edit.php");
	break;
    case "ADMINCUSTOMERDOGINFOEDIT":
    include ("contents/admin_customerdoginfo_edit.php");
    break;
    case "ADMINCUSTOMERADDRESSINFOEDIT":
    include ("contents/admin_customeraddressinfo_edit.php");
    break;
    case "ADMINCOMPOSRMAIL":
    include ("contents/admin_composemail.php");
    break;
    case "ADMINMAILOVERVIEW":
    include ("contents/admin_mailoverview.php");
    break;
    case "INVOICEOVERVIEW":
    include ("contents/admin_invoiceoverview.php");
    break;
    case "ADMINWALKREQUEST":
    include ("contents/admin_walkt_request.php");
    break;
    case "ADMINCUSTOMERADDWALKTYPEREQUEST":
    include ("contents/admin_customeroverview_addwalktype.php");
    break;
    case "ADMINEMAILOVERVIEW":
    include ("contents/admin_mailoverview.php");
    break;
  }
  break;  
}
?>   