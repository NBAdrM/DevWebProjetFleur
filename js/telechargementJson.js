document.addEventListener('DOMContentLoaded', function() {
    function telechargerJSON() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'ajax/recuperer_donnees_json.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var donnees_json = xhr.responseText;
                var nom_fichier = "donnees.json";
                var blob = new Blob([donnees_json], { type: 'application/json' });
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = nom_fichier;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            }
        };
        xhr.send();
    }
    document.getElementById('telechargerJson').addEventListener('click', telechargerJSON);
    
  });