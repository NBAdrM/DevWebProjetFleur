document.addEventListener('DOMContentLoaded', function() {
    const cpt = document.querySelectorAll('.compteur');
  
    cpt.forEach(compteur => {
      const decreBtn = compteur.querySelector('.btn-decre');
      const increBtn = compteur.querySelector('.btn-incre');
      const quantite = compteur.querySelector('.quantite');
      const stock = parseInt(compteur.dataset.stock);
  
      let count = 0;
  
      decreBtn.addEventListener('click', function() {
        count = Math.max(0, count - 1);
        quantite.textContent = count;
      });
  
      increBtn.addEventListener('click', function() {
        if (count < stock){
        count++;
        quantite.textContent = count;
        }
      });
    });
  });