<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Game_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->model('Game_Model');
        $this->load->model('Category_Model');
        $this->load->model('Visitor_Model');

        $this->checkSessLogin();
    }

    public function checkSessLogin() {
        $checkLoginSession = $this->session->userdata('id_admin');
        if ($checkLoginSession == NULL) {
            redirect('login');
        }
    }

    public function dashboard() {
        $data['gameActive'] = $this->Game_Model->gameByCount(1);
        $data['gameInactive'] = $this->Game_Model->gameByCount(2);

        $data['categoryActive'] = $this->Category_Model->categoryByStatus(1);
        $data['categoryInactive'] = $this->Category_Model->categoryByStatus(2);

        $data['gameTop'] = $this->Game_Model->gameTop();

        $this->load->view('Dashboard', $data);
    }

    public function logout() {
        $this->session->unset_userdata('id_admin');
        $this->session->sess_destroy();
        $this->load->view('Login');
    }

    public function listGameActive($page = 1) {
        $limit = 8;
        if (empty($this->input->get('p'))) {
            $page = 1;
        } else {
            $page = $this->input->get('p', true);
        }

        $url = site_url('listgameactive?');
        $result = $this->Game_Model->gamePage($limit, $page);

        $total = $this->Game_Model->gameTotal();


        $config['base_url'] = $url;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = true;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination" style="margin:0px">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        //menyiapkan data untuk dikirim ke view
        $data['result'] = $result;
        $data['pg'] = $pagination;


        $data['gameActive'] = $this->Game_Model->gameByStatus(1, $limit, $page);
        $this->load->view('List_Game_Active', $data);
    }

    public function listGameInactive($page = 1) {

        $limit = 8;
        if (empty($this->input->get('p'))) {
            $page = 1;
        } else {
            $page = $this->input->get('p', true);
        }

        $url = site_url('listgameinactive?');
        $result = $this->Game_Model->gamePage($limit, $page);

        $total = $this->Game_Model->gameTotal();


        $config['base_url'] = $url;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = true;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination" style="margin:0px">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        //menyiapkan data untuk dikirim ke view
        $data['result'] = $result;
        $data['pg'] = $pagination;


        $data['gameInactive'] = $this->Game_Model->gameByStatus(2, $limit, $page);
        $this->load->view('List_Game_Inactive', $data);
    }

    public function listGamePromo($page = 1) {

        $limit = 8;
        if (empty($this->input->get('p'))) {
            $page = 1;
        } else {
            $page = $this->input->get('p', true);
        }

        $url = site_url('listgamepromo?');
        $result = $this->Game_Model->gamePagePromo($limit, $page);

        $total = $this->Game_Model->gamePromoTotal();


        $config['base_url'] = $url;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = true;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination" style="margin:0px">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        //menyiapkan data untuk dikirim ke view
        $data['result'] = $result;
        $data['pg'] = $pagination;


        $data['gamePromo'] = $this->Game_Model->gameByCostStatus(3, $limit, $page);
        $this->load->view('List_Game_Promo', $data);
    }

    public function addGame() {
        $data['allCategory'] = $this->Category_Model->categoryAll();
        $this->load->view('Add_Game', $data);
    }

    public function checkGameExist($gameTitle, $category) {
        $nameCheck = $this->Game_Model->gameCheck($gameTitle, $category);

        if ($nameCheck > 0) {
            $this->form_validation->set_message('checkGameExist', 'Game with same name and category is already exist.');
            return false;
        } else {
            return true;
        }
    }

    public function checkGameFee($fee) {
        if ($fee > 0) {
            return true;
        } else {
            $this->form_validation->set_message('checkGameFee', 'Pick game fee status, free or pay.');
            return false;
        }
    }

    public function addNewGame() {
        $category = $this->input->post('category');
        $gameName = strtolower($this->input->post('gameTitle'));
        $gameRename = str_replace(' ', '-', $gameName);
        $fee = $this->input->post('fee');
        $newName = $gameRename . '-' . rand(111, 999);

        $this->form_validation->set_rules('fee', 'Status Fees', 'trim|required|callback_checkGameFee');
        $this->form_validation->set_rules('category', 'Id Category', 'trim|required');
        $this->form_validation->set_rules('gameTitle', 'Game Title', 'trim|required|callback_checkGameExist[' . $category . ']');


        if ($this->form_validation->run() == false) {
            $data['allCategory'] = $checkCategory = $this->Category_Model->categoryAll();
            $this->load->view('Add_Game', $data);
        } else {

            $config['upload_path'] = './games-zip/';
            $config['allowed_types'] = 'zip|rar';
            $config['max_size'] = '';
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gameFile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('Add_Game', $error);
                print_r($this->upload->display_errors());
            } else {
                $data = array('archive' => $this->upload->data());
                $zip = new ZipArchive;
                $file = $data['archive']['full_path'];
                chmod($file, 0777);

                if ($zip->open($file) === TRUE) {
                    echo "<h1 style=margin-top:100px>STRING</h1>";
                    $zip->extractTo('./games-unzip/' . $gameRename . '/');
                    $zip->close();

                    $config['upload_path'] = './games-thumbnail/';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['max_size'] = '';
                    $config['file_name'] = $newName;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('gameThumbnail')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('Add_Game', $error);
                    } else {
                        $dataThumb = array('thumb' => $this->upload->data());
                        $fileThumb = $dataThumb['thumb']['full_path'];

                        $explodedFileThumb = explode('/', $fileThumb);
                        $explCount = count($explodedFileThumb) - 1;
                        $nameString = $explodedFileThumb[$explCount];

                        $data['query'] = $this->Game_Model->addGameModel($category, $gameName, $gameRename, $nameString, $fee, 1);

                        if ($data['query'] > 0) {
                            redirect('addgame?msg=Game add successfuly');
                        } else {
                            redirect('addgame?msg=Game add failed');
                        }
                    }
                } else {
                    echo 'failed extract';
                }
            }
        }
    }

    public function changeStatGame() {
        $id = $this->input->get('id', TRUE);
        $status = $this->input->get('status', TRUE);

        if ($status == 1) {
            $newStatus = 2;
            $redirSuccess = 'listgameactive?msg=Game status successfuly updated';
            $redirFailed = 'listgameactive?msg=Game status failed updated';
        } else {
            $newStatus = 1;
            $redirSuccess = 'listgameinactive?msg=Game status successfuly updated';
            $redirFailed = 'listgameinactive?msg=Game status failed updated';
        }

        $data['query'] = $this->Game_Model->changeStatus($newStatus, $id);

        if ($data['query'] > 0) {
            redirect($redirSuccess);
        } else {
            redirect($redirFailed);
        }
    }

    public function editGame() {
        if ($this->input->get('id', TRUE)) {
            if (!empty($this->input->get('id', TRUE))) {
                $data['gameId'] = $this->Game_Model->gameById($this->input->get('id', TRUE));
                $this->load->view('Edit_Game', $data);
            }
        }
    }

    public function promoGame() {
        $id = $this->input->get('id', TRUE);
        if ($this->input->get('promo', TRUE) == 'add') {
            $status = 3;
            $redirSuccess = 'listgamepromo?msg=Game status successfuly updated';
            $redirFailed = 'listgamepromo?msg=Game status failed updated';
        } elseif ($this->input->get('promo', TRUE) == 'delete') {
            $status = 2;
            $redirSuccess = 'listgameactive?msg=Game status successfuly updated';
            $redirFailed = 'listgameactive?msg=Game status failed updated';
        } else {
            $status = 1;
        }

        // cek curent promo
        $promoGame = $this->Game_Model->gamePromo(3);
        if (count($promoGame) > 0) {
            $idGameOnPromo = $promoGame[0]->id_game;
            $changeCurentPromoStat = $this->Game_Model->changeCostStatus(2, $idGameOnPromo);
            if ($changeCurentPromoStat > 0) {
                redirect($redirSuccess);
            } else {
                redirect($redirFailed);
            }
        } else {
            $promoStat = $this->Game_Model->changeCostStatus($status, $id);
            if ($promoStat > 0) {
                redirect($redirSuccess);
            } else {
                redirect($redirFailed);
            }
        }
    }

}
