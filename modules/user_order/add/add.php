<?php
class User_orderAdd extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

            $this->layout = 'themes/user';
    }

    public function getUser_orderAdd()
    {
        $id = $this->uri->segment(4);
        if ($id != NULL) {
            $this->data['val'] = $id;
        }
        $this->template = 'user/user_order/add/add';
    }

    public function postUser_orderAdd()
    {
        $this->template = 'user/user_order/add/add';
        if (isset( $_POST['place_order'])){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('patient', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('disease', 'Prescription', 'trim|required|xss_clean');
            if($this->input->post('reoccuring_order')){
                $this->form_validation->set_rules('reoccuring_interval', 'Reoccuring Interval', 'trim|required|xss_clean');
            }

            $session_data = $this->session->userdata('login');
            $id = $session_data->id;

            if ($this->form_validation->run() == FALSE) {
                $this->data['error'] = $this->form_validation->error_string();
            } else {
                $data = array(
                    'patient' => $this->input->post("patient"),
                    'parent_id' => $id,
                    'disease' => $this->input->post("disease"),
                    'date' => date('Y-m-d'),
                    'status' => '1',
                );
                $reoccuring_order = $this->input->post('reoccuring_order');
                if ($reoccuring_order == 1) {
                    $data['reoccuring_order'] = $reoccuring_order;
                    $data['reoccuring_interval'] = $this->input->post('reoccuring_interval');
                    if ($this->input->post('notify') == 1) {
                        $data['notify'] = $this->input->post('notify');
                    } else {
                        $data['notify'] = '0';
                    }
                    if ($this->input->post('place_automatic') == 1) {
                        $data['place_automatic'] = $this->input->post('place_automatic');
                    } else {
                        $data['place_automatic'] = '0';
                    }
                } else {
                    $data['reoccuring_order'] = '0';
                    $data['reoccuring_interval'] = '0';
                    $data['notify'] = '0';
                    $data['place_automatic'] = '0';
                }

                if ($this->db->insert('order', $data)) {
                    $order_id = $this->db->insert_id();
                    $order_history = array('patient_id'=>$this->input->post('patient'),'order_id'=>$order_id,'order_date'=>date('Y-m-d'));
                    $this->db->insert('order_history',$order_history);
                    $this->data['message'] = 'Saved Successfully!!!';
                } else {
                    $this->data['error'] = 'Sorry,The data could not be saved';
                }
            }
        }elseif( isset( $_POST['pres_add'] ) ) {
            $config['upload_path'] = './uploads/prescription/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|txt';


            if ($this->session->userdata('login')) {
                $data = array('parent_id' => $this->input->post('parent_id'),
                    'patient' => $this->input->post("name"),
                    'age' => $this->input->post("age"),
                    'location' => $this->input->post("location"),
                    'phone_no' => $this->input->post("phone_no"),
                    'email' => $this->input->post("email"));
            } else {
                $data = array(
                    'patient' => $this->input->post("patient"),
                    'age' => $this->input->post("patient_age"),
                    'location' => $this->input->post("patient_location"),
                    'phone_no' => $this->input->post("patient_phone"),
                    'email' => $this->input->post("patient_email")
                );
            }
            if(!$this->input->post('own_id')){
                $this->db->insert('patient',$data);
            }$last_id = $this->db->insert_id();

            if (($last_id != NULL) || ($this->input->post('own_id'))){
                $prescription_data = array(
                    'medicine' => implode(';', $this->input->post("medicine")),
                    'quantity' => implode(';', $this->input->post("quantity")),
                    'disease' => $this->input->post("disease"),
                    'prescribed_by' => $this->input->post("doctor"),
                    'hospital_name' => $this->input->post("hospital"),
                    'dose' => implode(';', $this->input->post("dose"))
                );
                if ($this->input->post('own_id')) {
                    $prescription_data['patient'] = $this->input->post('own_id');
                } else {
                    $prescription_data['patient'] = $last_id;
                }

                if ($this->db->insert('prescribed_medicine', $prescription_data)) {
                    if (!file_exists(ROOTDIR . '/uploads/prescription/') && !is_dir(ROOTDIR . '/uploads/prescription/')) {
                        mkdir(ROOTDIR . '/uploads/prescription/', 755);
                    }
                    $pres_med_id = $this->db->insert_id();
                    if ($this->input->post('own_id')) {
                        $config['file_name'] = $this->input->post('own_id');
                    }else{
                        $config['file_name'] = $last_id;
                    }
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('userfile');
                    $data = array('upload_data' => $this->upload->data());
                    $file_name = array('prescription' => $data['upload_data']['file_name']);
                    $this->db->where('id', $pres_med_id);
                    $this->db->update('prescribed_medicine', $file_name);

                }
                $this->data['message'] = 'Added Successfully, You can place order now.';
            } else {
                $this->data['message'] = 'Sorry,The data could not be saved';
            }
        }

    }

}
?>