<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->model('Category_Model');
        $this->load->library('pagination');
        $this->load->model('Game_Model');
        $this->load->model('Visitor_Model');
        $this->load->model('Contact_Model');
    }

    public function oooindex() {
        $data['categoryName'] = $this->Category_Model->categoryDis();
        $urlKey = $this->input->get();

        if (isset($urlKey)) {
            if (empty($urlKey)) {
                $data['gameActive'] = $this->Game_Model->gameByStatus(1);
            } else {
                foreach ($urlKey as $key => $value) {
                    if ($key == 's') {
                        $data['gameActive'] = $this->Game_Model->gameBySearch($value, 1);
                    } elseif ($key == 'g') {
                        $urlExplode = explode('@', $value);
                        $categoryId = $urlExplode[0];
                        $categoryUniqueName = $urlExplode[1];

                        $data['query'] = $this->Category_Model->categoryByUniq($categoryId, $categoryUniqueName);

                        if (count($data['query']) > 0) {
                            $data['gameActive'] = $this->Game_Model->gameByCategory($categoryId, 1);
                        } else {
                            $data['gameActive'] = $this->Game_Model->gameByStatus(1);
                        }
                    } else {
                        $data['gameActive'] = $this->Game_Model->gameByStatus(1);
                    }
                }
            }
        } else {
            $data['gameActive'] = $this->Game_Model->gameByStatus(1);
        }
        $this->load->view('Landing', $data);
    }

    public function gamesShow() {
        $this->load->library('session');
        $ip = $this->input->ip_address();


        $data['categoryName'] = $this->Category_Model->categoryDis();

        $getUrl = $this->input->get('g', TRUE);
        if (isset($getUrl)) {
            if (!empty($this->input->get('g', TRUE))) {
                $urlExplode = explode('@', $getUrl);
                $gameId = $urlExplode[0];
                $gameUniqueName = $urlExplode[1];

                $data['query'] = $this->Game_Model->gameByUniq($gameId, $gameUniqueName);

                if (count($data['query']) > 0) {
                    if ($data['query'][0]->game_cost == 1) {
                        $data['hitCounter1'] = $this->Visitor_Model->addHitVisitor($ip, $gameId);
                        if (count($data['hitCounter1']) > 0) {

                            $type = $this->session->userdata('type');

                            if ($type == 'daily') {
                                $duration = 1;
                            } elseif ($type == 'weekly') {
                                $duration = 7;
                            } elseif ($type == 'monthly') {
                                $duration = 30;
                            } else {
                                $duration = 0;
                            }

                            $requestDate = $this->session->userdata('requestDate');
                            $dateNow = date('Y-m-d');
                            $selisih = intval(((abs(strtotime($requestDate) - strtotime($dateNow))) / (60 * 60 * 24)));

                            if ($selisih >= $duration) {
                                $this->session->unset_userdata('type');
                                $this->session->unset_userdata('requestDate');
                                $this->session->unset_userdata('token');
                                $this->session->unset_userdata('pin');
                                $this->session->sess_destroy();

                                $data['gameOn'] '
                                <input name="phonenumber" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="text" placeholder="No.Handphone" />
                                <input name="pin" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="password" placeholder="Password" />
                                <input type="hidden" name="gameUrl" value="' . $getUrl . '">
                                <input style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #FFC512; color: #FFF; border-radius: 3px; border: 4px solid #999; font-size: 100%;" type="submit" value="Play Game"/>';
                            } else {
                                $data['gameOn'] = '<iframe id="GameOnIframe" src="'.base_url().'games-unzip/' . $data['query'][0]->game_rename . '" width="100%" height="520px"></iframe>';
                            }
                        } else {
                            echo 'Query Hit Counter Failed 1';
                        }
                    } elseif ($data['query'][0]->game_cost == 3) {
                        $data['hitCounter1'] = $this->Visitor_Model->addHitVisitor($ip, $gameId);
                        if (count($data['hitCounter1']) > 0) {

                            $type = $this->session->userdata('type');

                            if ($type == 'daily') {
                                $duration = 1;
                            } elseif ($type == 'weekly') {
                                $duration = 7;
                            } elseif ($type == 'monthly') {
                                $duration = 30;
                            } else {
                                $duration = 0;
                            }

                            $requestDate = $this->session->userdata('requestDate');
                            $dateNow = date('Y-m-d');
                            $selisih = intval(((abs(strtotime($requestDate) - strtotime($dateNow))) / (60 * 60 * 24)));

                            if ($selisih >= $duration) {
                                $this->session->unset_userdata('type');
                                $this->session->unset_userdata('requestDate');
                                $this->session->unset_userdata('token');
                                $this->session->unset_userdata('pin');
                                $this->session->sess_destroy();

                                $data['gameOn'] '
                                <input name="phonenumber" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="text" placeholder="No.Handphone" />
                                <input name="pin" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="password" placeholder="Password" />
                                <input type="hidden" name="gameUrl" value="' . $getUrl . '">
                                <input style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #FFC512; color: #FFF; border-radius: 3px; border: 4px solid #999; font-size: 100%;" type="submit" value="Play Game"/>';
                            } else {
                                $game = $this->Game_Model->gameCost();
                                $data['gameOn'] = '<iframe id="GameOnIframe" src="'.base_url().'games-unzip/' . $game[0]->game_rename . '" width="100%" height="520px"></iframe>';
                            }
                        } else {
                            echo 'Query Hit Counter Failed 1';
                        }
                    } else {
                        $checkTypeSession = $this->session->userdata('type');
                        if ($checkTypeSession == 'daily') {
                            $data['gameOn'] '
                                <input name="phonenumber" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="text" placeholder="No.Handphone" />
                                <input name="pin" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="password" placeholder="Password" />
                                  <input type="hidden" name="gameUrl" value="' . $getUrl . '">
                                <input style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #FFC512; color: #FFF; border-radius: 3px; border: 4px solid #999; font-size: 100%;" type="submit" value="Play Game"/>';
                        } else {
                            $checkPinSession = $this->session->userdata('pin');
                            if ($checkPinSession == NULL) {
                                $data['gameOn'] '
                                <input name="phonenumber" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="text" placeholder="No.Handphone" />
                                <input name="pin" style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #fff; color: #000; border-radius: 3px; border: 3px solid #999; font-size: 100%;" type="password" placeholder="Password" />
                                <input type="hidden" name="gameUrl" value="' . $getUrl . '">
                                <input style="width: 150px; padding: 15px; cursor: pointer;  ; #999;  #999; font-weight: bold; background: #FFC512; color: #FFF; border-radius: 3px; border: 4px solid #999; font-size: 100%;" type="submit" value="Play Game"/>';
                            } else {

                                $data['hitCounter2'] = $this->Visitor_Model->addHitVisitor($ip, $gameId);
                                if (count($data['hitCounter2']) > 0) {
                                    $data['gameOn'] = '<iframe id="GameOnIframe" src="'.base_url().'games-unzip/' . $game[0]->game_rename . '" width="100%" height="520px"></iframe>';
                                } else {
                                    echo 'Query Hit Counter Failed 2';
                                }
                            }
                        }
                    }
                } else {
                    redirect('welcome');
                }

                $this->load->view('Play', $data);
            } else {
                redirect('welcome');
            }
        } else {
            redirect('welcome');
        }
    }

    public function index($page = 1) {
        $limit = 4;
        if (empty($this->input->get('p'))) {
            $page = 1;
        } else {
            $page = $this->input->get('p', true);
        }

        //$url = site_url('?');
        $result = $this->Game_Model->gamePage($limit, $page);

        $total = $this->Game_Model->gameTotal();


        //$config['base_url'] = "http://gamevillagech.com/";
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = true;
        $config['num_links'] = 5;
        // $config['full_tag_open'] = '<ul class="pagination" style="margin:0px">';
        // $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['first_tag_open'] = '<li>';
        // $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        // $config['prev_tag_open'] = '<li class="prev">';
        // $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li>';
        // $config['next_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li>';
        // $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<a class="on" href="">';
        $config['cur_tag_close'] = '</a>';
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        //menyiapkan data untuk dikirim ke view
        $data['result'] = $result;
        $data['pg'] = $pagination;

        $data['categoryName'] = $this->Category_Model->categoryDis();
        $urlKey = $this->input->get();

        if (isset($urlKey)) {
            if (empty($urlKey)) {
                $data['gameActive'] = $this->Game_Model->gameByStatus(1, $limit, $page);
            } else {
                foreach ($urlKey as $key => $value) {
                    if ($key == 's') {
                        $data['gameActive'] = $this->Game_Model->gameBySearch($value, 1, $limit, $page);
                    } elseif ($key == 'g') {
                        $urlExplode = explode('@', $value);
                        $categoryId = $urlExplode[0];
                        $categoryUniqueName = $urlExplode[1];

                        $data['query'] = $this->Category_Model->categoryByUniq($categoryId, $categoryUniqueName);

                        // Promo
                        if ($categoryId == 3 && $categoryUniqueName == 'promo') {
                            $data['gameActive'] = $this->Game_Model->gameByCost($categoryId, $limit, $page);
                            $data['paginatonHide'] = true;
                        } else {
                            if (count($data['query']) > 0) {
                                $data['gameActive'] = $this->Game_Model->gameByCategory($categoryId, 1, $limit, $page);
                            } else {
                                $data['gameActive'] = $this->Game_Model->gameByStatus(1, $limit, $page);
                            }
                        }
                    } else {
                        $data['gameActive'] = $this->Game_Model->gameByStatus(1, $limit, $page);
                    }
                }
            }
        } else {
            $data['gameActive'] = $this->Game_Model->gameByStatus(1, $limit, $page);
        }
        // echo "<pre>";
        // print_r($data);

        $this->load->view('inzpiregame/Landing', $data);
    }

    public function contact() {
        $data['categoryName'] = $this->Category_Model->categoryDis();
        $this->load->view('Contact', $data);
    }

    public function sendMessage() {
        $reason = strtolower($this->input->post('reason'));
        $email = strtolower($this->input->post('email'));
        $subject = strtolower($this->input->post('subject'));
        $message = $this->input->post('message');

        $this->form_validation->set_rules('reason', 'Rwason', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        $createDate = date('Y-m-d');

        if ($this->form_validation->run() == false) {
            $this->load->view('Contact');
        } else {

            $ci = get_instance();
            $ci->load->library('email');
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://mail.mobiwin.co.id";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "juri.pebrianto@mobiwin.co.id";
            $config['smtp_pass'] = "Juri@2017";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

            $ci->email->initialize($config);

            // Email to client
            $ci->email->from('it.project@mobiwin.co.id', ucfirst($reason));
            $ci->email->to($email);
            $this->email->reply_to('it.project@mobiwin.co.id', 'Web Developer');
            $ci->email->subject('Message about : ' . ucfirst($reason) . ' - ' . ucfirst($subject));
            $ci->email->message('Your message has been delivered to the addressee. Thanks you');

            if ($ci->email->send()) {
                // Email to developer
                $ci->email->from($email);
                $ci->email->to('it.project@mobiwin.co.id');
                $ci->email->subject(ucfirst($reason) . ' - ' . ucfirst($subject));
                $ci->email->message($message);
                $sendedDev = $ci->email->send();

                if ($sendedDev) {
                    $data['query'] = $this->Contact_Model->sendMessage($reason, $email, $subject, $message, $createDate, 1);
                    if ($data['query'] > 0) {
                        redirect('contact?msg=Message successfuly send');
                    } else {
                        redirect('contact?msg=Message failed to send');
                    }
                }
            }
        }
    }

}
