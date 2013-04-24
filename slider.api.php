<?php

function slider_info($sid){
  $info = db_select('d7slider_sliders','t')
  ->fields('t', array('sid', 'title', 'description', 'created', 'settings', 'tid', 'weight'))
  ->condition('sid', $sid)->execute()->fetchObject();
  //dsm($info);
  return $info;
}

function template_info($tid){
  $info = db_select('d7slider_templates','t')
  ->fields('t', array('tid', 'title','template'))
  ->condition('tid', $tid)->execute()->fetchObject();
  $config = json_decode($info->template);
  if ( is_object($config->template->schema) ){
    dsm($config->template->schema);
  }
  return $info;
}