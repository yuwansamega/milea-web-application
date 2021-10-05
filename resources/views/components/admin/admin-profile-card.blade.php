<div class="row" id="profile-card">
    <img src="/assets/wireframe-photo.png" alt="">
    <div class="col">
        <h1>
            {{$nama ?? 'Nama'}}
        </h1>
        <h2>
            {{$nim ?? 'NIM'}}
        </h2>
        <h3>
            {{$jabatan ?? 'Jabatan'}}
        </h3>
    </div>
</div>
<x-style>
    #profile-card{
        border: 1px solid rgba(0, 0, 0, 0.17);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        padding: 27px 22px;
    }

    #profile-card img{
        margin-right: 15px;
    }

    #profile-card h1{
        font-weight: 600;
        font-size: 23px;
    }
    #profile-card h2{
        font-weight: 300;
        font-size: 20px;
    }
    #profile-card h3{
        font-weight: 300;
    font-size: 20px;
    }

    #profile-card .col{
        justify-content: center;
    }
</x-style>