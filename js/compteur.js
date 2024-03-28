document.addEventListener('DOMContentLoaded', function() {
    const cpt = document.querySelectorAll('.compteur');
  
    cpt.forEach(compteur => {
      const decreBtn = compteur.querySelector('.btn-decre');
      const increBtn = compteur.querySelector('.btn-incre');
      const quantite = compteur.querySelector('.quantite');
      const quantite2 = compteur.querySelector('.quantite2');
      const stock = parseInt(compteur.dataset.stock);
  
      let count = 0;
  
      decreBtn.addEventListener('click', function() {
        count = Math.max(0, count - 1);
        quantite.textContent = count;
        quantite2.value = count;
        if(count==0){
          quantite2.disabled = true;
        }
      });
  
      increBtn.addEventListener('click', function() {
        if (count < stock){
        count++;
        quantite.textContent = count;
        quantite2.value = count;
        if (quantite2.disabled) {
          quantite2.disabled=false;
        }
        updateCounterState(compteur);
        }
      });
      
    });
      
    function updateCounterState(currentCounter) {
      cpt.forEach(compteur => {
          if (compteur !== currentCounter) {
            const quantite2 = compteur.querySelector('.quantite2');
            quantite2.disabled = true;
          }
      });
    }
  });