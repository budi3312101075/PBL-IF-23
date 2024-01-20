  <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="section-counter" data-section="about">
      <div class="container">
          <center>
              <h1>Data pengajuan Anda</h1>
          </center>
      </div>
      <div class="about_section layout_padding">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <h3><i class="fas fa-user-graduate mr-2"></i> Status klaim</h3>
                      <hr>
                      <table>
                          <table class="table table-striped table-bordered">
                              <tr>
                                  <th scope="col">NO</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Tanggal</th>
                                  <th scope="col">Nominal</th>
                                  <th scope="col">Jenis Bantuan</th>
                                  <th scope="col">Bukti Transfer</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Deskripsi Status</th>
                              </tr>
                              <?php

                                $no = 1;
                                foreach ($karyawan as $karyawan) : ?>
                                  <tr>
                                      <td><?php echo $no++ ?></td>
                                      <td><?php echo $karyawan->username ?></td>
                                      <td><?php echo $karyawan->tanggal ?></td>
                                      <td><?php echo $karyawan->nominal ?></td>
                                      <td><?php echo $karyawan->jenis_bantuan ?></td>
                                      <td><img src="<?php echo base_url() . 'assets/image/' . $karyawan->bukti; ?>" width="150"></td>
                                      <td><?php echo $karyawan->status ?></td>
                                      <td><?php echo $karyawan->deskripsi_status ?></td>
                                  </tr>

                              <?php endforeach; ?>

                              </thead>
                              </tbody>
                          </table>
                  </div>
              </div>
          </div>
      </div>
  </section>