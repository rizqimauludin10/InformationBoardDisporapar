<?php 

namespace App\Controllers;

use App\Models\M_Pelayanan;

class B_pelayanan extends BaseController{

    public function index()
	{
		echo view('admin/_partials/partial_header');
		echo view('admin/_partials/partial_sidebar');
		echo view('admin/_partials/partial_topbar');
		echo view('admin/b_pelayanan/index');
		echo view('admin/_partials/partial_footer');
	}

    public function getDataPlyn() {
		helper('text');
		if($this->request->isAjax()){
			$plyn = new M_Pelayanan();
				$data = [
					'data_plyn' => $plyn->findAll()
				];

				$msg = [
					'data' => view('admin/b_pelayanan/plyn_data', $data)
				];

				echo json_encode($msg);
		} else {
			exit('Maaf');
		}
	}

    public function formAddData() {
		if($this->request->isAjax()){
			$plyn = new M_Pelayanan();

				$msg = [
					'data' => view('admin/b_pelayanan/plyn_tambah')
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
				'name_plyn' => [
					'label' => 'Nama Pelayanan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
						]
					],

                    'file_plyn' => [
						'label' => 'Upload Gambar',
						'rules' => 'uploaded[file_plyn]|mime_in[file_plyn,image/png,image/jpg,image/jpeg]|is_image[file_plyn]',
						'errors' => [
							'uploaded' => '{field} wajib diisi',
							'mime_in' => 'Harus dalam bentuk gambar'
						]
                    ]
			]);
			if(!$valid) {
				$msg = [
					'error' => [
						'namaplyn' => $validation->getError('name_plyn'),
						'fileplyn' => $validation->getError('file_plyn')
						]
					];

					} else {

                        $image = $this->request->getFile('file_plyn');
                        $img = $this->request->getVar('name_plyn');
                        $image->move('assets/plyn_uploads', $img . '.' . $image->getExtension());

						$saveData = [
							'plyn_name' => $this->request->getVar('name_plyn'),
                            'plyn_file' => './assets/plyn_uploads/' . $image->getName(),
                            'plyn_status' => '0'
						];

						$plyn = new M_Pelayanan();

						$plyn->insert($saveData);

						$msg = [
							'sukses' => 'Data pelayanan berhasil tersimpan'
						];
					}
					echo json_encode($msg);

		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

    public function plyn_edit() {
		if ($this->request->isAjax()) {
			$id = $this->request->getVar('id');

			$plyn = new M_Pelayanan;
			$row = $plyn->find($id);

			$data = [
				'id' => $row['id'],
				'plyn_name' => $row['plyn_name'],
				'plyn_status' => $row['plyn_status'],
			];

			$msg = [
				'sukses' => view('admin/b_pelayanan/plyn_edit', $data)
			];

			echo json_encode($msg);

		}
	}

    public function editData() {
		if($this->request->isAjax()) {
			$updateData = [
				'plyn_name' => $this->request->getVar('name_plyn'),
				'plyn_status' => $this->request->getVar('status'),
				];

			$plyn = new M_Pelayanan;

			$id = $this->request->getVar('id');
			$plyn->update($id, $updateData);

			$msg = [
					'sukses' => 'Data kegiatan berhasil diupdate'
			];
				
			echo json_encode($msg);

		} else {
			exit('Maaf gagal diupdate');
		}
	}

    public function deleteData() {
		if($this->request->isAjax()) {

			$id = $this->request->getVar('id');
			
			$plyn = new M_Pelayanan();
			$checkData = $plyn->find($id);
			$oldImage = $checkData['plyn_file'];
			unlink($oldImage);
			
			$plyn->delete($id);

			$msg = [
				'sukses' => 'Data Poster berhasil dihapus'
		];
			
		echo json_encode($msg);


		}
	}
}

?>