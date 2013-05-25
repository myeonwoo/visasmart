<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Breadcrumb{
	var $bread = '';
	var $crumbs = array();
	var $href_param;
	var $seperator;
	var $home_text;
	var $home_link;
	//function Breadcrumb($seperator="&nbsp;&gt;&nbsp;",$href_param=NULL,$home_link='/',$home_text = "Home"){
	function Breadcrumb( $params = array( 'seperator' => " > ", 'href_param' => null, 'home_link' => '/', 'home_text' => "Home")){
		$this->href_param = $params['href_param'];
		$this->seperator = $params['seperator'];	
		$this->home_text = $params['home_text'];
		$this->home_link = $params['home_link'];
		$this->crumbs[] = array('crumb'=>$this->home_text,'link'=>$this->home_link);
	}
	function addCrumb($this_crumb, $this_link = NULL){
	
		if ( !$this_link ) $this_link = '#';
		
		$this->crumbs[] = array('crumb'=>$this_crumb,'link'=>$this_link);
	}
	
	function addCrumb_ori($this_crumb, $this_link = NULL){
		$in_crumbs = false;
		// first check that we haven't already got this link in the breadcrumb list.
		foreach($this->crumbs as $crumb){
			if($crumb['crumb'] == $this_crumb ){
				$in_crumbs = true;
			}
			if($crumb['link'] == $this_link &&  $this_link != ''){
				$in_crumbs = true;
			}
		}
		if($in_crumbs == false){
			$this->crumbs[] = array('crumb'=>$this_crumb,'link'=>$this_link);
		}
	}
	
	/****
		* return your breadcrumb html in bootrap style
	****/
	function makeBread(){
		$sandwich = $this->crumbs;
		
		$cnt = count($sandwich);
		
		if ( $cnt > 1) {
			$tmp_arr = array_slice($sandwich, 0, $cnt);
		} else {
			$tmp_arr = array();
		}
		
		$slices = array();
		foreach($tmp_arr as $slice){
			$slices[] = '<a href="' . $slice['link'] . '" '.$this->href_param.'>' . $slice['crumb'] . '</a>';
		}
		$this->bread = "<ul class='breadcrumb'><li>" . join( "<span class='divider'>/</span></li><li>", $slices) . "</li></ul>";
		return $this->bread;
	}
	
	function makeBread_dev(){
		$sandwich = $this->crumbs;
		$slices = array();
		foreach($sandwich as $slice){
			if (isset($slice['link']) && $slice['link'] != '') {
				$slices[] = '<a href="' . $slice['link'] . '" '.$this->href_param.'>' . $slice['crumb'] . '</a>';
			} else {
				$slices[] = $slice['crumb'];
			}
		}
		$this->bread = "<ul class='breadcrumb'><li>" . join( "<span class='divider'>/</span></li><li>", $slices) . "</li></ul>";
		return $this->bread;
	}
	
	// call this to return your breadcrumb html
	function makeBread_ori(){
		$sandwich = $this->crumbs;
		$slices = array();
		foreach($sandwich as $slice){
			if (isset($slice['link']) && $slice['link'] != '') {
				$slices[] = '<a href="' . $slice['link'] . '" '.$this->href_param.'>' . $slice['crumb'] . '</a>';
			} else {
				$slices[] = $slice['crumb'];
			}	
		}
		$this->bread = join($this->seperator, $slices);
		return $this->bread;
	}
	
	function getCrumbs()
	{
		return $this->crumbs;
	}
	
	function sayhi(){
		return 'hi';
	}
}
?>