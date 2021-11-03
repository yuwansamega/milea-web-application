const tambah_materi = document.getElementById('tambah-materi');
const grup_tombol = document.getElementById('grup-tombol');
const form = document.getElementById('form');
const expandable_card = document.querySelector('.expandable-card');

tambah_materi.addEventListener('click',()=>{
    const remove_button = tambah_materi.cloneNode(true);
    const new_card = expandable_card.cloneNode(true);
    
    remove_button.innerHTML = `<span class="material-icons-round">
    delete
    </span>`;
    remove_button.className = "btn btn-danger d-flex center";
    remove_button.addEventListener('click', ()=>{
        form.removeChild(new_card);
    });

    new_card.childNodes[5].childNodes[1].remove()
    new_card.childNodes[5].appendChild(remove_button);
    
    form.insertBefore(new_card, grup_tombol);
});