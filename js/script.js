let el = document.getElementById("wrapper");
        let toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

let keyword = document.getElementById('keyword');
let tableContent = document.getElementById('tableContent');
        
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
    ajax.open('GET', 'datatrans.php?keyword=' + keyword.value, true);
    ajax.send();
         
});

$(document).ready(function(){
    $('.editbtn').on('click', function(){

        $('#edit-data').modal('show');
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#namaupt').val(data[1]);
            $('#jenisupt').val(data[2]);
            $('#adminupt').val(data[3]);  
    });
});