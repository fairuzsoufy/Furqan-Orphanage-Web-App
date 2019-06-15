<?php
include_once "./models/person.php";
include_once "./models/child.php";
include_once "./models/talent.php";
include_once "./models/document.php";
include_once "./models/governorate.php";
include_once "./models/cities.php";
include_once "./models/stations.php";
include_once './models/branch.php';
include_once './factoryPattern/classesFactory.php';
include_once "./strategy/strategyContext.php";
include_once "./strategy/StrategyInterface.php";
include_once "./strategy/maleStrat.php";
include_once "./strategy/femaleStrat.php";
include_once "./helpers/ViewHelper.php";
session_start();
$person=new person();
$person=$_SESSION["person"];
if(isset($_POST['method']) && $_POST['method']=="addChild")
{
    addChild();
}
else if(isset($_GET['method']) && $_GET['method']=="showUpdate")
{
    viewUpdate();
}
else if(isset($_GET['method']) && $_GET['method']=="getTalents")
{
    getTalents();
}
else if(isset($_GET['method']) && $_GET['method']=="getStations")
{
    getStations();
}
else if(isset($_GET['method']) && $_GET['method']=="getSupervisors")
{
    getSupervisors();
}
else if(isset($_GET['method']) && $_GET['method']=="getGov")
{
    getGov();
}
else if(isset($_GET['method']) && $_GET['method']=="viewCities")
{
    viewCities();
}
else if(isset($_POST['method']) && $_POST['method']=="deleteChild")
{
    deleteChild();
}
else if(isset($_POST['method']) && $_POST['method']=="editChild")
{
    updateChild();
}
else if(isset($_GET['method']) && $_GET['method']=="getChilderen")
{
    
    Getchilderen();
}

else if(isset($_GET['method']) && $_GET['method']=="viewAddChild")
{
    View('view/addChild.html',$person);
}
else if(isset($_GET['method']) && $_GET['method']=="viewChildStat")
{
    View('view/childStat.html',$person);
}
else if(isset($_GET['method']) && $_GET['method']=="viewChildStat")

{

    View('view/childStat.html',$person);

}
else if(isset($_GET['method']) && $_GET['method']=="getChildStat")
{
    getChildStat();

}
else if(isset($_GET['method']) && $_GET['method']=="filterBy")
{
    filterBy();
}
else if(isset($_GET['method']) && $_GET['method']=="getChildStat2")
{
    getChildStat2();

}

else if(isset($_POST['method']) && $_POST['method']=="deleteTalent")
{ 
    deleteTalent();
}
else if(isset($_POST['method']) && $_POST['method']=="addTalent")
{ 
    
    addTalent();
    
}
else if(isset($_GET['method']) && $_GET['method']=="viewTalents")
{
    View('view/viewTalents.html',$person);
}
else if(isset($_GET['method']) && $_GET['method']=="CheckReportNum")
{
    CheckReportNum();
}
else if(isset($_GET['method']) && $_GET['method']=="CheckDecisionNum")
{
    CheckDecisionNum();
}
else if(isset($_GET['method']) && $_GET['method']=="EditCheckReportNum")
{
    EditCheckReportNum();
}
else if(isset($_GET['method']) && $_GET['method']=="EditCheckDecisionNum")
{
    EditCheckDecisionNum();
}

else
{
    View('view/editChild.html',$person);
}

function getChildStat()

{
    $child=new child();
    $rows=$child->getStat();
    $arr=array();
    foreach ( $rows as $row ) 
    {
        $child=new child();
        $child->number = $row['number'];
        $child->gender = $row['gender'];
        array_push( $arr, $child ); 

    }
    echo json_encode($arr);

}

function getChildStat2()

{
    $child=new child();
    $rows=$child->getStat2();
    $arr=array();
    foreach ( $rows as $row ) 
    {
        $child=new child();
        $child->address = $row['address'];
        $child->number = $row['number'];
        array_push( $arr, $child ); 

    }
    echo json_encode($arr);

}
function deleteTalent()
 {  
    $talent = new talent();
    $talent->id=$_POST['id'];
    $talent->delete();
    

    
 }
 
function addTalent()
{  
   
   $talent = new talent();
   $talent->talent_name=$_POST['talent'];
   $talent->insert();
   
}
function addChild()
{
    
    $person = ClassFactory::build('person');
    $person->name=$_POST['name'];
    $person->birthDate=$_POST['DOB'];
    $person->nationalId=$_POST['SSN'];
    $person->gender=$_POST['gender'];
    $person->branch_id=$_POST['branch'];
    $person->roleId=6;
    $personId = $person->Insert();
    
    $child= ClassFactory::build('child');
    $child->supervisorId=$_POST['supervisor'];
    $child->childId=$personId;
    $caseId = $child->Insert();
    
    $document = ClassFactory::build('document');
    $document->relative= $_POST['nasab'];
    $document->gov_id= $_POST['gov'];
    $document->city_id= $_POST['city'];
    $document->station_id= $_POST['station'];
    $document->reportNumber= $_POST['reportNum'];
    $document->reportDate= $_POST['reportDate'];
    $document->decisionNumber= $_POST['decisionNum'];
    $document->decisionDate= $_POST['decisionDate'];
    $document->shoeSize= $_POST['shoeSize'];
    $document->clothesSize= $_POST['clothesSize'];
    $document_id = $document->Insert();
    $document->InsertCaseDetails($caseId, $document_id);
    $options=json_decode($_POST['selectedTalents']);
    $talent= ClassFactory::build('talent');
    if($_POST['selectedTalents'])
    {
        for($i=0;$i<count($options);$i++)
        {
            $talent->childId=$caseId;
            $talent->id=$options[$i];
            $talent->InsertChildTalents();
        }
    }

}

 function viewUpdate()
{
    $id=$_GET['id'];
    $childDetails=ClassFactory::build('person');
    $row = $childDetails->GetChildDetailsById($id);
    
    $relative=$row['relative'];
    $city_id=$row['city_id'];
    $station_id = $row['station_id'];
    $branch_id=$row['branch_id'];
    $caseId=$row['id'];
    $gov_id=$row['gov_id'];
 
    $report_num=$row['report_number'];
    $report_date=$row['report_date'];
    $decision_number=$row['decision_number'];
    $decision_date=$row['decision_date'];
    $clothes_size=$row['clothes_size'];
    $shoe_size=$row['shoe_size'];
    $name=$row['name'];
    $DOB=$row['birth_date'];
    $SSN=$row['national_id'];
    $gender=$row['gender'];
    $supervisor=$row['supervisor_id'];

    $governorate=ClassFactory::build('governorate') ;
    $rows=$governorate->getAllGov();
    for ( $i=0;$i<count($rows);$i++ )  
    {  
        $rows[$i]['selected']=false;
        if($rows[$i]['id']==$gov_id)
        {
            $rows[$i]['selected']=true;
        }
    } 
    
    $cities=ClassFactory::build('cities');
    $cities=$cities->GetCityById($gov_id);
    for ( $i=0;$i<count($cities);$i++ )  
    {
        $cities[$i]['selected']=false;
        if($cities[$i]['id']==$city_id)
        {
            $cities[$i]['selected']=true;
        }
    } 

    $stations=ClassFactory::build('stations');
    $stations=$stations->GetStationById($city_id);
    for($i = 0; $i < count($stations); $i++ )  
    {
          
        $stations[$i]['selected'] = false;
        if($stations[$i]['id'] == $station_id)
        {
            $stations[$i]['selected']=true;
        }
    } 

   $branch=ClassFactory::build('branch');
   $branch=$branch->getAllBranches();
   for ($i=0;$i<count($branch);$i++ )  
    { 
        $branch[$i]['selected']=false;
        if($branch[$i]['id']==$branch_id)
        {
            $branch[$i]['selected']=true;
        }
    } 

    $person= ClassFactory::build('person');
    $supervisors=$person->getSupervisorByBranch($branch_id);
    for ( $i=0;$i<count($supervisors);$i++ )  
    { 
        $supervisors[$i]['selected']=false;
        if($supervisors[$i]['id']==$supervisor)
        {
            $supervisors[$i]['selected']=true;
        }
    } 

    $talents= ClassFactory::build('talent');
    $selectedOptions= $talents->getTalentByChildId($caseId);
    $talent=new talent();
    $option=$talent->getAll();
   


    for($i = 0; $i < sizeof($option); $i++) {
        $option[$i]["selected"] = false;
        for($j =0; $j < sizeof($selectedOptions); $j++)
        {    
             if($option[$i]["id"] === $selectedOptions[$j]['talent_id'])
             {
                $option[$i]["selected"] = true;
             
            }
        }
    }

    $replacement_array = array(
        'name' => $name,
        'DOB'=>$DOB,
        'relative'=>$relative,
        'SSN'=>$SSN,
        'report_num'=>$report_num,
        'report_date'=>$report_date,
        'decision_number'=>$decision_number,
        'decision_date'=>$decision_date,
        'clothes_size'=>$clothes_size,
        'shoe_size'=>$shoe_size,
        'talents'=>$option,
        'gov'=>$rows,
        'cities'=>$cities,
        'stations'=>$stations,
        'branch'=>$branch,
        'supervisor'=> $supervisors,
        'gender'=>$gender,
        );
     echo json_encode($replacement_array);
}
function updateChild()
{   
    $person = ClassFactory::build('person');
    $person->name=$_POST['name'];
    $person->birthDate=$_POST['DOB'];
    $person->nationalId=$_POST['SSN'];
    $person->gender=$_POST['gender'];
    $person->branch_id=$_POST['branch'];
    $person->id=$_POST['id'];
    $person->roleId=6;
    $person->Update();

    $document =ClassFactory::build('document');
    $document->relative= $_POST['nasab'];
    $document->city_id= $_POST['city'];
    $document->station_id= $_POST['station'];
    $document->gov_id= $_POST['gov'];
    $document->reportNumber= $_POST['reportNum'];
    $document->reportDate= $_POST['reportDate'];
    $document->decisionNumber= $_POST['decisionNum'];
    $document->decisionDate= $_POST['decisionDate'];
    $document->clothesSize= $_POST['clothes_size'];
    $document->shoeSize= $_POST['shoe_size'];
    $document->id= $person->id;
    $document->Update();
    $child= ClassFactory::build('child'); 
    $child->supervisorId=$_POST['supervisor'];
   $child->Update();
    $row= $child->GetByPersonId($person->id);
    $childId=$row["id"];
   
    $talent= new talent();
    $talent->childId=$childId;
    $talent->deleteRelations();
    $options=json_decode($_POST['selectedValues']);
    if($_POST['selectedValues'])
    {
        for($i=0;$i<count($options);$i++)
        {
            $talent->$childId=$childId;
            $talent->id=$options[$i];
            $talent->InsertChildTalents();
        }
    }
     
  
}
 function deleteChild()
 {
    $person = ClassFactory::build('person');
    $person->id=$_POST['id'];
    $person->Delete();
    //     $sql= "SELECT  case_details.document_id from `case` INNER JOIN case_details on `case`.id=
    //      case_details.case_id where `case`.child_id = $id";
    //     $result = mysqli_query($conn,$sql);
    //     $row=mysqli_fetch_row($result);
    //     $document_id=$row['document_id'];

    //    $sql= "DELETE from document where id = $document_id";
    //    echo $sql;
    //     $result = mysqli_query($conn,$sql);

        // $sql= "DELETE from person where id = $id";
        // $result = mysqli_query($conn,$sql);

    
 }
 function Getchilderen()
 {

     $person=ClassFactory::build('person');
     $arr=array();
     $rows=$person->GetByRoleId(6);
    
     if($rows==false)
     {
        $obj=(object)['status' =>'false'];
     }
     else{

    
     foreach ( $rows as $row )  
     { 
        $person=ClassFactory::build('person');
        $person->id = $row['id'];
        $person->name = $row['name'];
        $person->birthDate = $row['birth_date'];
        $person->nationalId = $row['national_id'];
        $person->gender = $row['gender'];
        $person->roleId = $row['role_id'];
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

 function getGov()
 {

    $governorate=new governorate();
    $arr=array();
    $rows=$governorate->getAllGov();
    foreach ( $rows as $row )  
    { 
        $governorate=ClassFactory::build('governorate');
        $governorate->id = $row['id'];
        $governorate->governorate_name= $row['governorate_name'];
        array_push( $arr, $governorate );  
    } 
      
    echo json_encode($arr);

 } 

function viewCities()
{
    $govId=$_GET['govId'];
    $cities=ClassFactory::build('cities');
    $arr=array();
    $rows=$cities->GetCityById($govId);


    foreach ( $rows as $row )  
    { 
        $cities=ClassFactory::build('cities');
        $cities->id=$row['id'];
        $cities->city_name = $row['city_name'];
        array_push( $arr, $cities );  
    } 
    echo json_encode($arr);
}

function getSupervisors()
{

     $person=ClassFactory::build('person');
     $arr=array();
     $rows=$person->GetByRoleId(8);
     foreach ( $rows as $row )  
     { 
        $person=new person();
        $person->name = $row['name'];
        $person->id = $row['id'];
        array_push( $arr, $person );  
     } 
     
    echo json_encode($arr);

}

function getStations()
{
    $stations=ClassFactory::build('stations');
    $id= $_GET['id'];
    $rows=$stations->GetStationById($id);
    $arr=array();
    foreach ( $rows as $row )  
     { 
        $stations=ClassFactory::build('stations');
        $stations->id = $row['id'];
        $stations->station_name = $row['station_name'];
        array_push( $arr, $stations );  
     } 
     
    echo json_encode($arr);

}

function getTalents()
{
    $talent=ClassFactory::build('talent');
    $rows=$talent->getAll();
    $arr=array();
    foreach ( $rows as $row )  
     { 
        $talent=new talent();
        $talent->id = $row['id'];
        $talent->talent_name = $row['talent_name'];
        array_push( $arr, $talent );  
     } 
     
    echo json_encode($arr);

}

function filterBy()
{
     
    $choice= $_GET['choice'];
    $strategyContext = new StrategyContext($choice);
    $strategyContext->showStat();
    

}
  
function CheckReportNum()
{
    $document= new document();
    $document->reportNumber=$_GET['reportNumber'];
    $flag=$document->CheckReportNum();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
}
function CheckDecisionNum()
{
    $document= new document();
    $document->decisionNumber=$_GET['DecisionNum'];
    $flag=$document->CheckDecisionNum();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
}
function EditCheckReportNum()
{
    $document= new document();
    $document->reportNumber=$_GET['ReportNum'];
    $id=$_GET['id'];
    $flag=$document->EditCheckReportNum($id);
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
}
function EditCheckDecisionNum()
{
    $document= new document();
    $document->decisionNumber=$_GET['DecisionNum'];
    $id=$_GET['id'];
    $flag=$document->EditCheckDecisionNum($id);
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
}

?>