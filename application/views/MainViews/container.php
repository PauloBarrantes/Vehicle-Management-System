<!--[if lt IE 8]>
     <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
     <![endif]-->
     <script>
         function showNotification(from, align, message){

           $.notify({
               icon: "warning",
               message: message

           },{
               type: 'warning',
               timer: 4000,
               placement: {
                   from: from,
                   align: align
               }
           });
         }
         function showNotificationSuccess(from, align, message){

           $.notify({
               icon: "done",
               message: message

           },{
               type: 'success',
               timer: 4000,
               placement: {
                   from: from,
                   align: align
               }
           });
         }
         function showNotificationDanger(from, align, message){

           $.notify({
               icon: "highlight_off",
               message: message

           },{
               type: 'danger',
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
        $html .= 'showNotification(\'top\',\'right\', \' '.$arr['flash_message'].' \')';
        $html .= '</script>';
        echo $html;
     }else if (!empty($arr['success_message'])){
         $html = '<script>';
         $html .= 'showNotificationSuccess(\'top\',\'right\', \' '.$arr['success_message'].' \')';
         $html .= '</script>';
         echo $html;
     }else if (!empty($arr['danger_message'])){
         $html = '<script>';
         $html .= 'showNotificationDanger(\'top\',\'right\', \' '.$arr['danger_message'].' \')';
         $html .= '</script>';
         echo $html;
     }
 ?>
