

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
              <!-- <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah PC total</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">50 Unit</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-desktop fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">PC Sedang terpimjam</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PC Tidak sedang di pinjam</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Banyak peminjam</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>-->
</div>
          


            <!-- Area Chart -->
            
                <!-- Card Body -->
                <div class="card-body">
                <form>
					<div class="form-group">
						<div class="form-row">
							<div class="col">
								<label for="exampleFormControlInput1">Nama peminjam</label>
								<input type="plain" class="form-control" id="exampleFormControlInput1" placeholder="Ex: Anak Agung Bagus Laravel C++">
							</div>
							<div class="col">
								<label for="exampleFormControlInput2">Keperluan meminjam</label>
								<input type="plain" class="form-control" id="exampleFormControlInput2" placeholder="Ex: rendering video">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Jenis Jaminan</label>
									<select class="form-control" id="exampleFormControlSelect1">
										<option>KTP</option>
										<option>SIM</option>
										<option>Kartu pelajar</option>
									</select>	
							</div>
						</div>	
						<div class="col">
							<div class="form-group">
								<label for="exampleFormControlPekerjaan">Pekerjaan</label>
									<select class="form-control" id="exampleFormControlSelect1">
										<option>Mahasiswa/Pelajar</option>
										<option>Tidak bekerja</option>
										<option>Freelancer</option>
										<option>PNS</option>
										<option>Lainnya</option>
										
									</select>	
							</div>
						</div>	
						
						<div class="col">
								<label for="exampleFormControlInputUmur">Umur</label>
										<input type="plain" class="form-control" id="exampleFormControlInput2" placeholder="ex: 20">
									</select>	
							</div>
						</div>
				  <div class="form-group">
					<label for="exampleFormControlSelect2">Pilih PC</label>
					<select multiple class="form-control" id="exampleFormControlSelect2">
					  <option>1. PC Bagus</option>
					  <option>2. PC Jelek</option>
					  <option>3. PC PC an</option>
					  <option>4. PC Curian</option>
					  <option>5. PC rendering</option>
					</select>
				  </div>
					 <button type="submit" class="btn btn-primary">Lanjut</button>
				</form>
				  </div>	
                </div>
              </div>
            </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kembalikan PC</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
				  <div>
                <div class="card-body">
				<div>	
                <form>
				  <div class="form-group">
					<label for="exampleFormControlSelect2">Pilih Peminjam</label>
					<select multiple class="form-control" id="exampleFormControlSelectKembalikanpc">
					  <option>1. Yan laravel</option>
					  <option>2. Tut Codeigniter</option>
					  <option>3. Putu dreamweaver</option>
					  <option>4. Anak agung phyton c++</option>
					  <option>5. Dek opencv javascript</option>
					</select>
				  </div>
					 <button type="submit" class="btn btn-primary">Lanjut</button>
				</form>
                </div>
					</div>
              

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prak_prognet\resources\views/dashboard.blade.php ENDPATH**/ ?>