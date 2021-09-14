<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komik extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Komik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['komik'] = $this->db->get('komik')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('komik/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahKomik()
    {
        $data['title'] = 'Tambah Komik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('komik/tambah-komik', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul')),
                'penulis' => htmlspecialchars($this->input->post('penulis')),
                'penerbit' => htmlspecialchars($this->input->post('penerbit')),
                'sampul' => $_FILES['image']['name']
            ];

            // cek jika ada gambar yang diupload 
            if ($data['sampul']) {
                $config['upload_path']          = './assets/img/komik/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $data = [
                        'judul' => htmlspecialchars($this->input->post('judul')),
                        'penulis' => htmlspecialchars($this->input->post('penulis')),
                        'penerbit' => htmlspecialchars($this->input->post('penerbit')),
                        'sampul' => $new_image
                    ];
                    $this->db->insert('komik', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    New komik added
                    </div>');
                    redirect('komik');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $defaultImage = 'default.jpg';
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul')),
                    'penulis' => htmlspecialchars($this->input->post('penulis')),
                    'penerbit' => htmlspecialchars($this->input->post('penerbit')),
                    'sampul' => $defaultImage
                ];
                $this->db->insert('komik', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New komik added
                </div>');
                redirect('komik');
            }
        }
    }

    public function detailKomik($id)
    {
        $data['title'] = 'Detail Komik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['komik'] = $this->db->get_where('komik', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('komik/detail-komik', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editKomik($id)
    {
        $data['title'] = 'Edit Komik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['komik'] = $this->db->get_where('komik', ['id' => $id])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('komik/edit-komik', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/komik';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['komik']['sampul'];
                    $sampul = $this->upload->data('file_name');
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'penulis' => $this->input->post('penulis'),
                        'penerbit' => $this->input->post('penerbit'),
                        'sampul' => $sampul
                    ];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/komik/' . $old_image);
                    }
                    $this->db->where('id', $id);
                    $this->db->update('komik', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Komik has been updated!
                    </div>');
                    redirect('komik');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'penulis' => $this->input->post('penulis'),
                    'penerbit' => $this->input->post('penerbit'),
                ];
                $this->db->where('id', $id);
                $this->db->update('komik', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Komik has been updated!
                </div>');
                redirect('komik');
            }
        }
    }

    public function deleteKomik($id)
    {
        $this->db->delete('komik', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Komik has been deleted!
        </div>');
        redirect('komik');
    }
}
