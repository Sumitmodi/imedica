<?php
class NewsEdit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getNewsEdit()
    {
        $id = $this->uri->segment(4);
        $this->data['query'] = $this->admin_model->table_fetch_row('news',array('id'=>$id));
        $this->template = 'cms/news/edit/edit';
    }

    public function postNewsEdit()
    {
        $id = $this->uri->segment(4);
        $this->template = 'cms/news/edit/edit';
        $config['upload_path']    = './uploads/news/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['overwrite'] = TRUE;

        $news = $this->db->where('id', $this->input->post('news_id'))->get('news')->result_object();
        $this->data['query'] = $news;

            $data = array(
                'Title' => $this->input->post("title"),
                'Date' => strtotime($this->input->post("date")),
                'Reporter' => $this->input->post("reporter"),
                'Source' => $this->input->post("source"),
                'Description' => $this->input->post("description"),
                'status' => $this->input->post("status"),
                'news_source' => $this->input->post("news_source"),
            );

        if (isset($_FILES['userfile']['tmp_name']) && !empty($_FILES['userfile']['tmp_name'])) {
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
            $this->upload->do_upload('userfile');
            $d = array('upload_data' => $this->upload->data());
            $file_name = array('img'=>$d['upload_data']['file_name']);
            $this->db->where('id',$id);
            $this->db->update('news',$file_name);
        }

            $this->db->where('id', $id);
            if ($this->db->update('news', $data)) {
                $str=seoURL($this->input->post("title"));
                $url = 'news/'.$str;
                if ($this->db->where('table_id !=', $id)->where('url', $url)->get('url_rewrite')->num_rows() > 0 ){
                    $url_array = array(
                        'url' => $url. '-1'
                    );
                }else{
                    $url_array = array(
                        'url' => $url
                    );
                }
                $this->db->where('table_id', $id);
                $this->db->where('table_name','news');
                $this->db->update('url_rewrite', $url_array);
                $this->session->set_flashdata('message', 'Updated successfully!!!');
                redirect('admin/news/list');
            } else {
                $this->session->set_flashdata('message', 'Update unsuccessful!!!');
            }

        }

}
?>