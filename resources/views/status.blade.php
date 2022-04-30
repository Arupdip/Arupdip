<?php
function getStatus($val){
    if(Auth::user()->user_type == 3){
        if($val == 0){
            return "Approval Pending";
        }
       else if($val == 1 || $val ==5){
            return "AMC Approved";
        }

       else if($val == 2){
            return "Comply By AMC";
        }
        
       else if($val == 3){
            return "Comply Resolved By User";
        }

       else if($val == 4){
            return "Comply Raised By AD";
        }
        
        else {
        return "Approved";
        }
    }

    if(Auth::user()->user_type == 4){
       
      
        if($val == 1){
            return "Approval Pending";
        }

       else if($val == 2){
            return "Comply By AMC";
        }
        
       else if($val == 3){
            return "Comply Resolved By User";
        }

       else if($val == 4){
            return "Comply Raised";
        }

        else if($val == 5){
            return "Comply Resolved By AMC (Approval Pending)";
        }
        else if($val == 7){
            return "Comply Raised By Commissioner";
        }
        else {
        return "Approved";
        }
    }


    if(Auth::user()->user_type == 5){
       
      
       if($val == 6){
           return "Approval Pending";
       }
       else if($val == 8){
           return "Comply Resolved By AD";
       }
      else if($val == 2){
           return "Comply Raised";
       }
       
      else if($val == 3){
           return "Comply Raised";
       }

      else if($val == 4){
           return "Comply Raised";
       }

       else if($val == 5){
           return "Comply Raised";
       }
       else if($val == 7){
           return "Comply Raised";
       }
       else {
       return "Approved";
       }
   }


}

?>