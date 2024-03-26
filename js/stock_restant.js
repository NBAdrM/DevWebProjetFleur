document.addEventListener("click", function(){
    const btnStock = document.querySelectorAll('.btn-stock');

    btnStock.forEach(btn =>{
        btn.addEventListener('click',function(){
        
        const tdStock = btn.parentNode.previousElementSibling;
        const stock = parseInt(compteur.dataset.stock);
        tdStock.textContent = stock;

        })
    })

});