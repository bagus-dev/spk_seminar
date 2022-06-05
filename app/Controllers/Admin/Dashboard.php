<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\FieldModel;
use App\Models\SeminarModel;
use App\Models\CriteriasModel;
use App\Models\ParticipantModel;

class Dashboard extends BaseController
{
    protected $userModel, $fieldModel, $seminarModel, $criteriasModel, $participantModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->fieldModel = new FieldModel();
        $this->seminarModel = new SeminarModel();
        $this->criteriasModel = new CriteriasModel();
        $this->participantModel = new ParticipantModel();
    }

    public function index()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Dasbor',
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'latest_users' => $this->userModel->where('id !=', $id)->orderBy('created_at','DESC')->asObject()->findAll(5),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/index', $data);
    }
    
    public function field_seminar()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Bidang Seminar',
            'fields' => $this->fieldModel->asObject()->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/admin/field_seminar/index', $data);
    }

    public function add_field_seminar()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Bidang Seminar',
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/field_seminar/add', $data);
    }

    public function save_field_seminar()
    {
        if(!$this->validate([
            'name' => [
                'rules' => 'required',
                'label' => 'Nama Bidang'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Bidang Seminar Gagal Disimpan!');
        }

        $this->fieldModel->insert([
            'name' => $this->request->getPost('name'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/dashboard/field_seminar')->with('success', 'Data Bidang Seminar Berhasil Disimpan');
    }

    public function edit_field_seminar($id_f)
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Bidang Seminar',
            'field' => $this->fieldModel->where('id',$id_f)->asObject()->first(),
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/field_seminar/edit', $data);
    }

    public function update_field_seminar()
    {
        if(!$this->validate([
            'name' => [
                'rules' => 'required',
                'label' => 'Nama Bidang'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Bidang Seminar Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $this->fieldModel->update($id, [
            'name' => $this->request->getPost('name'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/dashboard/field_seminar')->with('success', 'Data Bidang Seminar Berhasil Disimpan');
    }

    public function delete_field_seminar()
    {
        $id = $this->request->getPost('id');
        if($this->fieldModel->where('id',$id)->delete()) {
            return redirect()->to('admin/dashboard/field_seminar')->with('success', 'Bidang Seminar Berhasil Dihapus');
        } else {
            return redirect()->to('admin/dashboard/field_seminar')->with('failed', 'Bidang Seminar Gagal Dihapus');
        }
    }

    public function seminar()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Seminar',
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->select('seminars.*, field_seminars.name')->join('field_seminars','seminars.field_id=field_seminars.id')->asObject()->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/admin/seminar/index', $data);
    }

    public function add_seminar()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Seminar',
            'fields' => $this->fieldModel->asObject()->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/seminar/add', $data);
    }
    
    public function save_seminar()
    {
        if(!$this->validate([
            'title' => [
                'rules' => 'required',
                'label' => 'Judul Seminar'
            ],
            'presenter' => [
                'rules' => 'required',
                'label' => 'Pemateri'
            ],
            'field_id' => [
                'rules' => 'required',
                'label' => 'Bidang Seminar'
            ],
            'seminar_date' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Waktu Seminar'
            ],
            'start' => [
                'rules' => 'required|valid_date[H.i]',
                'label' => 'Waktu Mulai'
            ],
            'end' => [
                'rules' => 'required|valid_date[H.i]',
                'label' => 'Waktu Berakhir'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Seminar Gagal Disimpan!');
        }

        $date = $this->request->getPost('seminar_date');
        $tgl = substr($date,0,2);
        $bln = substr($date,3,2);
        $thn = substr($date,6);

        $this->seminarModel->insert([
            'title' => $this->request->getPost('title'),
            'presenter' => $this->request->getPost('presenter'),
            'field_id' => $this->request->getPost('field_id'),
            'seminar_date' => $thn."-".$bln."-".$tgl,
            'start' => date('H:i:s',strtotime($this->request->getPost('start'))),
            'end' => date('H:i:s',strtotime($this->request->getPost('end'))),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/dashboard/seminar')->with('success', 'Data Seminar Berhasil Disimpan');
    }

    public function edit_seminar($id_s)
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Seminar',
            'seminar' => $this->seminarModel->where('id',$id_s)->asObject()->first(),
            'fields' => $this->fieldModel->asObject()->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/seminar/edit', $data);
    }

    public function update_seminar()
    {
        if(!$this->validate([
            'title' => [
                'rules' => 'required',
                'label' => 'Judul Seminar'
            ],
            'presenter' => [
                'rules' => 'required',
                'label' => 'Pemateri'
            ],
            'field_id' => [
                'rules' => 'required',
                'label' => 'Bidang Seminar'
            ],
            'seminar_date' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Waktu Seminar'
            ],
            'start' => [
                'rules' => 'required|valid_date[H.i]',
                'label' => 'Waktu Mulai'
            ],
            'end' => [
                'rules' => 'required|valid_date[H.i]',
                'label' => 'Waktu Berakhir'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Seminar Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');
        $date = $this->request->getPost('seminar_date');
        $tgl = substr($date,0,2);
        $bln = substr($date,3,2);
        $thn = substr($date,6);

        $this->seminarModel->update($id, [
            'title' => $this->request->getPost('title'),
            'presenter' => $this->request->getPost('presenter'),
            'field_id' => $this->request->getPost('field_id'),
            'seminar_date' => $thn."-".$bln."-".$tgl,
            'start' => date('H:i:s',strtotime($this->request->getPost('start'))),
            'end' => date('H:i:s',strtotime($this->request->getPost('end'))),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/dashboard/seminar')->with('success', 'Data Seminar Berhasil Disimpan');
    }

    public function delete_seminar()
    {
        $id = $this->request->getPost('id');

        if($this->seminarModel->where('id',$id)->delete()) {
            return redirect()->to('admin/dashboard/seminar')->with('success', 'Seminar Berhasil Dihapus');
        } else {
            return redirect()->to('admin/dashboard/seminar')->with('failed', 'Seminar Gagal Dihapus');
        }
    }

    public function criteria()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Kriteria',
            'fields' => $this->fieldModel->asObject()->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('dashboard/admin/criteria/index', $data);
    }

    public function add_criteria()
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Kriteria',
            'fields' => $this->fieldModel->asObject()->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/criteria/add', $data);
    }

    public function save_criteria()
    {
        if(!$this->validate([
            'kriteria' => [
                'rules' => 'required',
                'label' => 'Nama Kriteria'
            ],
            'bobot' => [
                'rules' => 'required|numeric',
                'label' => 'Nilai Bobot'
            ],
            'keterangan' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Sifat Kriteria',
                'errors' => [
                    'in_list' => 'Sifat Kriteria Harus Dipilih!'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Kriteria Gagal Disimpan!');
        }

        $this->criteriasModel->insert([
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'keterangan' => $this->request->getPost('keterangan'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/dashboard/criteria')->with('success', 'Kriteria Berhasil Disimpan');
    }

    public function edit_criteria($id_c)
    {
        $id = user()->id;
        
        $data = [
            'title' => 'Kriteria',
            'criteria' => $this->criteriasModel->where('id',$id_c)->asObject()->first(),
            'fields' => $this->fieldModel->asObject()->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/criteria/edit', $data);
    }

    public function update_criteria()
    {
        if(!$this->validate([
            'kriteria' => [
                'rules' => 'required',
                'label' => 'Nama Kriteria'
            ],
            'bobot' => [
                'rules' => 'required|numeric',
                'label' => 'Nilai Bobot'
            ],
            'keterangan' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Sifat Kriteria',
                'errors' => [
                    'in_list' => 'Sifat Kriteria Harus Dipilih!'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Kriteria Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $this->criteriasModel->update($id, [
            'kriteria' => $this->request->getPost('kriteria'),
            'bobot' => $this->request->getPost('bobot'),
            'keterangan' => $this->request->getPost('keterangan'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/dashboard/criteria')->with('success', 'Kriteria Berhasil Disimpan');
    }

    public function delete_criteria()
    {
        $id = $this->request->getPost('id');
        if($this->criteriasModel->where('id',$id)->delete()) {
            return redirect()->to('admin/dashboard/criteria')->with('success', 'Kriteria Berhasil Dihapus');
        } else {
            return redirect()->to('admin/dashboard/criteria')->with('failed', 'Kriteria Gagal Dihapus');
        }
    }

    public function profile()
    {
        $id = user()->id;

        $data = [
            'title' => 'Akun',
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
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

        return redirect()->to('admin/dashboard/profile')->with('success', 'Data Akun Berhasil Disimpan');
    }

    public function profile_image_save()
    {
        $id = user()->id;

        if(!$this->validate([
            'user_image' => [
                'rules' => 'max_size[user_image,512]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'label' => 'Foto Profil'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Foto Profil Gagal Disimpan!');
        }

        $image = $this->request->getFile('user_image');
        $image_name = $image->getName();

        if($image_name !== 'avatar-1.png') {
            $image->move('assets/img/users');
        }

        $old_image = $this->request->getPost('image_old');

        if($old_image !== "avatar-1.png") {
            unlink('assets/img/users/' . $old_image);
        }

        $this->userModel->update($id, [
            'image' => $image_name
        ]);
        
        return redirect()->to('admin/dashboard/profile')->with('success', 'Foto Profil Berhasil Disimpan');
    }

    public function accounts()
    {
        $id = user()->id;

        $data = [
            'title' => 'Daftar Akun',
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->findAll(),
            'users' => $this->userModel->where('id !=', $id)->asObject()->findAll(),
            'criterias' => $this->criteriasModel->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/admin/accounts', $data);
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
            'title' => 'Tingkat Pemahaman',
            'fields' => $this->fieldModel->findAll(),
            'seminars' => $this->seminarModel->asObject()->findAll(),
            'users' => $this->userModel->where('id !=', $id)->findAll(),
            'criterias' => $this->criteriasModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => \Config\Services::validation()
        ];

        if(isset($_GET['seminar_id'])) {
            $seminar_id = $this->request->getGet('seminar_id');
            $this->participantModel->spk($seminar_id);

            $data['seminar'] = $this->seminarModel->where('id',$seminar_id)->asObject()->first();
            $data['participants'] = $this->participantModel->where('seminar_id',$seminar_id)->findAll();
            $data['class_1'] = $this->participantModel->select('participant_seminars.*, users.fullname')->join('users','participant_seminars.user_id=users.id')->where(['percentage >' => 80, 'seminar_id' => $seminar_id])->orderBy('percentage','DESC')->asObject()->findAll();
            $data['class_2'] = $this->participantModel->select('participant_seminars.*, users.fullname')->join('users','participant_seminars.user_id=users.id')->where(['percentage >' => 60, 'percentage <' => 81, 'seminar_id' => $seminar_id])->orderBy('percentage','DESC')->asObject()->findAll();
            $data['class_3'] = $this->participantModel->select('participant_seminars.*, users.fullname')->join('users','participant_seminars.user_id=users.id')->where(['percentage >' => 49, 'percentage <' => 61, 'seminar_id' => $seminar_id])->orderBy('percentage','DESC')->asObject()->findAll();
            $data['class_4'] = $this->participantModel->select('participant_seminars.*, users.fullname')->join('users','participant_seminars.user_id=users.id')->where(['percentage <' => 50, 'seminar_id' => $seminar_id])->orderBy('percentage','DESC')->asObject()->findAll();
        }

        return view('dashboard/admin/comprehension', $data);
    }
}