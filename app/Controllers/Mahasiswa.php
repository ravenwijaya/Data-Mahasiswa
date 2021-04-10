<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
	protected $mahasiswaModel;
	public function __construct()
	{
		$this->mahasiswaModel = new MahasiswaModel();
	}
	public function index()
	{

		$data = [
			'title' => 'View | Data Mahasiswa',
			'mahasiswa' => $this->mahasiswaModel->getMahasiswa()
		];

		return view('index', $data);
	}
	public function create()
	{
		session();
		$data = [
			'title' => 'Create Data Mahasiswa',
			'validation' => \Config\Services::validation()
		];

		return view('add', $data);
	}
	public function save()
	{
		if (!$this->validate([
			'nim' => [
				'rules' => 'required|is_unique[mahasiswa.nim]|numeric',
				'errors' => [
					'required' => '{field} harus diisi.',
					'is_unique' => '{field} sudah terdaftar',
					'numeric' => '{field} hanya boleh diisi angka'
				]
			],
			'nama' => [
				'rules' => 'required|alpha_space',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_space' => '{field} hanya boleh huruf dan spasi'
				]
			],
			'kotaasal' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',

				]
			],
			'tgllahir' => [
				'rules' => 'required|valid_date',
				'errors' => [
					'required' => '{field} harus diisi.',
					'valid_date' => '{field} format dd-mm-yy',

				]
			],
			'alamatortu' => [
				'rules' => 'required|alpha_numeric_space',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_numeric_space' => '{field} hanya boleh diisi oleh huruf,angka, dan spasi',

				]
			],
			'namaortu' => [
				'rules' => 'required|alpha_space',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_space' => '{field} hanya boleh huruf dan spasi'
				]
			],
			'notelp' => [
				'rules' => 'required|max_length[12]|numeric',
				'errors' => [
					'required' => '{field} harus diisi.',
					'max_length' => '{field} maks 12 angka.',
					'numeric' => '{field} hanya boleh diisi angka'
				]
			],
			'kodepos' => [
				'rules' => 'required|min_length[5]|max_length[5]|numeric',
				'errors' => [
					'min_length' => '{field} tidak boleh kurang dari 5 digit',
					'required' => '{field} harus diisi.',
					'max_length' => '{field} maks 5 digit.',
					'numeric' => '{field} hanya boleh diisi angka'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/mahasiswa/create')->withInput()->with('validation', $validation);
		}
		//dd($this->request->getVar('nim'));
		$this->mahasiswaModel->save([
			'nim' => $this->request->getVar('nim'),
			'nama' => $this->request->getVar('nama'),
			'kota_asal' => $this->request->getVar('kotaasal'),
			'tgl_lahir' => $this->request->getVar('tgllahir'),
			'nama_ortu' => $this->request->getVar('namaortu'),
			'alamat_ortu' => $this->request->getVar('alamatortu'),
			'kode_pos' => $this->request->getVar('kodepos'),
			'notelp' => $this->request->getVar('notelp'),
			'statuss' => $this->request->getVar('status'),

		]);
		session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
		return redirect()->to('/mahasiswa');
	}
	public function hapus($id)
	{
		$this->mahasiswaModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');

		return redirect()->to('/mahasiswa');
	}

	public function edit($id)
	{

		session();
		$data = [
			'title' => 'Edit Data Mahasiswa',
			'validation' => \Config\Services::validation(),
			'mahasiswa' => $this->mahasiswaModel->getMahasiswa($id)
		];
		//dd($this->mahasiswaModel->getMahasiswa($id));
		return view('edit', $data);
	}
	public function update($id)
	{
		//dd($this->request->getVar());
		$Mahasiswalama = $this->mahasiswaModel->getMahasiswa($id);
		if ($Mahasiswalama['nim'] == $this->request->getVar('nim')) {
			$rule_nim = 'required|numeric';
		} else {
			$rule_nim = 'required|is_unique[mahasiswa.nim]|numeric';
		}
		if (!$this->validate([
			'nim' => [
				'rules' => $rule_nim,
				'errors' => [
					'required' => '{field} harus diisi.',
					'is_unique' => '{field} sudah terdaftar',
					'numeric' => '{field} hanya boleh diisi angka'
				]
			],
			'nama' => [
				'rules' => 'required|alpha_space',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_space' => '{field} hanya boleh huruf dan spasi'
				]
			],
			'kotaasal' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',

				]
			],
			'tgllahir' => [
				'rules' => 'required|valid_date',
				'errors' => [
					'required' => '{field} harus diisi.',
					'valid_date' => '{field} format dd-mm-yy',

				]
			],
			'alamatortu' => [
				'rules' => 'required|alpha_numeric_space',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_numeric_space' => '{field} hanya boleh diisi oleh huruf,angka, dan spasi',

				]
			],
			'namaortu' => [
				'rules' => 'required|alpha_space',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_space' => '{field} hanya boleh huruf dan spasi'
				]
			],
			'notelp' => [
				'rules' => 'required|max_length[12]|numeric',
				'errors' => [
					'required' => '{field} harus diisi.',
					'max_length' => '{field} maks 12 angka.',
					'numeric' => '{field} hanya boleh diisi angka'
				]
			],
			'kodepos' => [
				'rules' => 'required|min_length[5]|max_length[5]|numeric',
				'errors' => [
					'min_length' => '{field} tidak boleh kurang dari 5 digit',
					'required' => '{field} harus diisi.',
					'max_length' => '{field} maks 5 digit.',
					'numeric' => '{field} hanya boleh diisi angka'
				]
			]
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/mahasiswa/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
		}
		//dd($this->request->getVar('nim'));
		$this->mahasiswaModel->save([
			'id' => $id,
			'nim' => $this->request->getVar('nim'),
			'nama' => $this->request->getVar('nama'),
			'kota_asal' => $this->request->getVar('kotaasal'),
			'tgl_lahir' => $this->request->getVar('tgllahir'),
			'nama_ortu' => $this->request->getVar('namaortu'),
			'alamat_ortu' => $this->request->getVar('alamatortu'),
			'kode_pos' => $this->request->getVar('kodepos'),
			'notelp' => $this->request->getVar('notelp'),
			'statuss' => $this->request->getVar('status'),

		]);
		session()->setFlashdata('pesan', 'Data berhasil diedit');
		return redirect()->to('/mahasiswa');
	}



	//--------------------------------------------------------------------

}
