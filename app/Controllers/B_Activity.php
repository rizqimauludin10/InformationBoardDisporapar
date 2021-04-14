<?php

namespace App\Controllers;

use App\Models\M_Activity;
class B_Activity extends BaseController
{
	public function index()
	{
		echo view('admin/_partials/partial_header');
		echo view('admin/_partials/partial_sidebar');
		echo view('admin/_partials/partial_topbar');
		echo view('admin/b_activity/index');
		echo view('admin/_partials/partial_footer');
	}

	public function getData() {
		helper('text');
		if($this->request->isAjax()){
			$act = new M_Activity();
				$data = [
					'data_act' => $act->findAll()
				];

				$msg = [
					'data' => view('admin/b_activity/act_data', $data)
				];

				echo json_encode($msg);
		} else {
			exit('Maaf Gagal');
		}

		
	}

	public function formAddData() {
		if($this->request->isAjax()){
			$act = new M_Activity();

				$msg = [
					'data' => view('admin/b_activity/act_input')
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
				'title_act' => [
					'label' => 'Nama Kegiatan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong'
					]
					],
					'desc_act' => [
						'label' => 'Deskripsi Kegiatan',
						'rules' => 'required',
						'errors' => [
							'required' => '{field} tidak boleh kosong'
						]
					],
					'date_act' => [
						'label' => 'Tanggal Kegiatan',
						'rules' => 'required',
						'errors' => [
								'required' => '{field} tidak boleh kosong'
						]
					],
					'startfrom_act' => [
						'label' => 'Jam Mulai',
						'rules' => 'required',
						'errors' => [
								'required' => '{field} tidak boleh kosong'
						]
					],
					'startuntil_act' => [
						'label' => 'Jam Selesai',
						'rules' => 'required',
						'errors' => [
								'required' => '{field} tidak boleh kosong'
						]
					],
			]);
			if(!$valid) {
				$msg = [
					'error' => [
						'namakegiatan' => $validation->getError('title_act'),
						'desckegiatan' => $validation->getError('desc_act'),
						'date' => $validation->getError('date_act'),
						'timeStart' => $validation->getError('startfrom_act'),
						'timeUntil' => $validation->getError('startuntil_act'),
					]
					];

					} else {
						$saveData = [
							'user_id' => "1",
							'title_act' => $this->request->getVar('title_act'),
							'name_act' => $this->request->getVar('idKategori'),
							'desc_act' => $this->request->getVar('desc_act'),
							'date_act' => $this->request->getVar('date_act'),
							'startfrom_act' => $this->request->getVar('startfrom_act'),
							'startuntil_act' => $this->request->getVar('startuntil_act'),
						];

						$act = new M_Activity;

						$act->insert($saveData);

						$msg = [
							'sukses' => 'Data kegiatan berhasil tersimpan'
						];
					}
					echo json_encode($msg);

		} else {
			exit('Maaf tidak dapat diproses');
		}
	}

	public function act_edit() {
		if ($this->request->isAjax()) {
			$id = $this->request->getVar('id');

			$act = new M_Activity;
			$row = $act->find($id);

			$data = [
				'id_act' => $row['id_act'],
				'title_act' => $row['title_act'],
				'name_act' => $row['name_act'],
				'desc_act' => $row['desc_act'],
				'date_act' => $row['date_act'],
				'startfrom_act' => $row['startfrom_act'],
				'startuntil_act' => $row['startuntil_act'], 
			];

			$msg = [
				'sukses' => view('admin/b_activity/act_edit', $data)
			];

			echo json_encode($msg);

		}
	}

	public function editData() {
		if($this->request->isAjax()) {
			$updateData = [
				'title_act' => $this->request->getVar('title_act'),
				'name_act' => $this->request->getVar('idKategori'),
				'desc_act' => $this->request->getVar('desc_act'),
				'date_act' => $this->request->getVar('date_act'),
				'startfrom_act' => $this->request->getVar('startfrom_act'),
				'startuntil_act' => $this->request->getVar('startuntil_act'),
				];

			$act = new M_Activity;

			$id = $this->request->getVar('id');
			$act->update($id, $updateData);

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

			$act = new M_Activity;

			$act->delete($id);

			$msg = [
				'sukses' => 'Data kegiatan berhasil dihapus'
		];
			
		echo json_encode($msg);


		}
	}

}
