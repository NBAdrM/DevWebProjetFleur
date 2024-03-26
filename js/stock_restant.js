document.addEventListener('DOMContentLoaded', function(){
    const btnStock = document.querySelectorAll('.btn-stock');

    btnStock.forEach(btn =>{
        btn.addEventListener('click',function(){

            const tdStock = btn.parentNode.previousElementSibling;
            
            if (tdStock.textContent==""){
        
        const stock = parseInt(btn.dataset.stock);
        tdStock.textContent = stock;

            }
            
            else {
        tdStock.textContent = "";
            }

        })
    })
});