let el = document.getElementById("wrapper");
        let toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };


//ajax
let keyword = document.getElementById('keyword');
let tableContentBrg = document.getElementById('tableContentBrg');
        
 keyword.addEventListener('keyup', function(){
     //create ajax object
    let ajax = new XMLHttpRequest();
        
    //cek if ajax ready
    ajax.onreadystatechange = function(){
         if (ajax.readyState == 4 && ajax.status == 200){
            tableContent.innerHTML = ajax.responseText;
        }
     }
        
     //ajax execution
    ajax.open('GET', 'databrg.php?keyword=' + keyword.value, true);
    ajax.send();
         
});
