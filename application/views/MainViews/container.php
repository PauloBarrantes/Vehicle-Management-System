<!--[if lt IE 8]>
     <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
     <![endif]-->
     <script>
         function showNotificationWarning(from, align, type, message){

           $.notify({
               icon: type,
               message: message

           },{
               type: type,
               timer: 4000,
               placement: {
                   from: from,
                   align: align
               }
           });
         }

     </script>

 <?php
     //for warning -> flash_message
     //for info -> success_message

     $arr = $this->session->flashdata();
     if(!empty($arr['flash_message'])){
        $html = '<script>';
        $html .= 'showNotification(\'top\',\'right\', warning,\' '.$arr['flash_message'].' \')';
        $html .= '</script>';
        echo $html;
     }else if (!empty($arr['success_message'])){
         $html = '<div class="container" style="margin-top: 10px;">';
         $html .= '<div class="alert alert-info alert-dismissible" role="alert">';
         $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
         $html .= $arr['success_message'];
         $html .= '</div>';
         $html .= '</div>';
         echo $html;
     }else if (!empty($arr['danger_message'])){
         $html = '<div class="container" style="margin-top: 10px;">';
         $html .= '<div class="alert alert-danger alert-dismissible" role="alert">';
         $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
         $html .= $arr['danger_message'];
         $html .= '</div>';
         $html .= '</div>';
         echo $html;
     }
 ?>
