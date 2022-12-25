<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Autentifikasi extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('no_plat')) {
            redirect('member');
        }
        $this->form_validation->set_rules('no_plat', 'Plat nomor', 'required|trim', [
            'required' => 'Plat nomor Harus diisi!!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';
            $this->load->view('templates/header', $data);
            $this->load->view('aute/login', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $no_plat = $this->input->post('no_plat', true);
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['no_plat' => $no_plat])->row_array();
        //jika usernya ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'no_plat' => $user['no_plat'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('member');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Salah !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Plat Nomor Tidak Terdaftar!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('autentifikasi');
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('no_plat')) {
            redirect('user');
        }
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Belum diisi!!'
            ]
        );
        $this->form_validation->set_rules(
            'no_plat',
            'Alamat no_plat',
            'required|trim|is_unique[user.no_plat]',
            [
                'valid_no_plat' => 'no_plat Tidak Benar!!',
                'required' => 'no_plat Belum diisi!!',
                'is_unique' => 'no_plat Sudah Terdaftar!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('templates/header', $data);
            $this->load->view('aute/registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_plat' => htmlspecialchars($this->input->post('no_plat', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'tanggal_input' => time()
            ];
            $this->ModelUser->simpanData($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('autentifikasi');
        }
    }

    public function ubah_password()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->ModelUser->userWhere(['id' => $this->uri->segment(3)])->result_array();
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('role_id') == '1') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('formGantiPassword', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->load->view('templates/member_header', $data);
                $this->load->view('templates/member_sidebar', $data);
                $this->load->view('formGantiPassword', $data);
                $this->load->view('templates/member_footer', $data);
            }
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'no_plat' => $this->input->post('no_plat', true),
                'image' => $this->input->post('image', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'tanggal_input' => $this->input->post('tanggal_input', true)
            ];
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Diubah !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            $this->ModelUser->update_data($data, ['id' => $this->input->post('id')]);
            $this->session->unset_userdata('no_plat');
            $this->session->unset_userdata('role_id');
            redirect('autentifikasi');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('no_plat');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda Telah Logout !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('autentifikasi');
    }
}
