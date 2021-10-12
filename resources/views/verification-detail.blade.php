<x-admin-layout>
    

    <x-slot name="link">
        <link rel="stylesheet" href="/css/admin/verification-detail.css">
        <link rel="stylesheet" href="/css/utility.css">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"/>
    </x-slot>

    <div id="container">
        
        <div class="row justify-center" id="group">
            <div class="col" id="left">

                <x-admin-profile-card>
                    <x-slot name='nama'>Dilan Almertan S.Kom</x-slot>
                    <x-slot name='nim'>112233445566</x-slot>
                    <x-slot name='jabatan'>PNS</x-slot>
                </x-admin-profile-card>

                <x-admin-document>

                    <x-admin-document-field>
                        <x-slot name='surat_tugas'>Ijazah Terakhir</x-slot>
                        {{-- <x-slot name='tautan'></x-slot> --}}
                    </x-admin-document-field>

                    <x-admin-document-field>
                        <x-slot name='surat_tugas'>Surat Tugas</x-slot>
                        {{-- <x-slot name='tautan'></x-slot> --}}
                    </x-admin-document-field>
                
                </x-admin-document>

            </div>
            <div class="col" id="right">
                <x-admin-application-form>

                    <x-admin-form-field>
                        <x-slot name="attribut">Nama Kegiatan</x-slot>
                        <x-slot name="nilai">Pelatihan Tenaga Pelatih Kesehatan</x-slot>
                    </x-admin-form-field>
                    
                    <x-admin-form-field>
                        <x-slot name="attribut">Nama</x-slot>
                        <x-slot name="nilai">Dilan Amertan</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">NIP</x-slot>
                        <x-slot name="nilai">112233445566</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Nomor KTP</x-slot>
                        <x-slot name="nilai">12712833191283</x-slot>
                    </x-admin-form-field>
                    
                    <x-admin-form-field>
                        <x-slot name="attribut">Status</x-slot>
                        <x-slot name="nilai">PNS</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Jenis Kelamin</x-slot>
                        <x-slot name="nilai">Palembang, 1 Januari 1997</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Agama</x-slot>
                        <x-slot name="nilai">Islam</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Email</x-slot>
                        <x-slot name="nilai">Dilan@gmail.com</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">No Telepon</x-slot>
                        <x-slot name="nilai">0812345678</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Pendidikan Terakhir</x-slot>
                        <x-slot name="nilai">SI - Sistem Informasi</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Pangkat / Golongan</x-slot>
                        <x-slot name="nilai">Pengatur / II C</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Jabatan / Pekerjaan</x-slot>
                        <x-slot name="nilai">Staf/ Pengelolaan Sumber Daya Manusia</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Nama Instansi</x-slot>
                        <x-slot name="nilai">RSUD Siti Fatimah Sumatera Selatan</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Alamat Instansi</x-slot>
                        <x-slot name="nilai">Jl. Kol, H, Burlian, Kel. Sukabangun, Kec. Sukarami, Palembang. Sumatera Selatan. Indonesia</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Telpon Instansi</x-slot>
                        <x-slot name="nilai">0711571883</x-slot>
                    </x-admin-form-field>

                    <x-admin-form-field>
                        <x-slot name="attribut">Alamat Domisili</x-slot>
                        <x-slot name="nilai">Jl. Batu Ampar 3, GG, Batu Alam 1 no, 52. RT 01, RW 04. Sukabangun 1. Palembang. Sumatera Selatan. Indonesia</x-slot>
                    </x-admin-form-field>

                </x-admin-application-form>
            </div>
        </div>
    </div>    
    
</x-admin-layout>