<?php
set_include_path('./');
     require_once './Twilio/autoload.php'; 
     include_once "./models/employee.php";
     include_once "./observerPattern/abstractObserver.php";
     include_once "./decorative/msg.php";
     include_once "./decorative/VacationMsgBody.php";
    use Twilio\Rest\Client; 
    class WhatsAppObserver extends AbstractObserver 
    {
        public function update($msg,$id)
        { 
            $sid    = "AC872d8ac40aaa63424b7286b85d3e33a7"; 
            $token  = "19788d129eb7508cfef3fb351f68bd9b"; 
            $twilio = new Client($sid, $token); 
            
            $emp=new employee();
            $rows= $emp->GetAll();
            $bodyMsg = new msg();
            $bothMsg = new VacationMsgBody($bodyMsg);
            $msg=$msg.$bothMsg->loadBody($id);

            foreach ( $rows as $row )  
            {
                $message = $twilio->messages 
                            ->create("whatsapp:+2".$row['mobile'], // to 
                                    array( 
                                        "from" => "whatsapp:+14155238886",       
                                        "body" => $msg 
                                    ) 
                            ); 
            
                print($message->sid);
            }
        }
    }

?>