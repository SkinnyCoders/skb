<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();

		public function __construct()
		{
			$this->CI =& get_instance();
			$this->CI->load->model('m_identitas');
		}

		function set($content_area, $value)
		{
			$this->template_data[$content_area] = $value;
		}
	
		function load($template = '', $name ='', $view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$view_data['identitas'] = $this->CI->m_identitas->data();
			$this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('depan/'.$template, $this->template_data);
		}

		function dashboard($view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$name ='contents';
			$view_data['identitas'] = $this->CI->m_identitas->data();
			$this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('admin/template', $this->template_data);
		}

		function admin($view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$name ='contents';
			$view_data['identitas'] = $this->CI->m_identitas->data();
			$this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('admin/template-non', $this->template_data);
		}

		function edit($view = '' , $view_data = array(), $return = FALSE)
		{               
			// $this->CI =& get_instance();
			$name ='contents';
			$view_data['identitas'] = $this->CI->m_identitas->data();
			$this->set($name , $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view('admin/template-edit', $this->template_data);
		}

}