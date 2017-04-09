<?php
include 'common.php';

// Stop back button killing auction
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        ### unset variable to stop back button
        unset($_SESSION['SELL_auction_id']);
       //header('location: user_menu.php');
   }
}

if(isset($_GET['is'], $_GET['item'], $_GET['time'], $_GET['duration'])){
       $is = $_GET['is'];
       $auction_id = $_GET['item'];
       $a_time = $_GET['time'];
       $duration = $_GET['duration'];

        
    switch($is){
        case 'done':
        $a_time = (empty($start_now) || !$caneditstartdate) ? $a_time : $dt->currentDatetime();
        $start_datetime = new DateTime($a_time, $dt->timezone);
        $start_datetime->add(new DateInterval('P' . intval($duration) . 'D'));
        $a_ends = $start_datetime->format('Y-m-d H:i:s');

        $template->assign_vars(array(
                    'AUCTION_ID' => $auction_id,
                    'MESSAGE' => sprintf($MSG['102'], $auction_id, $dt->formatDate($a_ends, 'D j M \a\t g:ia'))
                    ));
        break;
        }
}
include 'header.php';
$template->set_filenames(array(
        'body' => 'sellsuccess.tpl'
        ));
$template->display('body');
include 'footer.php';
   
