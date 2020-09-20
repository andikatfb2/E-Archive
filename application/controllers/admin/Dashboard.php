<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/dashboard_model');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_security_groups'), 'admin/dashboard');
    }


	public function index() {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {   /* Title Page */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Data */
            // $this->data['count_tm_user']       = $this->dashboard_model->get_count_record('tm_user');
            // $this->data['count_groups']      = $this->dashboard_model->get_count_record('groups');
            // $this->data['disk_totalspace']   = $this->dashboard_model->disk_totalspace(DIRECTORY_SEPARATOR);
            // $this->data['disk_freespace']    = $this->dashboard_model->disk_freespace(DIRECTORY_SEPARATOR);
            // $this->data['disk_usespace']     = $this->data['disk_totalspace'] - $this->data['disk_freespace'];
            // $this->data['disk_usepercent']   = $this->dashboard_model->disk_usepercent(DIRECTORY_SEPARATOR, FALSE);
            // $this->data['memory_usage']      = $this->dashboard_model->memory_usage();
            // $this->data['memory_peak_usage'] = $this->dashboard_model->memory_peak_usage(TRUE);
            // $this->data['memory_usepercent'] = $this->dashboard_model->memory_usepercent(TRUE, FALSE);

            $query = 'SELECT d.divisi_name,f.tahun,j.jenis_name,f.file_name,f.file_number,f.file_upload file_path,f.file_id FROM tm_file_uploads f
                            LEFT JOIN tr_jenis j ON f.jenis_id = j.jenis_id 
                            LEFT JOIN tr_divisi d ON d.divisi_id = f.divisi_id 
                            WHERE d.divisi_name LIKE "%'.$this->input->post('divisi').'%" AND 
                            j.jenis_name LIKE "%'.$this->input->post('jenis').'%" AND 
                            f.tahun LIKE "%'.$this->input->post('tahun').'%" AND (
                            file_name LIKE "%'.$this->input->post('nama_nomor').'%" OR 
                            file_number LIKE "%'.$this->input->post('nama_nomor').'%") ORDER BY f.file_id DESC LIMIT 20';
              $this->data['tm_file_uploads'] = $this->db->query($query)->result();
            /* Load Template */
            $this->template->admin_render('admin/dashboard/index', $this->data);
        }
	}

    public function create() {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
             $this->data['error'] = '';
             $this->breadcrumbs->unshift(2, lang('menu_dashboard_create'), 'admin/dashboard/create');
             $this->data['breadcrumb'] = $this->breadcrumbs->show();
             /* Breadcrumbs */

             $this->data['tr_divisi'] = $this->db->query("select * from tr_divisi")->result();
             $this->data['tr_jenis'] = $this->db->query("select * from tr_jenis")->result();

             $this->template->admin_render('admin/dashboard/create', $this->data);
         }
    }

    public function store() {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');

        } else {
            $this->breadcrumbs->unshift(2, lang('menu_dashboard_create'), 'admin/dashboard/create');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            // print_r($this->input->post());
            $divisi        = $this->input->post('divisi');
            $jenis         = $this->input->post('jenis');
            $tahun         = $this->input->post('tahun');
            $nama          = $this->input->post('nama');
            $nomor         = $this->input->post('nomor');
            $date          = date('d-m-Y');

            $this->data['tr_divisi'] = $this->db->query("SELECT divisi_name FROM tr_divisi WHERE divisi_id =".$divisi)->result();
            $this->data['tr_jenis'] = $this->db->query("SELECT jenis_name FROM tr_jenis WHERE jenis_id =".$jenis)->result();

            /* Conf */
            $config['upload_path']      = './upload/'.$this->data['tr_divisi'][0]->divisi_name.'/'.$this->data['tr_jenis'][0]->jenis_name.'/'.$tahun.'/';
            $config['allowed_types']    = 'gif|jpg|png|pdf|docs|xlsx';
            $config['max_size']         = 102400;
            $config['file_ext_tolower'] = TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file_path')) {
                $this->data['error'] = $this->upload->display_errors();
                $this->data['tr_divisi'] = $this->db->query("select * from tr_divisi")->result();
                $this->data['tr_jenis'] = $this->db->query("select * from tr_jenis")->result();

                $this->template->admin_render('admin/dashboard/create', $this->data);
            } else {
                 $data = array(
                    'file_id' => '',
                    'user_name' => 'admin',
                    'divisi_id' => $divisi,
                    'jenis_id' => $jenis,
                    'tahun' => $tahun,
                    'file_name' => $nama,
                    'file_number' => $nomor,
                    'file_path' => $this->upload->data('file_path'),
                    'create_date' => $date,
                    'file_upload' => $this->upload->data('file_name')
                );

                $this->db->insert('tm_file_uploads',$data);
                redirect('admin/dashboard', 'refresh');
            }
        }
    }

    public function see($id) {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');

        } else {
             $this->breadcrumbs->unshift(2, lang('menu_dashboard_create'), 'admin/dashboard/create');
             $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['tm_file_uploads'] = $this->db->query("select file_path,file_upload from tm_file_uploads where file_id=".$id)->result();
            $filename = $this->data['tm_file_uploads'][0]->file_upload;
            $path =   $this->data['tm_file_uploads'][0]->file_path;
            $download_file =  $path.$filename;

            if(!empty($filename)){
                // Check file is exists on given path.
                if(file_exists($download_file))
                {
                  header('Content-Disposition: attachment; filename=' . $filename);  
                  readfile($download_file); 
                  exit;
                }
                else
                {
                  echo 'File does not exists on given path';
                }
             }
        }
    }

    public function delete ($id) {
        if ( ! $this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');

        } else {
            $this->breadcrumbs->unshift(2, lang('menu_dashboard_create'), 'admin/dashboard/create');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['tm_file_uploads'] = $this->db->query("select file_path,file_upload from tm_file_uploads where file_id=".$id)->result();
            $filename = $this->data['tm_file_uploads'][0]->file_upload;
            $path =   $this->data['tm_file_uploads'][0]->file_path;
            $file =  $path.$filename;

            if (!unlink($file)) echo ("Error deleting $file");
            else {
                $this->db->where('file_id',$id);
                $this->db->delete('tm_file_uploads');
            }


         redirect('admin/dashboard', 'refresh');
        }
    }
    
}
