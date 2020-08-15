<div id="pesan"></div>

<div class="card" >
    <div class="card-header bg-info">Data Member</div>
    <div class="card-body">
        <!-- <button id="loadData" class="btn btn-primary">Tampilkan data</button>
        <button id="removeData" class="btn btn-secondary">Remove All</button> -->
        
        <div class="btn-group" role="group" >
            <button type="button" id="reload" class="btn btn-info">
                <i class="fa fa-home"></i>Reload
            </button>
            <button type="button"id="tambah" class="btn btn-success">tambah</button>
        </div>

        <p>&nbsp;</p>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id='data'></tbody>
        </table>
    </div>
</div>
                



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <input type="hidden" id="id">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nim">
            </div>
            </div>
            
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama">
            </div>
            </div>
            
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telpon</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="telpon">
            </div>
            </div>

            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="alamat"></textarea>
            </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="button" id="simpan" class="btn btn-primary">simpan</button>
        </div>
    </div>
    </div>
</div>