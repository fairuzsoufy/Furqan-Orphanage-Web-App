<?php
set_include_path('./');
include_once './models/donations_types.php';
include_once './models/donor.php';
include_once './models/receipt.php';
include_once './models/donationValues.php';
include_once './models/person.php';
include_once './pdfGenerator.php';
    
$conn = db::getInstance();

session_start();

$userId =$_SESSION["userId"];
$person=new person();
$person=$_SESSION["person"];

    if(isset($_POST['method']) && $_POST['method']=="addReceipt")
    {
        addReceipt($userId);
    }
    else if(isset($_GET['method']) && $_GET['method']=="printReceipt")
    {
        printReceipt($person);
    }
    else if(isset($_GET['method']) && $_GET['method']=="getTypes")
    {
        getAllDonationTypes();
    }
    else if(isset($_GET['method']) && $_GET['method']=="GetDonors")
    {
        getDonor();
    }
    else if(isset($_GET['method']) && $_GET['method']=="getReceipts")
    {
        getALLRecipts();
    }
    else if( isset($_REQUEST["selectedButtonValue"]) && $_REQUEST["selectedButtonValue"])
    {
        $patternText="[أ-ي' ']{2,50}";
        $SSNPattern="[0-9]{14}";
        // @"^\d{89}$";
        $value = $_REQUEST['selectedButtonValue']; 
        $sql="SELECT options.name ,options_types.type,options.id, donation_options.id as donationOptionId from options INNER JOIN options_types on options.option_type_id=options_types.id INNER JOIN donation_options ON options.id=donation_options.options_id 
         where donation_options.donation_types_id=$value And donation_options.isdeleted=0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            { 

                echo '<div>';
                if($row['type']=="childNamesOption")
                {
                    echo'<div id="'.$row["donationOptionId"].'" class="offset-md-4 col-md-3">
                    <label>اسم الطفل</label>
                    <select required id='.$row["id"].'>';
                        $sql = "SELECT * FROM person where role_id=6 And isdeleted=0";
                        $result1 = mysqli_query($conn,$sql);
                        
                        while($row1=$result1->fetch_assoc())
                        {
                        echo '<option id="'.$row1['id'].'" value="'.$row1['id'].'" >'.$row1['name'].'</option>';
                        }
                        echo'</select></div>';
                }
                
                else if($row["type"]) 
                {
                  echo'<div id='.$row["donationOptionId"].' class="offset-md-4 col-md-3">';
                  echo'<label> '.$row["name"].'</label>';
                  
                   if($row["type"]=="number"&& $row["id"]=="9" )
                  {
                    echo'<input  onkeydown="javascript: return event.keyCode == 69 ? false : true" onpaste="return false;" required id="'.$row["id"].'" type="'.$row["type"].'" name="'.$row["id"].'" min="1" max="100000000000" pattern="[0-9]" required></input>';
                  }
                  else if($row["type"]=="text"&& $row["id"]=="24" )
                  {
                    echo'<input onpaste="return false;" required id="'.$row["id"].'" type="'.$row["type"].'" name="'.$row["id"].'"pattern="'.$SSNPattern.'" required></input>';
                  }
                  else if($row["type"]=="text")
                  echo'<input onpaste="return false;" id="'.$row["id"].'" type="'.$row["type"].'" name="'.$row["id"].'"pattern="'.$patternText.'"required></input>';
                  else if($row["type"]=="number")
                  {
                    echo'<input onkeydown="javascript: return event.keyCode == 69 ? false : true" onpaste="return false;" id="'.$row["id"].'" type="'.$row["type"].'" name="'.$row["id"].'"required></input>';
                  }
                  else
                  {
                    echo'<input onpaste="return false;" id="'.$row["id"].'" type="'.$row["type"].'" name="'.$row["id"].'"required></input>';
                  }

              
                }
            echo '</div>
                 </div>';
              
            } 
           
            echo '<div
              class="row">
            <div class="offset-md-5 col-md-3">
            <button  type="submit">save</button></div>
            </div>';
         }    
    }
    else if(isset($_GET['method']) && $_GET['method']=="CheckNationalId")
    {
        checkNationalId();
    }
  

   
	function printReceipt($person)
	{
        $donationTypeName = $_GET['donation'];
        $donarName = $_GET['8'];
        $money=$_GET['9'];
        $childName=$_GET['23'];
        $receipt=new receipt();
        $donationTypeName=$donationTypeName."(". $childName.")";
       $row= $receipt->getLastID();
        $id=$row['id'];
        $user=$person->name;
        $pdfHtml = file_get_contents("esal.html");
        $pdfHtml=str_replace("{{DonorName}}", $donarName,$pdfHtml);
        $pdfHtml=str_replace("{{DonorAmount}}", $money,$pdfHtml);
        $pdfHtml=str_replace("{{DonationType}}",$donationTypeName,$pdfHtml);
        $pdfHtml=str_replace("{{user}}",$user,$pdfHtml);
        $pdfHtml=str_replace("{{id}}",$id,$pdfHtml);
        $receipt=new pdfGenerator();
        //$receipt->url= 'http://localhost/furqan/esal.html?&donation='.urlencode($donationTypeName).'&8='.urlencode($donarName).'&9='.$money;
        $receipt->html = $pdfHtml;
        $receipt->generate();
    
        
    }	

    function addReceipt($userId)
	{
        $donor= new donor();
        unset($_POST['method']);
        $donationTypeId= $_POST['donationTypeId'];
        $donor->name = $_POST['name'];
        $donorId=$_POST['donorId'];
       
        $receipt = new receipt();
        if($donorId=="undefined")
        {
            $donor->name = $_POST['name'];
            $donor->SSN=$_POST['donorSSN'];
            $donorInsertedId= $donor->Insert();
            $receipt->donorId=$donorInsertedId;
        }
        
        else
        {
            $donorId=$_POST['donorId'];
            $receipt->donorId=$donorId;
            
         
        }
      
        $money=$_POST['money'];
        $receipt->amount=$money;
        $receipt->userId=$userId;
        // $receipt->userId=14;

      
        $receipt->donationTypeId=$donationTypeId;
        $receiptid=$receipt->Insert();
        unset($_POST['donationTypeId']);
        unset($_POST['name']);
        unset($_POST['donorSSN']);
        unset($_POST['money']);
        unset($_POST['donationType']);
        unset($_POST['donorId']);
        // print_r($_POST);
        $option=[];
       $childId=$_POST['childId'];
        if($childId)
        {
            $receipt->id= $receiptid;
            $receipt->childId=$childId;
            $receipt->InsertChildDonation();
        }

        foreach($_POST as $option) 
        {
            $donationValue= new donationValues();
            $optionValue = json_decode($option);
            //echo $option;
            $donationValue->value = $optionValue->data;
            $donationValue->optionId= $optionValue->optionId;
            $donationValue->receiptId=$receiptid;
            $donationValue->Insert();          
        }
      
    }

    function getAllDonationTypes()
    {
        $type=new donationsTypes();
        $rows=$type->GetAll();
        $arr=array();
        foreach ( $rows as $row )  
        { 
            $type=new donationsTypes();
            $type->id=$row['id'];
            $type->name = $row['name'];
            array_push( $arr, $type );  
        } 
        echo json_encode($arr);
    }

    function getDonor()
    {
        $arr=[];
        $donor=new donor();

        $donor->SSN=$_GET['term'];

      $rows=  $donor->GetBySSN();
        foreach ( $rows as $row )  
        { 
            $object = new stdClass();
            $object->id=$row['id'];
            $object->label=$row['name'];
            $object->SSN=$row['national_id'];
            array_push( $arr, $object );  
        } 
     
            echo json_encode($arr);


    
    
    }
    function getALLRecipts()
    {
        $receipt = new receipt();
      $rows=$receipt->GetRecipt();
      $arr=[];
      foreach ( $rows as $row )  
        { 
            $object = new stdClass();
            $object->name=$row['donorName'];
            $object->amount=$row['amount'];
            $object->type=$row['name'];
           $object->date=$row['created_At'];
           array_push( $arr, $object );  
        }
        echo json_encode($arr);
    }
    function checkNationalId()
 { 
   
    $donor= new donor();
    $donor->SSN=$_GET['nationalId'];
    $flag=$donor->CheckNationalId();
    $replacement_array = array(
        'flag' => $flag);
        echo json_encode($replacement_array);
 }
?>