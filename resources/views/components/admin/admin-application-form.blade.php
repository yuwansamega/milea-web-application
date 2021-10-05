<form action="" id="form-pengajuan">
                    <h1>Detail Pengaju</h1>
                    <ul>
                        {{ $slot }}
                        <li class="row">
                            <h3>Keterangan</h3>
                            <select name="" id="keterangan">
                                <option value="">Terima</option>
                                <option value="">Tolak</option>
                            </select>
                        </li>
                        <li class="row">
                            <h3>Pesan</h3>
                            <textarea name="" id="" cols="30" rows="10" placeholder="Masukan Pesan Jika Perlu ..."></textarea>
                        </li>
                    </ul>
                    <div class="row">
                        <button type="submit">Simpan</button>
                    </div>
                </form>