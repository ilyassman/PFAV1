
$.ajaxSetup({
    headers: 
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function openAddModal(){
    var addmondal=document.getElementById("addModal");
    addmondal.style.display='block';
    
}
function closefen(){
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('addModal').style.display = 'none';
}
var btn=document.getElementById('enregistrer');
var btnadd=document.getElementById('addpost');
$.ajaxSetup({
    headers: 
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
$.ajax({
url: 'http://127.0.0.1:8000/api/v1/posts', // Remplacez par l'URL de votre API
type: 'GET',
dataType: 'json',
success: function(data) {
    data.forEach(function(item) {
        var row = $('<tr>');
        row.append($('<th scope="row">').text(item.id));
        row.append($('<td>').text(item.title));
        row.append($('<td>').text(item.descreption));
        row.append($('<td>').append($('<p class='+(item.status ?  "text-success" : "text-danger" )+'>').text(item.status ?  "active" : "desactiver" )));
        row.append($('<td>').append(
                $('<button class="btn btn-danger">').text('Supprimer')));
        row.append($('<td>').append(
                $('<button class="btn btn-primary">').text('Modifier')));
        $('#affich').append(row);
    });
},
error: function(xhr, status, error) {
    console.error('Erreur lors de la requête :', status, error);
}
});
});

