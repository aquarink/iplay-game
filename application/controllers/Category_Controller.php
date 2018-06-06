<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->model('Category_Model');
        $this->checkSessLogin();
    }

    public function checkSessLogin() {
        $checkLoginSession = $this->session->userdata('id_admin');
        if ($checkLoginSession == NULL) {
            redirect('login');
        }
    }

    public function addCategory() {
        $this->load->view('Add_Category');
    }

    public function oolistCategory() {
        $data['allCategory'] = $this->Category_Model->categoryAll();

        $this->load->view('List_Category', $data);
    }

    public function checkCategoryTitle($catTitle) {
        $nameCheck = $this->Category_Model->categoryCheck($catTitle);

        if ($nameCheck > 0) {
            $this->form_validation->set_message('checkCategoryTitle', 'Category is already exist.');
            return false;
        } else {
            return true;
        }
    }

    public function addNewCategory() {
        $name = strtolower($this->input->post('categoryTitle'));
        $status = $this->input->post('categoryStatus');

        $this->form_validation->set_rules('categoryTitle', 'Title', 'trim|required|callback_checkCategoryTitle');
        $this->form_validation->set_rules('categoryStatus', 'Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Add_Category');
        } else {
            $data['query'] = $this->Category_Model->addCategoryModel($name, $status);

            if ($data['query'] > 0) {
                redirect('addcategory?msg=Category add successfuly');
            } else {
                redirect('addcategory?msg=Category add failed');
            }
        }
    }

    public function editCategory() {

        if ($this->input->get('id', TRUE)) {
            if (!empty($this->input->get('id', TRUE))) {
                $data['categoryId'] = $this->Category_Model->categoryId($this->input->get('id', TRUE));
                $this->load->view('Edit_Category', $data);
            }
        }
    }

    public function updateCategory() {
        $id = strtolower($this->input->post('id'));
        $name = strtolower($this->input->post('categoryTitle'));
        $status = $this->input->post('categoryStatus');

        $this->form_validation->set_rules('categoryTitle', 'Title', 'trim|required');
        $this->form_validation->set_rules('categoryStatus', 'Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Add_Category');
        } else {
            $data['query'] = $this->Category_Model->updateCategoryModel($name, $status, $id);

            if ($data['query'] > 0) {
                redirect('listcategory?msg=Category successfuly updated');
            } else {
                redirect('listcategory?msg=Category failed updated');
            }
        }
    }

    public function listCategory($page = 1)
    {
      $limit                      = 10;
      if (empty($this->input->get('p'))) {
        $page = 1;
      } else {
        $page                     = $this->input->get('p', true);
      }

      $url                        = site_url('listcategory');
      $result                     = $this->Category_Model->categoryPage($limit, $page);

      $total                      = $this->Category_Model->categoryTotal();


      $config['base_url']         = $url;
      $config['page_query_string']= TRUE;
      $config['query_string_segment'] = 'p';
      $config['total_rows']       = $total;
      $config['per_page']         = $limit;
      $config['use_page_numbers'] = true;
      $config['num_links']        = 5;
      $config['full_tag_open']    = '<ul class="pagination" style="margin:0px">';
      $config['full_tag_close']   = '</ul>';
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['first_tag_open']   = '<li>';
      $config['first_tag_close']  = '</li>';
      $config['prev_link']        = '&laquo';
      $config['prev_tag_open']    = '<li class="prev">';
      $config['prev_tag_close']   = '</li>';
      $config['next_link']        = '&raquo';
      $config['next_tag_open']    = '<li>';
      $config['next_tag_close']   = '</li>';
      $config['last_tag_open']    = '<li>';
      $config['last_tag_close']   = '</li>';
      $config['cur_tag_open']     = '<li class="active"><a href="">';
      $config['cur_tag_close']    = '</a></li>';
      $config['num_tag_open']     = '<li>';
      $config['num_tag_close']    = '</li>';
      $this->pagination->initialize($config);
      $pagination = $this->pagination->create_links();
      //menyiapkan data untuk dikirim ke view
      $data['result']             = $result;
      $data['pg']                 = $pagination;

      $data['allCategory'] = $this->Category_Model->categoryPage($limit, $page);

      $this->load->view('List_Category', $data);
    }


}
