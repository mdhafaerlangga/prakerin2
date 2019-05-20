<?php

class Flasher{
  static public function setFlash($msg, $action, $type, $flashtag){
    $_SESSION['flash'] = [
      'msg' => $msg,
      'action' => $action,
      'type' => $type,
      'flashtag' => $flashtag
    ];
  }
  static public function flash(){
    if (isset($_SESSION['flash'])){
      echo '<div class="alert alert-'.$_SESSION['flash']['type'].' alert-dismissible fade show mt-2" role="alert">
      Data '.$_SESSION['flash']['flashtag'].' <strong>'.$_SESSION['flash']['msg'].'</strong> '.$_SESSION['flash']['action'].'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    unset($_SESSION['flash']);
    }
  }
} 