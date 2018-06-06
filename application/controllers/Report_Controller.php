<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Category_Model');
        $this->load->model('Sms_Model');
        $this->load->model('Report_Model');

        $this->checkSessLogin();
    }

    public function checkSessLogin() {
        $checkLoginSession = $this->session->userdata('id_admin');
        if ($checkLoginSession == NULL) {
            redirect('logout');
        } else {
            $checkLoginLevel = $this->session->userdata('level');
            if ($checkLoginLevel != 1) {
                redirect('dashboard');
            }
        }
    }

    public function allReport() {

        $urlKey = $this->input->get();
        if (isset($urlKey)) {
            if (empty($urlKey)) {
                $data['subscriberWeekly'] = $this->Sms_Model->subscriberAll('weekly');
                $data['subscriberMonthly'] = $this->Sms_Model->subscriberAll('monthly');
                //echo '1';
            } else {
                foreach ($urlKey as $key => $value) {
                    if ($key == 'd') {
                        switch ($value) {
                            case '1':
                                $data['subscriberWeekly'] = $this->Sms_Model->subscriberAll('weekly');
                                $data['subscriberMonthly'] = $this->Sms_Model->subscriberAll('monthly');
                                //echo '2';
                                break;
                            case '2':
                                $data['subscriberWeekly'] = $this->Sms_Model->subscribeToday('weekly');
                                $data['subscriberMonthly'] = $this->Sms_Model->subscribeToday('monthly');
                                //echo '3';
                                break;
                            case '3':
                                $data['subscriberWeekly'] = $this->Sms_Model->subscribeYesterday('weekly');
                                $data['subscriberMonthly'] = $this->Sms_Model->subscribeYesterday('monthly');
                                //echo '4';
                                break;
                            case '4':
                                $data['subscriberWeekly'] = $this->Sms_Model->subscribeWeek('weekly');
                                $data['subscriberMonthly'] = $this->Sms_Model->subscribeWeek('monthly');
                                //echo '5';
                                break;
                            case '5':
                                $data['subscriberWeekly'] = $this->Sms_Model->subscribeMonth('weekly');
                                $data['subscriberMonthly'] = $this->Sms_Model->subscribeMonth('monthly');
                                //echo '6';
                                break;
                            default:
                                $data['subscriberWeekly'] = $this->Sms_Model->subscriberAll('weekly');
                                $data['subscriberMonthly'] = $this->Sms_Model->subscriberAll('monthly');
                            //echo '7';
                        }
                    } else {
                        $data['subscriberWeekly'] = $this->Sms_Model->subscriberAll('weekly');
                        $data['subscriberMonthly'] = $this->Sms_Model->subscriberAll('monthly');
                        //echo '8';
                    }
                }
            }
        } else {
            $data['subscriberWeekly'] = $this->Sms_Model->subscriberAll('weekly');
            $data['subscriberMonthly'] = $this->Sms_Model->subscriberAll('monthly');
            //echo '9';
        }

        $this->load->view('All_Report', $data);
    }

    public function dailyReport() {
        $urlKey = $this->input->get();
        if (isset($urlKey)) {
            if (empty($urlKey)) {
                $data['report'] = $this->Report_Model->reportViewAll();
            } else {
                if (empty($urlKey['s']) || empty($urlKey['e'])) {
                    $data['report'] = $this->Report_Model->reportViewAll();
                } else {
                    $sDateExp = explode('-', $urlKey['s']);
                    $sDate = $sDateExp[2] . '-' . $sDateExp[1] . '-' . $sDateExp[0]; // yyyy-mm-dd
                    $sDateCheck = checkdate($sDateExp[1], $sDateExp[0], $sDateExp[2]); // True or False $month, $day, $year


                    $eDateExp = explode('-', $urlKey['e']);
                    $eDate = $eDateExp[2] . '-' . $eDateExp[1] . '-' . $eDateExp[0]; // yyyy-mm-dd
                    $eDateCheck = checkdate($eDateExp[1], $eDateExp[0], $eDateExp[2]); // True or False $month, $day, $year

                    if ($sDateCheck == TRUE || $eDateCheck == TRUE) { 

                        $selisih = intval((strtotime($eDate) - strtotime($sDate)) / (60 * 60 * 24));
                        if ($selisih >= 0) {
                            //Valid Number
                            $data['report'] = $this->Report_Model->reportViewByDate($sDate, $eDate);
                        } else {
                            //Invalid Number
                            $data['report'] = $this->Report_Model->reportViewAll();
                        }
                    } else {
                        $data['report'] = $this->Report_Model->reportViewAll();
                    }
                }
            }
        } else {
            $data['report'] = $this->Report_Model->reportViewAll();
        }

        $this->load->view('Daily_Report', $data);
    }

}
