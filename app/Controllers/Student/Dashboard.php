<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\SeminarModel;
use App\Models\ParticipantModel;
use App\Models\CriteriasModel;

class Dashboard extends BaseController
{
    protected $userModel, $seminarModel, $participantModel, $criteriasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->seminarModel = new SeminarModel();
        $this->participantModel = new ParticipantModel();
        $this->criteriasModel = new CriteriasModel();
    }

    public function index()
    {
        $id = user()->id;

        $data = [
            'title' => 'Dasbor',
            'seminars' => $this->seminarModel->findAll(),
            'participants' => $this->participantModel->where('user_id',$id)->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/index', $data);
    }

    public function participant()
    {
        $id = user()->id;

        $data = [
            'title' => 'Keikutsertaan Seminar',
            'participants' => $this->participantModel->select('participant_seminars.*, seminars.title, seminars.presenter')->join('seminars','participant_seminars.seminar_id=seminars.id')->where('user_id',$id)->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/student/participant/index', $data);
    }

    public function add_participant()
    {
        $id = user()->id;

        $data = [
            'title' => 'Keikutsertaan Seminar',
            'validation' => \Config\Services::validation(),
            'user_id' => $id,
            'participants' => $this->participantModel->where('user_id',$id)->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/student/participant/add', $data);
    }

    public function save_participant()
    {
        if(!$this->validate([
            'seminar_id' => [
                'rules' => 'required',
                'label' => 'Judul Seminar'
            ],
            'criteria_1' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Sistematika Penyajian Materi',
                'errors' => [
                    'not_in_list' => 'Sistematika Penyajian Materi harus dipilih!'
                ]
            ],
            'criteria_2' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Kejelasan / Kemudahan Materi Untuk Dipahami',
                'errors' => [
                    'not_in_list' => 'Kejelasan / Kemudahan Materi Untuk Dipahami harus dipilih!'
                ]
            ],
            'criteria_3' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Kontribusi Dalam Peningkatan Pengetahuan',
                'errors' => [
                    'not_in_list' => 'Kontribusi Dalam Peningkatan Pengetahuan harus dipilih!'
                ]
            ],
            'criteria_4' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Manfaat Dalam Pekerjaan / Perkuliahan',
                'errors' => [
                    'not_in_list' => 'Manfaat Dalam Pekerjaan / Perkuliahan harus dipilih!'
                ]
            ],
            'criteria_5' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Kesesuaian Dengan Tujuan Seminar',
                'errors' => [
                    'not_in_list' => 'Kesesuaian Dengan Tujuan Seminar harus dipilih!'
                ]
            ],
            'impression' => [
                'rules' => 'required',
                'label' => 'Kesan Saat Mengikuti Seminar'
            ],
            'suggestion' => [
                'rules' => 'required',
                'label' => 'Kritik dan Saran'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Keikutsertaan Seminar Gagal Disimpan!');
        }

        $id = user()->id;

        $this->participantModel->insert([
            'seminar_id' => $this->request->getPost('seminar_id'),
            'user_id' => $id,
            'criteria_1' => $this->request->getPost('criteria_1'),
            'criteria_2' => $this->request->getPost('criteria_2'),
            'criteria_3' => $this->request->getPost('criteria_3'),
            'criteria_4' => $this->request->getPost('criteria_4'),
            'criteria_5' => $this->request->getPost('criteria_5'),
            'impression' => $this->request->getPost('impression'),
            'suggestion' => $this->request->getPost('suggestion'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('student/dashboard/participant')->with('success', 'Data Keikutsertaan Seminar Berhasil Disimpan');
    }

    public function edit_participant($id_p)
    {
        $id = user()->id;

        $data = [
            'title' => 'Keikutsertaan Seminar',
            'participants' => $this->participantModel->where('user_id',$id)->findAll(),
            'participant' => $this->participantModel->select('participant_seminars.*, seminars.title, seminars.presenter, seminars.seminar_date, seminars.start, seminars.end')->join('seminars','participant_seminars.seminar_id=seminars.id')->where('participant_seminars.id',$id_p)->asObject()->first(),
            'profile' => $this->userModel->first(),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/student/participant/edit', $data);
    }

    public function update_participant()
    {
        if(!$this->validate([
            'criteria_1' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Sistematika Penyajian Materi',
                'errors' => [
                    'not_in_list' => 'Sistematika Penyajian Materi harus dipilih!'
                ]
            ],
            'criteria_2' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Kejelasan / Kemudahan Materi Untuk Dipahami',
                'errors' => [
                    'not_in_list' => 'Kejelasan / Kemudahan Materi Untuk Dipahami harus dipilih!'
                ]
            ],
            'criteria_3' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Kontribusi Dalam Peningkatan Pengetahuan',
                'errors' => [
                    'not_in_list' => 'Kontribusi Dalam Peningkatan Pengetahuan harus dipilih!'
                ]
            ],
            'criteria_4' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Manfaat Dalam Pekerjaan / Perkuliahan',
                'errors' => [
                    'not_in_list' => 'Manfaat Dalam Pekerjaan / Perkuliahan harus dipilih!'
                ]
            ],
            'criteria_5' => [
                'rules' => 'required|not_in_list[0]',
                'label' => 'Kesesuaian Dengan Tujuan Seminar',
                'errors' => [
                    'not_in_list' => 'Kesesuaian Dengan Tujuan Seminar harus dipilih!'
                ]
            ],
            'impression' => [
                'rules' => 'required',
                'label' => 'Kesan Saat Mengikuti Seminar'
            ],
            'suggestion' => [
                'rules' => 'required',
                'label' => 'Kritik dan Saran'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Keikutsertaan Seminar Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $this->participantModel->update($id, [
            'criteria_1' => $this->request->getPost('criteria_1'),
            'criteria_2' => $this->request->getPost('criteria_2'),
            'criteria_3' => $this->request->getPost('criteria_3'),
            'criteria_4' => $this->request->getPost('criteria_4'),
            'criteria_5' => $this->request->getPost('criteria_5'),
            'impression' => $this->request->getPost('impression'),
            'suggestion' => $this->request->getPost('suggestion'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('student/dashboard/participant')->with('success', 'Data Keikutsertaan Seminar Berhasil Disimpan');
    }

    public function delete_participant()
    {
        $id = $this->request->getPost('id');
        if($this->participantModel->where('id',$id)->delete()) {
            return redirect()->to('student/dashboard/participant')->with('success', 'Data Keikutsertaan Seminar Berhasil Dihapus');
        } else {
            return redirect()->to('student/dashboard/participant')->with('failed', 'Data Keikutsertaan Seminar Gagal Dihapus');
        }
    }

    public function getseminar()
    {
        $get = $this->seminarModel->where('id',$this->request->getGet('seminar_id'))->asObject()->first();
        $response['value'] = date('d/m/Y',strtotime($get->seminar_date)).", ".date('H:i',strtotime($get->start))." - ".date('H:i',strtotime($get->end))." WIB";

        return json_encode($response);
    }

    public function comprehension()
    {
        if(isset($_GET['seminar_id'])) {
            if(!$this->validate([
                'seminar_id' => [
                    'rules' => 'required',
                    'label' => 'Judul Seminar'
                ]
            ])) {
                return redirect()->back()->withInput()->with('failed', 'Data Pemahaman Seminar Gagal Dilihat!');
            }
        }

        $id = user()->id;

        $data = [
            'title' => 'Pemahaman Seminar',
            'participants' => $this->participantModel->where('user_id',$id)->findAll(),
            'seminars' => $this->seminarModel->select('seminars.*')->join('participant_seminars','participant_seminars.seminar_id=seminars.id')->where('user_id',$id)->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        if(isset($_GET['seminar_id'])) {
            $seminar_id = $this->request->getGet('seminar_id');
            $this->participantModel->spk($seminar_id);

            $data['seminar'] = $this->seminarModel->where('id',$seminar_id)->asObject()->first();
            $data['criterias'] = $this->criteriasModel->asObject()->findAll();
            $data['participant'] = $this->participantModel->where(['user_id' => $id, 'seminar_id' => $seminar_id])->asObject()->first();
        }

        return view('dashboard/student/comprehension/index', $data);
    }

    public function profile()
    {
        $id = user()->id;

        $data = [
            'title' => 'Akun',
            'participants' => $this->participantModel->where('user_id',$id)->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/profile', $data);
    }

    public function profile_basic_save()
    {
        $id = user()->id;

        $cek_user = $this->userModel->where(['id' => $id])->asObject()->first();

        if($cek_user->username == $this->request->getPost('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|alpha_numeric_punct|min_length[5]|is_unique[users.username]';
        }

        if($cek_user->fullname == $this->request->getPost('fullname')) {
            $rule_fullname = 'required';
        } else {
            $rule_fullname = 'required|min_length[5]';
        }

        if($cek_user->email == $this->request->getPost('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|valid_email|is_unique[users.email]';
        }

        if(!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'label' => 'Username'
            ],
            'fullname' => [
                'rules' => $rule_fullname,
                'label' => 'Nama Lengkap'
            ],
            'email' => [
                'rules' => $rule_email,
                'label' => 'Alamat Email'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Akun Gagal Disimpan!');
        }

        $this->userModel->update($id, [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('student/dashboard/profile')->with('success', 'Data Akun Berhasil Disimpan');
    }
}