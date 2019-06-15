<?php
set_include_path('./');
include_once './models/user.php';
include_once './models/cities.php';
include_once './models/person.php';
include_once './models/page.php';
include_once './models/branch.php';
include_once "./models/role.php";
include_once "./models/stations.php";
include_once "./models/employee.php";
include_once "./observerPattern/subject.php";
include_once "./observerPattern/SMSObserver.php";
include_once "./helpers/ViewHelper.php";
include_once './models/receipt.php';
include_once "./observerPattern/WhatsAppObserver.php";
include_once "./facadePattern/facade.php";
include_once "./facadePattern/subSystem.php";
session_start();
$person=new person();
$person=$_SESSION["person"];

if(isset($_POST['method']) && $_POST['method']=="login")
{
   login();
}
else if(isset($_POST['method']) && $_POST['method']=="UpdateEmployeeDone")
{
   UpdateEmployee();
}
else if(isset($_GET['method']) && $_GET['method']=="getStat")
{
    getStat();
}
else if(isset($_POST['method']) && $_POST['method']=="addEmployeeDone")
{
    addEmployeeDone();
}
else if(isset($_GET['method']) && $_GET['method']=="getRoles")
{
    getRoles();
}
else if(isset($_GET['method']) && $_GET['method']=="getGreetings")
{
    fillGreetings();
}
else if(isset($_GET['method']) && $_GET['method']=="CheckNationalId")
{
    checkNationalId();
}
else if(isset($_POST['method']) && $_POST['method']=="GetMsgById")
{
    GetMsgById();
}
else if(isset($_POST['method']) && $_POST['method']=="UpdateMsgs")
{
    UpdateMsgs();
}

else if(isset($_GET['method']) && $_GET['method']=="getSupervisorById")
{
    getSupervisorById();
}
else if(isset($_GET['method']) && $_GET['method']=="getAllBranches")
{
    getAllBranches();
}
else if(isset($_GET['method']) && $_GET['method']=="logOut")
{
    signOut();
}
else if(isset($_GET['method']) && $_GET['method']=="getEmployeeDetails")
{
    getEmployeeDetails();
}
else if(isset($_GET['method']) && $_GET['method']=="getCity")
{
    getCity();
}
else if(isset($_GET['method']) && $_GET['method']=="getUserDetails")
{
    getUserDetails();
}
else if(isset($_GET['method']) && $_GET['method']=="getEmployees")
{
    getEmploye();
}
else if(isset($_GET['method']) && $_GET['method']=="viewEmployees")
{
    view("view/editEmployee.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="viewAddMsg")
{
    view("view/AddMsg.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="getAllJobs")
{
    getAllJobs();
}
else if(isset($_GET['method']) && $_GET['method']=="AddEmployeeView")
{
    view("view/addEmployee.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="AllReceipts")
{
    view("view/viewAllDonations.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="getStatt")
{
    view("view/receiptStat.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="sendMsgView")
{
    view("view/msg.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="receipt")
{
    view("view/addReceipt.html",$person);
}
else if(isset($_GET['method']) && $_GET['method']=="getGov")
{
    getGov();
}
else if(isset($_POST['method']) && $_POST['method']=="UpdateUser")
{
    UpdateUser();
} 
else if(isset($_POST['method']) && $_POST['method']=="deleteEmployee")
{
    DeleteEmployee();
}
else if(isset($_POST['method']) && $_POST['method']=="deleteUser")
{
    DeleteUser();
} 
else if(isset($_POST['method']) && $_POST['method']=="AddNewMsg")
{
    AddNewMsg();
}  
else if(isset($_POST['method']) && $_POST['method']=="deleteMsg")
{
    deleteMsg();
}  
else if(isset($_GET['method']) && $_GET['method']=="SendMsg")
{
    SendMsg();
}
else if(isset($_GET['method']) && $_GET['method']=="EditcheckNationalId")
{
    EditcheckNationalId();
}

else if(isset($_GET['method']) && $_GET['method']=="empStatView")
{
    view("view/empStat.html",$person);
}
else if(isset($_POST['method']) && $_POST['method']=="getEmpStat")
{
    getEmpStat();
}
else if(isset($_GET['method']) && $_GET['method']=="checkUserName")
{
    checkUserName();
}
else if(isset($_GET['method']) && $_GET['method']=="EditcheckUserName")
{
    EditcheckByuserName();
}
else if(isset($_GET['method']) && $_GET['method']=="viewBranches")
{
    View('view/viewBranches.html',$person);
}

else if(isset($_GET['method']) && $_GET['method']=="viewJobs")
{
    View('view/viewJobs.html',$person);
}

else if(isset($_POST['method']) && $_POST['method']=="deleteBranch")
{ 
    deleteBranch();
}
else if(isset($_POST['method']) && $_POST['method']=="addBranch")
{ 
    addBranch();
    
}
else if(isset($_POST['method']) && $_POST['method']=="deleteJob")
{ 
    deleteJob();
   
}
else if(isset($_POST['method']) && $_POST['method']=="addJob")
{ 
    addJob();
}


function getEmpStat()
{
    $employee=new employee();
    $arr[]=array();
    $rows=$employee->getStatistics();
    foreach ( $rows as $row )  
    { 
        $employee=new employee;
        $employee->address = $row['address'];
        $employee->number = $row['number'];
        
        array_push( $arr, $employee ); 
        
         
    } 
    
    
    echo json_encode($arr);
}


function addBranch()
{  
   
   $branch = new branch();
   $branch->address=$_POST['branch'];
   $branch->insert();
   

   
}
function getAllJobs()
{
    $role=new role();
    $arr=array();
    $rows=$role->GetAll();
    foreach ( $rows as $row )  
    { 
        $role=new role;
        $role->id = $row['id'];
        $role->name = $row['name'];

        array_push( $arr, $role );  
    } 
     
    echo json_encode($arr);
    
}
function SendMsg()
{
    $msg=$_GET['msg'];
    $id=$_GET['GreetId'];
    
    // $subject= new subject();
    // $SMSobserver =new SMSObserver();
    // $whatsApp =new WhatsAppObserver();
    // $subject->attach($whatsApp);
    // $subject->attach($SMSobserver);
    // $subject->notify($msg,$id);


    $facade = new facade($msg,$id);
    $facade->clientCode();

}
function fillGreetings()
{
    $msg=new msg();
    $rows=$msg->getAllExtraMsgs();
    $arr=array();
    foreach ( $rows as $row )  
     { 
        $msg=new msg();
        $msg->id = $row['id'];
        $msg->name = $row['name'];
        array_push( $arr, $msg );  
     } 
     
    echo json_encode($arr);


}
function login()
{   
   
   $password=$_POST['pass'];
   $enc=sha1($password,false);

   $user = new user();
   $user->username=$_POST['name'];
   $user->password=$enc;
   $user->login();

   if($user->login()===false)
   {
    $redirect = array();
    $redirect["status"] = "failed";
    echo json_encode($redirect);
   }
   //CHECK IF USER NOT FOUND
    else
    {
   $person = new person();
   $person = $person->GetById($user->personId);

   $page = new page();
   $page = $page->GetByRoleId($person->roleId);

  
   $_SESSION["personId"]= $person->id;
   $_SESSION["userId"]= $user->id;
   $_SESSION["person"]= $person;
   
   $_SESSION["user"]= $user;
   $redirect = array();
   $redirect["status"] = "success";
   $redirect["url"] = $page->physicalAddress;
   echo json_encode($redirect);
    }
}

function addEmployeeDone()
{   
    $person = new person();
    $person->name=$_POST['name'];
    $person->nationalId=$_POST['SSN'];
    $person->birthDate=$_POST['DOB'];
    $person->gender=$_POST['gender'];
    $person->roleId=$_POST['roleId'];
    $person->branch_id=$_POST['branch'];
    $personId=$person->Insert();
    
    $emp=new employee();
    $emp->personId=$personId;
    $emp->date_of_work=$_POST['DOW'];
    $emp->mobile=$_POST['mobile'];
    $emp->salary=$_POST['salary'];
    $empp=$emp->Insert();

    if($_POST['parentId']==1)
    {
        $user =new user();
        $user->username=$_POST['username'];
        $user->password=sha1($_POST['pass'],false);
        $user->personId= $personId;
        $user->Insert(); 
    }
}
function getRoles()
{ 
     $parentId=$_GET['parentId'];
    $role = new role();
    $roles = $role->GetById($parentId);
    
    echo json_encode($roles);
}
function signOut()
{
    $user = new user();
    $user->signOut(); 
    header("Location:http://localhost/furqan/login.php");
    
}
function getEmployeeDetails()
{
    $employee = new employee();
    $employeeid=$_GET['id'];
    $row=$employee->getById($employeeid);
    $name=$row['name'];
    $DOB=$row['birth_date'];
    $SSN=$row['national_id'];
    $gender=$row['gender'];
    $role_id=$row['role_id'];
    $parent_id=$row['parent_id'];
    $branch_id=$row['branch_id'];
    $mobile=$row['mobile'];
    $date_of_work=$row['date_of_work'];
    $salary=$row['salary'];

    $branch=new branch();
   $branch=$branch->getAllBranches();
   for ($i=0;$i<count($branch);$i++ )  
    { 
        $branch[$i]['selected']=false;
        if($branch[$i]['id']==$branch_id)
        {
            $branch[$i]['selected']=true;
        }
    } 
    $role = new role();
  $role=$role->GetById($parent_id);
  for ($i=0;$i<count($role);$i++ )  
    { 
        $role[$i]['selected']=false;
        if($role[$i]['id']==$role_id)
        {
            $role[$i]['selected']=true;
        }
    } 
    if ($parent_id=="1")
    {
        $user=new user();
   $user->TableId="person_id";
   $row=$user->GetById($employeeid);
   $username=$row['username'];

   $replacement_array = array(
    'name' => $name,
    'DOB'=>$DOB,
    'SSN'=>$SSN,
    'gender'=>$gender,
    'role_id'=>$role_id,
    'parent_id'=>$parent_id,
    'branch'=>$branch,
    'mobile'=>$mobile,
    'date_of_work'=>$date_of_work,
    'salary'=>$salary,
        'role'=>$role,
        'userName'=>$username,
        );
            }
        else{
            $replacement_array = array(
                'name' => $name,
                'DOB'=>$DOB,
                'SSN'=>$SSN,
                'gender'=>$gender,
                'role_id'=>$role_id,
                'parent_id'=>$parent_id,
                'branch'=>$branch,
                'mobile'=>$mobile,
                'date_of_work'=>$date_of_work,
                'salary'=>$salary,
            'role'=>$role,);
        }
                echo json_encode($replacement_array);
}
function getUserDetails()
{
    $user=new user();
   $id= $_GET['id'];
   $user->TableId="person_id";
   $row=$user->GetById($id);
   $name=$row['username'];
   $Userid=$row['id'];
   $replacement_array = array(
    'username' => $name,
    'userid'=>$Userid);
    echo json_encode($replacement_array);
}
function UpdateEmployee()
{
    
    $person=new person();
    $person->id= $_POST['id'];
    $person->name=$_POST['name'];
    $person->nationalId=$_POST['SSN'];
    $person->birthDate=$_POST['DOB'];
    $person->gender=$_POST['gender'];
    $person->branch_id=$_POST['branch'];
    $person->roleId=$_POST['roleId'];
    $person->Update();
    $emp=new employee();
    $emp->date_of_work=$_POST['DOW'];
    $emp->mobile=$_POST['mobile'];
    $emp->salary=$_POST['salary'];
    $emp->personId= $_POST['id'];
    $emp->Update();
    $user =new user();
    $user->personId=$_POST['id'];

    if($user->ifExists())
    {
        $user->username=$_POST['username'];
        $user->password=sha1($_POST['pass'],false);
        $user->personId=$_POST['id'];
        $user->TableId="person_id";
        $user->Update();
    }
    else
    { $user->username=$_POST['username'];
        $user->password=sha1($_POST['pass'],false);
        $user->personId= $_POST['id'];
        $user->Insert(); 
    }
    

}
function UpdateUser()
{
    $user =new user();
    $user->username=$_POST['username'];
    $user->password=sha1($_POST['pass'],false);
    $user->id=$_POST['id'];
    $user->TableId="person_id";
    $user->Update();
}
 function DeleteEmployee()
 {
    $person=new person();
    $person->id= $_POST['id'];
    $person->isdeleted=1;
    $person->deletePerson();
    $employee = new employee();
    $employee->TableId="person_id";
    $employee->isdeleted=1;
    $employee->id=$_POST['id'];
    $employee->Delete();

 }
 function DeleteUser()
 {
    $person=new person();
    $person->id= $_POST['id'];
    $person->isdeleted=1;
    $person->deletePerson();
    $user =new user();
    $user->TableId="person_id";
    $user->isdeleted=1;
    $user->id=$_POST['id'];
    $user->Delete();
    $employee = new employee();
    $employee->TableId="person_id";
    $employee->isdeleted=1;
    $employee->id=$_POST['id'];
    $employee->Delete();

 }

 function getEmploye()
 {
 
     $person=new person();
     $arr=array();
     $rows=$person->getEmployees();
     if($rows==false)
     {
         $obj=(object)['status' =>'false'];
     }
     else
     {
         foreach ( $rows as $row )  
         { 
             $person=new person;
             $person->id = $row['id'];
             $person->name = $row['name'];
             $person->nationalId = $row['national_id'];
             $person->gender = $row['gender'];
             $person->parentId=$row['parent_id'];
 
             array_push( $arr, $person );  
         } 
 
     }
 
     
      
     echo json_encode($arr);
     
 }

function View($file,$person)
{
    if($person->roleId==3)
    {
        ViewHelper::parser('header.html');
    }
    elseif($person->roleId==4)
    {
        ViewHelper::parser('Rheader.html');
    }
    elseif($person->roleId==5)
    {
        ViewHelper::parser('Aheader.html');
    }

    ViewHelper::parser($file);
}


function getAllBranches()
{
    $branch=new branch();
    $arr=array();
    $rows=$branch->getAllBranches();
    foreach ( $rows as $row )  
    { 
        $branch=new branch;
        $branch->id = $row['id'];
        $branch->address = $row['address'];

        array_push( $arr, $branch );  
    } 
     
    echo json_encode($arr);
    
}

function getSupervisorById()
{
    $person=new person();
    $branchId= $_GET['id'];
    $arr=array();
    $rows=$person->getSupervisorByBranch($branchId);
    foreach ( $rows as $row )  
    { 
        $person=new person;
        $person->id = $row['id'];
        $person->name = $row['name'];
        array_push( $arr, $person );  
    } 
     
    echo json_encode($arr);
    
}

function getStat()
{

    $receipt=new receipt();
    $arr[]=array();
    $rows=$receipt->getStat();
    foreach ( $rows as $row )  
    { 
        $receipt=new receipt;
        $receipt->year = $row['year'];
        $receipt->month = $row['month'];
        $receipt->day = $row['day'];
        $receipt->cc = $row['cc'];

        array_push( $arr, $receipt );  
    } 
     
    echo json_encode($arr);
}
function deleteJob()
 { 
    $role = new role();
    $role->id=$_POST['id'];
    $role->delete();
    
    
 }
 
function addJob()
{  
    // echo" wslna add job22222";
    
   $role = new role();
   $role->name=$_POST['role'];
   $role->parentId=$_POST['parentId'];
   $role->insert();
   
   

   
}

function checkNationalId()
 { 
    $person= new person();
    $person->nationalId=$_GET['nationalId'];
    $flag=$person->CheckNationalId();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
 }
 function EditcheckNationalId()
 { 
    $person= new person();
    $person->nationalId=$_GET['nationalId'];
    $person->id=$_GET['personId'];
    $flag=$person->EditcheckNationalId();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
 }
function checkUserName()
{ 
    $user= new user();
    $user->username=$_GET['username'];
    $flag=$user->checkByuserName();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
}
function EditcheckByuserName()
{ 
    $user= new user();
    $user->username=$_GET['username'];
    $user->personId=$_GET['personId'];
    $flag=$user->EditcheckByuserName();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
}
function AddNewMsg()
{
    $msg= new msg();
    $msg->name=$_POST['name'];
    $msg->content=$_POST['content'];
    $msg->Insert();
}
function deleteMsg()
{
    $msg= new msg();
    $msg->id=$_POST['id'];
    $msg->delete();
}
 function GetMsgById()
 {
    $msg= new msg();
    $arr=[];
    $msg->id=$_POST['id'];
    $rows=$msg->GetById();
   $name=$rows['name'];
    $replacement_array = array(
        'name' =>$name,
        'content'=>$rows['content'],
        'id'=>$rows['id'],
            ); 
    echo json_encode($replacement_array);
 }
 function UpdateMsgs()
 {
     $msg=new msg();
     $msg->name=$_POST['name'];
     $msg->content=$_POST['content'];
     $msg->id=$_POST['id'];
     $msg->Update();
 }
?>