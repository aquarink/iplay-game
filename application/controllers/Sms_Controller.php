<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->model('Sms_Model');
        $this->load->model('Report_Model');
        $this->load->model('Game_Model');
    }

    public function index() {
        $this->load->view('Sms_Landing');
    }

    public function loginSms() {
        $phoneNumber = strtolower($this->input->post('phonenumber'));
        $pin = strtolower($this->input->post('pin'));
        $gameUrl = $this->input->post('gameUrl');

        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('pin', 'Pin', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Play?g=' . $gameUrl);
        } else {
            $data['query'] = $this->Sms_Model->pinCheck($pin, $phoneNumber);

            if (count($data['query']) > 0) {
                // Jika daile gameUrl akan di alihkan ke game promo
                foreach ($data['query'] as $val) {
                    if ($val->type == 'daily') {
                        $game = $this->Game_Model->gameCost();
                        foreach ($game as $value) {
                            $gameUrl = $value->id_game . '@' . $value->game_rename;

                            $_SESSION['d'] = $data['query'][0]->pin_request_date;
                            $this->session->set_userdata('type', $data['query'][0]->type);
                            $this->session->set_userdata('requestDate', $data['query'][0]->pin_request_date);
                            $this->session->set_userdata('token', $data['query'][0]->token);
                            $this->session->set_userdata('pin', $data['query'][0]->pin);
                            redirect('play?g=' . $gameUrl);
                        }
                    } else {
                        $_SESSION['d'] = $data['query'][0]->pin_request_date;
                        $this->session->set_userdata('type', $data['query'][0]->type);
                        $this->session->set_userdata('requestDate', $data['query'][0]->pin_request_date);
                        $this->session->set_userdata('token', $data['query'][0]->token);
                        $this->session->set_userdata('pin', $data['query'][0]->pin);
                        redirect('play?g=' . $gameUrl);
                    }
                }
            } else {
                redirect('play');
            }
        }
    }

    public function loginSmsByLink() {
        foreach ($this->input->get() as $val) {
            $explodeVal = explode('|', $val);

            $phoneNumber = $explodeVal[0];
            $pin = $explodeVal[1];
            $gameUrl = $explodeVal[2];

            if (empty($phoneNumber) || empty($pin) || empty($gameUrl)) {
                redirect('welcome');
            } else {
                $data['query'] = $this->Sms_Model->pinCheck($pin, $phoneNumber);

                if (count($data['query']) > 0) {
                    // Jika daile gameUrl akan di alihkan ke game promo
                    foreach ($data['query'] as $val) {
                        if ($val->type == 'daily') {
                            $game = $this->Game_Model->gameCost();
                            foreach ($game as $value) {
                                $gameUrl = $value->id_game . '@' . $value->game_rename;

                                $_SESSION['d'] = $data['query'][0]->pin_request_date;
                                $this->session->set_userdata('type', $data['query'][0]->type);
                                $this->session->set_userdata('requestDate', $data['query'][0]->pin_request_date);
                                $this->session->set_userdata('token', $data['query'][0]->token);
                                $this->session->set_userdata('pin', $data['query'][0]->pin);
                                redirect('play?g=' . $gameUrl);
                            }
                        } else {
                            $_SESSION['d'] = $data['query'][0]->pin_request_date;
                            $this->session->set_userdata('type', $data['query'][0]->type);
                            $this->session->set_userdata('requestDate', $data['query'][0]->pin_request_date);
                            $this->session->set_userdata('token', $data['query'][0]->token);
                            $this->session->set_userdata('pin', $data['query'][0]->pin);
                            redirect('play?g=' . $gameUrl);
                        }
                    }
                } else {
                    redirect('play');
                }
            }
        }
    }

    public function logoutSms() {
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('requestDate');
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('pin');
        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function logoutSms_() {
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function incoming() {
        $whiteListIp = '192.168.1.105';
        //$whiteListIp = '::1';
        if ($this->input->ip_address() != $whiteListIp) {
            $urlKey = $this->input->get();
            if (isset($urlKey)) {
                if (empty($urlKey)) {
                    echo 'MSISDN or Subscribe Type Missing 1';
                } else {
                    $get['msisdn'] = $urlKey['msisdn'];
                    $get['type'] = $urlKey['type'];


                    if (!empty($get)) {
                        $request_by = $get['msisdn'];
                        $pin = rand(100000, substr(intval($request_by), -6));
                        $pin_request_date = date('Y-m-d');
                        $type = $get['type'];
                        $token = md5($get['msisdn']);
                        $status_pin = 1;

                        if ($type == 'daily') {
                            $cost = 100;

                            /////
                            $game = $this->Game_Model->gameCost();
                            $promoLink = 'http://[::1]/villagech/loginsmslink?q=' . $request_by . '|' . $pin . '|' . $game[0]->id_game . '@' . $game[0]->game_rename;
                            /////

                            $validPin = date('Y-m-d', strtotime('+1 days', strtotime($pin_request_date)));
                            $data['query'] = $this->Sms_Model->addSmsRequestPin($pin, $request_by, $pin_request_date, $validPin, $type, $cost, $token, $status_pin);
                            if ($data['query'] > 0) {

                                $checkDate = $this->Report_Model->reportCheck($pin_request_date);
                                if (count($checkDate) > 0) {

                                    foreach ($checkDate as $value) {
                                        if ($value->type == 'daily') {
                                            $newVal[] = $value;
                                        }
                                    }
                                    $newCount = count($newVal);

                                    $checkExistValue = $this->Report_Model->reportExistCheck($pin_request_date);

                                    if (count($checkExistValue) > 0) {
                                        $updateReport = $this->Report_Model->updateSubDaily($pin_request_date, $newCount, $cost);
                                        if ($updateReport > 0) {

                                            $url = 'http://api.bitly.com/v3/shorten?login=mobiwin&apiKey=R_5fe21d7da0d84f89942bd2c44a30a456&longUrl=' . $promoLink;
                                            $ch = curl_init($url);

                                            if ($ch == FALSE) {
                                                return array('error' => "failed");
                                            } else {
                                                curl_setopt($ch, CURLOPT_URL, $url);
                                                curl_setopt($ch, CURLOPT_HEADER, 0);
                                                curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
                                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                curl_setopt($ch, CURLOPT_VERBOSE, 0);

                                                $result = curl_exec($ch);
                                                $urlGame = json_decode($result)->data->url;
                                                echo 'pin=' . $pin . '|msisdn=' . $request_by . '|valid=' . $validPin . '|url-promo=' . $urlGame;
                                            }
                                        } else {
                                            echo 'Error Query Update Sub Daily';
                                        }
                                    } else {
                                        // daily,weekly,monthly,cost_daily,cost_weekly,cost_monthly,date_cr_report
                                        $addReport = $this->Report_Model->addReport($newCount, '', '', $cost, '', '', $pin_request_date);
                                        if ($addReport > 0) {
                                            echo 'pin=' . $pin . '|msisdn=' . $request_by . '|valid=' . $validPin . '|url-promo=' . $urlGame;
                                        } else {
                                            echo 'Error Query Add Report daily';
                                        }
                                    }
                                }
                            } else {
                                echo 'Error Query Add Sms Request Pin daily';
                            }
                        } elseif ($type == 'weekly') {
                            $cost = 611;
                            $validPin = date('Y-m-d', strtotime('+7 days', strtotime($pin_request_date)));
                            $data['query'] = $this->Sms_Model->addSmsRequestPin($pin, $request_by, $pin_request_date, $validPin, $type, $cost, $token, $status_pin);
                            if ($data['query'] > 0) {
                                $checkDate = $this->Report_Model->reportCheck($pin_request_date);
                                if (count($checkDate) > 0) {

                                    foreach ($checkDate as $value) {
                                        if ($value->type == 'weekly') {
                                            $newVal[] = $value;
                                        }
                                    }
                                    $newCount = count($newVal);

                                    $checkExistValue = $this->Report_Model->reportExistCheck($pin_request_date);

                                    if (count($checkExistValue) > 0) {
                                        $updateReport = $this->Report_Model->updateSubWeekly($pin_request_date, $newCount, $cost);
                                        if ($updateReport > 0) {
                                            echo 'pin=' . $pin . '|missdn=' . $request_by . '|valid=' . $validPin;
                                        } else {
                                            echo 'Error Query Update Sub Weekly';
                                        }
                                    } else {
                                        // daily,weekly,monthly,cost_daily,cost_weekly,cost_monthly,date_cr_report
                                        $addReport = $this->Report_Model->addReport('', $newCount, '', '', $cost, '', $pin_request_date);
                                        if ($addReport > 0) {
                                            echo 'pin=' . $pin . '|missdn=' . $request_by . '|valid=' . $validPin;
                                        } else {
                                            echo 'Error Query Add Report weekly';
                                        }
                                    }
                                }
                            } else {
                                echo 'Error Query Add Sms Request Pin weekly';
                            }
                        } elseif ($type == 'monthly') {
                            $cost = 2000;
                            $validPin = date('Y-m-d', strtotime('+1 month', strtotime($pin_request_date)));
                            $data['query'] = $this->Sms_Model->addSmsRequestPin($pin, $request_by, $pin_request_date, $validPin, $type, $cost, $token, $status_pin);
                            if ($data['query'] > 0) {
                                $checkDate = $this->Report_Model->reportCheck($pin_request_date);
                                if (count($checkDate) > 0) {

                                    foreach ($checkDate as $value) {
                                        if ($value->type == 'monthly') {
                                            $newVal[] = $value;
                                        }
                                    }
                                    $newCount = count($newVal);
                                    $checkExistValue = $this->Report_Model->reportExistCheck($pin_request_date);

                                    if (count($checkExistValue) > 0) {
                                        $updateReport = $this->Report_Model->updateSubMonthly($pin_request_date, $newCount, $cost);
                                        if ($updateReport > 0) {
                                            echo 'pin=' . $pin . '|missdn=' . $request_by . '|valid=' . $validPin;
                                        } else {
                                            echo 'Error Query Update Sub Monthly';
                                        }
                                    } else {
                                        // daily,weekly,monthly,cost_daily,cost_weekly,cost_monthly,date_cr_report
                                        $addReport = $this->Report_Model->addReport('', '', $newCount, '', '', $cost, $pin_request_date);
                                        if ($addReport > 0) {
                                            echo 'pin=' . $pin . '|missdn=' . $request_by . '|valid=' . $validPin;
                                        } else {
                                            echo 'Error Query Add Report monthly';
                                        }
                                    }
                                }
                            } else {
                                echo 'Error Query Add Sms Request Pin monthly';
                            }
                        } else {
                            echo 'Subscribe Type Missing 2';
                        }
                    } else {
                        echo 'MSISDN or Subscribe Type Missing 2';
                    }
                }
            } else {
                echo 'MSISDN or Subscribe Type Missing 3';
            }
        } else {
            echo 'You not be able to reach';
        }
    }

}

?>