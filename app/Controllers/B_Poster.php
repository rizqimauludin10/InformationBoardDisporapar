<?php 

namespace App\Controllers;

use App\Models\M_Poster;

class B_poster extends BaseController{

    public function index()
	{
		echo view('admin/_partials/partial_header');
		echo view('admin/_partials/partial_sidebar');
		echo view('admin/_partials/partial_topbar');
		echo view('admin/b_poster/index');
		echo view('admin/_partials/partial_footer');
	}

    public function getDataPoster() {
		helper('text');
		if($this->request->isAjax()){
			$poster = new M_Poster();
				$data = [
					'data_poster' => $poster->findAll()
				];

				$msg = [
					'data' => view('admin/b_poster/poster_data', $data)
				];

				echo json_encode($msg);
		} else {
			exit('Maaf');
		}
	}

	public function formAddData() {
		if($this->request->isAjax()){
			$poster = new M_Poster();

				$msg = [
					'data' => view('admin/b_poster/poster_tambah')
				];

				echo json_encode($msg);
		} else {
			exit('Maaf Gagal');
		}
	}

    public function storeData() {
        helper('form');
		if($this->request->isAjax()) {
			
			$validation =  \Config\Services::validation();

			$valid = $this->validate([
				'name_poster' => [
					'label' => 'Nama Poster',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
						]
					],
					'date_poster' => [
						'label' => 'Tanggal Poster',
						'rules' => 'required',
						'errors' => [
								'required' => '{field} tidak boleh kosong'
						]
					],

                    'image_poster' => [
						'label' => 'Upload Gambar',
						'rules' => 'uploaded[image_poster]|mime_in[image_poster,image/png,image/jpg,image/jpeg]|is_image[image_poster]',
						'errors' => [
							'uploaded' => '{field} wajib diisi',
							'mime_in' => 'Harus dalam bentuk gambar'
						]
                    ]
			]);
			if(!$valid) {
				$msg = [
					'error' => [
						'namaposter' => $validation->getError('name_poster'),
						'dateposter' => $validation->getError('date_poster'),
						'image_poster' => $validation->getError('image_poster')
						]
					];

					} else {

                        $image = $this->request->getFile('image_poster');
                        $img = $this->request->getVar('name_poster');
                        $image->move('assets/poster_uploads', $img . '.' . $image->getExtension());

						$saveData = [
							'poster_name' => $this->request->getVar('name_poster'),
							'poster_date' => $this->request->getVar('date_poster'),
                            'poster_image' => './assets/poster_uploads/' . $image->getName()
						];

						$poster = new M_Poster();

						$poster->insert($saveData);

						$msg = [
							'sukses' => 'Data poster berhasil tersimpan'
						];
					}
					echo json_encode($msg);

		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function deleteData() {
		if($this->request->isAjax()) {

			$id = $this->request->getVar('id');
			
			$poster = new M_Poster();
			$checkData = $poster->find($id);
			$oldImage = $checkData['poster_image'];
			unlink($oldImage);
			
			$poster->delete($id);

			$msg = [
				'sukses' => 'Data Poster berhasil dihapus'
		];
			
		echo json_encode($msg);


		}
	}
}
?>