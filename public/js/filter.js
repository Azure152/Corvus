/* <=== ====================================================================
    Seccion de funciones
==================================================================== ===> */

if ( (window.location.search.substring(1)) === '' ) {
    console.log( 'hola' );
} else {
    console.log( window.location.search.substring(1).split('=')[1] )
    if ( document.querySelector('.orderBy').value != window.location.search.substring(1).split('=')[1]) {
        for (let index = 0; index < document.querySelector('.orderBy').children.length; index++) {
            let childrend = document.querySelector('.orderBy').children[index]

            if ( childrend.value == window.location.search.substring(1).split('=')[1] ) {
                childrend.selected = true
            }
        }
    }
}

/* <=== ====================================================================
    Seccion de eventos
==================================================================== ===> */

document.querySelector('.orderBy').addEventListener('change', (e)=>{
    e.currentTarget.nextElementSibling.click();
});