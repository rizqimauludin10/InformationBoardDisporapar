<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <h5>Kegiatan Dinas Porapar Kubu Raya</h5> 
      </div>

      <div class="card-body">
        <div class="mb-3">
          <label for="title_act" class="form-label">Nama Kegiatan</label>
            <input class="form-control" id="title_act" placeholder="Nama Kegiatan">
        </div>  
        <div class="mb-3">
          <label for="desc_act" class="form-label">Deskripsi Kegiatan</label>
          <textarea class="form-control" id="desc_act" rows="3"></textarea>
        </div>

        <div class="form-group">
        <label for="name_act" class="form-label">Dihadiri Oleh</label>
          <select class="form-control" name="idKategori" id="idKategori" required>
              <option value="">Daftar Pejabat</option>
              <option value="Kabid Kepemudaan">Kabid Kepemudaan</option>
              <option value="Kabid Olahraga">Kabid Olahraga</option>
              <option value="Kabid Pariwisata">Kabid Pariwisata</option>
              <option value="Kabid Ekonomi Kreatif">Kabid Ekonomi Kreatif</option>
          </select>
        </div>

        <div class="form-group">
        <label for="date_act" class="form-label">Tanggal Kegiatan</label>
          <p><input type="text" id="datepicker" class="form-control"></p>

        </div>

      </div>
    </div>
  </div>
</div>
<!-- End of Content -->
</div>

