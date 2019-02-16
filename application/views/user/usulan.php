<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengisian usulan Proposal</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="myModal" class="modal fade bs-example-modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                        <h4 class="modal-title">Persyaratan Proposal</h4>
                    </div>
                    <div class="modal-body">
                        <p>Sebelum anda mengusulkan proposal mohon dibaca dan dipahami mengenai persyaratan proposal berikut</p>
                        <ol>
                            <li>Persyaratan PDMA</li>
                            <ul>
                                <li>Ketua tim peneliti berpendidikan S2 dengan maksimal jabatan fungsional asisten ahli atau
                                    belum memiliki jabatan fungsional.</li>
                                <li>Anggota tim peneliti dosen 1-2 orang.</li>
                                <li>Anggota tim peneliti mahasiswa minimal 1 orang.</li>
                                <li>Pengusul hanya boleh mendapatkan skema PDMA sebanyak tiga kali sebagai ketua atau anggota.</li>

                            </ul>
                            <li>Perysaratan PKA</li>
                            <ul>
                                <li>Ketua tim peneliti berpendidikan S2 maksimal jabatan fungsional minimal lektor.</li>
                                <li>Anggota tim peneliti dosen 1-2 orang.</li>
                                <li>Anggota tim peneliti mahasiswa minimal 1 orang.</li>
                            </ul>
                            <li>Persyaratan PKLN-A</li>
                            <ul>
                                <li>Ketua peneliti adalah dosen tetap STMIK AMIKOM Purwokerto dengan gelar akademik S-3.</li>
                                <li>Anggota tim peneliti maksimun 2 orang + peneliti asing minimal 1 orang.</li>
                                <li>Ketua peneliti memiliki kemampuan bahasa Inggris baik lisan maupun tulisan.</li>
                                <li>Ketua peneliti mempunyai track record penelitian memadai yang ditunjukkan dalam curriculum
                                    vitae-nya.
                                </li>
                                <li>Mempunyai MoU/MoA dengan mitra di luar negeri yang sah, masih berlaku, dan telah disepakati
                                    serta ditandatangani secara institusi (bukan MoU antar individu peneliti), atau dibawah
                                    payung Kerjasama Bilateral antara Ditjen Kemenristekdikti dengan pihak luar negeri.</li>
                                <li>Penelitian bersifat mono tahun dan bisa diperpanjang dengan mengajukan proposal lanjutan,
                                    maksumum 2 tahun dengan peta jalan yang jelas.</li>
                                <li>Mempunyai surat pernyataan/persetujuan pelaksanaan kerjasama penelitian dari ketua tim mitra
                                    luar negeri (letter of agreement for research collaboration).</li>
                                <li>Mematuhi aspek legal yang terkait dengan material yang akan dibawa ke luar negeri (material
                                    transfer agreement).</li>
                                <li>Ada pembagian yang jelas bagian penelitian mana yang dilakukan di Indonesia dan bagain mana
                                    yang akan dilakukan di tempat penelitian mitra.</li>
                                <li>Dalam pelaksanaan, peneliti Indonesia maupun peneliti mitra harus memenuhi kelayakan masa
                                    tinggal di lokasi penelitian masing-masing.</li>
                                <li>Mendatangkan mitra ke Indonesia dalam rangka pelaksanaan kegiatan harus mematuhi ketentuan
                                    PP No. 41 Tahun 2006 tentang Perizinan Lembaga Penelitian dan Pengabdian Asing, Badan
                                    Usaha Asing, dan Orang Asing dan UU No. 18 Tahun 2002 tentang Sistem Nasional Penelitian,
                                    Pengembangan, dan Penerapan Ilmu Pengetahuan dan Teknologi.</li>
                                <li>Proposal penelitian disusun bersama peneliti Indonesia dengan peneliti mitra.</li>
                                <li>Jumlah dana penelitian yang dialokasikan pada program ini sebesar Rp15.000.000,- per judul
                                    per tahun. Sedangkan mitra kerjasama luar negeri diwajibkan memberian kontribusi baik
                                    dalam bentuk in kind dan in cash. Mekanisme dan tata cara pendanaan diatur dalam Surat
                                    Perjanjian Pelaksanaan Hibah Penelitian.</li>
                            </ul>
                        </ol>
                        <br>
                        <div class="row">
                            <!-- <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                    <input type="checkbox" value="">Accept Terms and Services.
                            </div> -->
                            <br>
                            <br>
                            <div class="col-lg-10"></div>
                            <div class="col-lg-1">
                                <button type="button" id="ModalN" class="btn btn-success">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ModalU" class="modal fade bs-example-modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                        <h4 class="modal-title">Jenis Proposal</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Penelitian</th>
                                    <th>Pengabdian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="<?= base_url(); ?>user/detail_usulan/pdma">Penelitian Dosen Muda Amikom (PDMA)</a></td>
                                    <td><a href="<?= base_url(); ?>user/detail_usulan/amm">Amikom Mitra Masyarakat (AMM)</a></td>
                                </tr>
                                <tr>
                                    <td><a href="<?= base_url(); ?>user/detail_usulan/pka">Penelitian Kompetitif Amikom (PKA)</a></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><a href="<?= base_url(); ?>user/detail_usulan/pkln-a">Penelitian Kerjasama Luar Negeri Amikom (PKLN-A)</a></td>
                                    <td></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>