<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        if ($this->session->userdata('role_id') !== '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda Belum Login !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Autentifikasi');
        }
    }

    public function index()
    {
        $data['judul'] = "Halaman Utama Admin";
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $drp = $this->db->query("SELECT * FROM tbl_masuk WHERE status_masuk='1'");
        $steam = $this->db->query("SELECT * FROM tbl_masuk WHERE steam = 'Ingin'");
        $member = $this->db->query("SELECT * FROM user");
        $data['drp'] = $drp->num_rows();
        $data['steam'] = $steam->num_rows();
        $data['member'] = $member->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function masuk()
    {
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $data['judul'] = 'Parkir Masuk';
        $data['masuk'] = $this->db->query("SELECT * FROM tbl_masuk WHERE status_masuk LIKE '1'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dataParkir', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addData()
    {
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $data['judul'] = "Tambah Data Parkir";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/addDataParkir', $data);
        $this->load->view('templates/footer');
    }

    function get_kod()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kd_masuk,3)) AS kd_max FROM tbl_masuk");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%08s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "WJ" . $kd;
    }

    public function kendaraanmasuk()
    {
        $data['judul'] = "Tambah Data Parkir";
        $this->form_validation->set_rules('no_plat', 'Plat nomor', 'required|min_length[3]|max_length[8]', [
            'required' => 'Plat Nomor harus diisi',
            'min_length' => 'Plat Nomor terlalu pendek',
            'max_length' => 'Plat Nomor terlalu pendek'
        ]);
        $this->form_validation->set_rules('merk_motor', 'Merk Motor', 'required|min_length[3]|max_length[30]', [
            'required' => 'Merk Motor harus diisi',
            'min_length' => 'Merk Motor terlalu pendek',
            'max_length' => 'Merk Motor terlalu pendek'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/addDataParkir', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'kd_masuk'   => $this->get_kod(),
                'steam'     => $this->input->post('steam'),
                'no_plat'   => $this->input->post('no_plat'),
                'merk_motor' => $this->input->post('merk_motor'),
                'tgl_masuk'    => date('Y-m-d H:i:s'),
                'status_masuk' => 1,
            );
            $this->db->insert('tbl_masuk', $data);
            $this->load->view('struk', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Parkir Berhasil Ditambahkan !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/masuk');
        }
    }

    public function ubahparkir()
    {
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $data['judul'] = 'Ubah Data Parkir';
        $data['parkir'] = $this->ModelParkir->parkirmasukWhere(['kd_masuk' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('no_plat', 'Plat nomor', 'required|min_length[3]|max_length[8]', [
            'required' => 'Plat Nomor harus diisi',
            'min_length' => 'Plat Nomor terlalu pendek',
            'max_length' => 'Plat Nomor terlalu pendek'
        ]);
        $this->form_validation->set_rules('merk_motor', 'Merk Motor', 'required|min_length[3]|max_length[30]', [
            'required' => 'Merk Motor harus diisi',
            'min_length' => 'Merk Motor terlalu pendek',
            'max_length' => 'Merk Motor terlalu pendek'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/ubahParkir', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'steam' => $this->input->post('steam', true),
                'no_plat' => $this->input->post('no_plat', true),
                'merk_motor' => $this->input->post('merk_motor', true),
                'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'status_masuk' => $this->input->post('status_masuk', true)
            ];
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Parkir Berhasil Diubah !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            $this->ModelParkir->update_parkirmasuk($data, ['kd_masuk' => $this->input->post('kd_masuk')]);
            redirect('admin/masuk');
        }
    }
    public function hapusparkir()
    {
        $where = ['kd_masuk' => $this->uri->segment(3)];
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Parkir Berhasil Di Hapus !!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        $this->ModelParkir->hapusparkir($where);
        redirect('admin/masuk');
    }

    public function Laporan()
    {
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $data['judul'] = "Data Titip Motor Pelanggan";
        $data['laporan'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE status_keluar='1'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/laporanparkir', $data);
        $this->load->view('templates/footer', $data);
    }

    public function print()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE status_keluar='1'")->result_array();
        $this->load->view('laporan/laporan_print', $data);
    }


    public function pdf()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE status_keluar='1'")->result_array();

        $root = $_SERVER['DOCUMENT_ROOT'];
        include $root . "/parkiryuk/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('laporan/laporan_pdf_parkir', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("LaporanRiwayatParkir.pdf", array('Attachment' => 0));

        //AKTIFKAN SKRIP DIBAWAH INI dan jadikan komentar skrip diatas UNTUK VERSI PHP LAMA
        // $this->load->library('dompdf_gen');

        // $data['laporan'] = $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE status_keluar='1'")->result_array();

        // $this->load->view('laporan_pdf_parkir', $data);

        // $paper_size = 'A4';
        // $orientation = 'potrait';
        // $html = $this->output->get_output();
        // $this->dompdf->set_paper($paper_size, $orientation);

        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("LaporanRiwayatParkir.pdf", array('Attachment' => 0));
    }

    public function export_excel_parkir()
    {
        $data = array(
            'title' => 'Laporan Parkir',
            'laporan' => $this->db->query("SELECT * FROM tbl_keluar RIGHT JOIN tbl_masuk ON tbl_keluar.kd_masuk = tbl_masuk.kd_masuk WHERE status_keluar='1'")->result_array()
        );
        $this->load->view('laporan/laporan_excel_parkir', $data);
    }

    public function profile()
    {
        $data['judul'] = 'Profile Saya';
        $data['user'] = $this->ModelUser->cekData(['no_plat' => $this->session->userdata('no_plat')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer', $data);
    }
}
