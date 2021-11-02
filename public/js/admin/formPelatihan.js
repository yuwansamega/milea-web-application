const form = document.getElementsByTagName('form')[0];
const showModal = function (content){
    const formModal = document.getElementsByTagName('modal')[0];
    formModal.getElementsByTagName('h3')[0].innerHTML = content;
    formModal.style.display = "flex";
}

form.addEventListener('submit', event => {
    event.preventDefault();

    const dates = {
        "mulai pendaftaran" : form.querySelector("#open_regist").value ,
        "tutup pendaftaran" : form.querySelector("#close_regist").value ,
        "mulai workshop" : form.querySelector("#open_ws").value ,
        "tutup workshop" : form.querySelector("#close_ws").value ,
    };
    
    // Empty Validation
    for (const index in dates) {        
        if( dates[index] == ''){
            showModal('Pastikan untuk melengkapi <b> seluruh tanggal </b> yang diperlukan!')
            return;
        }
    }
    
    // Order Validation
    const datesKeys = Object.keys(dates); 
    for (
            let index = 0; 
            index < (datesKeys.length-1); 
            index++
        ) {
            const currentKey = dates[datesKeys[index]];
            const nextKey = dates[datesKeys[index+1]];
            if(currentKey > nextKey){
                showModal(
                    `Pastikan tanggal ${datesKeys[index]} <b> sebelum </b> tanggal ${datesKeys[index+1]}`
                );
                return;
            }
    }

    event.target.submit();

});