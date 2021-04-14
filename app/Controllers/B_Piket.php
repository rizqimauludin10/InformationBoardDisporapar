<?php 

namespace App\Controllers;

use App\Models\M_Piket;

class B_Piket extends BaseController{

    public function index()
	{
		echo view('admin/_partials/partial_header');
		echo view('admin/_partials/partial_sidebar');
		echo view('admin/_partials/partial_topbar');
		echo view('admin/b_piket/index');
		echo view('admin/_partials/partial_footer');
	}

    public function getDataPiket() {
		helper('text');
		if($this->request->isAjax()){
			$piket = new M_Piket();
				$data = [
					'data_piket' => $piket->findAll()
				];

				$msg = [
					'data' => view('admin/b_piket/piket_data', $data)
				];

				echo json_encode($msg);
		} else {
			exit('Maaf');
		}
	}

	public function formAddData() {
		if($this->request->isAjax()){
			$piket = new M_Piket();

				$msg = [
					'data' => view('admin/b_piket/tambah_piket')
				];

				echo json_encode($msg);
		} else {
			exit('Maaf');
		}
	}

	public function storeData() {
		if($this->request->isAjax()) {
			
			$validation =  \Config\Services::validation();
			$valid = $this->validate([
				'name_piket' => [
					'label' => 'Nama Piket',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
						]
					],
					'date_piket' => [
						'label' => 'Tanggal Piket',
						'rules' => 'required',
						'errors' => [
								'required' => '{field} tidak boleh kosong'
						]
					],
			]);
			if(!$valid) {
				$msg = [
					'error' => [
						'namapiket' => $validation->getError('name_piket'),
						'datepiket' => $validation->getError('date_piket'),
						]
					];

					} else {
						$saveData = [
							'name_piket' => $this->request->getVar('name_piket'),
							'date_piket' => $this->request->getVar('date_piket'),
							'shift_piket' => $this->request->getVar('shift'),
						];

						$piket = new M_Piket();

						$piket->insert($saveData);

						$msg = [
							'sukses' => 'Data piket berhasil tersimpan'
						];
					}
					echo json_encode($msg);

		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function piket_edit() {
		if ($this->request->isAjax()) {
			$id = $this->request->getVar('id');

			$piket = new M_Piket();
			$row = $piket->find($id);

			$data = [
				'id' => $row['id'],
				'name_piket' => $row['name_piket'],
				'date_piket' => $row['date_piket'],
				'shift_piket' => $row['shift_piket']
			];

			$msg = [
				'sukses' => view('admin/b_piket/edit_piket', $data)
			];

			echo json_encode($msg);
		}
	}


	public function editData() {
		if($this->request->isAjax()) {
			$updateData = [
				'name_piket' => $this->request->getVar('name_piket'),
				'date_piket' => $this->request->getVar('date_piket'),
				'shift_piket' => $this->request->getVar('shift'),
				];

			$piket = new M_Piket();

			$id = $this->request->getVar('id');
			$piket->update($id, $updateData);

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

			$piket = new M_Piket();

			$piket->delete($id);

			$msg = [
				'sukses' => 'Data Piket berhasil dihapus'
		];
			
		echo json_encode($msg);


		}
	}
}
?>