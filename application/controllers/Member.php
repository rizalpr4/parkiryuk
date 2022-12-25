<?php

class Member extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        if ($this->session->userdata('role_id') !== '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Autentifikasi');
        }
    }

    public function index()
    {

        $data['judul'] = "Halaman Penitip Motor";
        $id = $this->session->userdata('no_plat');
        $data['penitip'] = $this->db->query("SELECT * FROM tbl_masuk WHERE no_plat='$id'")->result();
        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_sidebar', $data);
        $this->load->view('member/dashboard', $data);
        $this->load->view('templates/member_footer');
    }

    public function keluar()
    {
        $data['judul'] = 'Parkir Keluar';
        $data['keluar'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE tgl_jam_keluar LIKE '" . date('Y-m-d') . "%' AND status_keluar LIKE '1'")->result_array();
        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_sidebar', $data);
        $this->load->view('member/parkirkeluar', $data, FALSE);
        $this->load->view('templates/member_footer');
    }
    public function kendaraankeluar($value = '')
    {
        $kode = str_replace("'", "", $this->input->post('karcis'));
        $sqlcek = $this->db->query("SELECT * FROM tbl_masuk WHERE kd_masuk LIKE '" . $kode . "'")->row_array();
        if ($sqlcek) {
            if ($sqlcek['status_masuk'] == '1') {
                $awal  = strtotime($sqlcek['tgl_masuk']); //waktu awal
                $akhir = strtotime(date('Y-m-d H:i:s')); //waktu akhir
                $diff  = $akhir - $awal;
                $jam   = floor($diff / (60 * 60));
                $menit = $diff - $jam * (60 * 60);
                $inap = 3000;
                $rumus = $jam - 15;
                //untuk steam
                if ($sqlcek['steam'] == 'Sudah') {
                    $steam = 10000;
                } else {
                    $steam = 0;
                }
                //untuk total
                if ($jam <= 15) {
                    $total = 1 * 5000 + $steam;
                } else {
                    //untuk inap
                    if ($rumus <= 15) {
                        $angka = 1;
                    } else {
                        $angka = floor($jam / 15);
                    }

                    $total = 5000 + ($inap * $angka) + $steam;
                }
                $where = array('kd_masuk' => $kode);
                $update = array('status_masuk' => 2);
                $this->db->update('tbl_masuk', $update, $where);
                $data = array(
                    'kd_keluar' => $kode,
                    'kd_masuk'    => $kode,
                    'tgl_jam_masuk' => $sqlcek['tgl_masuk'],
                    'tgl_jam_keluar' => date("Y-m-d H:i:s", $akhir),
                    'lama_parkir_keluar' =>  $jam .  ' Jam,' . floor($menit / 60) . ' Menit',
                    'total_keluar' => $total,
                    'status_keluar' => 1,
                );
                // die(print_r($data));
                $this->db->insert('tbl_keluar', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Terima Kasih, anda berhasil Checkout<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('member/tagihan');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Kode Karcis Sudah Keluar!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
                </div>');
                redirect('member/keluar');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Kode Karcis Tidak Ada!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                </div>');
            redirect('member/keluar');
        }
    }

    public function tagihan()
    {
        $data['judul'] = "Tagihan Penitip Motor";
        $id = $this->session->userdata('no_plat');
        $data['tagihan'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE tgl_jam_keluar LIKE '" . date('Y-m-d') . "%' AND no_plat= '$id'")->result();
        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_sidebar', $data);
        $this->load->view('member/tagihan', $data);
        $this->load->view('templates/member_footer');
    }

    public function profile()
    {
        $data['judul'] = 'Profile Saya';
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $this->load->view('templates/member_header', $data);
        $this->load->view('templates/member_sidebar', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/member_footer', $data);
    }
}
