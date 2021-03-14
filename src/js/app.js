addEventListener('DOMContentLoaded', () =>{
   menu_movil();
})

function menu_movil(){
    const btn_menu = document.querySelector('.btn-menu');
    const body = document.querySelector('body');
    if(btn_menu){
        btn_menu.addEventListener('click', () =>{
            const menu_items = document.querySelector('.menu-items');
             
            menu_items.classList.toggle('show');
            body.classList.toggle('fijar-body');  
        })
    }
}
