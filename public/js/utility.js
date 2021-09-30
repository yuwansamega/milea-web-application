const modal = document.getElementById('modal');
const modalButton = document.getElementsByClassName('modal-button');

const navDropdown = document.getElementById("dropdown");
const navDropdownToogle = document.getElementsByClassName('dropdown-toggle');

const navMobileDropdown = document.getElementById('mobile-dropdown');
const navMobileDropdownToogle = document.getElementsByClassName('mobile-dropdown-toggle');

const addInteractions = function (trigger, target){

    console.log(trigger);
    console.log(target);

    for (let index = 0; index < trigger.length; index++) {
        trigger[index].addEventListener('click',()=>{
        
            const targetDisplay = target.style.display;

            if (targetDisplay == "" || targetDisplay == "none")
                target.style.display = 'flex';
            else
                target.style.display = 'none';
        
        });
    }

}

addInteractions(modalButton,modal);
addInteractions(navDropdownToogle,navDropdown);
addInteractions(navMobileDropdownToogle,navMobileDropdown);

window.addEventListener('scroll',(e)=>{
    const nav = document.getElementsByTagName('nav')[0];
    const whiteToggle = document.getElementById('toogle-white')
    const blackToggle = document.getElementById('toogle-black')

    if(window.scrollY >= 97){
        nav.style.backgroundColor = "white";
        blackToggle.style.display = "block"
        whiteToggle.style.display = "none"
        nav.style.boxShadow = "0px 5px 14px rgba(0, 0, 0, 0.12)";
    }
    else{
        nav.style.backgroundColor = "unset";
        blackToggle.style.display = "none"
        whiteToggle.style.display = "block"
        nav.style.boxShadow = "none";
    }
})