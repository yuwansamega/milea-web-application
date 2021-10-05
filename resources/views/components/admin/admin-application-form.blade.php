<form action="/admin/verifikasi/detail/update/" id="form-pengajuan" method="POST">
                    <h1>Data Detail</h1>
                    <ul>
                        {{ $slot }}
                        <li class="row">
                            <h3>Keterangan</h3>
                            <select name="status" id="keterangan">
                                <option value="Ditolak">Ditolak</option>
                                <option value="Diterima">Diterima</option>
                            </select>
                        </li>
                        <li class="row">
                            <h3>Pesan</h3>
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Masukan Pesan Jika Perlu ..."></textarea>
                        </li>
                    </ul>
                    <div class="row">
                        <button type="submit">Simpan</button>
                    </div>
                </form>