<?php
class TestimonialsList extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = 'themes/cms';
    }

    public function getTestimonialsList()
    {
        $this->data['query'] = $this->admin_model->table_fetch_rows('testimonials');
        $this->template = 'cms/testimonials/list/list';
    }
}
?>