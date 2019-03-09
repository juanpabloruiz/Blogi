function buscar(){
    var pattern = document.getElementById('buscar').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'search_user.php';

    data.append("pattern", pattern);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('buscar').addEventListener('input', buscar, false);
}, false);



function buscar_post(){
    var pattern = document.getElementById('buscar_post').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'search_post.php';

    data.append("pattern", pattern);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('buscar_post').addEventListener('input', buscar_post, false);
}, false);